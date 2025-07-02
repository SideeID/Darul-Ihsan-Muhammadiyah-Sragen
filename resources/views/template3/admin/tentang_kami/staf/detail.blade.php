<x-app-layout>
    <div class="container-lg staf">
        <a href="{{ route('tentang_kami.staf.index') }}"
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

                    <div class="row justify-content-between">
                        <div class="col-md-8 text-dark">
                            <h6 class="fw-bold">Biodata</h6>
                            <div class="mb-3 form-group position-relative mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="nama" class="form-label">Nama</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Nama" aria-label="Nama Staf">
                            </div>
                            <div class="mb-3 form-group position-relative mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="jabatan" name="jabatan" class="form-control"
                                    placeholder="Jabatan Guru" aria-label="Jabatan Staf">
                            </div>

                            <hr class="border border-1">

                            {{-- Riwayat Pendidikan --}}
                            <fieldset class="my-4 form-group border-bottom">
                                <div class="mb-3 field-add d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 fw-bold">Riwayat Pendidikan</h6>
                                    <button type="button" class="p-0 border-0 btn"
                                        onclick="toggleForm('formRiwayatPendidikan')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}"
                                            alt="Tambah Pendidikan">
                                    </button>
                                </div>

                                <!-- Form Input Pendidikan -->
                                <div id="formRiwayatPendidikan" class="p-3 mb-4 border-0 card fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="mb-3 row">
                                        <div class="col-md-6 w-100">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="pendidikan"
                                                name="riwayat_pendidikan" placeholder="Tulis Pendidikan">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
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
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="tahunMulai" class="form-label">Tahun Mulai</label>
                                            <select class="form-select year-select" id="tahunMulai"
                                                name="tahun_mulai_pendidikan">
                                                {{-- <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option> --}}
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="tahunBerakhir" class="form-label">Tahun Berakhir</label>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label me-2 fw-normal"
                                                        for="tanggalSekarangPendidikan">
                                                        Sekarang
                                                    </label>
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="tanggalSekarangPendidikan"
                                                        onclick="toggleEndYearPendidikan()">
                                                </div>
                                            </div>
                                            <select class="form-select year-select" id="tahunBerakhir"
                                                name="tahun_berakhir_pendidikan">
                                                {{-- <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option> --}}
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="gap-2 btn-control d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="Hapus">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark" style="border-radius: 8px;"
                                            onclick="selesaiInput('formRiwayatPendidikan')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPendidikanList" class="mt-3">
                                    {{-- <div class="p-2 mb-2 border rounded" style="background-color: #F2F4F7;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bold" id="displayTextPendidikan"></div>
                                                <div class="small text-muted" id="additionalInfoPendidikan"></div>
                                            </div>
                                            <div>
                                                <button onclick="editData(this, 'formRiwayatPendidikan')" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="hapusData(this, 'formRiwayatPendidikan')" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </fieldset>

                            {{-- Pengalaman Kerja --}}
                            <fieldset class="my-4 form-group border-bottom">
                                <div class="mb-3 field-add d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold">Pengalaman Kerja</h6>
                                    <button type="button" class="p-0 border-0 btn"
                                        onclick="toggleForm('formPengalamanKerja')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}" alt="">
                                    </button>
                                </div>

                                <div id="formPengalamanKerja" class="p-3 mb-4 border-0 card fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="mb-3 row">
                                        <div class="col-md-6 w-100">
                                            <label for="posisi" class="form-label">Posisi</label>
                                            <input type="text" class="form-control" id="posisi"
                                                name="pengalaman" placeholder="Tulis Posisi">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
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
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="tahunMulaiKerja" class="form-label">Tahun Mulai</label>
                                            <select class="form-select year-select" id="tahunMulaiKerja"
                                                name="tahun_mulai_kerja">
                                                {{-- <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option> --}}
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="tahunBerakhirKerja" class="form-label">Tahun
                                                    Berakhir</label>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label me-2 fw-normal"
                                                        for="tanggalSekarangKerja">
                                                        Sekarang
                                                    </label>
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="tanggalSekarangKerja" onclick="toggleEndYear()">
                                                </div>
                                            </div>
                                            <select class="form-select year-select" id="tahunBerakhirKerja"
                                                name="tahun_berakhir_kerja">
                                                {{-- <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option> --}}
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="gap-2 btn-control d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark" style="border-radius: 8px;"
                                            onclick="selesaiInput('formPengalamanKerja')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPengalamanKerjaList" class="mt-3"></div>
                            </fieldset>

                            {{-- Prestasi --}}
                            <fieldset class="my-4 form-group border-bottom">
                                <div class="mb-3 field-add d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold">Prestasi</h6>
                                    <button type="button" class="p-0 border-0 btn"
                                        onclick="toggleForm('formPrestasi')">
                                        <img src="{{ asset('template3/image/icon/add-square.svg') }}" alt="">
                                    </button>
                                </div>

                                <div id="formPrestasi" class="p-3 mb-4 border-0 card fw-medium"
                                    style="background-color: #F2F4F7; display: none;">
                                    <div class="mb-3 row">
                                        <div class="col-md-6 w-100">
                                            <label for="lomba" class="form-label">Lomba</label>
                                            <input type="text" class="form-control" id="lomba"
                                                name="prestasi" placeholder="Tulis Lomba">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
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
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="tingkat" class="form-label">Tingkat</label>
                                            <select class="form-select" id="tingkat" name="tingkat">
                                                <option selected>Provinsi</option>
                                                <option selected>Nasional</option>
                                                <option selected>Internasional</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tahunPrestasi" class="form-label">Tahun</label>
                                            <select class="form-select year-select" id="tahunPrestasi"
                                                name="tahun_prestasi">
                                                {{-- <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option> --}}
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="gap-2 btn-control d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary"
                                            style="border-radius: 8px;" onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/image/icon/trash.svg') }}" alt="">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark" style="border-radius: 8px;"
                                            onclick="selesaiInput('formPrestasi')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPrestasiList" class="mt-3"></div>
                            </fieldset>


                        </div>
                        <div class="overflow-hidden col-md-3">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    style="position:absolute;" accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview"
                                    onerror="this.style.display='none'" alt="Foto Staf">
                                <label for="foto" id="input_foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
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
                                    data-bs-toggle="modal" data-bs-target="#modalEdit">Simpan Data</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">
                                        Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan staf
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700">Ya,
                                            Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalDeleteLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalDeleteLabel">Konfirmasi Hapus Data Form</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus data form
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-danger fw-700 me-3"
                                            data-bs-dismiss="modal"
                                            onclick="closeModalDelete('modalHapus')">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700"
                                            id="buttonDelete">Ya, Hapus!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi edit -->
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalEditLabel">
                                        Konfirmasi Edit Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mengubah data
                                        ini?</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-warning fw-700"
                                            id="submitForm">Ya, Ubah!</button>
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
                                    <p class="mb-4">
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
            $('#kotaKerja').val(data_detail.kota_kerja);
            $('#tahunMulaiKerja').val(data_detail.tahun_mulai_kerja);
            $('#tahunBerakhirKerja').val(data_detail.tahun_berakhir_kerja);
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



        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'waiting'
            }
        });

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
            // form.reset();

            if (form.tagName === 'FORM') {
                form.reset(); // Reset hanya jika `form` adalah elemen form sesungguhnya
            }
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
            formData.append("type", "guru");

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
                    window.location.href = "{{ route('tentang_kami.staf.index') }}";
                } else {
                    showAlert("Error!", "Data gagal diubah", "error");
                    closeLoading();
                }
            });
        });

        // Inisialisasi tahun untuk dropdown secara dinamis
        function populateYearSelect(selectId) {
            const select = document.getElementById(selectId);
            const currentYear = new Date().getFullYear();

            // Kosongkan elemen select sebelum menambah tahun
            select.innerHTML = '';

            for (let i = currentYear; i >= currentYear - 10; i--) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        }

        // Toggle form visibility
        function toggleForm(formId) {
            const form = document.getElementById(formId);
            resetForm(formId);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        // Variabel global untuk menyimpan elemen yang akan dihapus
        var formGroupToDelete;

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

        function restoreFormGroup(formId) {
            // Temukan semua elemen form yang tersembunyi dan memiliki tanda data-isDeleted
            var formGroups = document.querySelectorAll(`#${formId} .border.rounded.p-3[data-isDeleted="true"]`);

            // Tampilkan kembali elemen yang sebelumnya disembunyikan
            formGroups.forEach(function(formGroup) {
                formGroup.style.display = 'block';
                formGroup.removeAttribute('data-isDeleted'); // Hapus tanda agar tidak teridentifikasi lagi
            });
        }

        function resetForm(formId) {
            var form = document.getElementById(formId);
            if (form) {
                // Reset manual untuk setiap input dan select di dalam form
                var inputs = form.querySelectorAll('input');
                var selects = form.querySelectorAll('select');

                inputs.forEach(input => {
                    if (input.type === 'checkbox' || input.type === 'radio') {
                        input.checked = false; // Hilangkan ceklis untuk checkbox dan radio
                    } else {
                        input.value = ''; // Kosongkan semua input lainnya
                    }
                });

                selects.forEach(select => {
                    select.selectedIndex = 0; // Setel ulang ke opsi pertama pada semua select
                });
            } else {
                console.error(`Form with ID "${formId}" not found for reset.`);
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


        // function tampilkanDataAwal() {

        //     pendidikanArray.forEach(data => tampilkanData('formRiwayatPendidikan', data));

        //     pengalamanArray.forEach(data => tampilkanData('formPengalamanKerja', data));

        //     prestasiArray.forEach(data => tampilkanData('formPrestasi', data));
        // }
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
