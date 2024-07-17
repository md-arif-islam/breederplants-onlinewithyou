<div class="screen-overlay"></div>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{ route('dashboard') }}" class="brand-wrap">
            <img src="{{ asset('assets/backend/imgs/theme/logo.png') }}" class="logo" alt="Evara Dashboard">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i>
            </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('dashboard') }}">
                    <span class="menu-icon">
                        <img src="{{ asset('assets/backend/imgs/theme/home.svg') }}" style="filter: brightness(0.3);" alt="">
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="menu-item {{ Request::routeIs('variety-reports.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('variety-reports.index') }}">
                    <span class="menu-icon">
                        <img src="{{ asset('assets/backend/imgs/theme/File_Document.svg') }}" style="filter: brightness(0.3);" alt="">
                    </span>
                    <span class="text">Variety Reports</span>
                </a>
            </li>

            <li class="menu-item {{ Request::routeIs('growers.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('growers.index') }}">
                    <span class="menu-icon">
                        <img src="{{ asset('assets/backend/imgs/theme/Growers.svg') }}" style="filter: brightness(0.3);" alt="">
                    </span>
                    <span class="text">Growers</span>
                </a>
            </li>

            <li class="menu-item {{ Request::routeIs('breeders.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('breeders.index') }}">
                    <span class="menu-icon">
                        <img src="{{ asset('assets/backend/imgs/theme/Breeders.svg') }}" style="filter: brightness(0.3);" alt="">
                    </span>
                    <span class="text">Breeders</span>
                </a>
            </li>

{{--            <li class="menu-item {{ Request::routeIs('settings.index') ? 'active' : '' }}">--}}
{{--                <a class="menu-link" href="{{ route('settings.index') }}"> --}}
{{--                    <span class="menu-icon">--}}
{{--                        <img src="{{ asset('assets/backend/imgs/theme/Settings.svg') }}" style="filter: brightness(0.3);" alt="">--}}
{{--                    </span>--}}
{{--                    <span class="text">Settings</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </nav>
</aside>
