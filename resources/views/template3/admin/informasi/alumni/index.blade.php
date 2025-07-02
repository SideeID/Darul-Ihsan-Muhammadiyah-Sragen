<x-app-layout>
    <div class="container-lg berita">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-700">Alumni</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Alumni</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Alumni</li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Alumni</h5>
                <div class="d-flex">
                    <a href="{{ route('alumni.export') }}" download target="_blank"
                        class="btn btn-black fw-500 btn-tambah me-3">
                        <img src="{{ asset('template3/image/icon/icon-download-file.svg') }}" class="me-2"
                            alt="">
                        Unduh Template
                    </a>
                    <button class="btn btn-black fw-500 btn-tambah me-3" type="button" data-bs-toggle="modal"
                        data-bs-target="#modalUnggah"><img src="{{ asset('template3/image/icon/icon-upload.svg') }}"
                            class="me-2" alt="">Unggah Data</button>
                    <a href="{{ route('informasi.alumni.tambah') }}" class="btn btn-primary fw-500 btn-tambah"><img
                            src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah
                        Alumni
                    </a>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                        <div class="d-flex align-items-center position-relative" style="width:100%!important;">
                            <select onchange="changeFilter()"
                                class="form-select filter-element table-filter-select fs-6 pe-5"
                                style="padding: 5px; height: 40px; border-radius: 0px;width:100%!important;"
                                id="year">
                                <option selected disabled>Angkatan</option>
                            </select>
                        </div>
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
                                <th class="align-middle fw-bold" scope="col">Nama Alumni</th>
                                <th class="align-middle fw-bold" scope="col">Angkatan Lulus</th>
                                <th class="align-middle fw-bold" scope="col">Lembaga/ Perusahaan</th>
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
                                src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Unggah Data -->
        <div class="modal fade" id="modalUnggah" tabindex="-1" aria-labelledby="modalUnggahLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="mb-0 border-0 modal-header d-flex flex-column align-items-center">
                        <img src="{{ asset('template3/image/icon/document-upload.svg') }}" alt="Icon Unggah"
                            style="width: 40px;">
                    </div>
                    <div class="mt-0 text-center modal-body">
                        <h6 class="mb-2 text-center modal-title fw-700 text-dark" id="modalUnggahLabel">Unggah data
                            alumni</h6>
                        <p class="mb-4 text-secondary fw-400 small">File yang didukung hanya XLSX, XLS, atau CSV</p>
                        <form id="uploadForm" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="fileInput" name="file" accept=".xlsx, .xls, .csv"
                                class="d-none">
                        </form>

                        <div class="gap-3 d-flex justify-content-center">
                            <button type="button" class="px-4 py-2 btn btn-outline-black fw-700"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="px-4 py-2 btn btn-black fw-700" id="uploadButton">Unggah
                                File</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="pb-0 border-0 modal-header">
                        <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalHapusLabel">
                            Konfirmasi Hapus Data
                        </h1>
                    </div>
                    <div class="modal-body">
                        <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus data ini?
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="px-4 py-2 btn btn-danger fw-700"
                                onclick="hapusFormGroup()">Ya, Hapus!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>


    <script>
        //fungsi dropdown tahun
        function populateYearSelect(selectId, range = 10) {
            const select = document.getElementById(selectId);
            const currentYear = new Date().getFullYear();

            select.innerHTML = '<option selected disabled>Angkatan</option>';

            // Tambahkan opsi tahun dari tahun saat ini hingga tahun yang diinginkan
            for (let i = currentYear; i >= currentYear - range; i--) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            populateYearSelect("year", 10);
        });


        // IMPORT DATA
        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            const formData = new FormData();
            formData.append('file', this.files[0]);

            fetch('{{ route('alumni.import') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success === true) { // Mengecek jika respons sukses
                        alert(data.message); // Tampilkan pesan sukses dari respons
                        $('#modalUnggah').modal('hide');
                        $('#modalUnggah').modal('hide');
                        window.location.href =
                            "{{ route('informasi.alumni') }}"; // Redirect ke halaman index alumni
                    } else {
                        alert('Gagal mengimport data: ' + data.message); // Jika gagal, tampilkan pesan error
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengunggah file');
                });
        });


        //KONSUM API
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('year').value = ''
            document.getElementById('year').selectedIndex = 0;
            document.getElementById('search').value = '';

            setTable(
                `{{ route('alumni.all') }}?class=table-data&table=true`
            )
        }

        function changeFilter() {
            var filterStatus = $('#year').val();
            let filterAngkatan = document.getElementById('year').value
            let filterSearch = document.getElementById('search').value

            setTable(
                `{{ route('alumni.all') }}?class=table-data&table=true&angkatan=${filterAngkatan}&search=${filterSearch}`
            )
        }

        setTableData = {
            'table-data': ['_increment', 'nama', 'tahun_lulus', 'lembaga_perusahaan', 'is_action']
        }

        function countSorotanTrue(data) {
            var count = data.filter(v => v.sorotan === "true").length
            return count;
        }

        $(function() {
            setTable(`{{ route('alumni.all') }}?class=table-data&table=true`)

            req({
                url: `${path}/api/alumni/list-all`,
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
                    url: `${path}/api/alumni/sorotan/${id}?sorotan=${status === "true" ? "true" : "false"}`,
                    type: "GET",
                    success: function(data) {
                        $('#modalConfirm').modal('hide');
                        setTable(`{{ route('alumni.all') }}?class=table-data&table=true`)

                        showAlert("Done!", "Data sorotan berhasil diubah", 'success')

                        req({
                            url: `${path}/api/alumni/list-all`,
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
                url: `${path}/api/alumni/delete/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('alumni.all') }}?class=table-data&table=true`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    req({
                        url: `${path}/api/alumni/list-all`,
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
