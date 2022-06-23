@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{route('admin.category.index')}}">دسته بندی</a></li>
                            <li><a href="{{route('admin.product.index')}}">محصولات</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price" class="form-label">قیمت</label>
                                <input type="text" name="price" id="price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="category_id" class="form-label">دسته بندی</label>

                                <select name="category_id" id="category_id" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">توضیحات</label>
                                <textarea  name="description" id="description" class="form-control"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

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
