<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['message' => "string", 'receiver_id' => "\Closure", 'sender_id' => "\Closure", 'read' => "false"])]
    public function definition(): array
    {
        $users = User::all()->pluck('id')->toArray();
        // get random seeder
        $sender = $users[array_rand($users)];
        // set $receiver except the same user with $sender
        $receivers = array_diff($users, [$sender]);
        //get random receiver
        $receiver = $receivers[array_rand($receivers)];
        return [
            'message' => $this->faker->sentence,
            'receiver_id' => function () use ($receiver) {
                return $receiver;
            },
            'sender_id' => function () use ($sender) {
                return $sender;
            },
            'read' => false,
        ];
    }
}
