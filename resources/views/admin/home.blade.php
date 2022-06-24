@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.admin-menu')


            <div class="col-12 col-md-8 mb-3">
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
