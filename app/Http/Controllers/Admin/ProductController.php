<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $productAndCategoryCount = DB::select("select
        (select count(*) from categories WHERE user_id = ?) as categoryCount,
        (select count(*) from products WHERE user_id=?) as productCount", [1, 1]
        );

        $userWithCategoriesAndProduct = User::with(['categories', 'products'])->first();

        $productAndCategoryCount = $productAndCategoryCount[0];

        return view('admin.product.index', [
            'productAndCategoryCount' => $productAndCategoryCount,
            'userWithCategoriesAndProduct' => $userWithCategoriesAndProduct
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('user_id', '=', 1);

        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */

    public function store(Request $request)
    {

        $image = Image::create(
            [
                'link' => $request->file('image')->store('upload'),
                'user_id' => Auth::id()
            ]);


        $product = Product::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image_id' => $image->id,
        ]);
        return redirect()->route('admin.product.index')->with(['message' => 'محصول مورد نظر با موفقیت ثبت شد.']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        return view('admin.product.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all()->where('user_id', '=', 1);

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->image_loaded == true && !$request->image == null) {
            $image_id = Image::create(
                [
                    'link' => $request->file('image')->store('upload'),
                    'user_id' => Auth::id()
                ]);
            $image_id = $image_id->id;
        } else {
            $image_id = $product->image_id;
        }
        $product->title = $request->title;
        $product->user_id = Auth::id();
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->image_id = $image_id;

        $product->save();


        return redirect()->route('admin.product.index')->with(['message' => 'محصول مورد نظر با موفقیت ثبت شد.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        /**
         * @var $product Product
         */
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }
}
