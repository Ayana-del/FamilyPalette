<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => '食事', 'icon_type' => 'food', 'color' => '#FFA500'],
            ['name' => '仕事', 'icon_type' => 'work', 'color' => '#0000FF'],
            ['name' => '記念日', 'icon_type' => 'heart', 'color' => '#FFC0CB'],
        ];
        foreach ($categories as $c) {
            Category::create($c);
        }
    }
}
