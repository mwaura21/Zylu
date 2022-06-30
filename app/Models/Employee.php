<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = 
    [
        'name',
        'email',
        'department',
        'active_since',
        'active'
    ];

    protected $dates = 
    [
        'active_since',
        'created_at', 
        'updated_at'
    ];
}
