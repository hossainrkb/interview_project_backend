<?php

namespace App\Models;

use App\Scopes\TechSubScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechSubject extends CentralModel
{
    use HasFactory;
    protected $table = 'tech_subjects';
    protected $primaryKey = 'sub_id';

    protected $fillable = [
        'sub_code',    'sub_name',    'sub_t_credit',    'sub_p_credit',    'sub_total_credit',    'sub_tc_marks',    'sub_tf_marks',    'sub_pc_marks',    'sub_pf_marks',    'sub_total_marks',    'sub_dept',    'sub_probidhan',    'sub_description',    'sub_status', 'sub_user'
    ];
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TechSubScope);
        static::creating(function ($model) {
            if (Auth::check()) {
                $user              = Auth::user();
                $model->sub_user   = $user->a_id;
                $model->sub_status = 1;
            }
        });
    }

    public function technology(){
        return $this->belongsTo(TechTechnology::class,'sub_dept','d_id');
    } 
    public function probidhan(){
        return $this->belongsTo(TechProbidhan::class,'sub_probidhan','pro_id');
    } 
}
