<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 50 messages for each user
        for ($i = 1; $i <= 50; $i++) {
            Message::factory()->create([
                'sender_id' => ($i%2) + 1,
                'receiver_id' => (!($i%2)) + 1,
            ]);
        }
        Message::factory(50)->create();
    }
}
