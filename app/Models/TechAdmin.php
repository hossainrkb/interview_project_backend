<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TechAdmin extends Authenticatable
{
    use HasFactory;
    protected $table = 'tech_admin';
    protected $primaryKey = 'a_id';
    public function getAuthPassword()
    {
        return $this->a_password;
    }
    public function department(){
        return $this->belongsTo(TechDepartment::class,'a_dept','tech_id');
    }

    public function is_super_admin(){
        return $this->a_type == config('settings.auth_user_superadmin_type');
    }
}
