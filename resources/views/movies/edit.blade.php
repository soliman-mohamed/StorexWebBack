@extends('Layouts.app')
@section('title', __('edit') . ' '. __('movie'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{ __('edit') }} {{ __('movie') }}</h4>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center" method="POST" action="{{ route('movies.update', $record->id) }}" enctype="multipart/form-data">
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
                            <input class="form-control @error('rate') is-invalid @enderror"
                                value="{{ $record->rate }}" name="rate" type="number" min="1" max="5"
                                placeholder="{{ __('rate') }}" >

                            @error('rate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('image') is-invalid @enderror"
                                name="image" type="file"
                                placeholder="{{ __('image') }}" >

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">{{ __('choose') }} {{ __('category') }}</option>
                                @foreach ($categories as $category)
                                    <option @if($category->id == $record->category_id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-4">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                             name="description" placeholder="{{ __('description') }}">{{ $record->description }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4 text-center">
                            <button class="btn btn-danger" type="submit">{{ __('edit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
