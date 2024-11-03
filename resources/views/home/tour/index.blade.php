<x-home.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <section class="py-0">
        <div class="bg-holder overlay bg-opacity-50"
            style="background-image:url({{ asset('assets') }}/assets/img/bg/46.png);background-position: center; background-size: cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container-medium position-relative pt-11 pb-15">
            <h2 class="text-center text-white mb-4">Where do you want to go?</h2>
            <div class="position-relative w-md-70 w-lg-50 mx-auto mb-4 mb-lg-10">
                <input class="form-control py-3 ps-4 pe-6 rounded-pill fs-8" type="text"
                    placeholder="Search for a location" /><span
                    class="fa-solid fa-search position-absolute top-0 end-0 mt-4 me-4 fs-8 text-body-tertiary"
                    data-fa-transform="up-3"></span>
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-none d-lg-flex gap-2">
                    <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type" id="attraction-shows"
                        checked="checked" />
                    <label class="btn btn-phoenix-secondary text-nowrap px-3" for="attraction-shows">Attraction &amp;
                        Shows</label>
                    <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type" id="activities" />
                    <label class="btn btn-phoenix-secondary text-nowrap px-3" for="activities">Activities</label>
                    <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type" id="day-tours" />
                    <label class="btn btn-phoenix-secondary text-nowrap px-3" for="day-tours">Day-tours</label>
                    <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type" id="adventures" />
                    <label class="btn btn-phoenix-secondary text-nowrap px-3" for="adventures">Adventures</label>
                    <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type" id="sight-seeing" />
                    <label class="btn btn-phoenix-secondary text-nowrap px-3" for="sight-seeing">Sight-seeing</label>
                </div>
                <button class="btn btn-phoenix-secondary ms-lg-auto" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#tripFilterOffcanvas" aria-controls="tripFilterOffcanvas"><span
                        class="fa-solid fa-filter fs-10 me-2"></span>Filter</button>
            </div>
        </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-0 pb-9 mt-n13">

        <div class="container-medium">
            <div class="row g-3">
                @foreach ($tour as $row)
                    <div class="col-md-6 col-xl-4">
                        <div class="hoverbox rounded">
                            <a href="{{ route('tour.detail', $row->uuid) }}">
                                @php
                                    $images = json_decode($row->images, true);
                                    $firstImage = $images[0] ?? 'default-image.png'; // Gambar default jika tidak ada gambar
                                @endphp
                                <img class="img-fluid" src="{{ asset('storage/' . $firstImage) }}"
                                    alt="{{ $row->name }}" style="width: 100%; height: 250px; object-fit: cover;" />

                                <div class="backdrop-faded">
                                    <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2">
                                        {{ $row->name }}
                                    </h3>
                                    <h5 class="text-secondary-lighter fw-normal mb-3">
                                        <span class="fa-solid fa-map-marker-alt text-primary me-2"></span>
                                        {{ $row->location }}
                                    </h5>
                                    <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                        <h3 class="text-white fw-bold mb-3 mb-sm-0 mb-md-3 mb-lg-0 fs-7 fs-lg-6">
                                            Rp {{ number_format($row->packages->min('price'), 0, ',', '.') }}
                                        </h3>
                                        <div class="d-flex gap-3">
                                            <h5 class="text-secondary-lighter fw-normal">
                                                <span class="fa-solid fa-clock fs-9 me-2"></span>
                                                {{ $row->packages->max('duration') }} hari
                                            </h5>
                                            <h5 class="text-secondary-lighter fw-normal">
                                                <span class="fa-solid fa-user fs-9 me-2"></span>
                                                Min 1
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 position-relative text-center">
                <hr class="m-0 position-absolute top-50 translate-middle-y w-100">
                <button class="btn btn-phoenix-secondary rounded-pill position-relative">Show more</button>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <div class="offcanvas offcanvas-end" tabindex="-1" id="tripFilterOffcanvas"
        aria-labelledby="tripFilterOffcanvasLabel">
        <div class="offcanvas-header p-4 bg-body-highlight">
            <h5 class="mb-0 text-body-highlight" id="tripFilterOffcanvasLabel">Filter</h5>
            <button class="btn btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body scrollbar px-4 pt-4 pb-5">
            <h4 class="text-body-highlight mb-4">Price Range</h4>
            <div class="row g-2">
                <div class="col-6">
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" type="text"
                            placeholder="Minimum amount: $245" /><span
                            class="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" type="text"
                            placeholder="Maximum amount: $245" /><span
                            class="fa-solid fa-dollar-sign form-icon text-body-tertiary fs-9"></span>
                    </div>
                </div>
            </div>
            <div class="noUi-primary-lighter noUi-slider-large noUi-handle-primary noUi-handle-circle ps-5 pe-3 mt-3"
                data-nouislider='{"range":{"min":0,"max":250},"start":[20,150],"connect":true}'></div>
            <hr class="my-5" />
            <div class="d-lg-none">
                <h4 class="mb-4 text-body-highlight">Category</h4>
                <div class="row g-2">
                    <div class="col-6">
                        <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type"
                            id="attraction-shows-offcanvas" checked="checked" />
                        <label class="btn btn-phoenix-secondary text-nowrap px-3 w-100"
                            for="attraction-shows-offcanvas">Attraction &amp; Shows</label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type"
                            id="activities-offcanvas" />
                        <label class="btn btn-phoenix-secondary text-nowrap px-3 w-100"
                            for="activities-offcanvas">Activities</label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type"
                            id="day-tours-offcanvas" />
                        <label class="btn btn-phoenix-secondary text-nowrap px-3 w-100"
                            for="day-tours-offcanvas">Day-tours</label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type"
                            id="adventures-offcanvas" />
                        <label class="btn btn-phoenix-secondary text-nowrap px-3 w-100"
                            for="adventures-offcanvas">Adventures</label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check trip-filter-checkbox" type="checkbox" name="trip-type"
                            id="Sight-seeing-offcanvas" />
                        <label class="btn btn-phoenix-secondary text-nowrap px-3 w-100"
                            for="Sight-seeing-offcanvas">Sight-seeing</label>
                    </div>
                </div>
                <hr class="my-5" />
            </div>
            <h4 class="mb-4 text-body-highlight">Duration</h4>
            <div class="row g-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="durationLess6" type="checkbox" value="durationLess6" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="durationLess6">Less
                            than 6 hours</label>
                    </div>
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="duration12to24" type="checkbox"
                            value="duration12to24" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="duration12to24">12 -
                            24 hours</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="duration6to12" type="checkbox" value="duration6to12" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="duration6to12">6 - 12
                            hours</label>
                    </div>
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="duration24plus" type="checkbox"
                            value="duration24plus" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="duration24plus">24+
                            hours</label>
                    </div>
                </div>
            </div>
            <hr class="my-5" />
            <h4 class="mb-4 text-body-highlight">Time</h4>
            <div class="row g-2">
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration8AMTo10AM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration8AMTo10AM">8 AM - 10
                        AM</label>
                </div>
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration10AMTo12PM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration10AMTo12PM">10 AM -
                        12 PM</label>
                </div>
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration12PMTo2PM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration12PMTo2PM">12 PM - 2
                        PM</label>
                </div>
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration2PMTo4PM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration2PMTo4PM">2 PM - 4
                        PM</label>
                </div>
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration4PMTo6PM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration4PMTo6PM">4 PM - 6
                        PM</label>
                </div>
                <div class="col-4">
                    <input class="btn-check flight-filter-checkbox" type="checkbox" name="undefined"
                        id="duration6PMTo8PM" />
                    <label class="btn btn-phoenix-secondary text-nowrap w-100 px-0" for="duration6PMTo8PM">6 PM - 8
                        PM</label>
                </div>
            </div>
            <hr class="my-5" />
            <h4 class="mb-4 text-body-highlight">Travel Style</h4>
            <div class="row g-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="soloTravel" type="checkbox" value="soloTravel" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="soloTravel">Solo
                            Travel</label>
                    </div>
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="familyFriendly" type="checkbox"
                            value="familyFriendly" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="familyFriendly">Family-Friendly</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="groupTravel" type="checkbox" value="groupTravel" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="groupTravel">Group
                            Travel</label>
                    </div>
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="adventureTravel" type="checkbox"
                            value="adventureTravel" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="adventureTravel">Adventure Travel</label>
                    </div>
                </div>
            </div><a class="fw-bold fs-9 mt-3 d-inline-block" href="#!">Show more items</a>
            <hr class="my-5" />
            <h4 class="mb-4">Tags</h4>
            <h5 class="fw-normal my-3 text-body-quaternary">Destination Type</h5>
            <div class="row gx-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="beach" type="checkbox" value="beach" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="beach">Beach</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="mountain" type="checkbox" value="mountain" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="mountain">Mountain</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="city" type="checkbox" value="city" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal" for="city">City</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="countryside" type="checkbox" value="countryside" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="countryside">Countryside</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="island" type="checkbox" value="island" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="island">Island</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="jungle" type="checkbox" value="jungle" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="jungle">Jungle</label>
                    </div>
                </div>
            </div>
            <h5 class="fw-normal my-3 text-body-quaternary">Activities</h5>
            <div class="row gx-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="hiking" type="checkbox" value="hiking" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="hiking">Hiking</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="camping" type="checkbox" value="camping" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="camping">Camping</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="sightseeing" type="checkbox" value="sightseeing" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="sightseeing">Sightseeing</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="wildlifeViewing" type="checkbox"
                            value="wildlifeViewing" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="wildlifeViewing">Wildlife Viewing</label>
                    </div>
                </div>
            </div>
            <h5 class="fw-normal my-3 text-body-quaternary">Season</h5>
            <div class="row gx-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="summer" type="checkbox" value="summer" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="summer">Summer</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="winter" type="checkbox" value="winter" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="winter">Winter</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="spring" type="checkbox" value="spring" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="spring">Spring</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="fallAutumn" type="checkbox" value="fallAutumn" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="fallAutumn">Fall/Autumn</label>
                    </div>
                </div>
            </div>
            <h5 class="fw-normal my-3 text-body-quaternary">Budget</h5>
            <div class="row gx-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="luxury" type="checkbox" value="luxury" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="luxury">Luxury</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="midRange" type="checkbox" value="midRange" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="midRange">Mid-range</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="budget" type="checkbox" value="budget" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="budget">Budget</label>
                    </div>
                </div>
            </div>
            <h5 class="fw-normal my-3 text-body-quaternary">Accommodation</h5>
            <div class="row gx-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="hotel" type="checkbox" value="hotel" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="hotel">Hotel</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="resort" type="checkbox" value="resort" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="resort">Resort</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="vacationRental" type="checkbox"
                            value="vacationRental" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="vacationRental">Vacation Rental</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" id="homestay" type="checkbox" value="homestay" />
                        <label class="form-check-label fs-8 text-body-highlight fw-normal"
                            for="homestay">Homestay</label>
                    </div>
                </div>
            </div><a class="fw-bold fs-9 mt-3 d-inline-block" href="#!">Less items</a>
        </div>
        <div class="p-4 border-top border-translucent d-flex gap-2">
            <button class="btn btn-lg btn-phoenix-primary"><span
                    class="fa-solid fa-arrows-rotate me-2 fs-9"></span>Reset</button>
            <button class="btn btn-lg btn-primary flex-1"> <span class="fa-solid fa-search me-2 fs-9"></span>Update
                result</button>
        </div>
    </div>


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
