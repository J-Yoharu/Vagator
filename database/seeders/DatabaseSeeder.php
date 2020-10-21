<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Type;
use App\Models\Department;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            Locale::factory()->count(5)->create();
            Type::factory()->count(5)->create();
            Department::factory()->count(5)->create();
            $this->call([UsersSeeder::class]);
            Job::factory()->count(80)->create();
        }catch(Exception $ex){
            dd($ex->getFile());
        }
    }
}
