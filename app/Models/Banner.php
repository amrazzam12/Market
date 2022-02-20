<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;











    public function getImageAttribute() {
        if ($this->photo == '') {
            return 'https://via.placeholder.com/200x200.png/000022?text=autem';
        } else {
            return $this->photo;
        }
    }
}
