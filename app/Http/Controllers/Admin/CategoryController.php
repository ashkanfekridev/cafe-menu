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
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all()->where('user_id', Auth::id());


        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
      */
    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $image = Image::create(
            [
                'link' => $request->file('image')->store('upload'),
                'user_id' => Auth::id()
            ]);

        $category = Category::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'image_id' => $image->id
        ]);

        $image = Image::create(
            [
                'link' => $request->file('image')->store('upload'),
                'user_id' => Auth::id()
            ]);

        return redirect()->route('admin.category.index')->with(['success' => 'محصول مورد نظر با موفقیت ثبت شد.']);


    }


    public function saveImage(Request $request)
    {


        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new Image;
        $save->user_id = Auth::id();
        $save->link = $path;
        $save->save();
        return $save;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     **/
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($request->image_loaded == true && !$request->image == null) {
            $image_id = Image::create(
                [
                    'link' => $request->file('image')->store('upload'),
                    'user_id' => Auth::id()
                ]);
            $image_id = $image_id->id;
        } else {
            $image_id = $category->image_id;
        }
        $category->title = $request->title;
        $category->user_id = Auth::id();

        $category->image_id = $image_id;

        $category->save();


        return redirect()->route('admin.category.index')->with(['message' => 'دسته بندی مورد نظر با موفقیت ثبت شد.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}
