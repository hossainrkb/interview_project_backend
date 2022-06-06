<?php

namespace Database\Seeders;

use App\Models\TechSession;
use Illuminate\Database\Seeder;

class TechSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultArr = [
            ["sec_id" => "1", "sec_name" => "2018-2019", "sec_year" => "2018", "sec_sem" => "6", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "2", "sec_name" => "2017-2018", "sec_year" => "2017", "sec_sem" => "8", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "3", "sec_name" => "2016-2017", "sec_year" => "2016", "sec_sem" => "9", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "4", "sec_name" => "2015-2016", "sec_year" => "2015", "sec_sem" => "9", "sec_probidhan" => "2", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "5", "sec_name" => "2019-2020", "sec_year" => "2019", "sec_sem" => "4", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "6", "sec_name" => "2020-2021", "sec_year" => "2020", "sec_sem" => "2", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
            ["sec_id" => "7", "sec_name" => "2022-2023", "sec_year" => "2022", "sec_sem" => "1", "sec_probidhan" => "1", "sec_status" => "1", "sec_user" => "1"],
        ];
        foreach ($defaultArr as $key => $value) {
            TechSession::create($value);
        }
    }
}
