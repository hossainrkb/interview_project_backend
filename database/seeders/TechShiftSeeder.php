<?php

namespace Database\Seeders;

use App\Models\TechShift;
use Illuminate\Database\Seeder;

class TechShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultArr = [
            ["shift_id" => "1", "shift_name" => "1ST SHIFT", "shift_details" => "DAY TIME: 8.00 AM TO 1.00 PM", "shift_status" => "1"],
            ["shift_id" => "2", "shift_name" => "2ND SHIFT", "shift_details" => "DAY TIME: 2.00 AM TO 7.00 PM", "shift_status" => "1"],
        ];
        foreach ($defaultArr as $key => $value) {
            TechShift::create($value);
        }
    }
}
