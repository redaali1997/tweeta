<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Reda Ali',
            'username' => 'redaali',
            'email' => 'reda@example.com'
        ]);

        $users = User::factory(5)->create();

        $users->each(function ($user) {
            Tweet::factory(3)->create([
                'user_id' => $user
            ]);
        });
    }
}
