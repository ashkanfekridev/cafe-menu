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
                @include('layouts.flash-message')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a href="{{route('admin.category.create')}}" class="btn btn-info">ایجاد محصول
                                            جدید</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table text-center">
                                            <tr>
                                                <th>id</th>
                                                <th>عکس</th>
                                                <th>عنوان</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                            </tr>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <th>{{$category->id}}</th>
                                                    <th>
                                                        @if(isset($category->image_id))
                                                            <img src="{{asset($category->image->link)}}" width="60px"
                                                                 style="max-height: 60px" class="rounded rounded-2 list-item-image"
                                                                 alt="...">
                                                        @else
                                                            <img src="/images/5.jpg" width="60px"
                                                                 class="rounded rounded-2"
                                                                 alt="...">
                                                        @endif
                                                    </th>
                                                    <th>{{$category->title}}</th>
                                                    <th>
                                                        <a href="{{route('admin.category.edit',  $category->id)}}" class="btn btn-info">ویرایش</a>
                                                    </th>
                                                    <th>
                                                        <form
                                                            action="{{route('admin.category.destroy', $category->id)}}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">حذف محصول
                                                            </button>
                                                        </form>
                                                    </th>

                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
