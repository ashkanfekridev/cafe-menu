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
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>{{$productAndCategoryCount->categoryCount}}</p>
                                        <p>تعداد دسته بندی ها</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>{{$productAndCategoryCount->productCount}}</p>
                                        <p>تعداد محصولات</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>id</th>
                                                <th>عنوان</th>
                                                <th>قیمت</th>
                                            </tr>
                                            @foreach($userWithCategoriesAndProduct->products as $product)
                                                <tr>
                                                    <th>{{$product->id}}</th>
                                                    <th>{{$product->title}}</th>
                                                    <th>{{number_format($product->price)}}</th>
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
