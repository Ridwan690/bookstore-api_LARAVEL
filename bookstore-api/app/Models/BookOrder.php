<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    protected $fillabel = [
        'book_id', 'order_id', 'quantity'
    ];
}
