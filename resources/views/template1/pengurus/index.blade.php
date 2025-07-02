<x-app-layout>
    <style>
        .banner {
            width: auto !important;
        }
    </style>

    <div class="container-lg berita">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Pengurus</h5>
                <div class="d-flex">
                    <a href="{{route('pengurus.tambah')}}" class="btn btn-success fw-700 btn-tambah me-2"><img src="{{ asset('image/icon/icon-tambah-circle.svg') }}" class="me-2" alt=""> Tambah Pengurus</a>
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
                </div>

                <div class="table-wrapper mb-4">
                    <table class="table table-scrollable mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle py-3 py-md-4" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Foto</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Nama</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Jabatan</th>
                                <th class="align-middle text-center py-3 py-md-4" style="width: 15%;" scope="col">Aksi</th>
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
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        setTableData = {
            'table-data': ['_increment', 'banner', 'nama', 'jabatan', 'is_action']
        }

        $(function() {
            setTable(`{{route('pengurus.all')}}?class=table-data&table=true`)
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/pengurus/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{route('pengurus.all')}}?class=table-data&table=true`)
                }
            })
        })
    </script>

</x-app-layout>