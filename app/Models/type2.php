<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type2 extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'bio', 'user_type' ,
    'certification_title' , 'certification_image' ];

    protected $defaults = [
        'user_type' => 'type2',
    ];
}
