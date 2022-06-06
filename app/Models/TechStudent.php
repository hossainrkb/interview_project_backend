<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStudent extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_student';
    protected $primaryKey = 's_id';
    protected $fillable = [
        's_name',
        's_i_roll',
        's_board_roll',
        's_board_reg_no',
        's_session',
        's_shift',
        's_probidhan',
        's_dept',
        's_sem',
        's_section',
        's_admission_date',
        's_contact_no',
        's_father',
        's_mother',
        's_gender',
        's_type',
        's_image',
        's_picture',
        's_password',
        's_status',
        's_user'
    ];
}
