<?php

namespace App\Models;

use App\Scopes\TechSessionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechSession extends CentralModel
{
    use HasFactory;
    protected $table = "tech_session";
    protected $primaryKey = 'sec_id';
    
    public function probidhan(){
        return $this->belongsTo(TechProbidhan::class,'sec_probidhan','pro_id');
    }
    public function semester(){
        return $this->belongsTo(TechSemester::class,'sec_sem','sem_id');
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TechSessionScope);
    }
}
