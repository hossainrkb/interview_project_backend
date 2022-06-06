<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\TechProbidhan;
use Illuminate\Database\Seeder;

class TechProbidhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultArr = [
            [
                'pro_name' => 16,
                'pro_year' => 2016,
                'pro_default' => 1,
                'pro_status' => 1,
            ], [
                'pro_name' => 10,
                'pro_year' => 2010,
                'pro_default' => 0,
                'pro_status' => 1,
            ]
        ];
        foreach ($defaultArr as $key => $value) {
            TechProbidhan::create($value);
        }
    }
}
