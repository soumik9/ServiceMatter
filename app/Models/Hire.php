<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'total_amount',
        'address',
        'working_hour',
        'employee_id',
        'user_id',
        'per_hour',
        'transaction_by',
        'transaction_id',
        'status',
        'payment_status',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
}
