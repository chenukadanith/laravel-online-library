<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'genre',
        'price',
        'is_available'
    ];
    
    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2'
    ];  
}
