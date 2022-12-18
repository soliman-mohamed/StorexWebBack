@extends('Layouts.app')
@section('title', __('categories'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title mb-0">{{ __('categories') }}</h4>

                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    {{ __('add') }} {{ __('category') }}
                </a>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <input class="form-control @error('title') is-invalid @enderror"
                                value="{{ request('title') }}" name="title" type="text"
                                placeholder="{{ __('title') }}">
                        </div>
                    </div>

                    <div class="col-md-4">
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
                            <th scope="col">{{ __('edit') }}</th>
                            <th scope="col">{{ __('delete') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <th>{{ $index +1 }}</th>
                                        <td>{{ $record->title }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $record->id) }}" class="btn btn-sm btn-info">
                                                {{ __('edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $record->id) }}" method="post">
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
