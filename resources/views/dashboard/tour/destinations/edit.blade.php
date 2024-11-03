<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <h2 class="mb-4">Edit destinasi wisata</h2>
    <div class="row">
        <div class="col-xl-8">
            <form class="row g-3 mb-6 needs-validation" novalidate="" method="POST"
                action="{{ route('tour-destinations.update', $tour->id) }}" onsubmit="showLoader(event)"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" name="name"
                            placeholder="Nama Destinasi" required value="{{ $tour->name }}" />
                        <label for="name">Nama Destinasi</label>
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
        @if ($packages == true)
            <div class="col-xl-4">

                @if ($packages->isEmpty())
                    <div class="alert alert-warning mb-5" role="alert">
                        Belum ada paket wisata yang ditambahkan, silahkan tambahkan paket wisata terlebih dahulu. <a
                            href="{{ route('tour-packages.create') }}" class="btn btn-sm btn-primary">Tambah Paket
                            Wisata</a>
                    </div>
                @else
                    <div class="accordion border-top mb-5" id="accordionExample">
                        @foreach ($packages as $row)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        Paket Wisata {{ $loop->iteration }} - {{ $row->name }}
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse{{ $loop->iteration }}"
                                    aria-labelledby="heading{{ $loop->iteration }}"
                                    data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body pt-0">
                                        <p class="mb-2">Harga: Rp {{ number_format($row->price, 0, ',', '.') }}</p>
                                        <p class="mb-2">Durasi: {{ $row->duration }} hari</p>
                                        <p class="mb-2">Inklusi: {!! $row->inclusions !!}</p>
                                        <p class="mb-2">Ketersediaan: {{ $row->availability }}</p>
                                        <p class="mb-2">Kebijakan Pembatalan: {{ $row->cancellation_policy }}</p>
                                        <p class="mb-2">Kebijakan Pengembalian Dana: {{ $row->refund_policy }}</p>
                                        <p class="mb-2">Status: {{ $row->status }}</p>
                                        <a href="{{ route('tour-packages.edit', $row->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('tour-packages.create') }}" class="btn btn-sm btn-primary mt-5">Tambah Paket
                        Wisata</a>
                @endif
            </div>
        @endif
    </div>

    <div class="mb-9">
        <div class="row g-3" id="gallery-masonry" data-sl-isotope='{"layoutMode":"packery","packery":{"gutter":0}}'>

            @foreach (json_decode($tour->images) as $image)
                <div class="col-sm-6 col-md-8 col-xl-4 isotope-item">
                    <div class="img-zoom-hover position-relative rounded-2 overflow-hidden"><a
                            href="{{ asset('storage/' . $image) }}" data-gallery="gallery-masonry"><img
                                class="rounded-2 w-100 h-100 object-fit-cover" src="{{ asset('storage/' . $image) }}"
                                alt="" />
                            <div class="backdrop-faded position-absolute w-100 bottom-0 start-0 p-3">
                                <h4 class="text-white">Gambar {{ $loop->iteration }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('css')
        <link href="{{ asset('assets') }}/vendors/choices/choices.min.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="{{ asset('assets') }}/vendors/choices/choices.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/tinymce/tinymce.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/isotope-packery/packery-mode.pkgd.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/glightbox/glightbox.min.js"></script>
    @endpush
</x-dash.layout>
