<x-app-layout>
    <div class="container-lg berita">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Anggota</h5>
                <div class="d-flex">
                    <a href="{{route('anggota.tambah')}}" class="btn btn-success fw-700 btn-tambah me-2"><img src="{{ asset('image/icon/icon-tambah-circle.svg') }}" class="me-2" alt=""> Tambah Anggota</a>
                    <div class="dropdown">
                        <button class="btn btn-outline-success fw-700 btn-tambah dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Import Eksport Data
                        </button>
                        <ul class="dropdown-menu">
                            <li><button type="button" class="dropdown-item" onclick="openModalImport()">Import Anggota</button></li>
                            <li><a class="dropdown-item" href="{{route('anggota.export')}}">Export Anggota</a></li>
                            <li><a class="dropdown-item" href="{{route('anggota.template')}}">Download Template Export</a></li>
                        </ul>
                    </div>
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
                                <th class="align-middle py-3 py-md-4" scope="col">Nama</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Jabatan</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Ranting</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Alamat</th>
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

    <!-- Modal Import -->
    <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="modalImportLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-0 border-0">
                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalImportLabel">Import Data Anggota</h1>
                </div>
                <div class="modal-body p-4">
                    <form id="form_import" method="post" enctype="multipart/form-data">
                        @csrf
                        <p class="text-black mb-3">Import data menggunakan Excel (.xls, .xlsx).</p>
                        <div class="mb-4">
                            <label for="file_import" id="file_import_label" class="btn btn-outline-success d-flex align-items-center justify-content-center fw-500 p-2 w-100">
                                <img src="{{ asset('image/icon/upload-outline-success.svg') }}" class="me-2" alt="icon upload">
                                UNGGAH BERKAS
                            </label>
                            <input class="form-input" onchange="handleFileInputChange('file_import')" hidden name="file" id="file_import" type="file" style="width: 100%" accept=".xlsx" required>
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-secondary fw-700 p-2 me-3 w-100" onclick="closeModalImport()">Batal</button>
                            <button type="button" class="btn btn-success fw-700 p-2 w-100" id="buttonImport">Import Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        function handleFileInputChange(element) {
            var labelElement = $(`#${element}_label`);
            var fileName = $(`#${element}`).val().split('\\').pop();
            if (fileName) {
                labelElement.html(fileName);
            } else {
                labelElement.html(`
                    <img src="{{ asset('image/icon/upload-outline-success.svg') }}" class="me-2" alt="icon upload">
                    UNGGAH BERKAS
                `);
            }
        }

        setTableData = {
            'table-data': ['_increment', 'nama', 'jabatan', 'ranting', 'alamat', 'is_action']
        }

        $(function() {
            setTable(`{{route('anggota.all')}}?class=table-data&table=true`)
        });

        function openModalImport() {
            $("#modalImport").modal('show');
        }
        
        function closeModalImport() {
            $("#modalImport").modal('hide');
        }

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/anggota/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{route('anggota.all')}}?class=table-data&table=true`)
                }
            })
        })

        $('#buttonImport').click(function(e) {
            e.preventDefault();

            var form = new FormData();
            form.append("file", $('#file_import')[0].files[0]);

            var settings = {
                "url": `${path}/api/anggota/import`,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {
                $('#modalImport').modal('hide');
                setTable(`{{route('anggota.all')}}?class=table-data&table=true`)
            });
        })
    </script>

</x-app-layout>