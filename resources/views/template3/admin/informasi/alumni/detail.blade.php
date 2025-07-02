<x-app-layout>
    <div class="container-lg alumni">
        <a href="{{ route('informasi.alumni') }}"
            class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-2">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Data</h5>
            </div>

            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-staf" id="form_staf" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <!-- Form Inputs (Left Side) -->
                        <div class="col-md-8">
                            <div class="form-group position-relative mb-3">
                                <label for="nama" class="form-label d-flex justify-content-between fw-500 small">
                                    <span>Nama Alumni</span>
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="e.g; Nama Alumni" required>
                            </div>
                            <div class="form-group position-relative mb-5">
                                <label for="lembaga_perusahaan"
                                    class="form-label d-flex justify-content-between fw-500 small">
                                    <span>Lembaga/Perusahaan</span>
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" id="lembaga_perusahaan" name="lembaga_perusahaan"
                                    class="form-control" placeholder="Tulis Lembaga/ Perusahaan" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group position-relative mb-5">
                                <label for="tahun_lulus" class="form-label d-flex justify-content-between fw-500 small">
                                    <span>Angkatan lulus</span>
                                    <span style="color: red;">*</span>
                                </label>
                                <select onchange="changeFilter()"
                                    class="form-select filter-element table-filter-select fs-6 pe-5"
                                    style="padding: 5px; height: 40px; border-radius: 8px;" id="year">
                                    <option selected disabled>Angkatan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-flex justify-content-end align-items-end">
                            <button class="btn btn-warning mt-auto fw-500 mb-2" style="width: 233px;" type="button"
                                data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan Data</button>
                        </div>
                    </div>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5"
                                        id="modalConfirmLabel">
                                        Konfirmasi Simpan Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menambahkan data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success fw-700 py-2 px-4"
                                            id="submitForm">Ya,
                                            Simpan!</button>
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
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5"
                                        id="modalHapusLabel">
                                        Konfirmasi Hapus Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menghapus data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger fw-700 py-2 px-4"
                                            onclick="hapusFormGroup()">Ya, Hapus!</button>
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
        //fungsi dropdown tahun
        function populateYearSelect(selectId, range = 10) {
            const select = document.getElementById(selectId);
            const currentYear = new Date().getFullYear();

            // Kosongkan elemen select sebelum menambah tahun
            select.innerHTML = '<option selected disabled>Angkatan</option>';

            // Tambahkan opsi tahun dari tahun saat ini hingga tahun yang diinginkan
            for (let i = currentYear; i >= currentYear - range; i--) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        }

        // Panggil fungsi ini saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            populateYearSelect("year", 10);
        });


        //API
        var id_alumni = {!! json_encode($data) !!};
        var publish_sekarang = 'waiting'

        // Function
        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        //Menampilkan data database
        var settingsGetDetail = {
            "url": `${path}/api/alumni/detail/${id_alumni}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#nama').val(data_detail.nama);
            $('#year').val(data_detail.tahun_lulus);
            $('#lembaga_perusahaan').val(data_detail.lembaga_perusahaan);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);


            if (data_detail.status === "published") {
                $("#checkboxPublish").hide();
            }
        });

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'waiting'
            }
        });

        // Modal Delete
        function openModalDelete(id) {
            $('#d_id').val(id); // Set id gambar yang akan dihapus
            $("#modalDelete").modal('show'); // Tampilkan modal
        }


        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("nama", $('#nama').val());
            form.append("tahun_lulus", $('#year').val());
            form.append("lembaga_perusahaan", $('#lembaga_perusahaan').val());
            form.append("status", publish_sekarang);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/alumni/update/${id_alumni}`,
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
                        //publish karya ilmiah
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/alumni.publish_one/${id}`,
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
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!",
                                    type = 'success');
                                window.location.href = "{{ route('informasi.alumni') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('informasi.alumni') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>
