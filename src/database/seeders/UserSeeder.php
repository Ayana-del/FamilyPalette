<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'family_id' => 1,
            'name' => '山田太郎',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'color_code' => '#FF0000',
            'theme_id' => 1,
            'is_premium' => true,
        ]);
    }
}
