<?php

namespace App\Models;

use App\Scopes\TechDepartmentScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechDepartment extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_department';
    protected $primaryKey = 'tech_id';

 
    public function technology(){
        return $this->hasMany(TechTechnology::class,'d_department','tech_id');
    }
    protected static function booted()
    {
        static::addGlobalScope(new TechDepartmentScope);
    }
}
