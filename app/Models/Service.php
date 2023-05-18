<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Service extends Model
{
    use HasFactory;
    use HasApiTokens;

    public function user(){
        return $this->hasMany(User::class , 'user_id');
    }
    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
