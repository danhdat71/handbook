<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Table name
     * **/
    protected $table = 'books';

    /**
     * Table fillables
     * **/
    protected $fillable = [
        'id',
        'big_image',
        'thumb_image',
        'slider_image',
        'order',
        'status'
    ];
}
