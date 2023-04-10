<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type1 extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guard = ['name', 'email', 'bio', 'user_type' ];

    protected $defaults = [
        'user_type' => 'type1',
    ];
}
