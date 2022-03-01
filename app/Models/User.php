<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'photo' ,
        'role'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews() {
        return $this->hasMany(Review::class , 'user_id');
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class , 'user_id');
    }


    public function getImageAttribute() {
        if ($this->photo == 'null' || $this->photo == "") {
            return 'https://via.placeholder.com/200x200.png/000022?text=autem';
        } else {
            return $this->photo;
        }
    }


}
