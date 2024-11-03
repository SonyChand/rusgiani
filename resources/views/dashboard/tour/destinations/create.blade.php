<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <h2 class="mb-4">Tambah Destinasi Wisata</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6 needs-validation" novalidate="" method="POST"
                action="{{ route('tour-destinations.store') }}" onsubmit="showLoader()" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" name="name"
                            placeholder="Nama Tempat Wisata" required />
                        <label for="name">Nama Tempat Wisata</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control tinymce" data-tinymce="{}" id="description" name="description" placeholder="Deskripsi"
                        style="height: 250px"></textarea>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="location" type="text" name="location" placeholder="Lokasi"
                            required />
                        <label for="location">Lokasi</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="maps" type="text" name="maps"
                            placeholder="Google Maps" required />
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
                            name="operating_days[]" required>
                            <option hidden value="">Pilih Hari</option>
                            @foreach ($hari as $row)
                                <option value="{{ $row }}">{{ $row }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="opening_hours" type="time" name="opening_hours"
                            placeholder="Jam Buka" required />
                        <label for="opening_hours">Jam Buka</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="closing_hours" type="time" name="closing_hours"
                            placeholder="Jam Tutup" required />
                        <label for="closing_hours">Jam Tutup</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Status Wisata</label>
                        <select class="form-select" id="status" required name="status">
                            <option hidden value="">Pilih Status Wisata</option>
                            <option value="buka">Buka</option>
                            <option value="tutup">Tutup</option>
                            <option value="sementara_tutup">
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
                        1.</small>
                </div>
                <div class="col-12 gy-6">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button class="btn btn-phoenix-primary px-5" type="button"
                                onclick="window.history.back()">Cancel</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary px-5 px-sm-15">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('css')
        <link href="{{ asset('assets') }}/vendors/choices/choices.min.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script src="{{ asset('assets') }}/vendors/choices/choices.min.js"></script>
        <script src="{{ asset('assets') }}/vendors/tinymce/tinymce.min.js"></script>
    @endpush
</x-dash.layout>
