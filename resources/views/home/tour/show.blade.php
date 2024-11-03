<x-home.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <section class="py-5">

        <div class="container-medium">
            <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Page 1</a></li>
                    <li class="breadcrumb-item"><a href="#">Page 2</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
            </nav>
            <h2 class="mb-5">Destinasi Wisata</h2>
            <h1 class="fw-bold">{{ $tour->name }} <span class="align-middle text-nowrap fs-8"><span
                        class="text-body-quaternary">by </span><span class="text-body-tertiary">Desa Juara
                        Jalatrang</span></span></h1>
            <hr class="bg-secondary-lighter">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="me-3">Rp {{ number_format($tour->packages->min('price'), 0, ',', '.') }} <span
                        class="fs-8 fw-semibold text-body-tertiary align-middle">/ per
                        orang</span></h2>
                <div class="me-3"><span class="fa fa-star text-warning me-1 fs-9"></span><span
                        class="fa fa-star text-warning me-1 fs-9"></span><span
                        class="fa fa-star text-warning me-1 fs-9"></span><span
                        class="fa fa-star text-warning me-1 fs-9"></span><span
                        class="fa fa-star text-warning me-1 fs-9"></span><span class="fw-semibold text-body-tertiary">(
                        32 reviews )</span>
                </div>
                <h5 class="fw-semibold text-body-tertiary me-3"><span
                        class="p-2 d-inline-flex bg-danger-subtle rounded-pill me-2"><span
                            class="fa-solid fa-heart fs-9 text-danger-light"
                            data-fa-transform="down-1"></span></span>Recommended by 25 travellers</h5>
                <button class="btn btn-primary ms-md-auto" type="button" data-bs-toggle="modal"
                    data-bs-target="#trilAvailabilityModal" aria-haspopup="true" aria-expanded="false"
                    data-bs-reference="parent">Check availability</button>
            </div>

            <div class="row g-2 g-md-3 my-3">
                <div class="col-md-12">
                    <div class="swiper-theme-container rounded-2 overflow-hidden">
                        <div class="swiper swiper theme-slider"
                            data-swiper='{"slidesPerView":1,"loop":true,"autoplay":true,"pagination":{"el":".swiper-pagination","clickable":true}}'>
                            <div class="swiper-wrapper">
                                @foreach (json_decode($tour->images) as $image)
                                    <div class="swiper-slide"><img class="w-100 h-100 object-fit-cover"
                                            src="{{ asset('storage/' . $image) }}"
                                            alt="Gambar Destinasi Wisata {{ $tour->name }}" /></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-nav swiper-nav-inside">
                            <div class="swiper-button-next bg-transparent border-0 text-white"><span
                                    class="fas fa-chevron-right nav-icon"></span></div>
                            <div class="swiper-button-prev bg-transparent border-0 text-white"><span
                                    class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-body-highlight rounded-2 mt-3 mb-5">
                <div class="row gy-4">
                    <div class="col-md-4 col-lg-3 border-end-md">
                        <h6 class="text-body fw-semibold mb-2"> <span class="fa-solid fa-map-marker-alt me-2"></span>
                            {{ $tour->location }}
                        </h6>
                        <h6 class="text-body fw-semibold mb-2"> <span class="fa-solid fa-clock me-2"></span>
                            @if ($tour->packages->min('duration') == $tour->packages->max('duration'))
                                {{ $tour->packages->min('duration') }} hari
                            @else
                                {{ $tour->packages->min('duration') }} - {{ $tour->packages->max('duration') }} hari
                            @endif
                        </h6>
                        <h6 class="text-body fw-semibold mb-4"> <span class="fa-solid fa-user me-2"></span>1 - 10 orang
                        </h6>
                    </div>
                    <div class="col-md-8 col-lg-9 ps-lg-7">
                        <h4 class="text-body mb-3">Sekilas Informasi</h4>
                        <p class="mb-0">
                            {!! $tour->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills flex-nowrap my-5" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details"
                        aria-selected="true">Details</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review"
                        type="button" role="tab" aria-controls="pills-review" aria-selected="true">Review</button>
                </li>
            </ul>
            <div class="tab-content" id="trip-details-tab-content">
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel"
                    aria-labelledby="pills-details-tab" tabindex="0">
                    <div class="row justify-content-between gx-0 gy-5">
                        <div class="col-xl-7">
                            <a class="btn px-4 py-3 py-sm-4 d-flex flex-between-center collapse-indicator bg-body-highlight mt-4"
                                data-bs-toggle="collapse" href="#collapseAdditionalInfo" role="button"
                                aria-expanded="false" aria-controls="collapseAdditionalInfo">
                                <h4 class="fs-8 fs-sm-7 mb-0 text-body-highlight">Informasi Lainnya</h4><span
                                    class="fa-solid fa-chevron-down toggle-icon"></span>
                            </a>
                            <div class="collapse" id="collapseAdditionalInfo">
                                <div class="py-6 px-4">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>Confirmation will be
                                            received at time of booking</li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>Minimum age is 18 years
                                        </li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>Infant meals not included
                                        </li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>A minimum if 01 people per
                                            booking is required</li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>Most travelers can
                                            participate</li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>This tour is to explore the
                                            city using local transportation like rickshaw , tuktuk, uber.</li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>Woman's need to cover the
                                            head during visiting mosque</li>
                                        <li class="mb-1 d-flex"><span
                                                class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                data-fa-transform="down-13 shrink-4"></span>This is a private tour /
                                            activity. Only your group will particiapte.</li>
                                    </ul>
                                </div>
                            </div><a
                                class="btn px-4 py-3 py-sm-4 d-flex flex-between-center collapse-indicator bg-body-highlight mt-4"
                                data-bs-toggle="collapse" href="#collapsePolicy" role="button"
                                aria-expanded="false" aria-controls="collapsePolicy">
                                <h4 class="fs-8 fs-sm-7 mb-0 text-body-highlight">Kebijakan</h4><span
                                    class="fa-solid fa-chevron-down toggle-icon"></span>
                            </a>
                            <div class="collapse" id="collapsePolicy">
                                <div class="py-6 px-4">
                                    <div class="card bg-transparent mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Cancellation</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>To cancel any tour,
                                                    an email has to be sent to tours@phoenix.com mentioning the tour
                                                    booking ID and details about the cancellation.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>The time of sending
                                                    the email will be considered as the time of cancellation.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>The email will be
                                                    considered as the final application for cancellation. A phone call
                                                    to the Phoenix hotline number or any other team member of Phoenix
                                                    will not be considered as a request for cancellation of booking.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card bg-transparent mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Refund</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>The full amount of
                                                    the tour fee will be refunded if the booking is canceled five (5)
                                                    days prior to the start of the experience/tour.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>Fifty Percent (50%)
                                                    of the tour fee will be refunded if the booking is canceled three
                                                    (3) days prior to the start of the experience/tour.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>No refund will be
                                                    provided if the booking is canceled less than three (3) days prior
                                                    to the start of the experience/tour.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>Convenience fee is
                                                    non-refundable and will be deducted from the paid amount.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>All refunds will be
                                                    processed within seven (7) working days.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card bg-transparent">
                                        <div class="card-body">
                                            <h5 class="mb-3">Child policy</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>No fee will be
                                                    needed for children below the age of four (4). No separate seat will
                                                    be provided in case of transportation and accommodation.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>50% fee must be
                                                    paid for any child between the age of five (5) and ten (10) years
                                                    old.</li>
                                                <li class="mb-1 d-flex mb-3"><span
                                                        class="fa-solid fa-circle text-secondary-light me-3 fs-11"
                                                        data-fa-transform="down-13 shrink-4"></span>Full amount of
                                                    money must be paid for anyone above ten (10) years old.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0"
                                        scrolling="no" marginheight="0" marginwidth="0"
                                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ $tour->maps }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                        href="https://sprunkin.com">Sprunki Mods</a></div>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        width: 100%;
                                        height: 400px;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        width: 100%;
                                        height: 400px;
                                    }

                                    .gmap_iframe {
                                        height: 400px !important;
                                    }
                                </style>
                            </div>
                            <h6 class="my-3 py-3 px-2 rounded-2 bg-body-secondary text-center">Paket Wisata</h6>
                            <div class="row gx-5 gy-0 position-relative">
                                <!--/.bg-holder-->

                                <div class="col-sm-12 position-relative">

                                    @foreach ($tour->packages as $package)
                                        <div class="p-2 rounded-2 bg-body-highlight mb-3 position-relative">
                                            <div class="tour-direction-line border-start border-dashed"></div>
                                            <a class="btn p-0 d-flex justify-content-between collapse-indicator"
                                                data-bs-toggle="collapse" href="#collapsePicupPoint" role="button"
                                                aria-expanded="true" aria-controls="collapsePicupPoint">
                                                <div class="d-flex"><span
                                                        class="d-inline-flex flex-center rounded-pill border me-2"
                                                        style="min-width: 23px; height: 23px">
                                                        {{ $loop->iteration }}
                                                    </span>
                                                    <div>
                                                        <h6 class="mb-2 text-start">{{ $package->name }}</h6>
                                                        <h6 class="text-start fw-normal text-body-tertiary">
                                                            Rp {{ number_format($package->price, 0, ',', '.') }} /
                                                            orang</h6>
                                                        </h6>
                                                    </div>
                                                </div><span class="fa-solid fa-chevron-down toggle-icon"
                                                    style="width: 10px; height: 10px"></span>
                                            </a>
                                            <div class="collapse" id="collapsePicupPoint">
                                                <h6 class="fw-normal text-body-tertiary pt-3 ps-1"><span
                                                        class="fa-solid fa-clock text-body-quaternary me-2"></span>
                                                    {{ $package->duration }} hari
                                                    <div class="d-flex align-items-center mt-2 justify-content-end">
                                                        <input type="number" class="form-control me-2"
                                                            value="1" min="1"
                                                            style="width: 60px; height: 30px;">
                                                        <button class="btn btn-primary"
                                                            style="height: 30px; padding: 0 10px;">Pesan</button>
                                                    </div>



                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach

                                    <h6 class="my-3 py-3 px-2 rounded-2 bg-body-secondary text-center">Paket Wisata
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab"
                    tabindex="0">
                    <div class="row align-items-center gy-5">
                        <div class="col-xl-5 col-xxl-4">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <h3 class="mb-0">5.0</h3>
                                <div class="pe-3 border-end-sm border-translucent"><span
                                        class="fa fa-star text-warning me-1 fs-9"></span><span
                                        class="fa fa-star text-warning me-1 fs-9"></span><span
                                        class="fa fa-star text-warning me-1 fs-9"></span><span
                                        class="fa fa-star text-warning me-1 fs-9"></span><span
                                        class="fa fa-star text-warning me-1 fs-9"></span><span
                                        class="fw-semibold text-body-tertiary">( 32 reviews )</span>
                                </div><span
                                    class="badge badge-phoenix badge-phoenix-success border-0 px-3 py-2 fs-8 text-capitalize">Recommended</span>
                            </div>
                        </div>
                        <div class="col-xl-7 col-xxl-8">
                            <div class="d-flex gap-5 gap-md-6 gap-xl-8 gap-xxl-6 flex-wrap">
                                <div class="d-lg-flex d-xl-block d-xxl-flex align-items-center gap-3 ms-xl-auto">
                                    <div class="echart-trip-review order-lg-1 order-xl-0 order-xxl-1 mx-auto"
                                        style="height: 60px; width: 60px"
                                        data-options='{"series":[{"data":[{"value":24}]}]}'></div>
                                    <h5 class="mb-0 mt-2 mt-lg-0 mt-xl-2 mt-xxl-0 text-center">Excellent</h5>
                                </div>
                                <div class="d-lg-flex d-xl-block d-xxl-flex align-items-center gap-3">
                                    <div class="echart-trip-review order-lg-1 order-xl-0 order-xxl-1 mx-auto"
                                        style="height: 60px; width: 60px"
                                        data-options='{"series":[{"data":[{"value":8}]}]}'></div>
                                    <h5 class="mb-0 mt-2 mt-lg-0 mt-xl-2 mt-xxl-0 text-center">Very good</h5>
                                </div>
                                <div class="d-lg-flex d-xl-block d-xxl-flex align-items-center gap-3">
                                    <div class="echart-trip-review order-lg-1 order-xl-0 order-xxl-1 mx-auto"
                                        style="height: 60px; width: 60px"
                                        data-options='{"series":[{"data":[{"value":0}]}]}'></div>
                                    <h5 class="mb-0 mt-2 mt-lg-0 mt-xl-2 mt-xxl-0 text-center">Average</h5>
                                </div>
                                <div class="d-lg-flex d-xl-block d-xxl-flex align-items-center gap-3">
                                    <div class="echart-trip-review order-lg-1 order-xl-0 order-xxl-1 mx-auto"
                                        style="height: 60px; width: 60px"
                                        data-options='{"series":[{"data":[{"value":0}]}]}'></div>
                                    <h5 class="mb-0 mt-2 mt-lg-0 mt-xl-2 mt-xxl-0 text-center">Poor</h5>
                                </div>
                                <div class="d-lg-flex d-xl-block d-xxl-flex align-items-center gap-3">
                                    <div class="echart-trip-review order-lg-1 order-xl-0 order-xxl-1 mx-auto"
                                        style="height: 60px; width: 60px"
                                        data-options='{"series":[{"data":[{"value":0}]}]}'></div>
                                    <h5 class="mb-0 mt-2 mt-lg-0 mt-xl-2 mt-xxl-0 text-center">Terrible</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-phoenix-secondary my-5">Write a review</button>
                    <div class="card bg-transparent mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center gap-2 position-relative">
                                    <div class="avatar avatar-s ">
                                        <img class="rounded-circle "
                                            src="{{ asset('assets') }}/assets/img//team/59.webp" alt="" />

                                    </div><a class="text-body-emphasis fw-semibold stretched-link"
                                        href="#!">Navina Koothrapali</a>
                                </div>
                                <div class="d-flex gap-2">
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-up text-body-quaternary me-1"></span>35</h6>
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-down text-secondary-light me-1"></span>2</h6>
                                </div>
                            </div>
                            <div class="d-flex my-3"><span class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span>
                            </div>
                            <h4 class="mb-2">Memorable day in Wakanda</h4>
                            <p class="text-body-tertiary">Oct 2022</p>
                            <p>First time here in Wakanda, nice weather but one thing can't miss out was the one day
                                highlight city tour guided by Shuri from Panther Travels. Shuri came in earlier to pick
                                me up at the hotel and we started the tour with a good briefing by him. The activities
                                were packed and the information given to me was clear and useful, really appreciated
                                Shuri's knowledge and care for the tour, which included memorable stories of not only
                                Birnin but also people in Wakanda. Look forward to coming back again! Navina Koothrapali
                                from Hong Kong</p>
                            <div class="mt-5 border-start border-translucent ps-4"><a class="fw-bold"
                                    href="#!">Panther Travels Limited</a><span
                                    class="ms-1 text-body-quaternary">replied</span>
                                <p class="mt-2">Great to have your review on our tour. It's our honor to get a
                                    tourist like you. Good luck to you. Hope to see you again.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-transparent mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center gap-2 position-relative">
                                    <div class="avatar avatar-s ">
                                        <img class="rounded-circle "
                                            src="{{ asset('assets') }}/assets/img//team/58.webp" alt="" />

                                    </div><a class="text-body-emphasis fw-semibold stretched-link"
                                        href="#!">Henry Cavill</a>
                                </div>
                                <div class="d-flex gap-2">
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-up text-body-quaternary me-1"></span>24</h6>
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-down text-secondary-light me-1"></span>3</h6>
                                </div>
                            </div>
                            <div class="d-flex my-3"><span class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span>
                            </div>
                            <h4 class="mb-2">Unforgettable experience</h4>
                            <p class="text-body-tertiary">Oct 2022</p>
                            <p>Great tour in beautiful Wakanda. Everything we imagined about Wakanda changed in a day.
                                Kind and lovely people all around. Unforgettable experience.</p>
                            <div class="d-flex gap-2 flex-wrap"><a
                                    href="{{ asset('assets') }}/assets/img/trip/25_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/25.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/26_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/26.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/27_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/27.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/28_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/28.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/29_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/29.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/30_large.jpg"
                                    data-gallery="trip-details-gallery-1"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/30.png" alt="" /></a>
                            </div>
                            <div class="mt-5 border-start border-translucent ps-4"><a class="fw-bold"
                                    href="#!">Panther Travels Limited</a><span
                                    class="ms-1 text-body-quaternary">replied</span>
                                <p class="mt-2">Thanks for this review. It is a great motivation from you. Hope to
                                    see you again in Wakanda. Good luck.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-transparent">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center gap-2 position-relative">
                                    <div class="avatar avatar-s ">
                                        <img class="rounded-circle "
                                            src="{{ asset('assets') }}/assets/img//team/60.webp" alt="" />

                                    </div><a class="text-body-emphasis fw-semibold stretched-link" href="#!">Ibn
                                        Batuta</a>
                                </div>
                                <div class="d-flex gap-2">
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-up text-body-quaternary me-1"></span>45</h6>
                                    <h6 class="text-body-tertiary mb-0"><span
                                            class="fa-solid fa-thumbs-down text-secondary-light me-1"></span>1</h6>
                                </div>
                            </div>
                            <div class="d-flex my-3"><span class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa fa-star text-warning me-1 fs-9"></span><span
                                    class="fa-regular fa-star text-warning-light me-1 fs-9"
                                    data-bs-theme="light"></span>
                            </div>
                            <h4 class="mb-2">Great 1 day trip which makes you feel as if you've seen the whole of
                                Wakanda</h4>
                            <p class="text-body-tertiary">Oct 2022</p>
                            <p>I've seen so much in one day thanks to the great guidance of Mehdi, who customized the
                                trip as per how we felt. I recommend this trip and this guide.</p>
                            <div class="d-flex gap-2 flex-wrap"><a
                                    href="{{ asset('assets') }}/assets/img/trip/31_large.jpg"
                                    data-gallery="trip-details-gallery-2"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/31.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/32_large.jpg"
                                    data-gallery="trip-details-gallery-2"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/32.png" alt="" /></a><a
                                    href="{{ asset('assets') }}/assets/img/trip/33_large.jpg"
                                    data-gallery="trip-details-gallery-2"><img class="img-fluid rounded-2"
                                        src="{{ asset('assets') }}/assets/img/trip/33.png" alt="" /></a>
                            </div>
                            <div class="mt-5 border-start border-translucent ps-4"><a class="fw-bold"
                                    href="#!">Panther Travels Limited</a><span
                                    class="ms-1 text-body-quaternary">replied</span>
                                <p class="mt-2">Thanks for this review. It is a great motivation from you. Hope to
                                    see you again in Wakanda. Good luck.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mt-5 mb-3">Destinasi Wisata Lainnya</h2>
            <div class="row g-3">
                @if ($otherTours->count() > 0)
                    @foreach ($otherTours as $otherTour)
                        <div class="col-md-6 col-xl-4">
                            <div class="hoverbox rounded">
                                @php
                                    $images = json_decode($otherTour->images, true);
                                    $firstImage = $images[0] ?? 'default-image.png'; // Gambar default jika tidak ada gambar
                                @endphp
                                <a href="{{ route('tour.detail', $otherTour->uuid) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $firstImage) }}"
                                        alt="Gambar Destinasi Wisata {{ $otherTour->name }}"
                                        style="width: 100%; height: 250px; object-fit: cover;" />
                                    <div class="backdrop-faded">
                                        <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2">
                                            {{ $otherTour->name }}</h3>
                                        <h5 class="text-secondary-lighter fw-normal mb-3">
                                            <span
                                                class="fa-solid fa-map-marker-alt text-primary  me-2"></span>{{ $otherTour->location }}
                                        </h5>
                                        <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                            <h3 class="text-white fw-bold mb-3 mb-sm-0 mb-md-3 mb-lg-0 fs-8 fs-lg-8">Rp
                                                {{ number_format($otherTour->packages->min('price'), 0, ',', '.') }}
                                            </h3>
                                            <div class="d-flex gap-3">
                                                <h5 class="text-secondary-lighter fw-normal">
                                                    <span
                                                        class="fa-solid fa-clock fs-9 me-2"></span>{{ $otherTour->packages->min('duration') }}
                                                    hari
                                                </h5>
                                                <h5 class="text-secondary-lighter fw-normal">
                                                    <span class="fa-solid fa-user fs-9 me-2"></span>From 1 to
                                                    {{ $otherTour->packages->max('max_people') }} people
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            Tidak ada destinasi wisata lainnya.
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-6">

        <div class="container-medium">
            <div class="bg-holder overlay bg-opacity-75"
                style="background-image:url({{ asset('assets') }}/assets/img/bg/47.png);background-position: center; background-size: cover;">
            </div>
            <!--/.bg-holder-->

            <div class="row position-relative align-items-center gy-3">
                <div class="col-xxl-4 order-1 order-xxl-0">
                    <ul
                        class="list-unstyled d-flex gap-3 gap-xxl-4 flex-wrap mb-0 justify-content-center justify-content-xxl-start">
                        <li><a class="text-secondary-lighter" href="#!">Home</a></li>
                        <li><a class="text-secondary-lighter" href="#!">Terms</a></li>
                        <li><a class="text-secondary-lighter" href="#!">Talent &amp; culture</a></li>
                        <li><a class="text-secondary-lighter" href="#!">Destination</a></li>
                    </ul>
                </div>
                <div class="col-sm-8 col-md-7 col-lg-5 col-xl-4 mx-auto mb-3 mb-xxl-0">
                    <h2 class="mb-4 fw-semibold text-white text-center lh-sm">Subscribe to get notified about the
                        latest news</h2>
                    <div class="d-flex gap-2">
                        <div class="form-icon-container flex-1">
                            <input class="form-control form-icon-input" type="text"
                                placeholder="Your email address" /><span
                                class="fa-solid fa-envelope form-icon text-body fs-9"></span>
                        </div>
                        <button class="btn btn-primary rounded">Sign up</button>
                    </div>
                </div>
                <div class="col-xxl-4 order-2 order-xxl-0">
                    <ul
                        class="list-unstyled d-flex gap-3 gap-xxl-4 flex-wrap mb-0 justify-content-center justify-content-xxl-end">
                        <li><a class="text-secondary-lighter" href="#!">Refund policy</a></li>
                        <li><a class="text-secondary-lighter" href="#!">Sitemap</a></li>
                        <li><a class="text-secondary-lighter" href="#!">EMI Policy</a></li>
                        <li><a class="text-secondary-lighter" href="#!">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
</x-home.layout>
