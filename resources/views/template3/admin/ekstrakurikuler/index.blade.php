<x-app-layout>
    <div class="container-lg ekstrakurikuler">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-700">Ekstrakurikuler</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Ektrakurikuler</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Ektrakurikuler</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Ekstrakurikuler</h5>
                <div class="d-flex">
                    <a href="{{ route('ekstrakurikuler.tambah') }}" class="btn btn-primary fw-600 btn-tambah"><img
                            src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah
                        Data</a>
                </div>
            </div>

            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                        <select onchange="changeFilter()"
                            class="form-select filter-element table-filter-select fs-6 text-sm"
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
                            placeholder="Cari Sesuatu" style="background-color: #EFEFF0; border: none;">
                    </div>
                </div>

                <div class="mb-4 table-wrapper">
                    <table class="table mb-0 table-scrollable" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle fw-bold" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle fw-bold" scope="col">Thumbnail</th>
                                <th class="align-middle fw-bold" scope="col">Judul</th>
                                <th class="align-middle fw-bold" scope="col">Link File</th>
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
                            <span>Show</span>
                            <select class="mx-2 table-length-select" id="table-length-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <p class="mt-0 mb-0 text-black table-info">
                            Menampilkan <span class="table-show">-</span> data dari <span class="table-total">-</span>
                            data
                        </p>
                    </div>

                    <div class="text-black table-pagination d-flex align-items-center">
                        <button class="btn btn-prev" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <button class="btn btn-next" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        // KONSUM API
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''

            setTable(
                `{{ route('ekskul.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();


            setTable(
                `{{ route('ekskul.all') }}?class=table-data&table=true&status=${filterStatus}`)
        }

        setTableData = {
            'table-data': ['_increment', 'banner', 'nama', 'url', 'badge', 'is_action']
        }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('ekskul.all') }}?class=table-data&table=true`)
        });

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
                url: `${path}/api/ekskul/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('ekskul.all') }}?class=table-data&table=true`)
                    showNotification('hijau', 'Data ekstrakurikuler berhasil dihapus!')
                }
            })
        })
    </script>
</x-app-layout>
