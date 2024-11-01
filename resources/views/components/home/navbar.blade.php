<div class="bg-primary-subtle py-2">
    <div class="container-medium d-flex align-items-center justify-content-between"><a class="btn btn-link p-0 text-body"
            href="{{ route('login') }}"><span class="fa-solid fa-arrow-right-to-bracket me-2"
                data-fa-transform="down-1"></span>Login</a>
        <div class="dropdown">
            <button class="btn btn-sm p-0 d-md-none fs-8" type="button" data-bs-toggle="dropdown" data-boundary="window"
                aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                    class="fas fa-ellipsis-h"></span></button>
            <ul class="dropdown-menu dropdown-menu-end" style="z-index: 9999">
                <li><a class="dropdown-item" href="#!">Kontak Email</a></li>
                <li><a class="dropdown-item" href="#!">Kontak Whatsapp</a></li>
            </ul>
        </div>
        <ul class="d-none d-md-flex gap-5 list-unstyled mb-0">
            <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="mailto:example@gmail.com"> <span
                        class="fa-regular fa-envelope me-2" data-fa-transform="down-1"></span>Kontak Email</a></li>
            <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="tel:+01123581321"> <span
                        class="fa-brands fa-whatsapp me-2"></span>Kontak Whatsapp</a></li>
        </ul>
    </div>
</div>
<div class="bg-body-emphasis sticky-top" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
    <nav class="navbar navbar-landing navbar-expand-lg container-medium"><a
            class="navbar-brand flex-1 flex-lg-grow-0 me-lg-8 me-xl-13" href="{{ asset('assets') }}/index.html">
            <div class="d-flex align-items-center"><img src="{{ asset('assets') }}/assets/img/icons/logo.png"
                    alt="phoenix" width="27" />
                <h5 class="logo-text ms-2">{{ config('app.name', 'Laravel') }}</h5>
            </div>
        </a>
        <div class="d-flex align-items-center gap-2 gap-sm-3 gap-md-4 my-2 order-lg-1">
            <div class="theme-control-toggle fa-icon-wait">
                <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                    data-theme-control="phoenixTheme" value="dark" id="themeControlToggleSm" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggleSm"
                    data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                    style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggleSm"
                    data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                    style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label>
            </div><a class="btn btn-link text-body-tertiary p-0" href="#!"><span data-feather="map-pin"
                    style="width: 18px; height: 18px"></span></a><a class="btn btn-link text-body-tertiary p-0"
                href="#!"><span data-feather="bell" style="width: 20px; height: 20px"></span></a><a
                class="btn btn-link text-body-tertiary p-0 me-2 me-lg-0" href="#!"><span data-feather="user"
                    style="width: 20px; height: 20px"></span></a>
        </div>
        <button class="navbar-toggler fs-8 ps-1 ps-sm-3 pe-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                <li class="nav-item  border-bottom border-translucent border-bottom-lg-0"><a
                        class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                        href="{{ route('home.index') }}">Beranda</a></li>
                <li class="nav-item border-bottom border-translucent border-bottom-lg-0"><a
                        class="nav-link {{ request()->routeIs('home.trip') ? 'active' : '' }}"
                        href="{{ route('home.trip') }}">Destinasi Wisata</a></li>
            </ul>
        </div>
    </nav>
</div>
