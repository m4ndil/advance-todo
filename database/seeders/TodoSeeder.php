<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    public function run()
    {
        DB::table('todos')->insert([
            [
                'task_title' => 'Complete Laravel Tutorial',
                'task_description' => 'Finish the Laravel documentation and tutorial.',
                'task_start_date' => Carbon::now()->toDateString(),
                'task_end_date' => Carbon::now()->addDays(7)->toDateString(),
                'priority' => 'high',
                'is_task_near' => true,
                'is_task_overdue' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_title' => 'Finish Reports',
                'task_description' => 'Complete the monthly financial reports.',
                'task_start_date' => Carbon::now()->toDateString(),
                'task_end_date' => Carbon::now()->addDays(3)->toDateString(),
                'priority' => 'mid',
                'is_task_near' => true,
                'is_task_overdue' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_title' => 'Team Meeting',
                'task_description' => 'Discuss upcoming projects and team goals.',
                'task_start_date' => Carbon::now()->toDateString(),
                'task_end_date' => Carbon::now()->addDays(1)->toDateString(),
                'priority' => 'low',
                'is_task_near' => true,
                'is_task_overdue' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_title' => 'Submit Tax Documents',
                'task_description' => 'Gather and submit tax-related documents.',
                'task_start_date' => Carbon::now()->subDays(2)->toDateString(), // 2 days ago
                'task_end_date' => Carbon::now()->subDay()->toDateString(), // 1 day ago
                'priority' => 'high',
                'is_task_near' => false,
                'is_task_overdue' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
