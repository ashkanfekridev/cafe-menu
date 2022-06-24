<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $categoryWithProduct = Category::where('user_id', config('app_user_id'))
            ->with('products')
            ->get();
        $user = User::find(config('app_user_id'));
        return view('home', [
            'user'=> $user,
            'categoryWithProduct' => $categoryWithProduct
        ]);
    }
}
