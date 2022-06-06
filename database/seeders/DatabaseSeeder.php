<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TechProbidhanSeeder::class,
            TechAdminSeeder::class,
            TechDepartmentSeeder::class,
            TechTechnologySeeder::class,
            TechSessionSeeder::class,
            TechSemesterSeeder::class,
            TechShiftSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
