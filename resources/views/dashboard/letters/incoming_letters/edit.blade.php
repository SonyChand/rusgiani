<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot
    <h2 class="mb-4">Edit surat masuk</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6 needs-validation" novalidate="" method="POST"
                action="{{ route('incoming-letters.update', $letter->id) }}" onsubmit="convertToJson()"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Updated input fields for letters -->
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Sumber/Asal Surat</label>
                        <select class="form-select" id="source" data-choices="data-choices" multiple="multiple"
                            data-options='{"removeItemButton":true,"placeholder":true}' required name="source[]">
                            <option hidden value="">Pilih Sumber/Asal Surat (Bisa lebih dari 1)</option>
                            @php
                                $source = [
                                    'provinsi',
                                    'bupati',
                                    'puskesmas',
                                    'dinas_terkait',
                                    'lsm',
                                    'lainnya',
                                    'surat_kabar',
                                ];
                                $letterSource = is_array(old('source', json_decode($letter->source_letter, true)))
                                    ? old('source', json_decode($letter->source_letter, true))
                                    : [];
                            @endphp
                            @foreach ($source as $row)
                                <option value="{{ $row }}"
                                    {{ in_array($row, $letterSource) ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $row)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Ditujukan kepada</label>
                        <select class="form-select" id="addressed_to" data-choices="data-choices" multiple="multiple"
                            data-options='{"removeItemButton":true,"placeholder":true}' required name="addressed_to[]">
                            <option hidden value="">Pilih Ditujukan kepada (Bisa lebih dari 1)</option>
                            @php
                                $addressed_to = ['kepala_dinas', 'kepala_bidang_p2p', 'kepala_bidan_yankes'];
                                $letterAddress = is_array(old('addressed_to', json_decode($letter->addressed_to, true)))
                                    ? old('addressed_to', json_decode($letter->addressed_to, true))
                                    : [];
                            @endphp
                            @foreach ($addressed_to as $row)
                                <option value="{{ $row }}"
                                    {{ in_array($row, $letterAddress) ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $row)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="number" type="text" name="letter_number"
                            placeholder="Nomor Surat" value="{{ old('letter_number', $letter->letter_number) }}"
                            required />
                        <label for="number">Nomor Surat</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="letter_date" type="date" name="letter_date"
                            value="{{ old('letter_date', $letter->letter_date) }}" required />
                        <label for="letter_date">Tanggal Surat</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="subject" type="text" name="subject" placeholder="Perihal"
                            value="{{ old('subject', $letter->subject) }}" required />
                        <label for="subject">Perihal</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating form-floating-advance-select">
                        <label for="attachment">Lampiran</label>
                        <select class="form-select" id="organizerSingle2" data-choices="data-choices" size="1"
                            name="attachment" data-options='{"removeItemButton":true,"placeholder":true}' required>
                            <option value="" hidden>Pilih Lampiran</option>
                            <option value="ada"
                                {{ old('attachment', $letter->attachment) == 'ada' ? 'selected' : '' }}>Ada</option>
                            <option value="tidak_ada"
                                {{ old('attachment', $letter->attachment) == 'tidak_ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating form-floating-advance-select">
                        <label>Diteruskan/Disposisi</label>
                        <select class="form-select" id="forwarded_disposition" data-choices="data-choices"
                            multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'
                            name="forwarded_disposition[]" required>
                            <option hidden value="">Pilih Diteruskan/Disposisi (Bisa lebih dari 1)</option>
                            @php
                                $forwarded = ['kepala_dinas', 'kepala_bidang_p2p', 'kepala_bidan_yankes'];
                                $letterForward = is_array(
                                    old('forwarded_disposition', json_decode($letter->forwarded_disposition, true)),
                                )
                                    ? old('forwarded_disposition', json_decode($letter->forwarded_disposition, true))
                                    : [];
                            @endphp
                            @foreach ($forwarded as $row)
                                <option value="{{ $row }}"
                                    {{ in_array($row, $letterForward) ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $row)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-floating">
                        <input class="form-control" id="operator_name" type="text" name="operator_name"
                            placeholder="Nama Operator/Admin"
                            value="{{ old('operator_name', $letter->operator_name) }}" required />
                        <label for="operator_name">Nama Operator/Admin</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="file_path">Upload Surat Masuk</label>
                    <input class="form-control" id="file_path" type="file" name="file_path" accept=".pdf,image/*" />
                    <small class="text-muted">hanya format PDF dan gambar. Maksimal ukuran: 1MB.</small>
                    <script>
                        document.getElementById('file_path').addEventListener('change', function() {
                            const file = this.files[0];
                            if (file && file.size > 1048576) { // 1MB in bytes
                                alert('File melebihi 1MB');
                                this.value = ''; // Clear the input
                            }
                        });
                    </script>
                </div>
                <!-- End of updated input fields -->
                <div class="col-12 gy-6">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button class="btn btn-phoenix-primary px-5" type="button"
                                onclick="window.history.back()">Batal</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary px-5 px-sm-15">Edit</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="source_json" id="source_json"
                    value="{{ json_encode($letter->source) }}">
                <input type="hidden" name="addressed_to_json" id="addressed_to_json"
                    value="{{ json_encode($letter->addressed_to) }}">
                <input type="hidden" name="forwarded_disposition_json" id="forwarded_disposition_json"
                    value="{{ json_encode($letter->forwarded_disposition) }}">
            </form>
        </div>
    </div>
    <script>
        function convertToJson() {
            showLoader();
            const sourceSelect = document.getElementById('source');
            const addressedToSelect = document.getElementById('addressed_to');
            const forwardedDispositionSelect = document.getElementById('forwarded_disposition');

            document.getElementById('source_json').value = JSON.stringify(Array.from(sourceSelect.selectedOptions).map(
                option => option.value));
            document.getElementById('addressed_to_json').value = JSON.stringify(Array.from(addressedToSelect
                .selectedOptions).map(option => option.value));
            document.getElementById('forwarded_disposition_json').value = JSON.stringify(Array.from(
                forwardedDispositionSelect.selectedOptions).map(option => option.value));
        }
    </script>
</x-dash.layout>
