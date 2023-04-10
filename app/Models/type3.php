<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type3 extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'bio', 'user_type' ,
    'map_location' , 'birth_date'];

    protected $defaults = [
        'user_type' => 'type3',
    ];
}
