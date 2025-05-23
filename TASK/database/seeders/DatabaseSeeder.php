<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Task 1',
            'description' => 'This is task 1 Description',
            'assigned_to' => '1',
            'assigned_by' => '1',
        ]);
        Task::create([
            'name' => 'Task 2',
            'description' => 'This is task 2 Description',
            'assigned_to' => '2',
            'assigned_by' => '1',
        ]);
        Task::create([
            'name' => 'Task 3',
            'description' => 'This is task 3 Description',
            'assigned_to' => '3',
            'assigned_by' => '2',
        ]);
        Task::create([
            'name' => 'Task 4',
            'description' => 'This is task 4 Description',
            'assigned_to' => '4',
            'assigned_by' => '3',
        ]);
        Task::create([
            'name' => 'Task 5',
            'description' => 'This is task 5 Description',
            'assigned_to' => '5',
            'assigned_by' => '4',
        ]);
        Task::create([
            'name' => 'Task 6',
            'description' => 'This is task 6 Description',
            'assigned_to' => '6',
            'assigned_by' => '5',
        ]);
        Task::create([
            'name' => 'Task 7',
            'description' => 'This is task 7 Description',
            'assigned_to' => '7',
            'assigned_by' => '6',
        ]);
        Task::create([
            'name' => 'Task 8',
            'description' => 'This is task 8 Description',
            'assigned_to' => '8',
            'assigned_by' => '7',
        ]);
        Task::create([
            'name' => 'Task 9',
            'description' => 'This is task 9 Description',
            'assigned_to' => '9',
            'assigned_by' => '8',
        ]);
        Task::create([
            'name' => 'Task 10',
            'description' => 'This is task 10 Description',
            'assigned_to' => '1',
            'assigned_by' => '9',
        ]);
    }
}
