<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = 'order_products';
    protected $guarded = [];


    public function products() {
        return $this->belongsTo(Product::class , 'product_id');
    }





}
