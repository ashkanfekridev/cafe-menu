@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.admin-menu')


            <div class="col-12 col-md-8 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$product->title}}">
                            </div>

                            <div class="form-group">
                                <label for="price" class="form-label">قیمت</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                            </div>

                            <div class="form-group">
                                <label for="category_id" class="form-label">دسته بندی</label>

                                <select name="category_id" id="category_id" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"@if($product->category_id==$category->id) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">توضیحات</label>
                                <textarea  name="description" id="description" class="form-control">{{$product->description}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" name="image" id="image" class="form-control" onchange="
                                  document.getElementById('image_loaded').value = true;
                                ">
                            </div>
                            <input type="hidden" id="image_loaded" name="image_loaded" value="false">

                            <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">ذخیر محصول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
