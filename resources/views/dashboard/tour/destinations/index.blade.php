<x-dash.layout>
    @slot('title')
        {{ $title }}
    @endslot

    <div class="mb-9">
        <div id="touristDestinations"
            data-list='{"valueNames":["id","name", "location", "maps"],"page":6,"pagination":true}'>
            <div class="row mb-4 gx-6 gy-3 align-items-center">
                <div class="col-auto">
                    <h2 class="mb-0">Destinasi Wisata<span class="fw-normal text-body-tertiary ms-3"></span></h2>
                </div>
            </div>
            <form method="POST" action="{{ route('tour-destinations.bulkDestroy') }}" id="bulk-delete-form">
                @csrf
                @method('DELETE')
                <div class="row g-3 justify-content-between align-items-end mb-4">
                    <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center">
                            @can('tour_destination-create')
                                <div class="mt-3 mx-2">
                                    <a class="btn btn-primary btn-sm" href="{{ route('tour-destinations.create') }}">
                                        <i class="fa-solid fa-plus me-2"></i>Tambah
                                    </a>
                                </div>
                            @endcan

                            @can('tour_destination-delete')
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger btn-sm" id="delete-selected"
                                        onclick="return confirm('Apakah anda yakin?')" disabled>
                                        <span class="fas fa-trash me-2"></span>Hapus yang dipilih
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto">
                        <div class="search-box me-3">
                            <form class="position-relative">
                                <input class="form-control search-input search" type="search"
                                    placeholder="Cari destinasi" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table fs-9 mb-0 border-top border-translucent">
                        <thead>
                            <tr>
                                <th class="ps-3" style="width:2%;">
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th class="sort ps-3" scope="col" data-sort="id" style="width:6%;">ID</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="name">Nama</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="hari">
                                    Hari Operasi</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="jam">
                                    Jam Operasi</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="status">
                                    Status Wisata</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="location">Lokasi</th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="maps">Google Maps
                                </th>
                                <th class="sort white-space-nowrap ps-0" scope="col" data-sort="image">Gambar</th>
                                @canany(['tour_destination-edit', 'tour_destination-delete'])
                                    <th class="sort text-end" scope="col"></th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="list" id="destination-list-table-body">
                            @php $i = 0; @endphp
                            @foreach ($destinations as $destination)
                                <tr class="position-static">
                                    <td class="text-center time white-space-nowrap ps-0 id py-4">
                                        <input type="checkbox" name="destinationIds[]" value="{{ $destination->id }}"
                                            class="select-item">
                                    </td>
                                    <td class="text-center time white-space-nowrap ps-0 id py-4">{{ ++$i }}
                                    </td>
                                    <td class="time white-space-nowrap ps-0 name py-4">{{ $destination->name }}</td>
                                    <td class="time white-space-nowrap ps-0 hari py-4">
                                        <ul>
                                            @foreach ($destination->operating_days as $day)
                                                <li>{{ $day }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td
                                        class="time white
                                    -space-nowrap ps-0 jam py-4">
                                        {{ $destination->opening_hours }} - {{ $destination->closing_hours }}</td>
                                    <td
                                        class="time white
                                    -space-nowrap ps-0 status py-4">
                                        {{ ucwords(str_replace('_', ' ', $destination->status)) }}
                                    </td>
                                    <td class="time white-space-nowrap ps-0 location py-4">{{ $destination->location }}
                                    </td>
                                    <td class="time white-space-nowrap ps-0 maps py-4">

                                        <div class="mapouter">
                                            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0"
                                                    scrolling="no" marginheight="0" marginwidth="0"
                                                    src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;q={{ $destination->maps }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                                    href="https://sprunkin.com/">Sprunki</a></div>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    width: 200px;
                                                    height: 200px;
                                                }

                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    width: 200px;
                                                    height: 200px;
                                                }

                                                .gmap_iframe {
                                                    width: 200px !important;
                                                    height: 200px !important;
                                                }
                                            </style>
                                        </div>
                                    </td>
                                    <td class="time white-space-nowrap ps-0 image py-4">
                                        @if (json_decode($destination->images))
                                            {{ count(json_decode($destination->images)) }} gambar
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    @canany(['tour_destination-edit', 'tour_destination-delete'])
                                        <td class="text-end white-space-nowrap pe-0 action">
                                            <div class="btn-reveal-trigger position-static">
                                                <button
                                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                    <span class="fas fa-ellipsis-h fs-10"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                    @can('tour_destination-edit')
                                                        <a class="dropdown-item"
                                                            href="{{ route('tour-destinations.edit', $destination->id) }}">Edit</a>
                                                    @endcan
                                                    @can('tour_destination-delete')
                                                        <div class="dropdown-divider"></div>
                                                        <form
                                                            action="{{ route('tour-destinations.destroy', $destination->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger"
                                                                onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div
                    class="d-flex flex-wrap align-items-center justify-content-between py-3 pe-0 fs-9 border-bottom border-translucent">
                    <div class="d-flex">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">
                        </p>
                        <a class="fw-semibold" href="#!" data-list-view="*">View all<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        <a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                    <div class="d-flex">
                        <button class="page-link" data-list-pagination="prev"><span
                                class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination"></ul>
                        <button class="page-link pe-0" data-list-pagination="next"><span
                                class="fas fa-chevron-right"></span></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-dash.layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('select-all');
        const deleteButton = document.getElementById('delete-selected');
        const checkboxes = document.querySelectorAll('.select-item');
        let selectedItems = new Set();

        function updateCheckboxes() {
            checkboxes.forEach(checkbox => {
                if (selectedItems.has(checkbox.value)) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
        }

        selectAllCheckbox.addEventListener('click', function(event) {
            const currentPageCheckboxes = document.querySelectorAll('.select-item');
            currentPageCheckboxes.forEach(checkbox => {
                checkbox.checked = event.target.checked;
                if (event.target.checked) {
                    selectedItems.add(checkbox.value);
                } else {
                    selectedItems.delete(checkbox.value);
                }
            });
            toggleDeleteButton();
        });

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    selectedItems.add(checkbox.value);
                } else {
                    selectedItems.delete(checkbox.value);
                }
                toggleDeleteButton();
            });
        });

        function toggleDeleteButton() {
            deleteButton.disabled = selectedItems.size === 0;
        }

        // Initial check to set the button state on page load
        toggleDeleteButton();

        // Update the form submission to include all selected items
        document.getElementById('bulk-delete-form').addEventListener('submit', function(event) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'destinationIds';
            input.value = Array.from(selectedItems).join(',');
            this.appendChild(input);
        });

        // Update checkboxes when the page changes
        document.querySelectorAll('.page-link').forEach(function(pageLink) {
            pageLink.addEventListener('click', function() {
                setTimeout(updateCheckboxes, 100); // Adjust the timeout as needed
            });
        });
    });
</script>