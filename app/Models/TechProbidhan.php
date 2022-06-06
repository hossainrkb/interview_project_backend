<?php
namespace App\Models;
use App\Models\TechTechnology;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechProbidhan extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_probidhan';
    protected $primaryKey = 'pro_id';

    public function technology(){
        return $this->hasMany(TechTechnology::class,'d_probidhan','pro_id');
    }
}
