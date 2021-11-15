<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'service_category_id',
        'price',
        'discount',
        'discount_type',
        'image',
        'thumbnail',
        'description',
        'featured',
        'status',
    ];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }

    // public function cms()
    // {
    //     return $this->hasMany(Cms::class);
    // }

    public function customer_service()
    {
        return $this->hasMany(Order::class);
    }
}
