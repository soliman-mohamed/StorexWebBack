@extends('Layouts.app')
@section('title', __('add') . ' '. __('user'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{ __('add') }} {{ __('user') }}</h4>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center"
                 method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" type="text"
                                placeholder="{{ __('name') }}" autofocus>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" name="username" type="text"
                                placeholder="{{ __('username') }}">

                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" name="phone" type="text"
                                placeholder="{{ __('phone') }}">

                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" type="text"
                                placeholder="{{ __('email') }}">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input  class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" name="password" type="password"
                                placeholder="{{ __('password') }}">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}" name="password_confirmation" type="password"
                                placeholder="{{ __('password confirmation') }}">

                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4 text-center">
                            <button class="btn btn-danger" type="submit">{{ __('add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
