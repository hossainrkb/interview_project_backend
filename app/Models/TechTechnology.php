<?php

namespace App\Models;

use App\Scopes\TechTechnologyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechTechnology extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_technology';
    protected $primaryKey = 'd_id';
    protected static function booted()
    {
        static::addGlobalScope(new TechTechnologyScope);
    }

    public function subjects(){
        return $this->hasMany(TechSubject::class,'sub_dept','d_id');
    }
}
