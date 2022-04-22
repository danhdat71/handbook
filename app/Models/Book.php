<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Thuộc tính tên bảng
     * **/
    protected $table = 'books';

    /**
     * Thuộc tính tên cột
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
