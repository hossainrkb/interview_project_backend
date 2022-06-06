<?php

namespace Database\Seeders;

use App\Models\TechAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TechAdminSeeder extends Seeder
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
                "a_name" => 'Rakib',
                "a_username" => 'Rakib',
                "a_email" => 'rakib@gmail.com',
                "a_type" => 'superadmin',
                "a_contact" => '01790507933',
                "a_tpin" => '1234',
                "a_password" => Hash::make('123456789'),
                "a_status" => 1,
            ]
        ];
        foreach ($defaultArr as $key => $value) {
            TechAdmin::create($value);
        }
    }
}
