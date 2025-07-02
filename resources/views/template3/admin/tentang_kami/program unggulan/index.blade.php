<x-app-layout>
    <div class="container-lg program">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Program Unggulan</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Program</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Program</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="px-0 mb-3 fw-600 text-dark mb-sm-0 h6">Data Program</h5>
                <div class="d-flex align-items-center">
                    <a href="{{ route('tentang_sekolah.add_program') }}" class="btn btn-primary fw-600 btn-tambah">
                        <img src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah Data
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
                            <option value="waiting">Draf</option>
                            <option value="published">Dipublish</option>
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
                                <th class="col fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>No</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Gambar Header</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Nama Program</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>File URL</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col fw-bold" scope="col">
                                    <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                        <span>Status</span>
                                        <img src="{{asset('template3/image/arrow-3.svg')}}" alt="">
                                    </div>
                                </th>
                                <th class="col fw-bold" scope="col">
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
                            <tr>
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

    <div id="notif-done" class="notif" style="display: none">
        <span class="notif-done-icon">
            <img src="{{asset('template3/image/tick-circle.svg')}}" alt="">
        </span>
        <span id="notification-message" class="px-2 notification-text d-flex">
            <h6 class="m-0" style="font-weight: 600; color: #3C7B46;">Done</h6>
            <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil dihapus!</p>
        </span>
        <button id="close-notif-done" class="close-btn">✖</button>
    </div>

    <div id="notif-done-edit" class="notif" style="display: none">
        <span class="notif-done-icon">
            <img src="{{asset('template3/image/info-circle.svg')}}" alt="">
        </span>
        <span id="notification-message" class="px-2 notification-text d-flex">
            <h6 class="m-0" style="font-weight: 600; color: #2B67E9;">Done</h6>
            <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil diperbarui!</p>
        </span>
        <button id="close-notif-done" class="close-btn">✖</button>
    </div>

    <x-modal></x-modal>

    <style>
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

        .gambar {
            max-width: 200px; /* Sesuaikan lebar maksimal gambar */
            height: auto; /* Sesuaikan tinggi gambar agar proporsional */
            object-fit: cover; /* Memastikan gambar tetap proporsional */
        }

        .notif {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: relative;
            padding: 10px;
            background-color: #;
            border-radius: 5px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }

        .notification-text{
            flex-direction: column;
        }

        #notif-done-edit{
            background-color: #DFECFF;
        }

        #notif-done{
            background-color: #EBFAF4;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
        }
    </style>

    <script>
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''

            setTable(
                `{{ route('program-unggulan.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();

            setTable(
                `{{ route('program-unggulan.all') }}?class=table-data&table=true&status=${filterStatus}`)
        }

        setTableData = {
            'table-data': ['_increment', 'gambar', 'nama', 'url', 'badge', 'is_action']
        }

        $(function() {
            setTable(`{{ route('program-unggulan.all') }}?class=table-data&table=true`)

            req({
                url: `${path}/api/program-unggulan/list-all`,
                type: "GET",
                success: function(data) {
                    sorotanCount = countSorotanTrue(data.data);
                }
            })
        });

        // function resetFilter() {
        //     $('#table-filter-tanggal').val('')
        //     $('#table-filter-status').val('')
        //     changeFilter()
        // }

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function deleteFile() {
            $('#edit_thumbnail_name').text('Nama File');
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/program-unggulan/delete/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('program-unggulan.all') }}?class=table-data&table=true`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    req({
                        url: `${path}/api/program-unggulan/list-all`,
                        type: "GET",
                        success: function(data) {
                            sorotanCount = countSorotanTrue(data.data);
                        }
                    })
                }
            })
        })
    </script>
</x-app-layout>
