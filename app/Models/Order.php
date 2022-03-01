<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];


    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function items() {
        return $this->hasMany(OrderProducts::class , 'order_id');
    }
}
