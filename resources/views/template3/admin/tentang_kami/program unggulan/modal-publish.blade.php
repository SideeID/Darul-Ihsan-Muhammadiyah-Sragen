    <div class="modal fade" id="modal-publish" tabindex="-1" aria-labelledby="modalPublishLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h4 class="modal-title" id="modalPublishLabel">Konfirmasi Publish Data</h4>
                <p>Apakah anda yakin ingin mempublish data ini?</p>
                <div class="modal-button">
                    <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-publish" id="publishData" onclick="publishData()">Ya, Publish!</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        #modal-publish {
            z-index: 1070;
        }
        .modal-content{
            padding-block: 30px;
            padding-inline: 30px;
            text-align: center;
        }

        h4{
            font-weight: 600
        }

        p{
            margin-top: 25px;
            font-size: 15px;
            color: #666E7A;
        }

        h3, p{
            justify-content: center
        }

        .modal-button{
            margin-top: 5px;
            display:flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        #modal-publish .btn-publish{
            background-color: #155fff;
            color: #ffffff;
            font-size: 12px;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }

        #modal-publish .btn-publish:hover{
            background-color: #1458eb;
            color: #ffffff;
        }

        #modal-publish .btn-batal{
            color: black;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px 15px;
            background-color: #ffffff;
        }

        #modal-publish .btn-batal:hover{
            color: black;
            border: 1px solid black;
            background-color: #e2e2e2;
        }
    </style>

    <script>
    function submitForm() {
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
        "processData": false,
        "contentType": false,
        "data": form,
        beforeSend: (xhr) => {
            showLoading();
            return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
        },
        error: function(x, status, error) {
            if (x.status == 401) {
                console.log("Session expired, please login again.");
                window.location.href = "{{ route('login') }}";
            } else {
                showAlert("Error!", "Request tidak sesuai", 'danger');
                closeLoading();
            }
        }
    };

    $.ajax(settings).done(function(response) {
        var res = JSON.parse(response);
        var id = res.data.id.toString();

        if (res.status === "success") {
            if (publish_sekarang === true) {
                publishData(id, form);
            } else {
                closeLoading();
                showAlert("Done!", "Data berhasil ditambah!", 'success');
                window.location.href = "{{ route('tentang_sekolah.program_unggulan') }}";
            }
        } else {
            closeLoading();
            showAlert("Permintaan tidak sesuai", "Periksa kembali data anda!", 'danger');
        }
    });
}

function publishData(id, form) {
    var settings = {
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        "url": `${path}/program-unggulan/update/${id}`,
        "method": "POST",
        "processData": false,
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        var res_publish = JSON.parse(response);

        if (res_publish.status === "success") {
            closeLoading();
            showAlert("Done!", "Data berhasil dipublish!", 'success');
            window.location.href = "{{ route('tentang_sekolah.program_unggulan') }}";
        } else {
            closeLoading();
            showAlert("Error!", "Gagal publish", 'danger');
        }
    });
}

    </script>

@include(config('app.template') . 'admin.tentang_kami.program unggulan.modal-simpan')
