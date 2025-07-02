<x-app-layout>
    <div class="container-lg ekstrakurikuler">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Partner</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Partner</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Partner</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="px-0 mb-3 fw-600 text-dark mb-sm-0 h6">Data Partner</h5>
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-primary fw-600 btn-tambah" data-bs-toggle="modal"
                        data-bs-target="#modal-tambah" style="border-radius: 10px;">
                        <img src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah Partner
                    </a>
                </div>
            </div>
            <div class="p-3 overflow-auto table-data card-body">
                <div class="p-1 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                        <select onchange="changeFilter()" class="form-select filter-element table-filter-select"
                            style="padding: 7px; height: 40px; border-radius:0px;" id="table-filter-status">
                            <option value="">Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak aktif</option>
                        </select>
                        <button class="btn filter-element d-flex align-items-center" onclick="resetFilter()"
                            style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:7px; border-left: 0px solid #fff; color:#D32246; min-width: 103px; height: 40px;">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </button>
                    </div>

                    <div class="input-group" style="width: 300px; padding: 6.5px;">
                        <span class="input-group-text" style="background-color: #EFEFF0; border: none;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="search" class="table-pagination-search form-control"
                            placeholder="Cari sesuatu" style="background-color: #EFEFF0; border: none;">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-left" id="table">
                        <thead>
                            <tr>
                                <th class="col-1 fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>No</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col-7 fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Kategori</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col-2 fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Status</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col-2 fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Aksi</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="noDataRow" style="display: none;">
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="flex-row d-flex align-items-center">
                        <div class="text-black table-length d-flex align-items-center">
                            <span>Show</span>
                            <select class="mx-2 table-length-select" id="table-length-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <p class="mt-0 mb-0 text-black table-info">
                            Showing <span class="table-show">-</span> to <span class="table-total">-</span> of <span class="table-total" style="color: #2B67E9">-</span>
                            entries
                        </p>
                    </div>

                    <div class="text-black table-pagination d-flex align-items-center">
                        <button class="btn btn-prev" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/prev-black.svg') }}" class=""
                                alt="next"></button>
                        <button class="btn btn-next" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class=""
                                alt="next"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 34px; /* Lebih kecil untuk menyesuaikan */
            height: 14px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 15px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            left: 1px;
            bottom: 1px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4CAF50;
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .label-text {
            margin-left: 8px;
            font-size: 14px;
            color: #4a4a4a;
        }
    </style>

    <script>
        // function toggleStatus(checkbox) {
        // const statusText = checkbox.checked ? "Aktif" : "Tidak Aktif";
        // checkbox.nextElementSibling.nextElementSibling.textContent = statusText;
        // }

        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''

            setTable(
                `{{ route('partner-lembaga.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();

            setTable(
                `{{ route('partner-lembaga.all') }}?class=table-data&table=true&status=${filterStatus}`)
        }

        setTableData = {
            'table-data': ['_increment', 'nama', 'switch', 'is_action']
        }

        // function setTable(url) {
        //     fetch(url)
        //         .then(response => response.json())
        //         .then(data => {
        //             const tableData = renderTableData(data.data);
        //             updateTable(tableData);
        //         });
        // }

        // function renderTableData(data) {
        //     return data.map((item) => {
        //         return `
        //             <tr>
        //                 <td>${item._increment}</td>
        //                 <td>${item.nama}</td>
        //                 <td>
        //                     <input type="checkbox" id="switch-${item.id}" ${item.status === 'active' ? 'checked' : ''} onchange="toggleStatus(this, '${item.id}')">
        //                     <span id="statusText-${item.id}" class="label-text">${item.status === 'active' ? 'Aktif' : 'Tidak Aktif'}</span>
        //                 </td>
        //                 <td>
        //                     <!-- Your action buttons here -->
        //                 </td>
        //             </tr>
        //         `;
        //     }).join('');
        // }


        function confirmStatusChange(id, status) {
            // Store the ID and new status in a global variable or dataset on the modal for later use
            document.getElementById('modal-publish').dataset.itemId = id;
            document.getElementById('modal-publish').dataset.newStatus = status;

            // Show the modal
            $('#modal-publish').modal('show');
        }

        function changeStatus() {
            // Retrieve the ID and status
            const id = document.getElementById('modal-publish').dataset.itemId;
            const newStatus = document.getElementById('modal-publish').dataset.newStatus;

            // Make an AJAX request to publish the new status
            fetch(`/api/partner-lembaga/publish/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                // Reload or update the page content if needed
                console.log('Status updated:', data);
                $('#modal-publish').modal('hide');
            })
            .catch(error => console.error('Error updating status:', error));
        }

        // function resetEditForm() {
        //     document.getElementById('edit-nama-partner').value = '';
        //     document.getElementById('logo').value = '';
        //     document.getElementById('img_preview').src = '';
        //     hideInputError('edit-nama-partner', 'edit-error-msg');
        // }

        // function openForm(id) {
        // resetEditForm();
        // document.getElementById('update-button').dataset.id = id;
        // const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));

        // fetch(`${path}/api/partner-lembaga/detail/${id}`)
        //     .then(response => {
        //         if (!response.ok) {
        //             throw new Error(`HTTP error! Status: ${response.status}`);
        //         }
        //         return response.json();
        //     })
        //     .then(data => {
        //         console.log(data);
        //         if (data?.data) {
        //             document.getElementById('edit-nama-partner').value = data.data.nama || '';
        //             const logoPreview = document.getElementById('img_preview');
        //             if (data.data.logo) {
        //                 logoPreview.src = data.data.logo;
        //                 logoPreview.style.display = 'block';
        //             } else {
        //                 logoPreview.src = '';
        //                 logoPreview.style.display = 'none';
        //             }
        //             const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));
        //             modal.show();
        //         } else {
        //             throw new Error('Data tidak ditemukan di respons API');
        //         }
        //     })
        //     .catch(error => {
        //         showNotification('merah', 'Gagal mengambil data partner.');
        //         console.error('Error fetching data:', error);
        //     });
        // }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('partner-lembaga.all') }}?class=table-data&table=true`)

            req({
                url: `${path}/api/partner-lembaga/list-all`,
                type: "GET",
                success: function(data) {
                    sorotanCount = countSorotanTrue(data.data);
                }
            })
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modal-hapus").modal('show');
        }

        // $('#buttonDelete').click(function(e) {
        //     e.preventDefault();
        //     let id = $('#d_id').val()

        //     req({
        //         url: `${path}/api/partner-lembaga/delete/${id}`,
        //         type: "GET",
        //         success: function(data) {
        //             $('#modalDelete').modal('hide');
        //             setTable(`{{ route('partner-lembaga.all') }}?class=table-data&table=true`)
        //             showAlert("Done!", "Data berhasil dihapus!", 'success')
        //         }
        //     })
        // })

        // function resetFilter() {
        //     $('#table-filter-tanggal').val('')
        //     $('#table-filter-status').val('')
        //     changeFilter()
        // }


        // function changeFilter() {
        //     var filterTanggal = $('#table-filter-tanggal').val();
        //     var filterStatus = $('#table-filter-status').val();
        //     setTable(
        //         `{{ route('ekskul.all') }}?class=table-data&table=true&tanggal=${filterTanggal}&status=${filterStatus}`
        //         )
        // }

        // setTableData = {
        //     'table-data': ['_increment', 'banner', 'nama', 'url', 'badge', 'is_action']
        // }

        // $(function() {
        //     setTable(`{{ route('ekskul.all') }}?class=table-data&table=true`)
        // });

        // function deleteRow(id) {
        //     $('#d_id').val(id)
        //     $("#modalDelete").modal('show');
        // }

        // function deleteFile() {
        //     $('#edit_thumbnail_name').text('Nama File');
        // }

        // $('#buttonDelete').click(function(e) {
        //     e.preventDefault();
        //     let id = $('#d_id').val()

        //     req({
        //         url: `${path}/api/ekskul/delete/${id}`,
        //         type: "GET",
        //         success: function(data) {
        //             $('#modalDelete').modal('hide');
        //             setTable(`{{ route('ekskul.all') }}?class=table-data&table=true`)
        //             showNotification('hijau', 'Data ekstrakurikuler berhasil dihapus!')
        //         }
        //     })
        // })
    </script>

    @include(config('app.template') . 'admin.tentang_kami.partner.modal-tambahdata')
    @include(config('app.template') . 'admin.tentang_kami.partner.modal-confirmpublish')
    @include(config('app.template') . 'admin.tentang_kami.partner.modal-edit')
    @include(config('app.template') . 'admin.tentang_kami.partner.modal-hapus')
</x-app-layout>
