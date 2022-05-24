<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(4)->create();


        Image::create([
            'user_id' => 1,
            'link' => '/images/1.svg'
        ]);
        Image::create([
            'user_id' => 1,
            'link' => '/images/2.svg'
        ]);
        Image::create([
            'user_id' => 1,
            'link' => '/images/3.svg'
        ]);
        Image::create([
            'user_id' => 1,
            'link' => '/images/4.svg'
        ]);
        Image::create([
            'user_id' => 1,
            'link' => '/images/5.svg'
        ]);
        Image::create([
            'user_id' => 1,
            'link' => '/images/6.svg'
        ]);


        Category::create([
            'title' => 'نوشیدنی گرم بر پایه اسپرسو',
            'user_id' => 1,
            'image_id' => 1
        ]);

        Category::create([
            'title' => 'چای و نوشیدنی گرم',
            'user_id' => 1,
            'image_id' => 2
        ]);

        Category::create([
            'title' => 'دمنوش های پیشنهادی',
            'user_id' => 1,
            'image_id' => 3
        ]);


        Product::create([
            'title'=>"اسپرسو دبل",
            'price'=>20000,
            'description'=>null,
            'user_id'=>1,
            'category_id'=>1
        ]);

        Product::create([
            'title'=>"اسپرسو دبل",
            'price'=>20000,
            'description'=>null,
            'user_id'=>1,
            'category_id'=>2
        ]);
        Product::create([
            'title'=>"اسپرسو دبل",
            'price'=>20000,
            'description'=>null,
            'user_id'=>1,
            'category_id'=>3
        ]);


    }
}
