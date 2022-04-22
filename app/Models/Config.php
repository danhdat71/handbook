<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    /**
     * Table name
     * **/
    protected $table = 'configs';

    /**
     * Fillable table
     * **/
    protected $fillable = [
        'id',
        'background',
        'logo',
        'title',
        'description',
        'background_sound',
        'phone',
        'website'
    ];
}
