<x-home.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <div class="booking-hero-header d-flex align-items-center">
        <div class="bg-holder bg-holder overlay bg-opacity-50"
            style="background-image:url({{ asset('assets') }}/assets/video/travel.png);">
            <video class="bg-video" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline">
                <source src="{{ asset('assets') }}/assets/video/travel.mp4" type="video/mp4" />
            </video>
        </div>
        <!--/.bg-holder-->

        <div class="container-medium position-relative z-5">
            <h2 class="text-secondary-lighter fs-5 fs-md-3 fw-normal mb-3">Where is your</h2>
            <h1 class="fs-4 fs-md-1 text-white fw-normal mb-6 overflow-hidden">NEXT <span
                    class="typed-text text-primary"
                    data-typed-text="[&quot;&lt;span class=text-primary&gt;TRIP!&lt;/span&gt;&quot;,&quot;&lt;span class=text-warning&gt;TOUR?&lt;/span&gt;&quot;, &quot;&lt;span class=text-info&gt;SOJOURN?&lt;/span&gt;&quot;, &quot;&lt;span class=text-success&gt;VACAY?&lt;/span&gt;&quot;]"></span>
            </h1>
            <div class="input-group rounded-2 py-1 ps-2 w-lg-50 border border-light">
                <div class="form-icon-container flex-1 d-flex align-items-center" data-fa-transform="down-1"><span
                        class="fa-solid fa-location-dot form-icon text-danger-light"></span>
                    <input
                        class="form-control form-icon-input bg-transparent border-0 outline-none fs-8 fs-md-7 text-secondary-light"
                        type="text" placeholder="Search Destination" />
                </div>
                <div class="dropdown d-flex align-items-center">
                    <button
                        class="btn py-0 bg-transparent text-secondary-light fs-8 fs-md-7 fw-semibold border-0 border-start border-light rounded-0"
                        type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                        aria-expanded="false" data-bs-reference="parent">Flight<span
                            class="fa-solid fa-chevron-down ms-2" data-fa-transform="down-1 shrink-4"></span></button>
                    <div class="dropdown-menu dropdown-menu-end" data-bs-theme="dark"><a class="dropdown-item"
                            href="#!">Flight</a><a class="dropdown-item" href="#!">Trip</a><a
                            class="dropdown-item" href="#!">Hotel</a></div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-6 pt-md-10 pb-10">

        <div class="container-medium">
            <div class="bg-holder d-none d-xl-block"
                style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-27.png);background-size:auto;background-position:left;">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder d-none d-xl-block"
                style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-27.png);background-size:auto;background-position:right;">
            </div>
            <!--/.bg-holder-->

            <div class="row g-3 position-relative">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <h4 class="fw-semibold mb-3">Season of</h4>
                            <h2 class="fs-4 fw-semibold mb-3 mb-md-4">Tour & <span
                                    class="text-primary-light fw-bold">Travel</span></h2>
                            <p class="mb-3 mb-md-0 text-body-tertiary">This is the perfect season for tours and travels.
                                At Phoenix, you can easily select the best travel option for your next vacation<span
                                    class="d-none d-lg-inline-block d-xl-none">... </span><span
                                    class="d-lg-none d-xl-inline">This will help you with the pricing that you’ll need,
                                    the accommodation facilities, food and beverages, and water rides.</span></p>
                        </div>
                        <div class="col-6 col-md-5">
                            <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a
                                    href="#!"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/35.png" alt="" /></a>
                                <div class="backdrop-faded"><a class="fw-bold fs-7 text-white stretched-link"
                                        href="#!">New Zealand</a>
                                    <p class="mb-0 text-white fs-9">17 Hotels</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-5">
                            <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a
                                    href="#!"> <img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/36.png" alt="" /></a>
                                <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">London</a>
                                    <p class="mb-0 text-white fs-9">17 Hotels</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a
                                    href="#!"> <img class="w-100 h-md-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/37.png" alt=""
                                        height="220" /></a>
                                <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">Maui</a>
                                    <p class="mb-0 text-white fs-9">14 Hotels</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column gap-3 h-100">
                        <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!">
                                <img class="w-100 h-lg-100 object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/38.png" alt=""
                                    height="220" /></a>
                            <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">Bali,
                                    Indonesia</a>
                                <p class="mb-0 text-white fs-9">51 Hotels</p>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 py-3 fs-8">Explore more<span
                                class="fa-solid fa-chevron-right ms-2" data-fa-transform="down-2"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <section class="pb-10 pt-0">
        <div class="bg-holder d-none d-md-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-28.png);background-size:7%;background-position:left 27%;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-md-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-28.png);background-size:16%;background-position:right -25px;">
        </div>
        <!--/.bg-holder-->

        <div class="container-medium text-center mb-11 position-relative">
            <h3 class="mb-2 text-body-emphasis">Travel more, spend less</h3>
            <p class="text-body-tertiary mb-0">Working with Phoenix means you’ll have all the plans and the perfect
                price list to help you plan.</p>
        </div>
        <div class="container-fluid px-sm-0">
            <div class="swiper-theme-container swiper-slide-nav-top">
                <div class="swiper-nav">
                    <div class="swiper-button-next"><span class="fas fa-chevron-right text-primary"
                            data-fa-transform="shrink-3"></span></div>
                    <div class="swiper-button-prev"><span class="fas fa-chevron-left text-primary"
                            data-fa-transform="shrink-3"></span></div>
                </div>
                <div class="swiper theme-slider"
                    data-swiper='{"loop":true,"centeredSlides":true,"autoplay":true,"centeredSlidesBounds":true,"spaceBetween":16,"slidesPerView":1,"speed":1500,"breakpoints":{"576":{"slidesPerView":"auto"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/39.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/thailand.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Thailand</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/40.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">15 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">24 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/switzerland.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Switzerland</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/42.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">44 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/turkey.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Turkey</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/41.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">55 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">41 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/new-zealand.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">New Zealand</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/43.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/sweden.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Sweden</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/44.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">44 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/turkey.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Turkey</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/58.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">54 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">123 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/vietnam.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Vietnam</h4>
                                    </div>
                                </div>
                            </a></div>
                        <div class="swiper-slide w-sm-auto"><a
                                class="position-relative rounded-3 overflow-hidden d-block" href="#!"><img
                                    class="w-100 w-sm-auto object-fit-cover"
                                    src="{{ asset('assets') }}/assets/img/gallery/57.png" alt=""
                                    height="220" />
                                <div class="img-backdrop-faded">
                                    <div class="image-reveal-content mb-3">
                                        <div class="d-flex align-items-center gap-2 mb-2"><span
                                                class="fa-solid fa-hotel text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">17 Hotels</h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><span
                                                class="fa-solid fa-tree-city text-secondary-lighter"></span>
                                            <h6 class="mb-0 text-secondary-lighter fw-semibold">22 Tour Package</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"><img
                                            src="{{ asset('assets') }}/assets/img/country/japan.png"
                                            alt="" />
                                        <h4 class="mb-0 text-white">Japan</h4>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-29.png);background-size:auto;background-position:-15%;">
        </div>
        <!--/.bg-holder-->

        <div class="container-medium position-relative">
            <h3 class="mb-2 text-body-emphasis text-center text-xl-start">The best of our hotel</h3>
            <div class="d-xl-flex justify-content-between mb-5 text-center">
                <p class="mb-0 text-body-tertiary">This list will help you get insights into how much you’ll need to
                    spend to afford accommodation.</p>
                <button class="btn btn-link p-0 fs-8">View all<span class="fa-solid fa-chevron-right ms-2"
                        data-fa-transform="shrink-3"></span></button>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-sm-11 col-md-8 col-lg-6 col-xl-12">
                    <div class="row gy-5 gx-xl-7 justify-content-between pe-4">
                        <div class="col-xl-4">
                            <div class="card card-img-shift border-0 mx-auto">
                                <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100"
                                        src="{{ asset('assets') }}/assets/img/gallery/45.png" alt=""
                                        height="250" />
                                    <button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span
                                            class="far fa-heart"></span></button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="card-content">
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                            <div><span
                                                    class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span
                                                    class="badge badge-phoenix px-1 badge-phoenix-info">Couple
                                                    package</span></div>
                                            <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)
                                            </h6>
                                        </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover"
                                            href="#!">Royal Mansour Marrakech</a><a
                                            class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span
                                                class="me-1" data-feather="map-pin"></span>Morocco</a>
                                        <h6
                                            class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">
                                            From <span class="fw-bolder fs-7 text-body-highlight">$60.00</span>/ per
                                            night</h6>
                                        <button class="btn btn-primary px-5">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-img-shift border-0 mx-auto">
                                <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100"
                                        src="{{ asset('assets') }}/assets/img/gallery/46.png" alt=""
                                        height="250" />
                                    <button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span
                                            class="far fa-heart"></span></button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="card-content">
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                            <div><span
                                                    class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span
                                                    class="badge badge-phoenix px-1 badge-phoenix-info">Couple
                                                    package</span></div>
                                            <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)
                                            </h6>
                                        </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover"
                                            href="#!">Mandarin Oriental Jumeira</a><a
                                            class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span
                                                class="me-1" data-feather="map-pin"></span>Abu dhabi</a>
                                        <h6
                                            class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">
                                            From <span class="fw-bolder fs-7 text-body-highlight">$90.00</span>/ per
                                            night</h6>
                                        <button class="btn btn-primary px-5">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-img-shift border-0 mx-auto">
                                <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100"
                                        src="{{ asset('assets') }}/assets/img/gallery/47.png" alt=""
                                        height="250" />
                                    <button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span
                                            class="far fa-heart"></span></button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="card-content">
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                            <div><span
                                                    class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span
                                                    class="badge badge-phoenix px-1 badge-phoenix-info">Couple
                                                    package</span></div>
                                            <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)
                                            </h6>
                                        </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover"
                                            href="#!">Swissotel Bangkok</a><a
                                            class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span
                                                class="me-1" data-feather="map-pin"></span>Bangkok</a>
                                        <h6
                                            class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">
                                            From <span class="fw-bolder fs-7 text-body-highlight">$70.00</span>/ per
                                            night</h6>
                                        <button class="btn btn-primary px-5">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 overflow-hidden">
        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-30.png);background-size:40%;background-position:left;z-index:1;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-30.png);background-size:26%;background-position:right 25px;z-index:1;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-booking-gallery"></div>
        <div class="container-medium position-relative z-2">
            <h3 class="mb-2 text-body-emphasis text-center">Popular Attractions</h3>
            <p class="mb-0 text-body-tertiary text-center mb-5">Explore the most popular and frequently visited
                destinations around the world</p>
            <ul class="nav mb-6 justify-content-center flex-wrap mx-auto w-max-content"
                data-filter-nav="data-filter-nav">
                <li class="nav-item"><a class="isotope-nav cursor-pointer active" data-filter=".tokyo">Tokyo</a></li>
                <li class="nav-item"><a class="isotope-nav cursor-pointer" data-filter=".bali">Bali</a></li>
                <li class="nav-item"><a class="isotope-nav cursor-pointer" data-filter=".sydney">Sydney</a></li>
                <li class="nav-item"> <a class="isotope-nav cursor-pointer" data-filter=".paris">Paris</a></li>
            </ul>
            <div class="row g-0 justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-5">
                    <div class="row gx-0 gy-3" id="image_gallery"
                        data-sl-isotope='{"layoutMode":"packery","filter":".tokyo"}'>
                        <div class="col-12 isotope-item w-100 tokyo">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/tokyo-1.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">King Power Mahanakhon</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.8<span class="fs-10">/5
                                        </span>(1.4k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 tokyo">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/tokyo-2.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Meiji Jingu</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>5<span class="fs-10">/5 </span>(2.2k
                                        review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 tokyo">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/tokyo-3.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Imperial Palace</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.5<span class="fs-10">/5
                                        </span>(1.2k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 bali">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/bali-1.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Nusa Lembongan</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.7<span class="fs-10">/5
                                        </span>(1.2k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 bali">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/bali-2.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Waterbom Bali</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.5<span class="fs-10">/5
                                        </span>(1.8k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 bali">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/bali-3.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Kuta Beach</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>5<span class="fs-10">/5 </span>(4.1k
                                        review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 sydney">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/sydney-1.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">The Rocks</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.8<span class="fs-10">/5
                                        </span>(1.9k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 sydney">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/sydney-2.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Manly Beach</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.7<span class="fs-10">/5
                                        </span>(1.1k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 sydney">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/sydney-3.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Darling Harbour</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>5<span class="fs-10">/5 </span>(3.2k
                                        review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 paris">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/paris-1.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Louvre Museum</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.4<span class="fs-10">/5
                                        </span>(4.3k review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 paris">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/paris-2.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Montmartre</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>5<span class="fs-10">/5 </span>(5k
                                        review)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 isotope-item w-100 paris">
                            <div class="img-zoom-hover-lg rounded-2 overflow-hidden"><a href="#!"> <img
                                        class="w-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/paris-3.png" alt=""
                                        height="220" /></a>
                                <button class="btn btn-wish position-absolute top-0 end-0 mt-4 me-4"><span
                                        class="far fa-heart"></span></button>
                                <div class="backdrop-faded"><a class="text-white fw-bolder fs-7 stretched-link"
                                        href="#!">Tuileries Garden</a>
                                    <h5 class="text-light mb-0"><span class="fa-solid fa-star text-warning me-1"
                                            data-fa-transform="shrink-2"></span>4.1<span class="fs-10">/5
                                        </span>(4.5k review)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
                <h5 class="mb-0">Explore more popular destination</h5>
                <div class="btn-ping">
                    <div class="btn-ping-bg"></div>
                    <button
                        class="btn border p-0 fs-8 text-primary d-flex align-items-center justify-content-center"><span
                            class="fa-solid fa-arrow-right"></span></button>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-7 pt-0 overflow-x-hidden">
        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-31.png);background-size:22%;background-position:left;z-index:1;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-31.png);background-size:15%;background-position:right bottom;z-index:1;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-latest-posts"></div>
        <div class="container-medium text-center position-relative z-2">
            <h3 class="mb-2 text-body-emphasis">Our Latest Posts For Travellers</h3>
            <p class="mb-0 text-body-tertiary mb-13">Find the best travel memories from our past tours and get a clear
                idea of what we do.</p>
        </div>
        <div class="swiper-theme-container swiper-zooming-slider">
            <div class="swiper-container theme-slider"
                data-swiper='{"loop":true,"slidesPerView":1.3,"spaceBetween":32,"speed":2000,"autoplay":true,"centeredSlides":true,"simulateTouch":false,"breakpoints":{"540":{"slidesPerView":1.5},"768":{"slidesPerView":1.8},"1200":{"slidesPerView":2},"1530":{"slidesPerView":2.8}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded-3 overflow-hidden">
                        <div class="position-relative w-100 h-100"><img class="w-100 h-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/48.png" alt="" />
                            <div class="backdrop-faded p-4 p-md-6">
                                <div class="d-flex align-items-center mb-2"><span class="text-secondary-lighter me-2"
                                        data-feather="calendar"></span>
                                    <h6 class="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">Monday,
                                        Nov 07, 2022</h6><span class="fa-solid fa-star text-warning fs-9 me-2"></span>
                                    <h6 class="mb-0 text-secondary-lighter fw-semibold">4.8</h6>
                                </div><a class="text-white fw-bold fs-7" href="#!">Beautiful Frence, Let's
                                    Travelling!</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide rounded-3 overflow-hidden">
                        <div class="position-relative w-100 h-100"><img class="w-100 h-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/49.png" alt="" />
                            <div class="backdrop-faded p-4 p-md-6">
                                <div class="d-flex align-items-center mb-2"><span class="text-secondary-lighter me-2"
                                        data-feather="calendar"></span>
                                    <h6 class="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">Monday,
                                        Nov 06, 2022</h6><span class="fa-solid fa-star text-warning fs-9 me-2"></span>
                                    <h6 class="mb-0 text-secondary-lighter fw-semibold">4.5</h6>
                                </div><a class="text-white fw-bold fs-7" href="#!">Man Standing on Watching
                                    Mountain</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide rounded-3 overflow-hidden">
                        <div class="position-relative w-100 h-100"><img class="w-100 h-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/50.png" alt="" />
                            <div class="backdrop-faded p-4 p-md-6">
                                <div class="d-flex align-items-center mb-2"><span class="text-secondary-lighter me-2"
                                        data-feather="calendar"></span>
                                    <h6 class="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">Monday,
                                        Nov 05, 2022</h6><span class="fa-solid fa-star text-warning fs-9 me-2"></span>
                                    <h6 class="mb-0 text-secondary-lighter fw-semibold">4.2</h6>
                                </div><a class="text-white fw-bold fs-7" href="#!">Beautiful Bali Indonesia,
                                    Let's Travelling!</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide rounded-3 overflow-hidden">
                        <div class="position-relative w-100 h-100"><img class="w-100 h-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/64.png" alt="" />
                            <div class="backdrop-faded p-4 p-md-6">
                                <div class="d-flex align-items-center mb-2"><span class="text-secondary-lighter me-2"
                                        data-feather="calendar"></span>
                                    <h6 class="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">Monday,
                                        Nov 04, 2022</h6><span class="fa-solid fa-star text-warning fs-9 me-2"></span>
                                    <h6 class="mb-0 text-secondary-lighter fw-semibold">4.5</h6>
                                </div><a class="text-white fw-bold fs-7" href="#!">Chasing sunsets, making
                                    memories worldwide.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-next"><span class="fas fa-chevron-right text-primary"
                        data-fa-transform="shrink-3"></span></div>
                <div class="swiper-button-prev"><span class="fas fa-chevron-left text-primary"
                        data-fa-transform="shrink-3"></span></div>
            </div>
        </div>
        <div class="text-center mt-12 position-relative z-2">
            <button class="btn btn-link p-0 fs-8">View all<span class="fa-solid fa-chevron-right ms-2"
                    data-fa-transform="shrink-1"></span></button>
        </div>
    </section>
    <section class="pb-10 pt-3">
        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-32.png);background-size:26%;background-position:left 115px;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-32.png);background-size:28%;background-position:right -25px;">
        </div>
        <!--/.bg-holder-->

        <div class="container-medium position-relative">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="d-md-flex align-items-center gap-7 text-center text-md-start"><img
                            class="mb-4 mb-md-0 d-dark-none"
                            src="{{ asset('assets') }}/assets/img/spot-illustrations/40.png" width="260"
                            alt="" /><img class="mb-4 mb-md-0 d-light-none"
                            src="{{ asset('assets') }}/assets/img/spot-illustrations/dark_40.png" width="260"
                            alt="" />
                        <div class="flex-1">
                            <h3 class="mb-0">Get Updates & More</h3>
                            <p class="mb-4 text-body-tertiary">Subscribe to our newsletter to stay updated.</p>
                            <form class="d-flex justify-content-center">
                                <input class="form-control me-3" id="ctaEmail1" type="email" placeholder="Email"
                                    aria-describedby="ctaEmail1" />
                                <button class="btn btn-primary d-flex align-items-center" type="submit">
                                    Subscribe<span class="fa-solid fa-chevron-right ms-2 fs-9"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-7 pt-0">

        <div class="container-medium">
            <div class="text-center mb-5">
                <h3 class="mb-2 text-body-emphasis">Latest photos from tourists</h3>
                <p class="mb-0 text-body-tertiary">See how our tourists enjoyed their trip from images captured by them
                    with Team Phoenix!</p>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/51.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Bali
                                Indonesia</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/52.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Barcelona</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/53.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Bali
                                Indonesia</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/54.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Sydney</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/55.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Great Barrier
                                Reef</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="img-zoom-hover rounded-3 overflow-hidden position-relative"><a href="#!"><img
                                class="latest-img w-100 object-fit-cover"
                                src="{{ asset('assets') }}/assets/img/gallery/56.png" alt="" /></a>
                        <div class="backdrop-faded"><a class="fw-semibold mb-0 text-secondary-lighter stretched-link"
                                href="#!"><span
                                    class="fa-solid fa-location-dot text-secondary-lighter me-2"></span>Grand
                                Canyon</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <section class="pt-9 pb-10">
        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-left-33.png);background-size:auto;background-position:-8% 38px;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/bg-right-33.png);background-size:18%;background-position:right;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-get-app"></div>
        <div class="container-medium position-relative">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-10 col-xl-8 col-xxl-7">
                    <div class="d-md-flex align-items-center gap-5 text-center text-md-start"><img
                            class="img-fluid d-dark-none"
                            src="{{ asset('assets') }}/assets/img/spot-illustrations/i-phone.png" alt=""
                            style="max-height: 540px" /><img class="img-fluid d-light-none"
                            src="{{ asset('assets') }}/assets/img/spot-illustrations/i-phone-dark.png" alt=""
                            style="max-height: 540px" />
                        <div class="mt-5 mt-md-0">
                            <div class="d-none d-md-block"><img class="d-dark-none"
                                    src="{{ asset('assets') }}/assets/img/spot-illustrations/41.png" alt=""
                                    width="200" /><img class="d-light-none"
                                    src="{{ asset('assets') }}/assets/img/spot-illustrations/dark_41.png"
                                    alt="" width="200" /></div>
                            <h3 class="fw-bolder mt-4">Get The App Now</h3>
                            <p class="text-body-tertiary">Designed to provide the best user experience possible to all
                                our customers with activities ranging from anything thinkable to the unthinkables.</p><a
                                class="me-2" href="#!"><img
                                    src="{{ asset('assets') }}/assets/img/generic/play-store.png" alt=""
                                    height="32" /></a><a href="#!"><img
                                    src="{{ asset('assets') }}/assets/img/generic/app-store.png" alt=""
                                    height="32" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="booking-footer pb-6 pb-md-11 pt-15">

        <div class="container-medium">
            <div class="row gy-3 justify-content-between align-items-center">
                <div class="col-auto"><a href="#!"><img src="{{ asset('assets') }}/assets/img/icons/logo-1.png"
                            alt="" /></a></div>
                <div class="col-auto">
                    <ul class="mb-0 list-unstyled d-flex flex-wrap">
                        <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">Home</a></li>
                        <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">About</a></li>
                        <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">Contact</a></li>
                        <li class="me-3 me-sm-5"><a class="fs-8 fw-bold text-white" href="#!">FAQ</a></li>
                        <li><a class="fs-8 fw-bold text-white" href="#!">Gallery</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4" />
            <div class="row gy-3 justify-content-between">
                <div class="col-auto"> <a class="text-white me-4" href="#!"><span
                            class="fa-brands fa-facebook-f"> </span></a><a class="text-white me-4"
                        href="#!"><span class="fa-brands fa-twitter"></span></a><a class="text-white me-4"
                        href="#!"><span class="fa-brands fa-linkedin-in"></span></a><a class="text-white"
                        href="#!"><span class="fa-brands fa-behance"></span></a></div>
                <div class="col-auto">
                    <p class="mb-0 text-white">Thank you for creating with Phoenix | 2023 © <a class="text-white"
                            href="https://themewagon.com/">Themewagon</a></p>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>

</x-home.layout>
