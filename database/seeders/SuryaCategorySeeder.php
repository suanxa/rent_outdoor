<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuryaCategory;


class SuryaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                SuryaCategory::insert([
            ['name' => 'Camping'],
            ['name' => 'Hiking'],
            ['name' => 'Mountaineering'],
        ]);
    }
}
