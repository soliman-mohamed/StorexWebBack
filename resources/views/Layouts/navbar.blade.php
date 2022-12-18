<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="icon icon-lg fas fa-menu"></i>
        </button>
        <a class="header-brand d-md-none" href="#">
            <img src="{{ asset('images/logo.webp') }}" height="46" alt="CoreUI Logo" />
        </a>

        <ul class="header-nav ms-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar', null, [], true) }}">
                    @if(app()->getLocale() == 'ar')
                    En <img src="{{ asset('images/en.png') }}" height="25" alt="">
                        @else
                        ع <img src="{{ asset('images/ar.png') }}" height="25" alt="">
                    @endif
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ auth('web')->user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0" style="">
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-unlock me-1"></i>
                    {{ __('logout') }}
                </a>
              </div>
            </li>
          </ul>
    </div>
</header>
