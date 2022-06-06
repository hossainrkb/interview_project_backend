<?php

namespace App\Models;

use App\Scopes\TechDeptSubScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechDeptSub extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_dept_sub';
    protected $primaryKey = 'ds_id';
    protected $fillable = [
        'ds_sub_id',
        'ds_dept_id',
        'ds_sem_id',
        'ds_check_key',
        'ds_user'
    ];

    public function semester(){
        return $this->belongsTo(TechSemester::class,'ds_sem_id','sem_id');
    }
    public function technology(){
        return $this->belongsTo(TechTechnology::class,'ds_dept_id','d_id');
    }
    public function subject(){
        return $this->belongsTo(TechSubject::class,'ds_sub_id','sub_id');
    }

    public static function boot()
    {
        static::addGlobalScope(new TechDeptSubScope);
        parent::boot();
        static::creating(function ($model) {
            if (Auth::check()) {
                $user              = Auth::user();
                $model->ds_user   = $user->a_id;
            }
        });
    }
}
