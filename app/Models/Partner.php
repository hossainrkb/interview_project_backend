<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location'];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'p_id', 'id');
    }
}
