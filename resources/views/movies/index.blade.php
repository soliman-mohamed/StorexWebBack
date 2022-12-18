@extends('Layouts.app')
@section('title', __('movies'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title mb-0">{{ __('movies') }}</h4>

                <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    {{ __('add') }} {{ __('movie') }}
                </a>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center">
                    <div class="col-md-3">
                        <div class="mb-4">
                            <input class="form-control"
                                value="{{ request('title') }}" name="title" type="text"
                                placeholder="{{ __('title') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <select class="form-control" name="rate">
                                <option value="">{{ __('choose') }} {{ __('rate') }}</option>
                                @foreach ($rates as $rate)
                                    <option @if($rate == request('rate')) selected @endif value="{{ $rate }}">{{ $rate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <select class="form-control" name="category">
                                <option value="">{{ __('choose') }} {{ __('category') }}</option>
                                @foreach ($categories as $category)
                                    <option @if($category->id == request('category')) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <button class="btn btn-danger" type="submit">{{ __('search') }}</button>
                        </div>
                    </div>
                </form>

                @if(count($records))
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('title') }}</th>
                            <th scope="col">{{ __('image') }}</th>
                            <th scope="col">{{ __('rate') }}</th>
                            <th scope="col">{{ __('category') }}</th>
                            <th scope="col">{{ __('edit') }}</th>
                            <th scope="col">{{ __('delete') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <th>{{ $index +1 }}</th>
                                        <td>{{ $record->title }}</td>
                                        <td><img src="{{ asset('images/'.$record->image) }}" alt="" height="120"></td>
                                        <td>{{ $record->rate }}</td>
                                        <td>{{ $record->category->title ?? "" }}</td>
                                        <td>
                                            <a href="{{ route('movies.edit', $record->id) }}" class="btn btn-sm btn-info">
                                                {{ __('edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('movies.destroy', $record->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">{{ __('delete') }}</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                @else
                    <p class="text-center text-danger">{{ __('no data found') }}</p>
                @endif
            </div>
          </div>
    </div>
@endsection
