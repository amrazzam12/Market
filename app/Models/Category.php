<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function products() {
        return $this->hasMany(Product::class , 'cat_id');
    }


    public function subCategories() {
        return $this->hasMany(Category::class , 'parent_id','id');
    }

    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent_id');
    }



    public function getImageAttribute() {
        if ($this->photo == NULL) {
            return 'https://via.placeholder.com/200x200.png/000022?text=autem';
        } else {
            return $this->photo;
        }
    }


}
