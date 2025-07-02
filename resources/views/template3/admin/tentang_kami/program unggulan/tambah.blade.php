<x-app-layout>
    <div class="container-lg program">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div class="mb-3">
                <a href="{{ route('tentang_sekolah.program_unggulan') }}" class="text-decoration-none text-dark d-flex flex-direction-row align-items-center">
                    <p class="mt-0 mb-3"><span>&#x2039;</span> Kembali</p>
                </a>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-3 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h4 class="mb-3 px-0 fw-600 text-dark mb-sm-0 h6">Tambah Data</h4>
            </div>
            <div class="p-3 py-4 overflow-auto table-data card-body">
                <form class="form-program" id='form_program' action="" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row d-flex h-100 flex-direction-row">
                    <div class="col">
                        <div class="form-group text-align-left">
                            <label for="nama" class="nama d-flex justify-content-between align-items-center">
                                <p class="my-0 py-0" style="font-weight: 700; font-size: 14px; padding-bottom-0">Nama Program</p>
                                <i class="fas fa-asterisk my-0 py-0" style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                            </label>
                            <input type="text" class="form-control" style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="nama" name="nama" placeholder="Tulis nama program" onblur="validateInput()">
                        </div>
                        <div class="mt-3 form-group text-align-left">
                            <label for="url" class="d-flex justify-content-between align-items-center">
                                <p class="my-0 py-0" style="font-weight: 700; font-size: 14px;">Link Video</p>
                                <i class="fas fa-asterisk my-0 py-0" style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                                <input type="text" class="form-control rounded-end" style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="url" placeholder="Tulis link" aria-label="Link Dokumen">
                            </div>
                        </div>
                        <div class="mt-3 form-group text-align-left">
                            <label for="deskripsi" class="deskripsi d-flex justify-content-between align-items-center">
                                <p class="my-0 py-0" style="font-weight: 700; font-size: 14px; padding-bottom-0">Deskripsi Program</p>
                                <i class="fas fa-asterisk my-0 py-0" style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                            </label>
                            <textarea type="text" rows="5" class="form-control" style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="deskripsi" placeholder="Tulis deskripsi" onblur="validateInput()"></textarea>
                            <small id="error-msg" style="color: red; display: none;">Oops, kolom ini tidak boleh kosong. Mohon diisi yah!</small>
                        </div>
                    </div>
                    <div class="col h-100 d-flex flex-column align-items-end ms-2">
                        <div class="mb-4 img-preview" style="overflow:hidden;">
                            <input type="file" hidden name="gambar" id="gambar" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#gambar', '#img_preview');">
                            <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                            <label for="gambar" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('template3/image/gallery-add.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                            <div class="label-content">
                                <p class="mb-2 text-center text-black fw-700">Unggah sampul, atau <span class="text-primary">telusuri</span></p>
                                <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan dalam format PNG atau JPG saja.</small>
                            </div>
                            </label>
                        </div>
                    </div>
                    {{-- <div class="col h-100">
                        <div class="media-upload text-align-center h-100" id="upload-section">
                            <div class="upload-box text-align-center h-100 d-flex flex-column justify-content-center align-items-center" style="border: none; padding: 20px; border-radius: 10px; background-color: #f8f9fa;" onclick="document.getElementById('upload').click();">
                                <img class="mb-0" src="{{asset('template3/image/gallery-add.svg')}}" style="width: 50px;" alt="Upload Icon">
                                <input type="file" id="upload" accept="image/png, image/jpeg" style="display: none;" onchange="showSelectedFile(event)">
                                <p class="mt-1 mb-0" style="font-size: 14px; color: #666; font-weight: 600;">Unggah gambar header, atau <a href="#" onclick="document.getElementById('upload').click();" style="text-decoration: none">telusuri</a></p>
                                <span class="d-block text-align-center" style="font-size: 12px; color: #999; margin-top: 7px;">Ukuran 1920x1080px diperlukan dalam format PNG atau JPG saja</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="form-group position-relative mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publishSekarang">
                                <label class="form-check-label" for="publishSekarang">
                                    *Centang box disamping untuk publish data ke website!
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-end">
                        <button class="btn btn-primary mt-auto fw-500 mb-2 w-100" id="simpanData" type="button" onclick="validateForm()">Simpan Data</button>
                    </div>
                </div>

                <div class="modal fade" id="modalPublish" tabindex="-1" aria-labelledby="modalPublishLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalPublishLabel">Konfirmasi Publish Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mempublish data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700" style="background-color: rgb(106, 106, 255) !important; border: none !important;"
                                       id="publishButton">Ya, Publish!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700"
                                            id="submitForm">Ya, Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </form>
            </div>
        </div>
    </div>

    <div id="notif-done" class="notif" style="display: none">
        <span class="notif-done-icon">
            <img src="{{asset('template3/image/tick-circle.svg')}}" alt="">
        </span>
        <span id="notification-message" class="notification-text d-flex px-2">
            <h6 class="m-0" style="font-weight: 600; color: #3C7B46;">Done</h6>
            <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil ditambah!</p>
        </span>
        <button id="close-notif-done" class="close-btn">✖</button>
    </div>

    <div id="notif-warning" class="notif" style="display: none">
        <span class="notif-warning-icon">
            <img src="{{asset('template3/image/warning.svg')}}" alt="">
        </span>
        <span id="notification-message" class="notification-text d-flex px-2">
            <h6 class="m-0" style="font-weight: 600; color: #D32246; font-size: 14px;">Maaf, permintaan gagal</h6>
            <p style="margin: 0; color: #666; font-size: 12px;">Silahkan periksa kembali data anda!</p>
        </span>
        <button id="close-notif-warning" class="close-btn">✖</button>
    </div>

    <x-modal></x-modal>

    <style>
        .h-100 {
            height: 100%;
        }

        .media-upload .upload-box {
            min-height: 100%;
            height: 290px !important;
        }

        .col {
            flex-grow: 1;
        }

        .notif {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 10px;
            background-color: #FFE1DF;
            border-radius: 5px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .notification-text{
            flex-direction: column;
        }

        #notif-done{
            background-color: #EBFAF4;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
        }
    </style>

    <script>
    var publish_sekarang = 'draft';

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
                <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
            </div>
        `)
    }
}

    $("#publishSekarang").change(function() {
        if ($(this).prop("checked")) {
            publish_sekarang = 'published'
        } else {
            publish_sekarang = 'draft'
        }
    });

    function validateForm() {
        const deskripsi = document.getElementById("deskripsi");
        const errorMsg = document.getElementById("error-msg");
        const notifWarning = document.getElementById("notif-warning");


        // Check if deskripsi is empty
        if (deskripsi.value.trim() === "") {
            deskripsi.style.border = "1px solid red";
            errorMsg.style.display = "block";
            notifWarning.style.display = "flex";
        } else {
            deskripsi.style.border = "";
            errorMsg.style.display = "none";
            notifWarning.style.display = "none";

            if (publish_sekarang === 'published') {
                $('#modalPublish').modal('show');
            } else {
                $('#modalConfirm').modal('show');
            }
        }
    }

    // document.getElementById('publishButton').addEventListener('click', function () {
    // const modalPublish = new bootstrap.Modal(document.getElementById('modalPublish'));
    // modalPublish.hide();

    // const simpanModal = new bootstrap.Modal(document.getElementById('modalConfirm'));
    // simpanModal.show();
    // });

        $('#publishButton').on('click', function () {
            $('#modalPublish').modal('hide');
            $('#modalConfirm').modal('show');
        });

        $('#modalPublish').on('hidden.bs.modal', function () {
            $('#modalConfirm').modal('show');
        });



    function closeWarningNotif() {
        document.getElementById("notif-warning").style.display = "none";
    }

//submit form
$("#submitForm").on("click", function(event) {
    event.preventDefault();

    var form = new FormData();
    form.append("nama", $('#nama').val());
    form.append("deskripsi", $('#deskripsi').val());
    form.append("gambar", $("#gambar")[0].files[0]);
    form.append("url", $('#url').val());
    form.append("status", publish_sekarang);

    var settings = {
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        "url": `{{ route('program-unggulan.store') }}`,
        "method": "POST",
        "timeout": 0,
        "timeout": 0,
        "mimeType": "multipart/form-data",
        "processData": false,
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
        var id = res.data.id.toString()

        if (res.status === "success") {

            if (publish_sekarang === true) {
                //publish berita
                var settings = {
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": `${path}/program-unggulan/publish/${id}`,
                    "method": "POST",
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
                        $('#notif-done').show();
                        setTimeout(function() {
                            $('#notif-done').fadeOut();
                        }, 3000);
                        // showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!",
                        //     type = 'success');
                        window.location.href = "{{ route('tentang_sekolah.program_unggulan') }}";
                    } else {
                        closeLoading();
                        showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                            'danger');
                    }
                });
            } else {
                closeLoading();
                $('#notif-done').show();
                setTimeout(function() {
                    $('#notif-done').fadeOut();
                }, 3000);
                // showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                window.location.href = "{{ route('tentang_sekolah.program_unggulan') }}";
            }
        } else {
            closeLoading();
            $('#notif-warning').show();
                        setTimeout(function() {
                            $('#notif-warning').fadeOut();
                        }, 3000);
            // showAlert(msg = "Permintaan tidak sesuai", sub_msg =
            //     "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
            //     type = 'danger');
        }
    });
})
</script>

</x-app-layout>
