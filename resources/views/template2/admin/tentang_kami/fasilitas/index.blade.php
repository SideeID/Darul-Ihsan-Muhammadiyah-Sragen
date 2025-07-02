<x-app-layout>
    <div class="container-lg">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Fasilitas</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tentang Kami</li>
                        <li class="breadcrumb-item">Fasilitas</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Fasilitas</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Fasilitas</h5>
                <div class="d-flex">
                    <a href="{{ route('tentang_kami.fasilitas.addfasilitas') }}"
                        class="btn btn-primary fw-600 btn-tambah"><img src="{{ asset('image/icon/icon-tambah.svg') }}"
                            class="me-2" alt="">Tambah
                        Fasilitas</a>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <!-- Filter Icon -->
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">

                        <!-- Datepicker Input -->
                        {{-- <div class="d-flex align-items-center position-relative" style="width: 100%;">
                            <input type="date" onchange="changeFilter()" class="form-control filter-element"
                                id="table-filter-tanggal"
                                style="border-radius:0px; border-left: 0px solid #fff; border-right: 0px solid #fff; padding:7px; padding-right:30px; width: 100%;">
                            <span
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                                <i class="fa fa-chevron-down"></i>
                            </span>
                        </div> --}}

                        <!-- Status Filter -->
                        <select onchange="changeFilter()" class="form-select filter-element table-filter-select"
                            style="padding: 7px; height: 40px; border-radius:0px;" id="table-filter-status">
                            <option value="">Status</option>
                            <option value="published">Dipublish</option>
                            <option value="waiting">Draf</option>
                        </select>

                        <!-- Reset Button -->
                        <button class="btn filter-element d-flex align-items-center"
                            style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:7px; border-left: 0px solid #fff; color:#D32246; min-width: 103px; height: 40px;"
                            onclick="resetFilter();">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="input-group" style="width: 300px; padding: 6.5px;">
                        <span class="input-group-text" style="background-color: #EFEFF0; border: none;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="search" class="table-pagination-search form-control"
                            placeholder="Search" style="background-color: #EFEFF0; border: none;">
                    </div>
                </div>

                <!-- Tabel -->
                <div class="row">
                    <table class="table align-middle" id="table">
                        <thead>
                            <tr>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>No</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Judul</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Jumlah Foto</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Status</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="text-center align-middle fw-bold" style="width: 15%;" scope="col">
                                    <div class="th-content">
                                        <span>Aksi</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="flex-row d-flex align-items-center">
                            <p class="mb-0 text-black table-info">Entri</p>
                            <div class="text-black table-length d-flex align-items-center">
                                <select class="mx-2 table-length-select" id="table-length-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <p class="mb-0 text-black table-info">
                                Menampilkan <span class="table-show">-</span> data dari <span
                                    class="table-total">-</span>
                                data
                            </p>
                        </div>

                        <div class="text-black table-pagination d-flex align-items-center">
                            Halaman
                            <button class="btn btn-prev ms-2" type="button" id="button-addon2"><img
                                    src="{{ asset('image/icon/prev-black.svg') }}" class=""
                                    alt="prev"></button>
                            <select class="table-pagination-select me-2" id="table-pagination-select"></select>
                            dari
                            <b class="mx-2 table-last">-</b> halaman
                            <button class="btn btn-next ms-2" type="button" id="button-addon2"><img
                                    src="{{ asset('image/icon/next-danger.svg') }}" class=""
                                    alt="next"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="pb-0 border-0 modal-header">
                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalDeleteLabel">Konfirmasi
                        Hapus Gambar</h1>
                </div>
                <div class="modal-body">
                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus gambar
                        ini? </p>
                    <div class="d-flex align-items-center justify-content-center">
                        <input type="hidden" id="d_id">
                        <button type="button" class="px-4 py-2 btn btn-danger fw-700 me-3" data-bs-dismiss="modal"
                            onclick="closeModalDelete('modalDelete')">Batal</button>
                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700" id="buttonDelete">Ya,
                            Hapus!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.alert-hapus')
    <script>
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''
            setTable(
                `{{ route('fasilitas.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();
            // var filterTanggal = $('#table-filter-tanggal').val();

            setTable(
                `{{ route('fasilitas.all') }}?class=table-data&table=true&status=${filterStatus}`
            )
        }

        setTableData = {
            'table-data': ['_increment', 'judul', 'foto', 'badge', 'is_action']
        }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('fasilitas.all') }}?class=table-data&table=true`)
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

        function closeModalDelete() {
            let id = $('#d_id').val()
            let status = $('#d_status_sorotan').val()

            if (status === true) {
                $(`#switch-${id}`).prop("checked", false)
            } else {
                $(`#switch-${id}`).prop("checked", true)
            }

            $("#modalDelete").modal('hide');
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
                    url: `${path}/api/fasilitas/sorotan/${id}?sorotan=${status === "true" ? "true" : "false"}`,
                    type: "GET",
                    success: function(data) {
                        $('#modalConfirm').modal('hide');
                        setTable(`{{ route('fasilitas.all') }}?class=table-data&table=true`)

                        showAlert("Done!", "Data sorotan berhasil diubah", 'success')
                    }
                })
            }
        })

        // Js fungsi search tabel
        document.getElementById('search').addEventListener('input', function() {
            // Ambil nilai dari kolom pencarian
            let searchValue = this.value.toLowerCase();

            // Ambil semua baris tabel (tbody tr)
            let rows = document.querySelectorAll('table tbody tr');

            rows.forEach(function(row) {
                // Ambil nilai dari kolom Link dan tanggal (kolom ke-2 dan ke-4)
                let judul = row.cells[1].textContent.toLowerCase();
                let tanggal = row.cells[3].textContent.toLowerCase();

                // Cek apakah nilai dari input pencarian ada di Nama atau Jabatan
                if (judul.includes(searchValue) || tanggal.includes(searchValue)) {
                    // Jika ada, tampilkan baris
                    row.style.display = '';
                } else {
                    // Jika tidak ada, sembunyikan baris
                    row.style.display = 'none';
                }
            });
        });
        // Js alert Done
        // document.addEventListener('DOMContentLoaded', function() {
        //     const deleteButton = document.querySelector('#modalDelete .btn-outline-black');
        //     const alertDone = document.getElementById('alert-hapus');

        //     deleteButton.addEventListener('click', function() {
        //         // Tampilkan alertDone
        //         alertDone.style.display = 'block';

        //         // modal konfirmasi hapus
        //         const modal = document.getElementById('modalDelete');
        //         const modalInstance = bootstrap.Modal.getInstance(modal);
        //         modalInstance.hide();

        //         // Sembunyikan alertDone setelah 3 detik (opsional)
        //         setTimeout(function() {
        //             alertDone.style.display = 'none';
        //         }, 3000);
        //     });
        // });

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/fasilitas/delete/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('fasilitas.all') }}?class=table-data&table=true`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')
                }
            })
        })
    </script>
</x-app-layout>
