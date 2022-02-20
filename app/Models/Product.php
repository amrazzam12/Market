<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category() {
        return $this->belongsTo(Category::class , 'cat_id');
    }

    public function vendor() {
        return $this->belongsTo(User::class , 'vendor_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class , 'product_id');
    }




    public function getImageAttribute() {
        if ($this->photo == '') {
            return 'https://via.placeholder.com/200x200.png/000022?text=autem';
        } else {
            return $this->photo;
        }
    }

    public function getPriceWithDiscountAttribute() {
        return $this->price - ($this->price * ($this->sale/100) );
    }



}
