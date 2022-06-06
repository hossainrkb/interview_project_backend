<?php

namespace Database\Seeders;

use App\Models\TechDepartment;
use Illuminate\Database\Seeder;

class TechDepartmentSeeder extends Seeder
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
            'tech_full_name'=>'RS',
            'tech_short_name'=>'RS',
            'tech_username'=> 'RS.BSPI',
            'tech_tpin'=> '5555',
            'tech_password'=> null,
            'tech_status'=> 0,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'ELECTRICAL',
            'tech_short_name'=>'ET',
            'tech_username'=> 'ET.BSPI',
            'tech_tpin'=> '1667',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'MECHANICAL',
            'tech_short_name'=>'MT',
            'tech_username'=> 'MT.BSPI',
            'tech_tpin'=> '1670',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'CIVIL (WOOD)',
            'tech_short_name'=>'CWT',
            'tech_username'=> 'CWT.BSPI',
            'tech_tpin'=> '1665',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'AUTOMOBILE DEPT',
            'tech_short_name'=>'AT',
            'tech_username'=> 'AT.BSPI',
            'tech_tpin'=> '1662',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'COMPUTER',
            'tech_short_name'=>'CMT',
            'tech_username'=> 'CMT.BSPI',
            'tech_tpin'=> '1666',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           [
            'tech_full_name'=>'CONSTRUCTION',
            'tech_short_name'=>'CONT',
            'tech_username'=> 'CONT.BSPI',
            'tech_tpin'=> '1688',
            'tech_password'=> 'c33367701511b4f6020ec61ded352059',
            'tech_status'=> 1,
            'tech_user'=> 1,
           ],
           ];
           foreach ($defaultArr as $key => $value) {
            TechDepartment::create($value);
        }
    }
}
