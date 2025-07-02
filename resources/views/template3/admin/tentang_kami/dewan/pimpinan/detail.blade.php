<x-app-layout>
    @push('head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endpush
    <div class="container-lg staf">
        <a href="{{ route('admin.tentang_kami.dewan.pimpinan.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Edit data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-staf" id='form_staf' enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row justify-content-between">
                        <div class="col-md-8 text-dark">
                            <h6 class="fw-bold">Biodata</h6>
                            <div class="form-group position-relative mb-3 mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="nama" class="form-label">Nama</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Nama" aria-label="Nama Staf">
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="jabatan" name="jabatan" class="form-control"
                                    placeholder="Jabatan Guru" aria-label="Jabatan Staf">
                            </div>

                            <hr class="border border-1">

                            {{-- Riwayat Pendidikan --}}

                            <fieldset class="form-group my-4 border-bottom">
                                <div class="field-add d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold m-0">Riwayat Pendidikan</h6>
                                    <button type="button" class="btn border-0 p-0"
                                        onclick="toggleForm('formRiwayatPendidikan')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}"
                                            alt="Tambah Pendidikan">
                                    </button>
                                </div>

                                <!-- Form Input Pendidikan -->
                                <div id="formRiwayatPendidikan" class="card border-0 p-3 mb-4 fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="row mb-3">
                                        <div class="col-md-6 w-100">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="pendidikan"
                                                name="riwayat_pendidikan" placeholder="Tulis Pendidikan">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="sekolah" class="form-label">Sekolah</label>
                                            <input type="text" class="form-control" id="sekolah" name="sekolah"
                                                placeholder="Tulis Sekolah">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kota" class="form-label">Kota</label>
                                            <input type="text" class="form-control" id="kota"
                                                name="kota_pendidikan" placeholder="Tulis Kota">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tahunMulaiPendidikan" class="form-label">Tahun Mulai</label>
                                            <select class="form-select" id="tahunMulai" name="tahun_mulai_pendidikan">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="endYear" class="form-label">Tahun Berakhir</label>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label me-2 fw-normal"
                                                        for="tanggalSekarang">
                                                        Sekarang
                                                    </label>
                                                  <input class="form-check-input ms-auto" type="checkbox" id="tanggalSekarangPendidikan" onclick="toggleEndYearPendidikan()">
                                                </div>
                                            </div>
                                            <select class="form-select" id="tahunBerakhir"
                                                name="tahun_berakhir_pendidikan">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor

                                            </select>
                                        </div>
                                    </div>
                                    <div class="btn-control d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-outline-black"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="">
                                        </button>

                                        <button type="button" class="btn btn-dark px-5" style="border-radius: 8px;"
                                            onclick="selesaiInput('formRiwayatPendidikan')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPendidikanList" class="mt-3"></div>
                            </fieldset>



                            {{-- Pengalaman Kerja --}}
                            <fieldset class="form-group my-4 border-bottom">
                                <div class="field-add d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Pengalaman Kerja</h6>
                                    <button type="button" class="btn border-0 p-0"
                                        onclick="toggleForm('formPengalamanKerja')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}" alt="">
                                    </button>
                                </div>

                                <div id="formPengalamanKerja" class="card border-0 p-3 mb-4 fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="row mb-3">
                                        <div class="col-md-6 w-100">
                                            <label for="posisi" class="form-label">Posisi</label>
                                            <input type="text" class="form-control" id="posisi"
                                                name="pengalaman" placeholder="Tulis Posisi">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pemberiKerja" class="form-label">Pemberi Kerja</label>
                                            <input type="text" class="form-control" id="pemberiKerja"
                                                name="pemberi_kerja" placeholder="Tulis Perusahaan">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kotaKerja" class="form-label">Kota</label>
                                            <input type="text" class="form-control" id="kotaKerja"
                                                name="kota_kerja" placeholder="Tulis Kota">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tahunPrestasi" class="form-label">Tahun Mulai</label>
                                            <select class="form-select" id="tahunMulaiKerja"
                                                name="tahun_mulai_kerja">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="endYear" class="form-label">Tahun Berakhir</label>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label me-2 fw-normal"
                                                        for="tanggalSekarang">
                                                        Sekarang
                                                    </label>
                                                    <input class="form-check-input ms-auto" type="checkbox" id="tanggalSekarangKerja" onclick="toggleEndYear()">
                                                </div>
                                            </div>
                                            <select class="form-select" id="tahunBerakhirKerja"
                                                name="tahun_berakhir_kerja">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="btn-control d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-outline-black"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="">
                                        </button>

                                        <button type="button" class="btn btn-dark px-5" style="border-radius: 8px;"
                                            onclick="selesaiInput('formPengalamanKerja')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPengalamanKerjaList" class="mt-3"></div>
                            </fieldset>

                            {{-- Prestasi --}}
                            <fieldset class="form-group my-4 border-bottom">
                                <div class="field-add d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Prestasi</h6>
                                    <button type="button" class="btn border-0 p-0"
                                        onclick="toggleForm('formPrestasi')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}" alt="">
                                    </button>
                                </div>

                                <div id="formPrestasi" class="card border-0 p-3 mb-4 fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="row mb-3">
                                        <div class="col-md-6 w-100">
                                            <label for="lomba" class="form-label">Lomba</label>
                                            <input type="text" class="form-control" id="lomba"
                                                name="prestasi" placeholder="Tulis Lomba">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                            <input type="text" class="form-control" id="penyelenggara"
                                                name="penyelenggara" placeholder="Tulis Penyelenggara">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="juara" class="form-label">Predikat/Juara</label>
                                            <input type="text" class="form-control" id="juara" name="juara"
                                                placeholder="Tulis Predikat/Juara">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tingkat" class="form-label">Tingkat</label>
                                            <select class="form-select" id="tingkat" name="tingkat">
                                                <option>Sekolah</option>
                                                <option>Kabupaten</option>
                                                <option>Provinsi</option>
                                                <option>Nasional</option>
                                                <option>Internasional</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Tahun</label>
                                            <select class="form-select" id="tahunPrestasi" name="tahun_prestasi">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="btn-control d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-outline-black"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="">
                                        </button>

                                        <button type="button" class="btn btn-dark px-5" style="border-radius: 8px;"
                                            onclick="selesaiInput('formPrestasi')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPrestasiList" class="mt-3"></div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview mb-4 mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview"
                                    onerror="this.style.display='none'" alt="Foto Staf">

                                <!-- Wrapper untuk elemen yang akan disembunyikan -->
                                <div id="uploadPlaceholder">
                                    <label for="foto" id="input_foto"
                                        class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                            alt="icon upload foto">
                                        <div class="label-content">
                                            <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                    class="text-primary">telusuri</span></p>
                                            <small class="text-secondary text-center d-block">Ukuran 1920x1080px
                                                diperlukan dalam format PNG atau JPG saja.</small>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mengaktifkan staf!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end align-items-end">
                                <button class="mt-auto mb-2 btn btn-warning fw-500 w-100" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalEdit" id="simpanPerubahan">Simpan
                                    Perubahan</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Konfirmasi edit -->
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5"
                                        id="modalEditLabel">
                                        Konfirmasi Edit Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin mengubah data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-warning fw-700 py-2 px-4"
                                            id="submitForm">Ya, Ubah!</button>

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
                                        Konfirmasi Hapus Form
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah Anda yakin ingin menghapus form ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-danger fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" 
                                            id="confirmDelete" class="px-4 py-2 btn btn-outline-black fw-700">Ya, Hapus!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Konfirmasi Publish -->
                     <div class="modal fade" id="modalPublish" tabindex="-1" aria-labelledby="modalPublishLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                             <div class="border-0 modal-header">
                                 <h5 class="text-center modal-title fw-bold w-100" id="modalPublishLabel">
                                     Konfirmasi Publish Data
                                 </h5>
                             </div>
                             <div class="text-center modal-body">
                                 <p class="mb-4 text-center text-black">
                                     Apakah anda yakin ingin mempublish data ini ke website?
                                 </p>
                                 <div class="gap-2 d-flex justify-content-center">
                                     <button type="button" class="btn btn-outline-black" id="btnTidakPublish">
                                         Tidak
                                     </button>
                                     <button type="button" class="btn btn-primary" id="btnYaPublish">
                                         Ya, Publish!
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>


                </form>
            </div>
        </div>
    </div>
    @include('admin.components.alert-done')
    @include('admin.components.alert-hapus')

    <script>
        var id_guru = {!! json_encode($data) !!};
        let foto_value
        var publish_sekarang = 'waiting'

        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        function onchangeImgPreview(imageInput, imagePreview) {
            var selectedFile = $(`${imageInput}`)[0].files[0];

            if (selectedFile) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(`${imagePreview}`).show()
                    $(`${imagePreview}`).attr("src", e.target.result);
                    $(`${imageInput}`).siblings("label").empty();
                };
                reader.readAsDataURL(selectedFile)

            } else {
                $(`${imagePreview}`).hide()
                $(`${imagePreview}`).attr("src", "");
                $(".img-preview label").html(`
                <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                </div>
                `);
            }
        }


        //Menampilkan data database
        var settingsGetDetail = {
            "url": `${path}/api/guru-staff/detail/${id_guru}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#nama').val(data_detail.nama);
            $('#jabatan').val(data_detail.jabatan);
            //form pendidikan
            $('#pendidikan').val(data_detail.riwayat_pendidikan);
            $('#sekolah').val(data_detail.sekolah);
            $('#kota').val(data_detail.kota_pendidikan);
            $('#tahunMulai').val(data_detail.tahun_mulai_pendidikan);
            $('#tahunBerakhir').val(data_detail.tahun_berakhir_pendidikan);
            //form pengalaman
            $('#posisi').val(data_detail.pengalaman);
            $('#pemberiKerja').val(data_detail.pemberi_kerja);
            $('#tahunMulaiKerja').val(data_detail.tahun_mulai_kerja);
            $('#tahunBerakhirKerja').val(data_detail.tahun_berakhir_kerja);
            $('#kotaKerja').val(data_detail.kota_kerja);
            //form prestasi
            $('#lomba').val(data_detail.prestasi);
            $('#penyelenggara').val(data_detail.penyelenggara);
            $('#juara').val(data_detail.juara);
            $('#tingkat').val(data_detail.tingkat);
            $('#tahunPrestasi').val(data_detail.tahun_prestasi);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);


            if (data_detail.image === "" || data_detail.image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `);
                foto_value = ""
            } else {
                $("#img_preview").attr("src", path + data_detail.image)
                $(".img-preview label").empty()
                $("#img_preview").show()

                $(".img-preview").append(`
                <div class="mt-3 d-flex align-items-center justify-content-end" style="position: absolute; top: 0px; right: 15px; display: flex; gap: 10px;">
                    <button type="button" class="btn btn-outline-light me-2" onclick="changeImage()">Ganti</button>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteImage()">
                        <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                    </button>
                </div>
            `);
            }

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
            $('#d_id').val(id);
            $("#modalDelete").modal('show');
        }

        function deleteImage() {
            document.getElementById("img_preview").src = "";
            document.getElementById("foto").value = "";

            $(".img-preview label").html(`
                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                </div>
            `);
        }

        function changeImage() {
            document.getElementById("foto").value = "";
            document.getElementById("img_preview").src = "";
            document.getElementById("input_foto").click();

            $(".img-preview label").html(`
                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                </div>
            `);
        }

        // Hapus gambar
        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val();

            req({
                url: `${path}/api/guru-staff/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    window.location.href = `${path}/admin/tentang/guru-staff/`;
                }
            });
        });

        let prestasiArray = [];
        let pengalamanArray = [];
        let pendidikanArray = [];

        function collectFormData() {
            const pendidikanData = pendidikanArray.map(item => ({
                id: item.id || null,
                riwayat_pendidikan: `${item.riwayat_pendidikan}`,
                sekolah: `${item.sekolah}`,
                kota_pendidikan: `${item.kota_pendidikan}`,
                tahun_mulai_pendidikan: `${item.tahun_mulai_pendidikan}`,
                tahun_berakhir_pendidikan: `${item.tahun_berakhir_pendidikan}`
            }));

            const pengalamanData = pengalamanArray.map(item => ({
                id: item.id || null,
                pengalaman: `${item.pengalaman}`,
                pemberi_kerja: `${item.pemberi_kerja}`,
                kota_kerja: `${item.kota_kerja}`,
                tahun_mulai_kerja: `${item.tahun_mulai_kerja}`,
                tahun_berakhir_kerja: `${item.tahun_berakhir_kerja}`
            }));

            const prestasiData = prestasiArray.map(item => ({
                id: item.id || null,
                prestasi: `${item.prestasi}`,
                penyelenggara: `${item.penyelenggara}`,
                juara: `${item.juara}`,
                tingkat: `${item.tingkat}`,
                tahun_prestasi: `${item.tahun_prestasi}`
            }));

            return {
                pendidikanData,
                pengalamanData,
                prestasiData
            };
        }

        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            // Validasi data wajib
            if (!$('#nama').val() || !$('#jabatan').val()) {
                showAlert("Error!", "Mohon lengkapi data wajib (nama, jabatan)", "error");
                return;
            }

            const formData = new FormData();
            const {
                pendidikanData,
                pengalamanData,
                prestasiData
            } = collectFormData();

            var form = new FormData();
            formData.append("nama", $('#nama').val());
            formData.append("jabatan", $('#jabatan').val());
            formData.append("status", publish_sekarang);
            formData.append("type", "pimpinan");

            if ($("#foto")[0].files[0]) {
                formData.append("image", $("#foto")[0].files[0]);
            }

            // Append array data
            pendidikanData.forEach((item, index) => {
                Object.keys(item).forEach(key => {
                    formData.append(`${key}[${index}]`, item[key]);
                });
            });

            pengalamanData.forEach((item, index) => {
                Object.keys(item).forEach(key => {
                    formData.append(`${key}[${index}]`, item[key]);
                });
            });

            prestasiData.forEach((item, index) => {
                Object.keys(item).forEach(key => {
                    formData.append(`${key}[${index}]`, item[key]);
                });
            });

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/guru-staff/update/${id_guru}`,
                "method": "POST",
                "timeout": 0,
                "mimeType": "multipart/form-data",
                "processData": false,
                "contentType": false,
                "data": formData,
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
                },
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {
                    showAlert("Success!", "Data berhasil diubah", "success");
                    closeLoading();
                    window.location.href = "{{ route('admin.tentang_kami.dewan.pimpinan.index') }}";
                } else {
                    showAlert("Error!", "Data gagal diubah", "error");
                    closeLoading();
                }
            });
        });
        // // Function to collect data from forms
        // function collectFormData() {
        //     return {
        //         pendidikanArray: pendidikanArray,
        //         pengalamanArray: pengalamanArray,
        //         prestasiArray: prestasiArray
        //     };
        // }



        function selesaiInput(formId) {
            var form = document.getElementById(formId);
            var data = {};

            var inputs = form.getElementsByTagName('input');
            var selects = form.getElementsByTagName('select');

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type === 'checkbox') {
                    data[inputs[i].name] = inputs[i].checked;
                } else {
                    data[inputs[i].name] = inputs[i].value;
                }
            }

            for (var i = 0; i < selects.length; i++) {
                data[selects[i].name] = selects[i].value;
            }

            if (formId === 'formRiwayatPendidikan') {
                pendidikanArray.push({
                    riwayat_pendidikan: data.riwayat_pendidikan || '',
                    sekolah: data.sekolah || '',
                    kota_pendidikan: data.kota_pendidikan || '',
                    tahun_mulai_pendidikan: data.tahun_mulai_pendidikan || '',
                    tahun_berakhir_pendidikan: data.tahun_berakhir_pendidikan || ''
                });
            } else if (formId === 'formPengalamanKerja') {
                pengalamanArray.push({
                    pengalaman: data.pengalaman || '',
                    pemberi_kerja: data.pemberi_kerja || '',
                    kota_kerja: data.kota_kerja || '',
                    tahun_mulai_kerja: data.tahun_mulai_kerja || '',
                    tahun_berakhir_kerja: data.tahun_berakhir_kerja || ''
                });
            } else if (formId === 'formPrestasi') {
                prestasiArray.push({
                    prestasi: data.prestasi || '',
                    penyelenggara: data.penyelenggara || '',
                    juara: data.juara || '',
                    tingkat: data.tingkat || '',
                    tahun_prestasi: data.tahun_prestasi || ''
                });
            }

            tampilkanData(formId, data);
            form.style.display = 'none';

            // Reset input fields
            resetForm(form);
        }

        // Fungsi untuk mereset input field di dalam form
        function resetForm(form) {
            var inputs = form.getElementsByTagName('input');
            var selects = form.getElementsByTagName('select');

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type === 'text' || inputs[i].type === 'number') {
                    inputs[i].value = '';
                } else if (inputs[i].type === 'checkbox') {
                    inputs[i].checked = false;
                }
            }

            for (var i = 0; i < selects.length; i++) {
                selects[i].selectedIndex = 0; // Reset to the first option
            }
        }




        $(document).ready(function() {
            // Fetch and display existing data
            fetchData();
            tampilkanDataAwal(); // Call to display existing data
        });



        function fetchData() {
            var settingsGetDetail = {
                "url": `${path}/api/guru-staff/detail/${id_guru}`, // Ensure path and id_guru are defined
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settingsGetDetail).done(function(response) {
                var data_detail = response.data;

                // Populate basic information
                $('#nama').val(data_detail.nama);
                $('#jabatan').val(data_detail.jabatan);

                // Populate education fields
                var pendidikanList = data_detail.riwayat_pendidikan.split('|');
                var sekolahList = data_detail.sekolah.split('|');
                var kotaList = data_detail.kota_pendidikan.split('|');
                var tahunMulaiList = data_detail.tahun_mulai_pendidikan.split('|');
                var tahunBerakhirList = data_detail.tahun_berakhir_pendidikan.split('|');

                for (let i = 0; i < pendidikanList.length; i++) {
                    pendidikanArray.push({
                        riwayat_pendidikan: pendidikanList[i],
                        sekolah: sekolahList[i],
                        kota_pendidikan: kotaList[i],
                        tahun_mulai_pendidikan: tahunMulaiList[i],
                        tahun_berakhir_pendidikan: tahunBerakhirList[i]
                    });
                }

                // Populate work experience fields
                var pengalamanList = data_detail.pengalaman.split('|');
                var pemberiKerjaList = data_detail.pemberi_kerja.split('|');
                var kotaKerjaList = data_detail.kota_kerja.split('|');
                var tahunMulaiKerjaList = data_detail.tahun_mulai_kerja.split('|');
                var tahunBerakhirKerjaList = data_detail.tahun_berakhir_kerja.split('|');

                for (let i = 0; i < pengalamanList.length; i++) {
                    pengalamanArray.push({
                        pengalaman: pengalamanList[i],
                        pemberi_kerja: pemberiKerjaList[i],
                        kota_kerja: kotaKerjaList[i],
                        tahun_mulai_kerja: tahunMulaiKerjaList[i],
                        tahun_berakhir_kerja: tahunBerakhirKerjaList[i]
                    });
                }

                // Populate achievements fields
                var prestasiList = data_detail.prestasi.split('|');
                var penyelenggaraList = data_detail.penyelenggara.split('|');
                var juaraList = data_detail.juara.split('|');
                var tingkatList = data_detail.tingkat.split('|');
                var tahunPrestasiList = data_detail.tahun_prestasi.split('|');

                for (let i = 0; i < prestasiList.length; i++) {
                    prestasiArray.push({
                        prestasi: prestasiList[i],
                        penyelenggara: penyelenggaraList[i],
                        juara: juaraList[i],
                        tingkat: tingkatList[i],
                        tahun_prestasi: tahunPrestasiList[i]
                    });
                }

                // Populate the publish checkbox
                $('#publishSekarang').prop('checked', data_detail.status === "published");

                // Populate the image preview if available
                if (data_detail.image) {
                    $("#img_preview").attr("src", path + data_detail.image).show();
                    $("#uploadPlaceholder").hide();
                } else {
                    $("#uploadPlaceholder").show();
                    $("#img_preview").hide();
                }

                // Call to display the initial data in the lists
                tampilkanDataAwal();
            }).fail(function(xhr) {
                console.error("Failed to fetch data:", xhr);
                showAlert("Error!", "Gagal memuat data. Silakan coba lagi.", "error");
            });
        }



        function toggleForm(formId) {
            const form = document.getElementById(formId);

            if (form.style.display === 'none' || form.style.display === '') {
                resetForm(form); // Reset form input fields when showing the form
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        let formToDelete;

        function showModalHapus(button) {
            formToDelete = button.closest('.card.border-0');
            $('#modalHapus').modal('show');
        }


        function hapusFormGroup() {
            if (formToDelete) {
                formToDelete.style.display = 'none';
                $('#modalHapus').modal('hide');
                formToDelete = null;
            }
        }

        // Pasang event listener untuk tombol konfirmasi hapus
        document.getElementById('confirmDelete').addEventListener('click', hapusFormGroup);

        function tampilkanDataAwal() {
            // Bersihkan daftar sebelum menambahkan data baru
            $('#savedPendidikanList').empty();
            $('#savedPengalamanKerjaList').empty();
            $('#savedPrestasiList').empty();

            // Tampilkan ulang semua data
            pendidikanArray.forEach(data => tampilkanData('formRiwayatPendidikan', data));
            pengalamanArray.forEach(data => tampilkanData('formPengalamanKerja', data));
            prestasiArray.forEach(data => tampilkanData('formPrestasi', data));
        }
        // Fungsi untuk menampilkan data dalam daftar dengan opsi edit dan hapus
        function tampilkanData(formId, data) {
            let listId, displayText, additionalInfo;

            if (formId === 'formRiwayatPendidikan') {
                listId = 'savedPendidikanList';
                displayText = data.riwayat_pendidikan || 'Tidak ada data';
                additionalInfo =
                    `${data.kota_pendidikan} (${data.tahun_mulai_pendidikan} - ${data.tahun_berakhir_pendidikan})`;
            } else if (formId === 'formPengalamanKerja') {
                listId = 'savedPengalamanKerjaList';
                displayText = data.pengalaman || 'Tidak ada data';
                additionalInfo = `${data.pemberi_kerja} (${data.tahun_mulai_kerja} - ${data.tahun_berakhir_kerja})`;
            } else if (formId === 'formPrestasi') {
                listId = 'savedPrestasiList';
                displayText = data.prestasi || 'Tidak ada data';
                additionalInfo = `${data.penyelenggara} - ${data.juara} (${data.tahun_prestasi})`;
            }

            // Tambahkan data ke daftar
            const list = document.getElementById(listId);
            const item = document.createElement('div');
            item.className = 'border rounded p-2 mb-2 d-flex justify-content-between align-items-center';
            item.innerHTML = `
        <div>
            <strong>${displayText}</strong><br>
            <span class="small text-muted">${additionalInfo}</span>
        </div>
        <div>
            <button onclick="editData(this, '${formId}')" class="btn">
                <img src="{{ asset('template3/image/icon/edit.svg') }}" alt="Edit">
            </button>
     
                
        </div>
    `;
            list.appendChild(item);
        }

        // Fungsi untuk mengedit data di daftar
        function editData(button, formId) {
            const item = button.closest('.border.rounded');
            const index = Array.from(item.parentNode.children).indexOf(item);
            const form = document.getElementById(formId);
            let data;

            if (formId === 'formRiwayatPendidikan') {
                data = pendidikanArray[index];
                document.querySelector('#pendidikan').value = data.riwayat_pendidikan;
                document.querySelector('#sekolah').value = data.sekolah;
                document.querySelector('#kota').value = data.kota_pendidikan;
                document.querySelector('#tahunMulai').value = data.tahun_mulai_pendidikan;
                document.querySelector('#tahunBerakhir').value = data.tahun_berakhir_pendidikan;
                pendidikanArray.splice(index, 1);
            } else if (formId === 'formPengalamanKerja') {
                data = pengalamanArray[index];
                document.querySelector('#posisi').value = data.pengalaman;
                document.querySelector('#pemberiKerja').value = data.pemberi_kerja;
                document.querySelector('#kotaKerja').value = data.kota_kerja;
                document.querySelector('#tahunMulaiKerja').value = data.tahun_mulai_kerja;
                document.querySelector('#tahunBerakhirKerja').value = data.tahun_berakhir_kerja;
                pengalamanArray.splice(index, 1);
            } else if (formId === 'formPrestasi') {
                data = prestasiArray[index];
                document.querySelector('#lomba').value = data.prestasi;
                document.querySelector('#penyelenggara').value = data.penyelenggara;
                document.querySelector('#juara').value = data.juara;
                document.querySelector('#tingkat').value = data.tingkat;
                document.querySelector('#tahunPrestasi').value = data.tahun_prestasi;
                prestasiArray.splice(index, 1);
            }

            form.style.display = 'block';
            item.remove();
        }

        // Fungsi untuk menghapus data dari daftar
        function hapusData(button, formId) {
            const item = button.closest('.border.rounded');
            const index = Array.from(item.parentNode.children).indexOf(item);

            if (formId === 'formRiwayatPendidikan') {
                pendidikanArray.splice(index, 1);
            } else if (formId === 'formPengalamanKerja') {
                pengalamanArray.splice(index, 1);
            } else if (formId === 'formPrestasi') {
                prestasiArray.splice(index, 1);
            }

            item.remove();
        }

        function toggleEndYear() {
    const checkbox = document.getElementById("tanggalSekarangKerja");
    const tahunBerakhirSelect = document.getElementById("tahunBerakhirKerja");

    if (checkbox.checked) {
        const currentYear = new Date().getFullYear();
        tahunBerakhirSelect.value = currentYear;
    } else {
        tahunBerakhirSelect.value = "2027"; 
    }
}

function toggleEndYearPendidikan() {
    const checkbox = document.getElementById("tanggalSekarangPendidikan");
    const tahunBerakhirSelect = document.getElementById("tahunBerakhir");

    if (checkbox.checked) {
        const currentYear = new Date().getFullYear();
        tahunBerakhirSelect.value = currentYear;
    } else {
        tahunBerakhirSelect.value = "2027"; 
    }
}

$(document).ready(function() {
            $('#publishSekarang').change(function() {
                if ($(this).is(':checked')) {
                    $('#modalPublish').modal('show');
                }
            });

            $('#btnTidakPublish').click(function() {
                $('#publishSekarang').prop('checked', false);
                $('#modalPublish').modal('hide');
            });

            $('#btnYaPublish').click(function() {
                $('#modalPublish').modal('hide');

            });
        });
    </script>
</x-app-layout>
