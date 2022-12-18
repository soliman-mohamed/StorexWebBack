@extends('Layouts.app')
@section('title', __('edit') . ' '. __('category'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{ __('edit') }} {{ __('category') }}</h4>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center" method="POST" action="{{ route('categories.update', $record->id) }}">
                    @csrf
                    @method('put')
                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('title') is-invalid @enderror"
                                value="{{ $record->title }}" name="title" type="text"
                                placeholder="{{ __('title') }}" autofocus>

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <button class="btn btn-danger" type="submit">{{ __('edit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
