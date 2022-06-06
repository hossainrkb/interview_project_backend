<?php

namespace Database\Seeders;

use App\Models\TechTechnology;
use Illuminate\Database\Seeder;

class TechTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultArr =
            [

                [
                    "d_id" => "1",
                    "d_code" => "667",
                    "d_name" => "ELECTRICAL",
                    "d_sort_name" => "ET",
                    "d_probidhan" => "1",
                    "d_department" => "2",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "2",
                    "d_code" => "670",
                    "d_name" => "MECHANICAL",
                    "d_sort_name" => "MT",
                    "d_probidhan" => "1",
                    "d_department" => "3",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "3",
                    "d_code" => "665",
                    "d_name" => "CIVIL  (WOOD)",
                    "d_sort_name" => "CWT",
                    "d_probidhan" => "1",
                    "d_department" => "4",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "4",
                    "d_code" => "662",
                    "d_name" => "AUTOMOBILE_TECH_DUMMY",
                    "d_sort_name" => "AT",
                    "d_probidhan" => "1",
                    "d_department" => "5",
                    "d_status" => "1",
                    "d_user" => "2",
                ],
                [
                    "d_id" => "5",
                    "d_code" => "666",
                    "d_name" => "COMPUTER",
                    "d_sort_name" => "CMT",
                    "d_probidhan" => "1",
                    "d_department" => "6",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "6",
                    "d_code" => "688",
                    "d_name" => "CONSTRUCTION",
                    "d_sort_name" => "CONT",
                    "d_probidhan" => "1",
                    "d_department" => "7",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "7",
                    "d_code" => "659",
                    "d_name" => "RELATED SUBJECTS",
                    "d_sort_name" => "RS",
                    "d_probidhan" => "1",
                    "d_department" => "1",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "8",
                    "d_code" => "66",
                    "d_name" => "COMPUTER",
                    "d_sort_name" => "CMT",
                    "d_probidhan" => "2",
                    "d_department" => "6",
                    "d_status" => "1",
                    "d_user" => "1",
                ],
                [
                    "d_id" => "9",
                    "d_code" => "65",
                    "d_name" => "CIVIL (WOOD)",
                    "d_sort_name" => "CWT",
                    "d_probidhan" => "2",
                    "d_department" => "4",
                    "d_status" => "1",
                    "d_user" => "6",
                ],
                [
                    "d_id" => "10",
                    "d_code" => "88",
                    "d_name" => "CONSTRUCTION",
                    "d_sort_name" => "CONT",
                    "d_probidhan" => "2",
                    "d_department" => "7",
                    "d_status" => "1",
                    "d_user" => "6",
                ],
                [
                    "d_id" => "11",
                    "d_code" => "67",
                    "d_name" => "ELECTRICAL",
                    "d_sort_name" => "ET",
                    "d_probidhan" => "2",
                    "d_department" => "2",
                    "d_status" => "1",
                    "d_user" => "6",
                ],
                [
                    "d_id" => "12",
                    "d_code" => "70",
                    "d_name" => "MECHANICAL",
                    "d_sort_name" => "MT",
                    "d_probidhan" => "2",
                    "d_department" => "3",
                    "d_status" => "1",
                    "d_user" => "6",
                ],
                [
                    "d_id" => "13",
                    "d_code" => "62",
                    "d_name" => "AUTOMOBILE",
                    "d_sort_name" => "AT",
                    "d_probidhan" => "2",
                    "d_department" => "5",
                    "d_status" => "1",
                    "d_user" => "6",
                ],
                [
                    "d_id" => "14",
                    "d_code" => "852",
                    "d_name" => "DUMMY TECH",
                    "d_sort_name" => "DT",
                    "d_probidhan" => "1",
                    "d_department" => "5",
                    "d_status" => "1",
                    "d_user" => "2",
                ]
            ];
            foreach ($defaultArr as $key => $value) {
                TechTechnology::create($value);
            }
    }
}
