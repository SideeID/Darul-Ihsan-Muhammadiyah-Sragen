<x-app-layout>
    <div class="container-lg testimoni">
        <header class="header-view">
            <h3 class="fw-600">Testimoni</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Informasi</li>
                    <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
                </ol>
            </nav>
        </header>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-600 text-dark mb-3 mb-sm-0 h6">List Testimoni</h5>
                <div class="d-flex">
                    <a href="{{route('testimoni.tambah')}}" class="btn btn-primary fw-600 btn-tambah"><img src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah Testimoni</a>
                </div>
            </div>
            <div class="table-data card-body overflow-auto p-4">
                <div class="row mb-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text table-btn-search" id="addon-wrapping"><img src="{{ asset('image/icon/search.svg') }}" alt=""></span>
                        <input type="text" id="search" class="table-pagination-search form-control" placeholder="Cari..." aria-label="search" aria-describedby="addon-wrapping">
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="table-length d-flex align-items-center text-black mb-4">
                        Menampilkan
                        <select class="table-length-select mx-2" id="table-length-select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                        data
                    </div>
                    <div class="table-filter d-flex align-items-center text-black mb-4">
                        <div class="me-2">
                            Filter Status
                            <select onchange="changeFilter()" class="table-filter-select ms-2" id="table-filter-status">
                                <option value="">Semua</option>
                                <option value="published">Dipublish</option>
                                <option value="waiting">Draf</option>
                            </select>
                        </div>
                        <div class="">
                            <span class="datepicker-toggle">
                                <label type="button" class="btn d-flex align-items-center datepicker-toggle-button" for="table-filter-tanggal">
                                    <img src="{{ asset('image/icon/icon-calendar.svg') }}" class="me-2" alt="">
                                    Pilih Tanggal
                                </label>
                                <input type="date" onchange="changeFilter()" class="datepicker-input" id="table-filter-tanggal">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="table-wrapper mb-4">
                    <table class="table table-scrollable mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle" scope="col">Thumbnail</th>
                                <th class="align-middle" scope="col">Caption</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle text-center" style="width: 15%;" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <p class="table-info text-black mb-0">Menampilkan <span class="table-show">-</span> data dari <span class="table-total">-</span> data</p>

                    <div class="table-pagination d-flex align-items-center text-black">
                        Halaman
                        <button class="btn btn-prev ms-2" type="button" id="button-addon2"><img src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <select class="table-pagination-select me-2" id="table-pagination-select"></select>
                        dari
                        <b class="mx-2 table-last">-</b>
                        halaman
                        <button class="btn btn-next ms-2" type="button" id="button-addon2"><img src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>

                <!-- Modal Filter -->
                <div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="modalFilterLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header px-4 pt-4 pb-0 border-0">
                                <h1 class="modal-title fw-700 text-dark fs-5" id="modalFilterLabel">Filter Pencarian Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="tahun" class="fw-500 mb-2">Tahun Daftar</label>
                                    <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Tahun Daftar" aria-label="Tahun Daftar" onchange="getInputValue('tahun')">
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4 form-range-text">
                                    <label for="" class="fw-500 mb-2">Usia</label>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="number" id="min_age" name="min_age" class="form-control" placeholder="Usia Minimal" aria-label="Usia Minimal">
                                        <hr class="mx-2">
                                        <input type="number" id="max_age" name="max_age" class="form-control" placeholder="Usia Maksimal" aria-label="Usia Maksimal">
                                    </div>
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4 form-range-text">
                                    <label for="" class="fw-500 mb-2">Lama Mendaftar</label>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="number" id="min_reg" name="min_reg" class="form-control" placeholder="Tahun Minimal" aria-label="Tahun Minimal">
                                        <hr class="mx-2">
                                        <input type="number" id="max_reg" name="max_reg" class="form-control" placeholder="Tahun Maksimal" aria-label="Tahun Maksimal">
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="" class="fw-500 mb-2">Nomor Porsi</label>
                                    <div class="row" id="no_porsi">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="no_porsi" value="false" id="memiliki" onchange="showResetInputRadio('no_porsi')">
                                                <label class="form-check-label text-darker" for="memiliki">
                                                    Memiliki Nomor Porsi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="no_porsi" value="true" id="tidak_memiliki" onchange="showResetInputRadio('no_porsi')">
                                                <label class="form-check-label text-darker" for="tidak_memiliki">
                                                    Tidak Memiliki Nomor Porsi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-2" id="reset_no_porsi" style="display: none;">
                                            <button class="btn btn-outline-danger w-100" onclick="resetInputRadio('no_porsi')">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="" class="fw-500 mb-2">Kelengkapan Data</label>
                                    <div class="row" id="data_diri">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="data_diri" value="true" id="data_lengkap" onchange="showResetInputRadio('data_diri')">
                                                <label class="form-check-label text-darker" for="data_lengkap">
                                                    Data Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="data_diri" value="false" id="data_tidak_lengkap" onchange="showResetInputRadio('data_diri')">
                                                <label class="form-check-label text-darker" for="data_tidak_lengkap">
                                                    Data Tidak Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-2" id="reset_data_diri" style="display: none;">
                                            <button class="btn btn-outline-danger w-100" onclick="resetInputRadio('data_diri')">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="" class="fw-500 mb-2">Kelengkapan Berkas</label>
                                    <div class="row" id="berkas">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="berkas" value="true" id="berkas_lengkap" onchange="showResetInputRadio('berkas')">
                                                <label class="form-check-label text-darker" for="berkas_lengkap">
                                                    Berkas Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="form-check mb-3 mb-md-4">
                                                <input class="form-check-input" type="radio" name="berkas" value="false" id="berkas_tidak_lengkap" onchange="showResetInputRadio('berkas')">
                                                <label class="form-check-label text-darker" for="berkas_tidak_lengkap">
                                                    Berkas Tidak Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-2" id="reset_berkas" style="display: none;">
                                            <button class="btn btn-outline-danger w-100" onclick="resetInputRadio('berkas')">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-outline-danger fw-700 p-2 me-3 w-100" data-bs-dismiss="modal" onclick="resetFilter()">Reset</button>
                                    <button class="btn btn-success fw-700 p-2 w-100" data-bs-dismiss="modal" onclick="changeFilter()">Filter Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();
            var filterTanggal = $('#table-filter-tanggal').val();

            setTable(`{{route('testimoni.all')}}?class=table-data&table=true&status=${filterStatus}&tanggal=${filterTanggal}`)
        }

        setTableData = {
            'table-data': ['_increment', 'banner', 'isi', 'status', 'is_action']
            // 'table-data': ['_increment', 'file', 'isi', 'status', 'is_action']
        }

        $(function() {
            setTable(`{{route('testimoni.all')}}?class=table-data&table=true`)
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/testimoni/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{route('testimoni.all')}}?class=table-data&table=true`)
                    showAlert("Done!", "Data berhasil dihapus!", 'success')
                }
            })
        })
    </script>

</x-app-layout>