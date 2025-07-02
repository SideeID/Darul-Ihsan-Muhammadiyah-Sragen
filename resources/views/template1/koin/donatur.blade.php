<x-app-layout>
    <div class="container-lg koin donatur">
        <div class="card card-main mb-4">
            <div
                class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Donatur</h5>
            </div>
            <div class="table-data card-body overflow-auto p-4">
                <div class="row mb-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text table-btn-search" id="addon-wrapping"><img
                                src="{{ asset('image/icon/search.svg') }}" alt=""></span>
                        <input type="text" id="search" class="table-pagination-search form-control"
                            placeholder="Cari..." aria-label="search" aria-describedby="addon-wrapping">
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
                </div>

                <div class="table-wrapper mb-4">
                    <table class="table table-scrollable mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle py-3 py-md-4" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Tanggal Transaksi</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Nama Lengkap</th>
                                <th class="align-middle py-3 py-md-4" style="width: 5%;" scope="col">Bank</th>
                                <th class="align-middle py-3 py-md-4" scope="col">No. Rekening</th>
                                <th class="align-middle py-3 py-md-4 text-left" scope="col">Nominal Donasi</th>
                                <th class="align-middle text-center py-3 py-md-4" style="width: 17%;" scope="col">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1</td>
                                <td>01 Okt 2023 08:43:04 WIB</td>
                                <td>Ahmad Alamsyah Rauf</td>
                                <td><img src="{{ asset('image/icon/icon-bank/bni.svg') }}" alt="bni"></td>
                                <td>0495285835</td>
                                <td>Rp750.000</td>
                                <td><button type="button" class="btn btn-outline-black w-100" data-id="21"
                                        onclick="showDetail(21)" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus Data"><img
                                            src="{{ asset('image/icon/icon-detail-black.svg') }}" class="me-2"
                                            alt="detail"> Detail</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>29 Nov 2023 15:23:20 WIB</td>
                                <td>M. Fajrul Falah</td>
                                <td><img src="{{ asset('image/icon/icon-bank/bca.svg') }}" alt="bca"></td>
                                <td>0011555510</td>
                                <td>Rp500.000</td>
                                <td><button type="button" class="btn btn-outline-black w-100" data-id="22"
                                        onclick="showDetail(22)" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus Data"><img
                                            src="{{ asset('image/icon/icon-detail-black.svg') }}" class="me-2"
                                            alt="detail"> Detail</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>29 Nov 2023 11:56:35 WIB</td>
                                <td>Lintang Ayu Permata</td>
                                <td><img src="{{ asset('image/icon/icon-bank/bsi.svg') }}" alt="bsi"></td>
                                <td>7134559788</td>
                                <td>Rp300.000</td>
                                <td><button type="button" class="btn btn-outline-black w-100" data-id="22"
                                        onclick="showDetail(22)" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus Data"><img
                                            src="{{ asset('image/icon/icon-detail-black.svg') }}" class="me-2"
                                            alt="detail"> Detail</button></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <p class="table-info text-black mb-0">Menampilkan <span class="table-show">-</span> data dari <span
                            class="table-total">-</span> data</p>

                    <div class="table-pagination d-flex align-items-center text-black">
                        Halaman
                        <button class="btn btn-prev ms-2" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <select class="table-pagination-select me-2" id="table-pagination-select"></select>
                        dari
                        <b class="mx-2 table-last">-</b>
                        halaman
                        <button class="btn btn-next ms-2" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Detail Transaksi -->
        <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header px-4 pt-4 pb-0 border-0">
                        <h1 class="modal-title fw-700 text-dark fs-5" id="modalDetailLabel">Detail Transaksi</h1>
                    </div>
                    <div class="modal-body p-4">
                        <div class="card card-transaksi">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <h4 class="text-center text-black fw-600 mb-2">Tanggal Transaksi</h4>
                                <p class="text-secondary text-center fw-500 mb-0" id="tanggal"></p>
                                <h2 class="text-center text-black fw-700" id="nominal"></h2>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-1">Donatur</p>
                                    <p class="text-black mb-1 fw-600"><small id="nama"></small></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-1">Transfer melaui</p>
                                    <p class="text-black mb-1 fw-600"><small id="bank"></small></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-1">Nomor Rekening</p>
                                    <p class="text-black mb-1 fw-600"><small id="norek"></small></p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-1">Penerima</p>
                                    <p class="text-black mb-1 fw-600"><small id="receiver"></small></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-1">Bank Penerima</p>
                                    <p class="text-black mb-1 fw-600"><small id="bank_receiver"></small></p>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="btn btn-outline-secondary text-black d-flex align-items-center fw-700 me-3"
                            data-bs-dismiss="modal" onclick="hideShowDetail()"><img
                                src="{{ asset('image/icon/arrow-kembali.svg') }}" class="me-2" alt=""> Kembali</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // function changeFilter() {
        //     var filter = $('#table-filter-status').val();
        //     if (filter === "Dipublish") {
        //         setTable(`{{route('artikel.all')}}?class=table-data&table=true&status=published`)
        //     } else {
        //         setTable(`{{route('artikel.all')}}?class=table-data&table=true`)
        //     }
        // }

        // setTableData = {
        //     'table-data': ['_increment', 'banner', 'judul', 'tanggal', 'sumber', 'status', 'is_action']
        // }

        // $(function() {
        //     setTable(`{{route('artikel.all')}}?class=table-data&table=true`)
        // });

        setTableData = {
            'table-data': ['_increment', 'createdAt', 'nama_donatur', 'bank', 'nomor_rekening', 'nominal', 'is_action']
        }

        $(function() {
            
            setTable(`{{route('koin.transaksi.all')}}?class=table-data&table=true`)
        });


        function showDetail(id) {
            $("#modalDetail").modal('show');
            var settingsGetDetail = {
                    "url": `${path}/api/koin/transaksi/detail/` + id,
                    "method": "GET",
                    "timeout": 0,
                };
           
                $.ajax(settingsGetDetail).done(function(response) {
                    var data = response.data;
                    $("#tanggal").html(data.tanggal)
                    $("#nominal").html(Number(data.nominal.split('.')[0]).toLocaleString('id-ID'))
                    $("#nama").html(data.nama_donatur)
                    $("#bank").html(data.bank)
                    $("#norek").html(data.nomor_rekening)
                    $("#receiver").html(data.penerima?? null)
                    $("#bank_receiver").html(data.bank_penerima ?? null)
                })
        }

        function hideShowDetail() {
            $("#modalDetail").modal('hide');
        }
    </script>

</x-app-layout>