<x-app-layout>
    <div class="container-lg tanglet">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('tanglet.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Nderek Tanglet</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <hr class="my-4">
                <form class="form-tanglet" id='form_tanglet' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <p class="text-black fw-700 mb-3">Detail Pertanyaan</p>
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="nama_lengkap_pertanyaan" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap_pertanyaan" name="nama_lengkap_pertanyaan" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" value="" disabled>
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Pertanyaan" aria-label="Pertanyaan" style="min-height: 235.336px" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <p class="text-black fw-700 mb-3">Jawab Pertanyaan</p>
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="ustadz" class="form-label">Nama Ustadz</label>
                                <select class="form-select" name="ustadz" id="ustadz" style="width: 100%">
                                    <option value="" class="d-none">Pilih Ustadz</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group position-relative mb-4 mb-md-4">
                                <label for="jawaban" class="form-label">Jawaban dari Ustadz</label>
                                <textarea name="jawaban" id="jawaban" class="form-control" placeholder="Jawaban dari Ustadz" aria-label="Jawaban dari Ustadz" style="min-height: 235.336px"></textarea>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success w-100 fw-500" type="button" id="btnModalConfirm" data-bs-toggle="modal" data-bs-target="#modalConfirm">BALAS PERTANYAAN</button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header px-4 pt-4 pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalConfirmLabel">Konfirmasi Input Data</h1>
                                </div>
                                <div class="modal-body p-4">
                                    <p class="text-black mb-4">Apakah data yang anda masukkan sudah benar?, Anda bisa cek kembali jika belum yakin</p>
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-danger fw-700 p-2 me-3 w-100" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-outline-success fw-700 p-2 w-100" id="buttonSubmit">Simpan Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        var jawaban;
        var id = {!!json_encode($data) !!};

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#jawaban'))
            .then(editor => {
                jawaban = editor;
            })
            .catch(error => {
                console.error(error);
            });

        //get data nderek
        req({
            url: `${path}/api/nderek/detail/${id}`,
            type: "GET",
            success: function(response) {
                var data = response.data

                //get data narasumber
                req({
                    url: `${path}/api/pengaturan/narasumber/list`,
                    type: "GET",
                    success: function(response) {
                        var list_narasumber = response.data

                        $("#ustadz").html(`<option value="" class="d-none">Pilih Ustadz</option>`).append(
                            list_narasumber.map((item) => {
                                return `<option value="${item.id}">${item.nama}</option>`
                            })
                        )

                        $("#nama_lengkap_pertanyaan").val(data.nama)
                        $("#pertanyaan").val(data.pertanyaan)

                        if (data.status === "answered") {
                            $("#ustadz").val(data.id_narasumber)
                            // $("#jawaban").val(data.jawaban)
                            jawaban.data.set(data.jawaban);
                            $("#btnModalConfirm").html("UBAH BALASAN")
                        }
                    }
                })
            }
        })

        //submit form
        $("#buttonSubmit").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("jawaban", `${jawaban.getData()}`);
            form.append("id_narasumber", parseInt($('#ustadz').val()));

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/nderek/update/${id}`,
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
                        showAlert(msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {
                    closeLoading();
                    window.location.href = "{{ route('tanglet.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })
    </script>
</x-app-layout>