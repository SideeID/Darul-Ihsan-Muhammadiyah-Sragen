<x-app-layout>
    <div class="container-lg">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Galeri</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Galeri</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Galeri</li>
                    </ol>
                </nav>
            </div>
            <div class="mb-3 btn-group">
                <a href="{{ route('admin.informasi.galeri.foto.index') }}" class="btn fw-600 active" >Foto</a>
                <a href="{{ route('admin.informasi.galeri.video.index') }}" class="btn fw-600" aria-current="page">Video</a>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Galeri</h5>
                <div class="d-flex">
                    <a href="{{ route('admin.informasi.galeri.foto.tambah') }}"
                        class="btn btn-primary fw-600 btn-tambah d-flex align-items-center"><img
                            src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt="">Tambah Data
                    </a>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <!-- Filter Icon -->
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">

                        <!-- Status Filter -->
                        <select onchange="changeFilter()"
                            class="form-select filter-element table-filter-select fs-6 text-sm"
                            style="padding: 7px; height: 40px; border-radius:0px;" id="table-filter-status">
                            <option value="">Status</option>
                            <option value="published">Dipublish</option>
                            <option value="waiting">Draf</option>
                        </select>

                        <!-- Reset Button -->
                        <button class="btn filter-element d-flex align-items-center fw-bold" onclick="resetFilter()"
                            style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:7px; border-left: 0px solid #fff; color:#D32246; min-width: 110px; height: 40px;">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="input-group" style="width: 300px; padding: 6.5px;">
                        <span class="input-group-text" style="background-color: #EFEFF0; border: none;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="search" class="table-pagination-search form-control"
                            placeholder="Cari sesuatu" style="background-color: #EFEFF0; border: none;">
                    </div>
                </div>

                <!-- Tabel -->
                <div class="row">
                    <table class="table align-middle" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle  fw-bold" style="width: 8%;" scope="col">No
                                    <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                        class="ms-2">
                                </th>
                                <th class="align-middle  fw-bold" scope="col">Judul
                                    <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                        class="ms-2">
                                </th>
                                <th class="align-middle  fw-bold" scope="col">Jumlah Gambar
                                    <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                        class="ms-2">
                                </th>
                                <th class="align-middle  fw-bold" scope="col">Status
                                    <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                        class="ms-2">
                                </th>
                                <th class="text-center align-middle fw-bold" style="width: 15%;" scope="col">Aksi
                                    <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                        class="ms-2">
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="flex-row d-flex align-items-center">
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
    </div>

    <x-modal></x-modal>

    <!-- Modal -->
    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pb-0 border-0 modal-header">
                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalConfirmLabel">Konfirmasi Data Sorotan</h1>
                </div>
                <div class="modal-body">
                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin memilih data ini ? Data akan menjadi sorotan di beranda website anda! </p>
                    <div class="d-flex align-items-center justify-content-center">
                        <input type="hidden" id="d_id">
                        <input type="hidden" id="d_status_sorotan">
                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3" onclick="closeModalConfirm()">Batal</button>
                        <button type="button" class="px-4 py-2 btn btn-primary fw-700" id="submitForm">Ya, Setuju!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''
            setTable(
                `{{ route('gallery.all') }}?class=table-data&table=true&type=gambar`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();

            setTable(
                `{{ route('gallery.all') }}?class=table-data&table=true&type=gambar&status=${filterStatus}`
            )
        }

        setTableData = {
            'table-data': ['_increment', 'judul', 'foto', 'badge', 'is_actionFoto']
        }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('gallery.all') }}?class=table-data&table=true&type=gambar`)
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
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

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/gallery/delete/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('gallery.all') }}?class=table-data&table=true&type=gambar`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')
                }
            })
        })

    </script>

</x-app-layout>
