<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillabel = [
        'title', 'slug', 'description', 'author', 'publisher', 'cover', 'price', 'weight', 'stock', 'status'
    ];
}
