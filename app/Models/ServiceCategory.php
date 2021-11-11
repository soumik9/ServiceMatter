<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'featured',
        'status',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // public function providerservices()
    // {
    //     return $this->hasMany(User::class);
    // }
}
