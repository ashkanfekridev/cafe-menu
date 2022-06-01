<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $productAndCategoryCount = DB::select("select
        (select count(*) from categories WHERE user_id = ?) as categoryCount,
        (select count(*) from products WHERE user_id=?) as productCount", [1, 1]
        );

        $userWithCategoriesAndProduct = User::with(['categories', 'products'])->first();

        $productAndCategoryCount = $productAndCategoryCount[0];

        return view('admin.home', [
            'productAndCategoryCount' => $productAndCategoryCount,
            'userWithCategoriesAndProduct' => $userWithCategoriesAndProduct
        ]);
    }
}
