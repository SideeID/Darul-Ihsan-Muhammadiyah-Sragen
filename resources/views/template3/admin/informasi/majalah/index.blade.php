<x-app-layout>
    <div class="container-lg majalah">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-700">Majalah</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Majalah</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Majalah</li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Majalah</h5>
                <div class="d-flex">
                    <a href="{{ route('informasi.majalah.tambah') }}" class="btn btn-primary fw-600 btn-tambah"><img
                            src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah
                        Data</a>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                            <div class="d-flex align-items-center position-relative" style="width:150%;">
                                <input type="date" onchange="changeFilter()" class="form-control filter-element fw-600 text-sm"
                                    id="table-filter-tanggal"
                                    style="border-radius:0px; border-left: 0px solid #fff; border-right: 0px solid #fff; padding:7px; padding-right:30px;">
                                <span
                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                                <i class="fa fa-chevron-down text-sm"></i>
                                </span>
                            </div>
                            <select onchange="changeFilter()" class="form-select filter-element table-filter-select fs-6 text-sm"
                                style="padding: 7px; height: 40px; border-radius:0px;" id="table-filter-status">
                                <option value="">Status</option>
                                <option value="published">Dipublish</option>
                                <option value="waiting">Draf</option>
                            </select>
                        <button class="btn filter-element d-flex align-items-center fw-bold" onclick="resetFilter()"
                            style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:7px; border-left: 0px solid #fff; color:#D32246; min-width: 110px; height: 40px;">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </button>
                    </div>
                    <div class="input-group" style="width: 300px; padding: 6.5px;">
                        <span class="input-group-text" style="background-color: #EFEFF0; border: none;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="search" class="table-pagination-search form-control"
                            placeholder="Search" style="background-color: #EFEFF0; border: none;">
                    </div>
                </div>
                <div class="mb-4 table-wrapper">
                    <table class="table mb-0 table-scrollable" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle fw-bold" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle fw-bold" scope="col">Thumbnail</th>
                                <th class="align-middle fw-bold" scope="col">Judul</th>
                                <th class="align-middle fw-bold" scope="col">Tanggal</th>
                                <th class="align-middle fw-bold" style="width: 15%;" scope="col">Penulis</th>
                                <th class="align-middle fw-bold" scope="col">Status</th>
                                <th class="text-center align-middle fw-bold" style="width: 15%;" scope="col">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="flex-row d-flex align-items-center">
                        <div class="text-black table-length d-flex align-items-center">
                            <select class="mx-2 table-length-select" id="table-length-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <p class="mb-0 text-black table-info">
                            Menampilkan <span class="table-show">-</span> data dari <span class="table-total">-</span>
                            data
                        </p>
                    </div>

                    <div class="text-black table-pagination d-flex align-items-center">
                        <button class="btn btn-prev" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <button class="btn btn-next" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class=""
                                alt="next"></button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#table-filter-tanggal", {
                dateFormat: "F Y",
                defaultDate: "{{ date('F Y') }}",
                showMonths: 1,
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Mg', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
                        longhand: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                            'Saturday'
                        ],
                    },
                    months: {
                        shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                            'Nov', 'Des'
                        ],
                        longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ],
                    }
                },
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('datepicker').value = dateStr;
                },
                onReady: function(selectedDates, dateStr, instance) {
                    document.querySelector('.flatpickr-current-month .cur-year').style.display = 'none';
                },
            });
        });

        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''
            document.getElementById('table-filter-tanggal').value = ''

            setTable(
                `{{ route('majalah.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();
            var filterTanggal = $('#table-filter-tanggal').val();

            setTable(
                `{{ route('majalah.all') }}?class=table-data&table=true&status=${filterStatus}&tanggal=${filterTanggal}`)
        }

        setTableData = {
            'table-data': ['_increment', 'banner', 'judul', 'tanggal', 'penulis', 'badge', 'is_action']
        }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('majalah.all') }}?class=table-data&table=true`)

            req({
                url: `${path}/api/majalah/list-all`,
                type: "GET",
                success: function(data) {
                    sorotanCount = countSorotanTrue(data.data);
                }
            })
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function changeSorotan(id, statusSorotan) {
            $('#d_id').val(id)
            $('#d_status_sorotan').val(statusSorotan)
            $("#modalConfirm").modal('show');
        }

        function closeModalConfirm() {
            let id = $('#d_id').val()
            let status = $('#d_status_sorotan').val()

            if (status === true) {
                $(`#switch-${id}`).prop("checked", false)
            } else {
                $(`#switch-${id}`).prop("checked", true)
            }

            $("#modalConfirm").modal('hide');
        }

        $("#submitForm").click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()
            let status = $('#d_status_sorotan').val()

            if (sorotanCount === 3 && status === "true") {
                $(`#switch-${id}`).prop("checked", false)
                $("#modalConfirm").modal('hide');
                showAlert("Permintaan Gagal",
                    "Mohon maaf, jumlah sorotan anda melebihi batas (Max 3 item) silahkan non-aktifkan data lainnya terlebih dahulu!",
                    'danger')
            } else {
                req({
                    url: `${path}/api/majalah/sorotan/${id}?sorotan=${status === "true" ? "true" : "false"}`,
                    type: "GET",
                    success: function(data) {
                        $('#modalConfirm').modal('hide');
                        setTable(`{{ route('majalah.all') }}?class=table-data&table=true`)

                        showAlert("Done!", "Data sorotan berhasil diubah", 'success')

                        req({
                            url: `${path}/api/majalah/list-all`,
                            type: "GET",
                            success: function(data) {
                                sorotanCount = countSorotanTrue(data.data);
                            }
                        })
                    }
                })
            }
        })

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/majalah/delete/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('majalah.all') }}?class=table-data&table=true`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    req({
                        url: `${path}/api/majalah/list-all`,
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
