<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'name' => 'パレット（標準）',
            'primary_color' => '#FF7E5F',
            'background_color' => '#FFFFFF',
            'text_color' => '#333333',
        ]);
    }
}
