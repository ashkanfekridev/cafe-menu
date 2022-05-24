<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'image_id'
    ];

    public $timestamps = false;


    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


}
