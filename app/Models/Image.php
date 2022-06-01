<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'imageable',
        'user_id'
    ];

    public $timestamps = false;

}

