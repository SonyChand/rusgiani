<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <h2 class="mb-4">Tambah Paket Wisata</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6 needs-validation" novalidate="" method="POST"
                action="{{ route('tour-packages.store') }}" onsubmit="showLoader(event)" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Tempat Wisata</label>
                        <select class="form-select" id="destination_id" required name="destination_id">
                            <option hidden value="">Pilih Tempat Wisata</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" name="name"
                            placeholder="Nama Paket" required />
                        <label for="name">Nama Paket</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control tinymce" data-tinymce="{}" id="description" name="description" placeholder="Deskripsi"
                        style="height: 250px"></textarea>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="price" type="number" step="0.01" name="price"
                            placeholder="Harga" required />
                        <label for="price">Harga</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="duration" type="number" name="duration"
                            placeholder="Durasi (hari)" required />
                        <label for="duration">Durasi (hari)</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="inclusions">Inklusi</label>
                    <textarea class="form-control tinymce" data-tinymce="{}" id="inclusions" name="inclusions" placeholder="Inklusi"
                        style="height: 250px"></textarea>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Ketersediaan</label>
                        <select class="form-select" id="availability" required name="availability">
                            <option hidden value="">Pilih Ketersediaan</option>
                            <option value="terbatas">Terbatas</option>
                            <option value="tidak_terbatas">Tidak Terbatas</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Kebijakan Pembatalan</label>
                        <select class="form-select" id="cancellation_policy" required name="cancellation_policy">
                            <option hidden value="">Pilih Kebijakan Pembatalan</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Kebijakan Pengembalian Dana</label>
                        <select class="form-select" id="refund_policy" required name="refund_policy">
                            <option hidden value="">Pilih Kebijakan Pengembalian Dana</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Status</label>
                        <select class="form-select" id="status" required name="status">
                            <option hidden value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>
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
