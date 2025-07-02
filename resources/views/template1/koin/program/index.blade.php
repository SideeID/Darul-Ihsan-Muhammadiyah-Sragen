<x-app-layout>
    <div class="container-lg koin program">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Program</h5>
                <div class="d-flex">
                    <a href="{{route('koin.program.tambah')}}" class="btn btn-success fw-700 btn-tambah"><img src="{{ asset('image/icon/icon-tambah-circle.svg') }}" class="me-2" alt=""> Tambah Program</a>
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
                                <th class="align-middle py-3 py-md-4" scope="col">Banner Image</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Nama Lengkap</th>
                                <th class="align-middle py-3 py-md-4" style="width: 15%;" scope="col">Inisiator</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Status Dokumen</th>
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

                <!-- Modal Verifikasi -->
                <div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header px-4 pt-4 pb-0 border-0">
                                <h1 class="modal-title fw-700 text-dark fs-5" id="modalVerifikasiLabel">Verifikasi Program</h1>
                            </div>
                            <div class="modal-body p-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-black fw-700 mb-2">Sampul pratinjau</p>
                                        <img id="poster-avatar" src="" class="img-fluid poster-avatar" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative mb-3 mb-md-4">
                                            <p class="text-black fw-700 mb-2">Sampul pratinjau</p>
                                            <p class="fw-500 text-secondary" id="sampul_pratinjau"></p>
                                        </div>
                                        <div class="form-group position-relative mb-3 mb-md-4">
                                            <p class="text-black fw-700 mb-2">Deskripsi</p>
                                            <p class="fw-500 text-secondary" id="deskripsi"></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-4">
                                                <p class="text-black fw-700 mb-2">Dana yang diajukan</p>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('image/icon/icon-rp.svg') }}" class="me-3" alt="">
                                                    <p class="fw-500 text-secondary mb-0" id="dana"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3 mb-md-4">
                                                <p class="text-black fw-700 mb-2">Dana yang diajukan</p>
                                                <div class="bg-transparent text-decoration-none d-flex align-items-center p-0">
                                                    <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                                                    <div>
                                                        <div class="text-secondary admin-title fw-700"><span id="user-nama">Administrator</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-black fw-700 mb-2">Persetujuan Program</p>
                                        <div class="row" id="status">
                                            <div class="col-6 col-lg-6 form-check-wrapper">
                                                <div class="form-check mb-3 mb-md-4">
                                                    <input class="form-check-input" type="radio" name="status" value="rejected" id="ditolak">
                                                    <label class="form-check-label text-darker" for="ditolak">
                                                        Ditolak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-6 form-check-wrapper">
                                                <div class="form-check mb-3 mb-md-4">
                                                    <input class="form-check-input" type="radio" name="status" value="approved" id="diterima">
                                                    <label class="form-check-label text-darker" for="diterima">
                                                        Diterima
                                                    </label>
                                                    <input class="hidden" hidden type="number" id="d_id_verifikasi">
                                                </div>
                                            </div>
                                            <p class="mb-5"><small class="fw-600 text-dark">Pemberitahuan:
                                                </small><small class="text-secondary">Anda wajib melakukan checklist
                                                    pada persetujuan untuk mengubah status pengajuan program pada
                                                    dashboard. Ingat!, persetujuan ini permanen dan tidak dapat
                                                    diubah.</small></p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="button" class="btn btn-outline-secondary text-black d-flex align-items-center fw-700 me-3" data-bs-dismiss="modal" onclick="closeModalVerifikasi()"><img src="{{ asset('image/icon/arrow-kembali.svg') }}" class="me-2" alt=""> Kembali</button>
                                                <button class="btn btn-success text-black d-flex align-items-center fw-700 me-3" data-bs-dismiss="modal" id="approveButton">Saya
                                                    setuju</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete -->
                <x-modal>
                </x-modal>
            </div>

            <script>
                let idDelete = null

                function deleteRow(id) {
                    $('#d_id').attr('value', id)
                    $("#modalDelete").modal('show');
                    idDelete = id
                }

                const settings = {
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": '',
                    "method": "GET",
                    "timeout": 0,
                    "processData": false,
                    "url": `${path}/api/koin/campaign/delete`,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    beforeSend: (xhr) => {
                        showLoading();
                        return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                    },
                    error: function(x, status, error) {
                        if (x.status == 401) {
                            console.log("Sorry, your session has expired. Please login again to continue");
                            window.location.href = "{{ route('login') }}";
                        } else {
                            showAlert(msg = "Request tidak sesuai", type = 'danger');
                        }
                        closeLoading();
                    },
                    success: function(data) {
                        $('#modalDelete').modal('hide');
                        setTable(`{{route('koin.campaign.all')}}?class=table-data&table=true`)
                    }
                }

                $('#buttonDelete').click(function() {
                    settings.url = `${path}/api/koin/campaign/delete/` + $("#d_id").val()
                    $.ajax(settings).done(function(response) {
                        var res = JSON.parse(response);
                        var id = res.data.id.toString()

                        if (res.status === "success") {
                            closeLoading();
                            $("#modalDelete").modal('hide');
                            setTable(`{{route('koin.campaign.all')}}?class=table-data&table=true`)
                        } else {
                            closeLoading();
                            showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                        }
                    });
                })


                function approveCampaign(id, statusData) {
                    settings.url = `${path}/api/koin/campaign/approve/${id}?status=` + statusData;
                    settings.method = 'GET'
                    $.ajax(settings).done(function(response) {
                        var res = JSON.parse(response);
                        if (res.status === "success") {
                            closeLoading();
                            $("#modalVerifikasi").modal('hide');
                            setTable(`{{route('koin.campaign.all')}}?class=table-data&table=true`)
                        } else {
                            closeLoading();
                            showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                        }
                    });
                }

                // Event listener for the "Saya setuju" button
                $('#approveButton').click(function() {
                    var campaignId = $("#d_id_verifikasi").val();
                    var status = $('input[name="status"]:checked').val();
                    approveCampaign(campaignId, status);
                });


                function verifikasi(id) {
                    $("input[name='status']").prop("checked", false);
                    $("#modalVerifikasi").modal('show');
                    var settingsGetDetail = {
                        "url": `${path}/api/koin/campaign/detail/` + id,
                        "method": "GET",
                        "timeout": 0,
                    };

                    $.ajax(settingsGetDetail).done(function(response) {
                        var data = response.data;
                        $("#sampul_pratinjau").html(data.nama)
                        $("#deskripsi").html(data.deskripsi)
                        $(".poster-avatar").attr('src', data.poster)
                        $("#d_id_verifikasi").val(id)
                        $("#dana").html(rupiah(data.dana.split('.')[0].toLocaleString(), "angka"))
                    })
                }

                function closeModalVerifikasi() {
                    $(`#modalVerifikasi`).modal('hide');
                }

                setTableData = {
                    'table-data': ['_increment', 'banner', 'nama', 'penanggung_jawab', 'status', 'is_action']
                }

                $(function() {
                    setTable(`{{route('koin.campaign.all')}}?class=table-data&table=true`)
                });
            </script>

</x-app-layout>