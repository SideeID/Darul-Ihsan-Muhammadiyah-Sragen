<x-app-layout>
    <div class="container-lg anggota">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('anggota.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Tambah Anggota</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <hr class="my-4">
                <form class="form-anggota" id='form_anggota' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="form-group position-relative mb-3 mb-md-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan" aria-label="Jabatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="ranting" class="form-label">Ranting</label>
                                <input type="text" id="ranting" name="ranting" class="form-control" placeholder="Ranting" aria-label="Ranting">
                            </div>
                        </div>
                    </div>
                    <div class="form-group position-relative mb-3 mb-md-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" aria-label="Alamat" style="min-height: 235.336px"></textarea>
                    </div>

                    <button class="btn btn-success w-100 fw-500 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">SIMPAN DATA ANGGOTA</button>

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
                                        <button type="button" class="btn btn-outline-success fw-700 p-2 w-100" id="submitForm">Simpan Data</button>
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
        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("nama", $('#nama').val());
            form.append("jabatan", $('#jabatan').val());
            form.append("ranting", $('#ranting').val());
            form.append("alamat", $('#alamat').val());

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{route('anggota.store')}}`,
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
                    window.location.href = "{{ route('anggota.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>