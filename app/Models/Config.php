<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    /**
     * Thuộc tính tên bảng
     * **/
    protected $table = 'configs';

    /**
     * Thuộc tính tên cột
     * **/
    protected $fillable = [
        'id',
        'background',
        'logo',
        'title',
        'description',
        'background_sound',
        'phone',
        'website',
        'type',
        'book_width',
        'book_height',
        'is_gradient',
        'auto_center',
        'speed'
    ];
}
