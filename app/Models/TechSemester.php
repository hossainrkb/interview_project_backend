<?php

namespace App\Models;

use App\Scopes\TechSemesterScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechSemester extends CentralModel
{
    use HasFactory;
    protected $table="tech_semester";
    protected $primaryKey = 'sem_id';
    protected static function booted()
    {
        static::addGlobalScope(new TechSemesterScope);
    }
}
