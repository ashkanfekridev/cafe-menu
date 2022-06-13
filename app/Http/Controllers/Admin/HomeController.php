<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
      
        $user = Auth::user();
        $productAndCategoryCount = DB::select("select
        (select count(*) from categories WHERE user_id = ?) as categoryCount,
        (select count(*) from products WHERE user_id=?) as productCount", [ $user->id,   $user->id]
        );



        $userWithCategoriesAndProduct = new \stdClass();
        $userWithCategoriesAndProduct->products = User::find($user->id)->products;
        $userWithCategoriesAndProduct->categories = User::find($user->id)->categories;
        $productAndCategoryCount = $productAndCategoryCount[0];

        return view('admin.home', [
            'productAndCategoryCount' => $productAndCategoryCount,
            'userWithCategoriesAndProduct' => $userWithCategoriesAndProduct
        ]);
    }
}
