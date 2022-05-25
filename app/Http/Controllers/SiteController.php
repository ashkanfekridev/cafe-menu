<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $categoryWithProduct = Category::with('products')->get();

        return view('home', ['categoryWithProduct' => $categoryWithProduct]);
    }
}
