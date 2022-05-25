@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <p>دسته بندی ها</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
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
