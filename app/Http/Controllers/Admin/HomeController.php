<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $productAndCategoryCount = DB::select("select
        (select count(*) from categories WHERE user_id = ?) as category,
        (select count(*) from products WHERE user_id=?) as product",[1,1]
        );
//        return $productAndCategoryCount;
        return view('admin.home');
    }
}
