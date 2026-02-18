<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'family_id' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'title' => '家族で晩ごはん',
            'description' => '駅前のレストラン予約済み',
            'start_at' => now(),
            'end_at' => now()->addHours(2),
            'is_all_day' => false,
        ]);
    }
}
