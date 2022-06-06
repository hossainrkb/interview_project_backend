<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechShift extends CentralModel
{
    use HasFactory;
    protected $table="tech_shift";
    protected $primaryKey = 'shift_id';
}
