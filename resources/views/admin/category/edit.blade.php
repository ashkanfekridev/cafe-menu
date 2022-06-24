@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.admin-menu')


            <div class="col-12 col-md-8 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$category->title}}">
                            </div>


                            <div class="form-group">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" name="image" id="image" class="form-control" onchange="
                                  document.getElementById('image_loaded').value = true;
                                ">
                            </div>
                            <input type="hidden" id="image_loaded" name="image_loaded" value="false">

                            <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">ذخیر دسته بندی</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
