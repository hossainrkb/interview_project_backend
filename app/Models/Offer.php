<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_id',
        'name',
        'percentage',
        'image_type',
        'image_path',
        'image_stored_name',
        'image_original_name',
        'image_size'
    ];

    protected $appends = ['offer_url'];
    public function partner(){
        return $this->belongsTo(Partner::class,'p_id','id');
    }
    public function getOfferUrlAttribute()
    {
        return isset($this->attributes['image_stored_name']) ?
            url('/storage/offer/attachments') . '/' . $this->attributes['image_stored_name'] : null;
    }
}
