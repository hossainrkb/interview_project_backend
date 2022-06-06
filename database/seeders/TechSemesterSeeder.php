<?php

namespace Database\Seeders;

use App\Models\TechSemester;
use Illuminate\Database\Seeder;

class TechSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultArr = [
            ["sem_id" => "1", "sem_name" => "1ST SEMESTER", "sem_sort_name" => "1ST", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "2", "sem_name" => "2ND SEMESTER", "sem_sort_name" => "2ND", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "3", "sem_name" => "3RD SEMESTER", "sem_sort_name" => "3RD", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "4", "sem_name" => "4TH SEMESTER", "sem_sort_name" => "4TH", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "5", "sem_name" => "5TH SEMESTER", "sem_sort_name" => "5TH", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "6", "sem_name" => "6TH SEMESTER", "sem_sort_name" => "6TH", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "7", "sem_name" => "7TH SEMESTER", "sem_sort_name" => "7TH", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "8", "sem_name" => "8TH SEMESTER", "sem_sort_name" => "8TH", "status" => "1", "sem_user" => "1"],
            ["sem_id" => "9", "sem_name" => "PASSED", "sem_sort_name" => "PASS", "status" => "0", "sem_user" => "1"]
        ];
        foreach ($defaultArr as $key => $value) {
            TechSemester::create($value);
        }
    }
}
