<style>
    .text-blue {
        color: #55595C80;
    }
</style>
<x-app-layout>
    <div class="container-lg jamaah haji">
        <div class="card card-main mb-4">
            <div class="card-body overflow-auto p-4">
                <form class="form-haji" id='form_pengaturan' enctype="multipart/form-data" method="post">
                    @csrf

                    <section>
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="fw-700 text-dark mb-3">Foto Profil</p>
                                <div class="img-preview mb-3 mb-md-4">
                                    <input type="file" style="display: none;" name="foto" id="foto" accept="image/png, image/jpg">
                                    <img src="" id="img_preview" onerror="this.style.display='none'" alt="">
                                    <label for="foto" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                        <div class="label-content">
                                            <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                                            <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                        </div>
                                    </label>
                                    <div class="invalid-feedback text-center"></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p class="fw-700 text-dark mb-3">Detail Profil</p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" value="{{auth()->user()->name}}">
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="email" class="form-label">Email Pengguna</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{auth()->user()->email}}">
                                </div>
                                <p class="fw-700 text-dark mb-3">Reset Password</p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Password Lama" aria-label="Password Lama">
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru" aria-label="Password Baru">
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" aria-label="Konfirmasi Password Baru">
                                </div>
                            </div>
                        </div>
                        <button id="btnModalConfirm" class="btn btn-success w-100 fw-500" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">SIMPAN PERUBAHAN</button>
                    </section>

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
        var imageInput = $("#foto");
        var imagePreview = $("#img_preview");

        // image preview
        imageInput.change(function() {
            var selectedFile = imageInput[0].files[0];

            if (selectedFile) {
                if (selectedFile.size <= 2 * 1024 * 1024) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.show()
                        imagePreview.attr("src", e.target.result);
                        $(".img-preview label").empty()
                    };

                    reader.readAsDataURL(selectedFile);
                } else {
                    imagePreview.hide()
                    alert("File melebihi ukuran 2MB.");
                    imageInput.val("");
                    imagePreview.attr("src", "");
                    $(".img-preview label").html(`
                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto" alt="icon upload foto">
                        <div class="btn btn-outline-success py-2 px-3 fw-500">Unggah Foto 4x6</div>
                    `)
                }
            } else {
                imagePreview.hide()
                imagePreview.attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto" alt="icon upload foto">
                    <div class="btn btn-outline-success py-2 px-3 fw-500">Unggah Foto 4x6</div>
                `)
            }
        });

        $("#form_pengaturan").submit(function(event) {
            event.preventDefault();

            var formdata = new FormData();
            formdata.append("name", $('#name').val());
            formdata.append("email", $('#email').val());
            formdata.append("password", $('#password').val());
            formdata.append("current_password", $('#current_password').val());
            formdata.append("password_confirmation", $('#password_confirmation').val());
            if ($("#foto").val() !== "") {
                formdata.append("foto", $("#foto")[0].files[0]);
            }

            var requestOptions = {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'

                },
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch(`${path}/api/pengaturan/profile-update`, requestOptions)
                .then(response => response.json())
                .then(result => {
                    window.location.replace(path + "/pengaturan");
                })
                .catch(error => console.log('error', error));
        })
    </script>
</x-app-layout>