<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = request()->user()->unreadNotifications;
        return $notifications;
    }

    public function markAsRead(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return 'done';
    }
}
