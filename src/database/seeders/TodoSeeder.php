<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::create([
            'family_id' => 1,
            'title' => '牛乳を買う',
            'is_completed' => false,
            'due_date' => now()->addDays(1),
        ]);
    }
}
