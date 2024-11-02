<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <h2 class="mb-4">Edit paket wisata</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6 needs-validation" novalidate="" method="POST"
                action="{{ route('tour-destinations.update', $tour->id) }}" onsubmit="showLoader(event)"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" name="name"
                            placeholder="Nama Paket" required value="{{ $tour->name }}" />
                        <label for="name">Nama Paket</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control tinymce" data-tinymce="{}" id="description" name="description" placeholder="Deskripsi"
                        style="height: 250px">{{ $tour->description }}</textarea>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="location" type="text" name="location" placeholder="Lokasi"
                            required value="{{ $tour->location }}" />
                        <label for="location">Lokasi</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="maps" type="text" name="maps"
                            placeholder="Google Maps" required value="{{ $tour->maps }}" />
                        <label for="maps">Google Maps</label>
                    </div>
                </div>
                <div class="col-12 gy-6">
                    @php
                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
                    @endphp
                    <div class="form-floating form-floating-advance-select">
                        <label>Hari Beroperasi</label>
                        <select class="form-select" id="organizerMultiple" data-choices="data-choices"
                            multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}' required
                            name="operating_days[]">
                            <option hidden value="">Pilih Hari</option>
                            @foreach ($hari as $row)
                                <option value="{{ $row }}"
                                    {{ in_array($row, $tour->operating_days) ? 'selected' : '' }}>{{ $row }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="opening_hours" type="time" name="opening_hours"
                            placeholder="Jam Buka" required value="{{ $tour->opening_hours }}" />
                        <label for="opening_hours">Jam Buka</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="closing_hours" type="time" name="closing_hours"
                            placeholder="Jam Tutup" required value="{{ $tour->closing_hours }}" />
                        <label for="closing_hours">Jam Tutup</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Status Wisata</label>
                        <select class="form-select" id="status" required name="status">
                            <option hidden value="">Pilih Status Wisata</option>
                            <option value="buka" {{ $tour->status == 'buka' ? 'selected' : '' }}>Buka</option>
                            <option value="tutup" {{ $tour->status == 'tutup' ? 'selected' : '' }}>Tutup</option>
                            <option value="sementara_tutup" {{ $tour->status == 'sementara_tutup' ? 'selected' : '' }}>
                                Sementara Tutup
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="images">Gambar</label>
                    <input class="form-control" id="images" type="file" name="images[]" placeholder="Image"
                        multiple />

                    <small class="text-muted">hanya format gambar (jpg, jpeg, png, webp, gif, dsb). Bisa lebih dari
                        1. (Jika mengupload gambar yang baru, gambar yang sebelumnya akan terhapus)</small>
                </div>
                <div class="col-12 gy-6">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button class="btn btn-phoenix-primary px-5" type="button"
                                onclick="window.history.back()">Cancel</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary px-5 px-sm-15">Edit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="mb-4">
        <div class="tab-content" id="gallery-slider-tab-content">
            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab"
                tabindex="0">
                <div class="swiper-theme-container swiper-slider-gallery">
                    <div class="swiper theme-slider"
                        data-swiper='{"speed":500,"spaceBetween":16,"slidesPerView":"auto","simulateTouch":false,"centeredSlides":true,"initialSlide":1,"thumb":{"slidesPerView":4,"spaceBetween":8,"freeMode":true,"loop":true,"watchSlidesProgress":true,"watchSlidesVisibility":true,"grabCursor":true,"breakpoints":{"540":{"slidesPerView":7},"768":{"slidesPerView":8},"1200":{"slidesPerView":9}}}}'>
                        <div class="swiper-wrapper align-items-center" id="gallery-slider-all">
                            @foreach (json_decode($tour->images, true) as $img)
                                <div
                                    class="swiper-slide position-relative rounded-2 overflow-hidden landscape ecommerce">
                                    <a href="{{ asset('storage/' . $img) }}" data-gallery="gallery-slider-all"> <img
                                            class="w-100 h-100 object-fit-cover" src="{{ asset('storage/' . $img) }}"
                                            alt="" /></a>
                                    <div class="backdrop-faded d-flex justify-content-between p-5">
                                        <div>
                                            <h3 class="text-white mb-2">Gambar {{ $loop->iteration }}</h3>
                                            <p class="mb-0 text-secondary-light">
                                                {{ $tour->descripstion }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ecommerce-tab-pane" role="tabpanel" aria-labelledby="ecommerce-tab"
                tabindex="0">
                <div class="swiper-theme-container swiper-slider-gallery">
                    <div class="swiper theme-slider"
                        data-swiper='{"speed":500,"spaceBetween":16,"slidesPerView":"auto","simulateTouch":false,"centeredSlides":true,"initialSlide":1,"thumb":{"slidesPerView":4,"spaceBetween":8,"freeMode":true,"loop":false,"watchSlidesProgress":true,"watchSlidesVisibility":true,"grabCursor":true,"breakpoints":{"540":{"slidesPerView":7},"768":{"slidesPerView":8},"1200":{"slidesPerView":9}}}}'>
                        <div class="swiper-wrapper align-items-center" id="gallery-slider-ecommerce">
                            @foreach (json_decode($tour->images, true) as $img)
                                <div
                                    class="swiper-slide position-relative rounded-2 overflow-hidden landscape ecommerce">
                                    <a href="{{ asset('storage/' . $img) }}" data-gallery="gallery-slider-ecommerce">
                                        <img class="w-100 h-100 object-fit-cover"
                                            src="{{ asset('storage/' . $img) }}" alt="" /></a>
                                    <div class="backdrop-faded d-flex justify-content-between p-5">
                                        <div>
                                            <h3 class="text-white mb-2">Nature</h3>
                                            <p class="mb-0 text-secondary-light">Description text</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="project-management-tab-pane" role="tabpanel"
                aria-labelledby="project-management-tab" tabindex="0">
                <div class="swiper-theme-container swiper-slider-gallery">
                    <div class="swiper theme-slider"
                        data-swiper='{"speed":500,"spaceBetween":16,"slidesPerView":"auto","simulateTouch":false,"centeredSlides":true,"initialSlide":1,"thumb":{"slidesPerView":4,"spaceBetween":8,"freeMode":true,"loop":false,"watchSlidesProgress":true,"watchSlidesVisibility":true,"grabCursor":true,"breakpoints":{"540":{"slidesPerView":7},"768":{"slidesPerView":8},"1200":{"slidesPerView":9}}}}'>
                        <div class="swiper-wrapper align-items-center" id="gallery-slider-project-management">
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden square project-management">
                                <a href="{{ asset('assets') }}/assets/img/gallery/103.png"
                                    data-gallery="gallery-slider-project-management"> <img
                                        class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/103.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Ear Buds</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden portrait project-management photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/71.png"
                                    data-gallery="gallery-slider-project-management"> <img
                                        class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/71.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Sunset</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden landscape project-management">
                                <a href="{{ asset('assets') }}/assets/img/gallery/96.mp4"
                                    data-gallery="gallery-slider-project-management">
                                    <div class="video-container position-relative h-100">
                                        <video class="video w-100 h-100 object-fit-cover overflow-hidden rounded-2"
                                            muted="muted" data-play-on-hover="data-play-on-hover"
                                            poster="{{ asset('assets') }}/assets/img/gallery/96.png">
                                            <source src="{{ asset('assets') }}/assets/img/gallery/96.mp4"
                                                type="video/mp4" />
                                        </video>
                                        <div
                                            class="video-icon position-absolute top-50 start-50 translate-middle bg-body-emphasis rounded-pill bg-opacity-50">
                                            <span class="fa-solid fa-video text-body fs-9 fs-sm-8"></span>
                                        </div>
                                    </div><img class="d-none" src="{{ asset('assets') }}/assets/img/gallery/96.png"
                                        alt="" />
                                </a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Mountain Sunset</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden portrait project-management">
                                <a href="{{ asset('assets') }}/assets/img/gallery/66.png"
                                    data-gallery="gallery-slider-project-management"> <img
                                        class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/66.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Desert Photography</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden square project-management">
                                <a href="{{ asset('assets') }}/assets/img/gallery/42.png"
                                    data-gallery="gallery-slider-project-management"> <img
                                        class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/42.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">London</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="photography-tab-pane" role="tabpanel" aria-labelledby="photography-tab"
                tabindex="0">
                <div class="swiper-theme-container swiper-slider-gallery">
                    <div class="swiper theme-slider"
                        data-swiper='{"speed":500,"spaceBetween":16,"slidesPerView":"auto","simulateTouch":false,"centeredSlides":true,"initialSlide":1,"thumb":{"slidesPerView":4,"spaceBetween":8,"freeMode":true,"loop":false,"watchSlidesProgress":true,"watchSlidesVisibility":true,"grabCursor":true,"breakpoints":{"540":{"slidesPerView":7},"768":{"slidesPerView":8},"1200":{"slidesPerView":9}}}}'>
                        <div class="swiper-wrapper align-items-center" id="gallery-slider-photography">
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden landscape photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/101.png"
                                    data-gallery="gallery-slider-photography">
                                    <img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/101.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Pixel 4</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden landscape ecommerce photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/104.png"
                                    data-gallery="gallery-slider-photography">
                                    <img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/104.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Sunset Horizon</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden portrait project-management photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/71.png"
                                    data-gallery="gallery-slider-photography">
                                    <img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/71.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Sunset</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden landscape photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/105.png"
                                    data-gallery="gallery-slider-photography">
                                    <img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('assets') }}/assets/img/gallery/105.png" alt="" /></a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Ear Buds</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide position-relative rounded-2 overflow-hidden square ecommerce photography">
                                <a href="{{ asset('assets') }}/assets/img/gallery/97.mp4"
                                    data-gallery="gallery-slider-photography">
                                    <div class="video-container position-relative h-100">
                                        <video class="video w-100 h-100 object-fit-cover overflow-hidden rounded-2"
                                            muted="muted" data-play-on-hover="data-play-on-hover"
                                            poster="{{ asset('assets') }}/assets/img/gallery/97.png">
                                            <source src="{{ asset('assets') }}/assets/img/gallery/97.mp4"
                                                type="video/mp4" />
                                        </video>
                                        <div
                                            class="video-icon position-absolute top-50 start-50 translate-middle bg-body-emphasis rounded-pill bg-opacity-50">
                                            <span class="fa-solid fa-video text-body fs-9 fs-sm-8"></span>
                                        </div>
                                    </div><img class="d-none" src="{{ asset('assets') }}/assets/img/gallery/97.png"
                                        alt="" />
                                </a>
                                <div class="backdrop-faded d-flex justify-content-between p-5">
                                    <div>
                                        <h3 class="text-white mb-2">Bike Ride</h3>
                                        <p class="mb-0 text-secondary-light">Description text</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle dropdown-caret-none text-white"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-bs-reference="parent"><span
                                                class="fas fa-ellipsis-h"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                href="#!">Edit</a><a class="dropdown-item text-danger"
                                                href="#!">Delete</a><a class="dropdown-item"
                                                href="#!">Download</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dash.layout>
