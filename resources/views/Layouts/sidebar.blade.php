<div class="sidebar sidebar-light sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <img class="sidebar-brand-full" src="{{ asset('images/logo.webp') }}" height="46" alt="{{ __(env('APP_NAME')) }}">
        <img class="sidebar-brand-narrow" src="{{ asset('images/logo.webp') }}" width="46" height="46" alt="{{ __(env('APP_NAME')) }}">
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                {{ __('dashboard') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="nav-icon fas fa-users"></i>
                {{ __('users') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="nav-icon fas fa-paw"></i>
                {{ __('categories') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('movies.index') }}">
                <i class="nav-icon fas fa-camera"></i>
                {{ __('movies') }}
            </a>
        </li>

      </ul>
</div>
