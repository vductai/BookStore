<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'book_name', 'price', 'image', 'desc', 'category_id', 'brand'
    ];
}
