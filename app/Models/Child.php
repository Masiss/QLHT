<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Child extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'parent_id'
    ];
}
