<template>
  <div>
    <button
      class="absolute w-full h-screen left-0 top-0 bg-black opacity-25"
      @click="toggle = !toggle"
      v-if="toggle == true"
    ></button>
    <div class="relative">
      <button @click.prevent="getNotifications" class="focus:outline-none">
        <i
          class="fa fa-bell"
          :class="{ 'text-white': toggle, 'text-teal-500': !toggle }"
          aria-hidden="true"
        ></i>
      </button>
      <div
        class="absolute bg-white right-0 rounded-lg p-3 mt-2 shadow-md"
        style="width: max-content"
        v-if="toggle"
      >
        <h1 class="font-bold border-b border-gray-400 pb-2">Notifications</h1>
        <span v-if="notifications == null" class="text-center py-2"
          >loading...</span
        >
        <span v-else-if="notifications == 'No notifications yet.'"
          >No notifications yet.</span
        >
        <ul v-else>
          <li
            v-for="notification in notifications"
            :key="notification.id"
            class="py-2"
          >
            <a
              :href="`/${notification.data.tweet_id}`"
              @click="markAsRead(notification.id)"
              class="cursor-pointer"
              v-if="
                notification.type === 'App\\Notifications\\LikeNotification'
              "
            >
              <span>
                <strong>{{ notification.data.name }}</strong> liked your post.
              </span>
            </a>
            <a
              :href="`/profile/${notification.data.user.username}`"
              @click="markAsRead(notification.id)"
              class="cursor-pointer"
              v-if="
                notification.type === 'App\\Notifications\\FollowNotification'
              "
            >
              <span>
                <strong>{{ notification.data.user.name }}</strong> followed you.
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      toggle: false,
      notifications: null,
    };
  },
  methods: {
    getNotifications() {
      this.toggle = !this.toggle;
      axios
        .get("/api/notifications")
        .then((notifications) => {
          console.log(notifications);
          this.notifications =
            notifications.data.length === 0
              ? "No notifications yet."
              : notifications.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    markAsRead(id) {
      axios.post(`/api/${id}/markasread`);
    },
  },
};
</script>

<style>
.fade-enter {
  opacity: 0;
}
.fade-enter-active {
  opacity: 1;
}
</style>
