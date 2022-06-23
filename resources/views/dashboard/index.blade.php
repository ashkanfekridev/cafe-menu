@extends('layouts.app')
@section('title', 'صفحه اصلی')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @include('layouts.flash-message')
                <div class="card">
                    <div class="card-body">
                        <form action="{{action([\App\Http\Controllers\Dashboard\HomeController::class, 'resetPassword'])}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">پسورد جدید</label>

                                <div class="col-md-6">
                                    <input id="password" type="text"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        تعویض پسورد
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
