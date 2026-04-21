<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure users exist
        $users = User::count() < 3
            ? collect([
                User::create([
                    "name"=> "Sita",
                    "email"=> "sita@laravel.com",
                    "password"=> bcrypt("sita123"),
                ]),
                User::create([
                    "name"=> "Hari",
                    "email"=> "hari@laravel.com",
                    "password"=> bcrypt("hari123"),
                ]),
                User::create([
                    "name"=> "Rita",
                    "email"=> "rita@email.com",
                    "password"=> bcrypt("rita123"),
                ])
            ])
            : User::take(3)->get();

        // Sample tasks
        $tasks = [
            [
                "title" => "Setup project",
                "description" => "Initialize Laravel project and install dependencies",
                "status" => Task::STATUS_PENDING,
                "due_date" => now()->addDays(2),
            ],
            [
                "title" => "Build authentication",
                "description" => "Implement login and registration",
                "status" => Task::STATUS_IN_PROGRESS,
                "due_date" => now()->addDays(4),
            ],
            [
                "title" => "Create dashboard",
                "description" => "Design and build user dashboard",
                "status" => Task::STATUS_PENDING,
                "due_date" => now()->addDays(6),
            ],
            [
                "title" => "Fix bugs",
                "description" => "Resolve reported issues",
                "status" => Task::STATUS_COMPLETED,
                "due_date" => now()->subDays(1),
            ],
        ];

        foreach ($tasks as $task) {
            $users->random()->tasks()->create([
                'title' => $task['title'],
                'description' => $task['description'],
                'status' => $task['status'],
                'due_date' => $task['due_date'],
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}