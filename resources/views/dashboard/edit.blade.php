@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @include('layouts.flash-message')
                <div class="card">
                    <div class="card-body">
                        <a href="{{url()->previous()}}" class="btn btn-outline-primary mb-3">بازگشت به صفحه قبل</a>
                        <form action="{{action([\App\Http\Controllers\Dashboard\HomeController::class, 'updateUserOptions'])}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">نام</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')?:$user->name}}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="instagram"
                                       class="col-md-4 col-form-label text-md-end">ایدی اینستاگرام</label>

                                <div class="col-md-6">
                                    <input id="instagram" type="text"
                                           class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{old('instagram')?:$user->instagram}}">

                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-end">شماره تماس</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')?:$user->phone}}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">توضیحات کافه</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              class="form-control @error('description') is-invalid @enderror" name="description">{{old('description')?:$user->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
ویراش حساب کاربری
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
