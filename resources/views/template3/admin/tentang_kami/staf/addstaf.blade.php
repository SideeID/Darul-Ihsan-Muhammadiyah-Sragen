<x-app-layout>
    <div class="container-lg staf">
        <a href="{{ route('tentang_kami.staf.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h6 class="mb-3 fw-bold text-dark mb-sm-0 ">Tambah Data</h6>
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
                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                                placeholder="Tulis Pendidikan">
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
                                            <input type="text" class="form-control" id="kota" name="kota"
                                                placeholder="Tulis Kota">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="tahunMulai" class="form-label">Tahun Mulai</label>
                                            <select class="form-select year-select" id="tahunMulai"
                                                name="tahun_mulai_pendidikan">
                                                <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option>
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
                                                        id="tanggalSekarangPendidikan" onclick="toggleEndYearPendidikan()">
                                                </div>
                                            </div>
                                            <select class="form-select year-select" id="tahunBerakhir"
                                                name="tahun_berakhir_pendidikan">
                                                <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option>
                                                <!-- Tambahkan tahun secara dinamis di JavaScript -->
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
                                <div id="savedPendidikanList" class="mt-3"></div>
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
                                            <input type="text" class="form-control" id="posisi" name="posisi"
                                                placeholder="Tulis Posisi">
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
                                                <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option>
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
                                                <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option>
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
                                            <input type="text" class="form-control" id="lomba" name="lomba"
                                                placeholder="Tulis Lomba">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                            <input type="text" class="form-control" id="penyelenggara"
                                                name="penyelenggara" placeholder="Tulis Penyelenggara">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="predikat" class="form-label">Predikat/Juara</label>
                                            <input type="text" class="form-control" id="predikat"
                                                name="predikat" placeholder="Tulis Predikat/Juara">
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
                                                <option selected>2027</option>
                                                <option selected>2026</option>
                                                <option selected>2025</option>
                                                <option selected>2024</option>
                                                <option selected>2023</option>
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
                        <div class="col-md-3">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview"
                                    onerror="this.style.display='none'" alt="Foto Staf">
                                <label for="foto"
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
                                <button class="mt-auto mb-2 btn btn-primary fw-500 w-100" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan Data</button>
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
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700"
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
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalHapusLabel">
                                        Konfirmasi Hapus Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-danger fw-700"
                                            onclick="hapusFormGroup()">Ya, Hapus!</button>
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

    <script>
        var publish_sekarang = 'waiting';

        // Image preview
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
                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        // Checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'draft'
            }
        });

        let prestasiArray = [];
        let pengalamanArray = [];
        let pendidikanArray = [];

        function collectFormData() {
            const pendidikanData = pendidikanArray.map(item => ({
                riwayat_pendidikan: `${item.riwayat_pendidikan}`,
                sekolah: `${item.sekolah}`,
                kota_pendidikan: `${item.kota_pendidikan}`,
                tahun_mulai_pendidikan: `${item.tahun_mulai_pendidikan}`,
                tahun_berakhir_pendidikan: `${item.tahun_berakhir_pendidikan}`
            }));

            const pengalamanData = pengalamanArray.map(item => ({
                pengalaman: `${item.pengalaman}`,
                pemberi_kerja: `${item.pemberi_kerja}`,
                kota_kerja: `${item.kota_kerja}`,
                tahun_mulai_kerja: `${item.tahun_mulai_kerja}`,
                tahun_berakhir_kerja: `${item.tahun_berakhir_kerja}`
            }));

            const prestasiData = prestasiArray.map(item => ({
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
                    riwayat_pendidikan: data.pendidikan || '',
                    sekolah: data.sekolah || '',
                    kota_pendidikan: data.kota || '',
                    tahun_mulai_pendidikan: data.tahun_mulai_pendidikan || '',
                    tahun_berakhir_pendidikan: data.tahun_berakhir_pendidikan || ''
                });
            } else if (formId === 'formPengalamanKerja') {
                pengalamanArray.push({
                    pengalaman: data.posisi || '',
                    pemberi_kerja: data.pemberi_kerja || '',
                    kota_kerja: data.kota_kerja || '',
                    tahun_mulai_kerja: data.tahun_mulai_kerja || '',
                    tahun_berakhir_kerja: data.tahun_berakhir_kerja || ''
                });
            } else if (formId === 'formPrestasi') {
                prestasiArray.push({
                    prestasi: data.lomba || '',
                    penyelenggara: data.penyelenggara || '',
                    juara: data.predikat || '',
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

        function tampilkanData(formId, data) {
            var listId, displayText, additionalInfo;

            if (formId === 'formRiwayatPendidikan') {
                listId = 'savedPendidikanList';
                displayText = data.pendidikan || 'Tidak ada data';
                additionalInfo = `${data.sekolah} (${data.tahun_mulai_pendidikan} - ${data.tahun_berakhir_pendidikan})`;
            } else if (formId === 'formPengalamanKerja') {
                listId = 'savedPengalamanKerjaList';
                displayText = data.posisi || 'Tidak ada data';
                additionalInfo = `${data.pemberi_kerja} (${data.tahun_mulai_kerja} - ${data.tahun_berakhir_kerja})`;
            } else if (formId === 'formPrestasi') {
                listId = 'savedPrestasiList';
                displayText = data.lomba || 'Tidak ada data';
                additionalInfo = `${data.penyelenggara} - ${data.predikat} (${data.tahun_prestasi})`;
            }

            var list = document.getElementById(listId);
            var item = document.createElement('div');
            item.style.backgroundColor = '#F2F4F7';
            item.className = 'border rounded p-2 mb-2';
            item.innerHTML = `
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fw-bold">${displayText}</div>
                        <div class="small text-muted">${additionalInfo}</div>
                    </div>
                    <div>
                        <button onclick="editData(this, '${formId}')" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="hapusData(this, '${formId}')" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            list.appendChild(item);
        }

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
                document.querySelector('#predikat').value = data.juara;
                document.querySelector('#tingkat').value = data.tingkat;
                document.querySelector('#tahunPrestasi').value = data.tahun_prestasi;
                prestasiArray.splice(index, 1);
            }

            form.style.display = 'block';
            item.remove();
        }

        // submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            if (!$('#nama').val() || !$('#jabatan').val() || !$("#foto")[0].files[0]) {
                showAlert("Error!", "Mohon lengkapi data wajib (nama, jabatan, dan foto)", "error");
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
            formData.append("image", $("#foto")[0].files[0]);
            formData.append("status", publish_sekarang);
            formData.append("type", "guru");

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
                "url": `{{ route('guru-staff.store') }}`,
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
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {

                    if (publish_sekarang === true) {
                        //publish guru
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/guru-staff/publish-one/${id}`,
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
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!",
                                    type = 'success');
                                window.location.href = "{{ route('tentang_kami.staf.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('tentang_kami.staf.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
                }
            });
        })

        // Inisialisasi tahun untuk dropdown secara dinamis
        function populateYearSelect(selectElement) {
            const currentYear = new Date().getFullYear();
            selectElement.innerHTML = '';

            const defaultOption = document.createElement('option');
            defaultOption.textContent = 'Pilih tahun';
            defaultOption.selected = true;
            selectElement.appendChild(defaultOption);

            for (let i = currentYear - 20; i <= currentYear + 5; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                selectElement.appendChild(option);
            }
        }

        // Toggle form visibility
        function toggleForm(formId) {
            const form = document.getElementById(formId);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';

                const yearSelects = form.querySelectorAll('.year-select');
                yearSelects.forEach(select => {
                    populateYearSelect(
                        select); // Panggil populateYearSelect untuk setiap elemen <select> yang ditemukan
                });
                resetForm(formId);
            } else {
                form.style.display = 'none';
            }
        }

        // Variabel global untuk menyimpan elemen yang akan dihapus
        // var formGroupToDelete;

        function showModalHapus(button) {
            // Temukan elemen form group yang akan dihapus
            formGroupToDelete = button.closest('.card.border-0.p-3');

            if (!formGroupToDelete) {
                console.error('Form group to delete not found.');
                return;
            }

            // Simpan ID form parent untuk digunakan nanti
            var parentForm = formGroupToDelete.closest('div[id^="form"]');
            if (parentForm) {
                formGroupToDelete.dataset.parentId = parentForm.id;
            }

            // Tampilkan modal konfirmasi penghapusan
            var modalHapusEl = document.getElementById('modalHapus');
            if (modalHapusEl) {
                var modalHapus = new bootstrap.Modal(modalHapusEl);
                modalHapus.show();
            } else {
                console.error('Modal delete confirmation not found.');
            }
        }

        function hapusFormGroup() {
            if (formGroupToDelete) {
                // Sembunyikan form, tandai sebagai dihapus
                formGroupToDelete.style.display = 'none';
                formGroupToDelete.dataset.isDeleted = 'true';

                // Tutup modal
                var modalHapusEl = document.getElementById('modalHapus');
                if (modalHapusEl) {
                    var modalHapus = bootstrap.Modal.getInstance(modalHapusEl);
                    modalHapus.hide();
                }
                formGroupToDelete = null; // Reset variabel
            } else {
                console.error('No form group selected for deletion.');
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


        // function selesaiInput(formId) {
        //     var form = document.getElementById(formId);
        //     if (!form) {
        //         console.error(`Form with ID "${formId}" not found.`);
        //         return;
        //     }

        //     var data = {};
        //     var inputs = form.querySelectorAll('input');
        //     var selects = form.querySelectorAll('select');

        //     inputs.forEach(input => {
        //         if (input.name) data[input.name] = input.value;
        //     });

        //     selects.forEach(select => {
        //         if (select.name) data[select.name] = select.value;
        //     });

        //     // Tampilkan data yang disimpan
        //     tampilkanData(formId, data);
        //     form.style.display = 'none';
        //     resetForm(formId);
        // }


        // function tampilkanData(formId, data) {
        //     var listId, displayText;

        //     if (formId === 'formRiwayatPendidikan') {
        //         listId = 'savedPendidikanList';
        //         displayText = data.pendidikan || 'Tidak ada data';
        //     } else if (formId === 'formPengalamanKerja') {
        //         listId = 'savedPengalamanKerjaList';
        //         displayText = data.posisi || 'Tidak ada data';
        //     } else if (formId === 'formPrestasi') {
        //         listId = 'savedPrestasiList';
        //         displayText = data.lomba || 'Tidak ada data';
        //     }

        //     var list = document.getElementById(listId);
        //     var item = document.createElement('div');
        //     item.className = 'border rounded p-2 mb-2 d-flex justify-content-between align-items-center';
        //     item.innerHTML = `<span>${displayText}</span>
    //     <button onclick="editData(this, '${formId}')" class="btn ">
    //     <img src="{{ asset('template3/image/icon/edit.svg') }}">
    //     </button>`;
        //     list.appendChild(item);
        // }

        // function editData(button, formId) {
        //     var item = button.closest('div');
        //     var text = item.querySelector(formId);
        //     var form = document.getElementById(formId);
        //     form.style.display = 'block';

        //     if (formId === 'formRiwayatPendidikan') {
        //         document.querySelector('#formRiwayatPendidikan input[name="pendidikan"]').value = text;
        //     } else if (formId === 'formPengalamanKerja') {
        //         document.querySelector('#formPengalamanKerja input[name="posisi"]').value = text;
        //     } else if (formId === 'formPrestasi') {
        //         document.querySelector('#formPrestasi input[name="lomba"]').value = text;
        //     }

        //     item.remove();
        // }

        // function showAlert(title, message, type) {
        //     Swal.fire({
        //         title: title,
        //         text: message,
        //         icon: type,
        //         timer: 1500,
        //         showConfirmButton: false
        //     });
        // }
    </script>
</x-app-layout>
