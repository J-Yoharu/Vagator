<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locale::factory()->count(10)->create();
    }
}
