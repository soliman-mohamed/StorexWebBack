@extends('Layouts.app')
@section('title', __('users'))
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title mb-0">{{ __('users') }}</h4>

                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    {{ __('add') }} {{ __('user') }}
                </a>
            </div>
            <div class="card-body">
                <form class="row  align-items-center justify-content-center">
                    <div class="col-md-3">
                        <div class="mb-4">
                            <input class="form-control @error('name') is-invalid @enderror"
                                value="{{ request('name') }}" name="name" type="text"
                                placeholder="{{ __('name') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <input class="form-control @error('email') is-invalid @enderror"
                                value="{{ request('email') }}" name="email" type="text"
                                placeholder="{{ __('email') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <input class="form-control @error('phone') is-invalid @enderror"
                                value="{{ request('phone') }}" name="phone" type="text"
                                placeholder="{{ __('phone') }}">
                        </div>
                    </div>

                    <div class="col-md-2">
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
                            <th scope="col">{{ __('name') }}</th>
                            <th scope="col">{{ __('username') }}</th>
                            <th scope="col">{{ __('phone') }}</th>
                            <th scope="col">{{ __('email') }}</th>
                            <th scope="col">{{ __('edit') }}</th>
                            <th scope="col">{{ __('delete') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <th>{{ $index +1 }}</th>
                                        <td>{{ $record->name }}</td>
                                        <td>{{ $record->username }}</td>
                                        <td>{{ $record->phone }}</td>
                                        <td>{{ $record->email }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $record->id) }}" class="btn btn-sm btn-info">
                                                {{ __('edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.destroy', $record->id) }}" method="post">
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
