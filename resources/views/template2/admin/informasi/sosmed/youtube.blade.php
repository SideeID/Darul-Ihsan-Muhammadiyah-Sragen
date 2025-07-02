<x-app-layout>
    <div class="container-lg sosmed">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Sosial Media</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item active" aria-current="page">Sosial Media</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">List Sosial Media</h5>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary fw-600 btn-tambah" onclick="openForm('')"><img src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah Tautan</button>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="p-2 mb-4 d-flex justify-content-between align-items-center">
                    <div class="table-filter d-flex align-items-center">
                        <img src="{{ asset('template2/images/filter.svg') }}" alt=""
                            style="border: solid 0.5px #D6D8DB; padding:6px; border-radius:5px 0px 0px 5px; height: 40px;">
                        <div class="d-flex align-items-center position-relative">
                            <input type="date" onchange="changeFilter()" class="form-control filter-element"
                                id="table-filter-tanggal"
                                style="border-radius:0px; border-left: 0px solid #fff; border-right: 0px solid #fff; padding:5px; padding-right:30px; height: 40px; width: 160px;">
                            <span
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                                <i class="fa fa-chevron-down"></i>
                            </span>
                        </div>
                        <select onchange="changeFilter()" class="form-select filter-element table-filter-select"
                            style="padding: 5px; height: 40px; border-radius:0px; width: 120px;" id="table-filter-status">
                            <option value="">Status</option>
                            <option value="active">Dipublish</option>
                            <option value="inactive">Draf</option>
                        </select>
                        <select onchange="changeFilter()" class="form-select filter-element table-filter-select"
                            style="padding: 5px; height: 40px; border-radius:0px; width: 120px;" id="table-filter-medium">
                            <option value="">Medium</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Youtube">Youtube</option>
                            <option value="Youtube Short">Youtube Short</option>
                        </select>

                        <button class="btn filter-element d-flex align-items-center" onclick="resetFilter()"
                            style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:7px; border-left: 0px solid #fff; color:#D32246; min-width: 80px; height: 40px;">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>

                    <div class="input-group" style="width: 250px;">
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
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>No</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Thumbnail</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Link</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Medium</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Tanggal</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="fw-bold" scope="col">
                                    <div class="th-content">
                                        <span>Status</span>
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" class="ms-2" alt="">
                                    </div>
                                </th>
                                <th class="text-center fw-bold" scope="col">
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
                                src="{{ asset('image/icon/prev-black.svg') }}" class=""
                                alt="next"></button>
                        <button class="btn btn-next" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class=""
                                alt="next"></button>
                    </div>
                </div>

                <!-- Modal Filter -->
                <div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="modalFilterLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="px-4 pt-4 pb-0 border-0 modal-header">
                                <h1 class="modal-title fw-700 text-dark fs-5" id="modalFilterLabel">Filter Pencarian Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="p-4 modal-body">
                                <div class="mb-3 form-group position-relative mb-md-4">
                                    <label for="tahun" class="mb-2 fw-500">Tahun Daftar</label>
                                    <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Tahun Daftar" aria-label="Tahun Daftar" onchange="getInputValue('tahun')">
                                </div>
                                <div class="mb-3 form-group position-relative mb-md-4 form-range-text">
                                    <label for="" class="mb-2 fw-500">Usia</label>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="number" id="min_age" name="min_age" class="form-control" placeholder="Usia Minimal" aria-label="Usia Minimal">
                                        <hr class="mx-2">
                                        <input type="number" id="max_age" name="max_age" class="form-control" placeholder="Usia Maksimal" aria-label="Usia Maksimal">
                                    </div>
                                </div>
                                <div class="mb-3 form-group position-relative mb-md-4 form-range-text">
                                    <label for="" class="mb-2 fw-500">Lama Mendaftar</label>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="number" id="min_reg" name="min_reg" class="form-control" placeholder="Tahun Minimal" aria-label="Tahun Minimal">
                                        <hr class="mx-2">
                                        <input type="number" id="max_reg" name="max_reg" class="form-control" placeholder="Tahun Maksimal" aria-label="Tahun Maksimal">
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="" class="mb-2 fw-500">Nomor Porsi</label>
                                    <div class="row" id="no_porsi">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
                                                <input class="form-check-input" type="radio" name="no_porsi" value="false" id="memiliki" onchange="showResetInputRadio('no_porsi')">
                                                <label class="form-check-label text-darker" for="memiliki">
                                                    Memiliki Nomor Porsi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
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
                                    <label for="" class="mb-2 fw-500">Kelengkapan Data</label>
                                    <div class="row" id="data_diri">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
                                                <input class="form-check-input" type="radio" name="data_diri" value="true" id="data_lengkap" onchange="showResetInputRadio('data_diri')">
                                                <label class="form-check-label text-darker" for="data_lengkap">
                                                    Data Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
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
                                    <label for="" class="mb-2 fw-500">Kelengkapan Berkas</label>
                                    <div class="row" id="berkas">
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
                                                <input class="form-check-input" type="radio" name="berkas" value="true" id="berkas_lengkap" onchange="showResetInputRadio('berkas')">
                                                <label class="form-check-label text-darker" for="berkas_lengkap">
                                                    Berkas Lengkap
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 form-check-wrapper">
                                            <div class="mb-3 form-check mb-md-4">
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
                                    <button type="button" class="p-2 btn btn-outline-danger fw-700 me-3 w-100" data-bs-dismiss="modal" onclick="resetFilter()">Reset</button>
                                    <button class="p-2 btn btn-success fw-700 w-100" data-bs-dismiss="modal" onclick="changeFilter()">Filter Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pb-0 border-0 modal-header">
                    <h1 class="modal-title fw-700 text-dark w-100 fs-5" id="modalEditLabel">Tambah Media</h1>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf

                        <div class="mb-3 form-group d-flex justify-content-between">
                            <div class="me-2" style="flex: 1;">
                                <label for="medium" class="form-label">Medium</label>
                                <select id="medium" name="medium" class="form-control">
                                    <option value="" selected disabled>Pilih Medium</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Youtube Short">Youtube Short</option>
                                </select>
                            </div>

                            <div style="flex: 1;">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="mb-3 form-group position-relative mb-md-4">
                            <label for="url" class="form-label">File URL</label>
                            <input type="text" id="url" name="url" class="form-control" placeholder="http://www." aria-label="URL">
                        </div>

                        <div class="mb-3 form-group position-relative mb-md-4">
                            <label for="judul" class="form-label">Judul</label>
                            <input id="judul" name="judul" class="form-control" placeholder="Judul" rows="4" aria-label="Caption"></inp>
                        </div>

                        <div id="foto_post">
                            <label for="url" class="form-label">Gambar Post</label>
                            <div class="mb-4 img-preview">
                                <input type="file" hidden name="foto" id="foto" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#foto', '#img_preview');">
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 form-check" id="sorotan_check" style="display: none;">
                            <input type="checkbox" class="form-check-input" id="sorotan" name="sorotan">
                            <label class="form-check-label" for="sorotan">Jadikan Sorotan</label>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="publish">
                            <label class="form-check-label" for="publish">Centang box disamping untuk publish data ke website!</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <input type="hidden" id="d_id">
                            <button type="button" class="px-4 py-2 text-black btn btn-outline-black d-flex align-items-center fw-700 me-3" onclick="closeModalEdit('modalEdit')">Batal</button>
                            <a href="" class="p-2 px-4 py-2 btn btn-primary fw-700" id="submitForm">Simpan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#table-filter-tanggal", {
                dateFormat: "Y-m-d",
                defaultDate: "{{ date('Y-m-d') }}",
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

        let filledForm = false

        const date = new Date();

        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();

        let currentDate = `${year}-${month}-${day}`;

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''
            document.getElementById('table-filter-tanggal').value = ''
            document.getElementById('table-filter-medium').value = ''

            setTable(`{{route('sosmed.all')}}?class=table-data&table=true`)
        }

        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();
            var filterTanggal = $('#table-filter-tanggal').val();
            var filterMedium = $('#table-filter-medium').val();

            setTable(`{{route('sosmed.all')}}?class=table-data&table=true&status=${filterStatus}&tanggal=${filterTanggal}&type=${filterMedium}`)
        }

        setTableData = {
            'table-data': ['_increment', 'banner', 'url', 'type', 'tanggal', 'badge', 'is_action']
        }

        $(function() {
            setTable(`{{route('sosmed.all')}}?class=table-data&table=true`)
        });

        document.getElementById('medium').addEventListener('change', function() {
            const selectedMedium = this.value;
            const sorotanCheck = document.getElementById('sorotan_check');

            if (selectedMedium === 'Youtube' || selectedMedium === 'Youtube Short') {
                sorotanCheck.style.display = 'block';
            } else {
                sorotanCheck.style.display = 'none';
            }
        });

        function onchangeImgPreview(imageInput, imagePreview) {
            var selectedFile = $(`${imageInput}`)[0].files[0];

            if (selectedFile) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(`${imagePreview}`).show()
                    $(`${imagePreview}`).attr("src", e.target.result);
                    $(`${imageInput}`).siblings("label").empty();
                };

                reader.readAsDataURL(selectedFile);
            } else {
                $(`${imagePreview}`).hide()
                $(`${imagePreview}`).attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        function closeModalEdit(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function clearModalInput() {
            $('#medium').val('');
            $('#tanggal').val('');
            $('#url').val('');
            $('#judul').val('');
            $('#foto').val('');
            $('#publish').prop('checked', false);
            $('#img_preview').attr('src', '');
            $('#img_preview').hide();
            $(".img-preview label").html(`
                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                </div>
            `)
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/sosmed/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{route('sosmed.all')}}?class=table-data&table=true`)
                }
            })
        })

        function openForm(id) {
            $('#d_id').val(id)
            $("#modalEdit").modal('show');

            if (id) {
                filledForm = true
                req({
                    url: `${path}/api/sosmed/detail/${id}`,
                    type: "GET",
                    success: function(data) {
                        var settingsGetDetail = {
                            "url": `${path}/api/sosmed/detail/${id}`,
                            "method": "GET",
                            "timeout": 0,
                        };

                        $.ajax(settingsGetDetail).done(function(response) {
                            var data = response.data;
                            $('#medium').val(data.type);
                            $('#tanggal').val(data.tanggal);
                            $('#judul').val(data.judul);
                            $('#url').val(data.url);
                            if (data.status === "active") {
                                $('#publish').prop('checked', true);
                            } else {
                                $('#publish').prop('checked', false);
                            }

                            if (data.type === "Youtube" || data.type === "Youtube Short") {
                                $('#sorotan_check').show();
                            } else {
                                $('#sorotan_check').hide();
                            }

                            if (data.sorotan === 1) {
                                $('#sorotan').prop('checked', true);
                            } else {
                                $('#sorotan').prop('checked', false);
                            }

                            if (data.image === "" || data.image === null) {
                                $(".img-preview label").html(`
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                `)
                                foto_value = ""
                            } else {
                                $("#img_preview").attr("src", path + data.image)
                                $(".img-preview label").empty()
                                $("#img_preview").show()
                            }

                            if (data.status === "active") {
                                $("#checkboxPublish").hide();
                            }
                        });
                    }
                })
            } else {
                filledForm = false

                clearModalInput()
                $("#url").val();
                $("#foto")[0].files[0];
            }
        }

        function tambahTautan() {
            var form = new FormData();
            form.append("url", $("#url").val());
            form.append("tanggal", $("#tanggal").val());
            form.append("type", $("#medium").val());
            form.append("judul", $("#judul").val());
            form.append("status", $("#publish").is(":checked") ? "active" : "inactive");
            form.append("image", $("#foto")[0].files[0]);
            form.append("sorotan", $("#sorotan").is(":checked") ? 1 : 0);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/sosmed/store`,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                beforeSend: (xhr) => {
                    showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(x, status, error) {
                    if (x.status == 401) {
                        console.log("Sorry, your session has expired. Please login again to continue");
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert(msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString();

                if (res.status === "success") {
                    var settings = {
                        "headers": {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        "url": `${path}/api/sosmed/publish-one/${id}`,
                        "method": "GET",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form
                    };

                    $.ajax(settings).done(function(response) {
                        var res_publish = JSON.parse(response)

                        if (res_publish.status === "success") {
                            closeLoading();
                            showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!", type = 'success');
                            window.location.href = "{{ route('sosmed.youtube') }}";
                        } else {
                            closeLoading();
                            showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                        }
                    });
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
        }

        function editTautan() {
            var form = new FormData();
            form.append("type", $("#medium").val());
            form.append("status", $("#publish").is(":checked") ? "active" : "inactive");
            form.append("url", $("#url").val());
            form.append("judul", $("#judul").val());
            form.append("tanggal", $("#tanggal").val());
            form.append("sorotan", $("#sorotan").is(":checked") ? 1 : 0);

            if ($("#foto").val() !== "") {
                form.append("image", $("#foto")[0].files[0]);
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/sosmed/update/${$("#d_id").val()}`,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                beforeSend: (xhr) => {
                    showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(x, status, error) {
                    if (x.status == 401) {
                        console.log("Sorry, your session has expired. Please login again to continue");
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert(msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString();

                if (res.status === "success") {
                    closeLoading();
                    showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                    window.location.href = "{{ route('sosmed.youtube') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
        }

        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            if (filledForm) {
                editTautan()
            } else {
                tambahTautan();
            }
        })
    </script>

</x-app-layout>
