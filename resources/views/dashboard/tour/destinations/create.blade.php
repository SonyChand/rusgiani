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
                            placeholder="Nama Destinasi" required />
                        <label for="name">Nama Destinasi</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control tinymce" data-tinymce="{}" id="description" name="description" placeholder="Deskripsi"
                        style="height: 250px" required></textarea>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="price" type="number" step="0.01" name="price"
                            placeholder="Harga" required />
                        <label for="price">Harga</label>
                    </div>
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
</x-dash.layout>
