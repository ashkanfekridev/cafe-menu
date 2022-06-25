@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.admin-menu')


            <div class="col-12 col-md-8 mb-3">
                @include('layouts.flash-message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>{{$productAndCategoryCount->categoryCount}}</p>
                                        <p>تعداد دسته بندی ها</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>{{$productAndCategoryCount->productCount}}</p>
                                        <p>تعداد محصولات</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a href="{{route('admin.product.create')}}" class="btn btn-info">ایجاد محصول جدید</a>

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
                                                <th>قیمت</th>
                                                <th>دسته بندی</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                            </tr>
                                            @foreach($userWithCategoriesAndProduct->products as $product)
                                                <tr>
                                                    <th>{{$product->id}}</th>
                                                    <th>
                                                        @if(isset($product->image_id))
                                                            <img src="{{asset($product->image->link)}}" width="60px" style="max-height: 60px" class="rounded rounded-2" alt="...">
                                                        @else
                                                            <img src="{{asset("/images/5.jpg") }}" width="60px" class="rounded rounded-2 list-item-image"  alt="...">

                                                        @endif
                                                    </th>
                                                    <th>{{$product->title}}</th>
                                                    <th>{{number_format($product->price)}}</th>

                                                    <th>
                                                        @if(isset($product->category->title))
                                                            {{$product->category->title}}
                                                        @else
                                                            دسته بندی وجود ندارد
                                                        @endif
                                                    </th>

                                                    <th>
                                                        <a href="{{route('admin.product.edit',  $product->id)}}" class="btn btn-info">ویرایش محصول</a>
                                                    </th>
                                                    <th>
                                                        <form action="{{route('admin.product.destroy', $product->id)}}"
                                                              method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">حذف محصول</button>
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
