<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static create(array $array)
 * @method static findOrFail(int $id)
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'status',
        'user_id',
        'category_id',
        'image_id'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
