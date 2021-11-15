<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = TRUE;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'amount',
        'address',
        'transaction_id',
        'currency',
        'status',
        'order_status',
        'user_id',
        'service_id',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order_service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
