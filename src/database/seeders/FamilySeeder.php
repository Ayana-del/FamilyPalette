<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Family;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Family::create([
            'name' => '山田家',
            'invite_code' => 'YAMADA2026',
        ]);
    }
}
