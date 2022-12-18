@extends('Layouts.app')
@section('title', __('login'))
@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <img src="{{ asset("images/logo.webp") }}" class="w-100 mb-3" style="max-height: 100px; object-fit: contain">
                <div class="col-md-6 col-11">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-8 p-4 mb-0">
                            <div class="card-body">
                                <div style="direction: {{ app()->getLocale() == 'ar' ? 'ltr' : 'rtl' }};">
                                    <a class="text-dark" style="text-decoration: none" href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar', null, [], true) }}">
                                        @if(app()->getLocale() == 'ar')
                                            En <img src="{{ asset('images/en.png') }}" height="25" alt="">
                                        @else
                                            ع <img src="{{ asset('images/ar.png') }}" height="25" alt="">
                                        @endif
                                    </a>
                                </div>
                                <h4 class="text-center">{{ __('login') }}</h4>
                                <p class="text-medium-emphasis text-center">{{ __('login to your account') }}</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <span class="input-group-text"><i class="icon fas fa-user"></i></span>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                         value="{{ old('username') }}" name="username" type="text" placeholder="{{ __('username') }}" autofocus>
                                        @error('username')
                                            <div class="invalid-feedback ms-5">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text"><i class="icon fas fa-lock"></i></span>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}"  type="password" placeholder="{{ __('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback ms-5">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-danger px-5" type="submit">{{ __('login') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
