<x-app-layout>
    <div class="container-lg staf">
        <a href="{{ route('admin.tentang_kami.dewan.pengasuh.index') }}"
        class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-bold text-dark mb-sm-0">Tambah Data</h5>
            </div>

            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-staf" id="form_staf" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="mb-2 d-flex justify-content-between align-items-center">
                        <label class="form-label fw-bold">Biodata</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Form Inputs (Left Side) -->
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative">
                                <label for="nama" class="form-label d-flex justify-content-between fw-500">
                                    <span>Nama</span>
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="e.g; Nama" required>
                            </div>
                            <div class="mb-5 form-group position-relative">
                                <label for="jabatan" class="form-label d-flex justify-content-between fw-500">
                                    <span>Jabatan</span>
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" id="jabatan" name="jabatan" class="form-control"
                                    placeholder="Jabatan Pengasuh" required>
                            </div>

                            <!-- Riwayat Pendidikan Section -->
                            <hr class="border border-1">
                            <div class="mb-4 form-group">
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <label class="form-label fw-bold">Riwayat Pendidikan</label>
                                    <button type="button" class="btn" onclick="toggleForm('formRiwayatPendidikan')">
                                        <img src="{{ asset('template3/images/plus.svg') }}" alt="Tambah">
                                    </button>
                                </div>
                                <div id="formRiwayatPendidikan" class="p-3 border rounded"
                                    style="background-color: #F2F4F7; display: none;">
                                    <!-- Form inputs for Riwayat Pendidikan -->
                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label fw-500">Pendidikan</label>
                                        <input type="text" id="pendidikan" name="pendidikan" class="form-control"
                                            placeholder="Tulis Pendidikan">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="sekolah" class="form-label fw-500">Sekolah</label>
                                            <input type="text" id="sekolah" name="sekolah" class="form-control"
                                                placeholder="Tulis Sekolah">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="kota" class="form-label fw-500">Kota</label>
                                            <input type="text" id="kota" name="kota" class="form-control"
                                                placeholder="Tulis Kota">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="tahunMulai" class="form-label fw-500">Tahun Mulai</label>
                                            <select id="tahunMulai" name="tahun_mulai_pendidikan" class="form-select">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="tahunBerakhir" class="form-label fw-500">Tahun
                                                    Berakhir</label>
                                                <div class="form-check d-flex">
                                                    <label class="form-check-label me-2"
                                                        for="sekarangPendidikan">Sekarang</label>
                                                        <input class="form-check-input ms-auto" type="checkbox" id="tanggalSekarangPendidikan" onclick="toggleEndYearPendidikan()">
                                                </div>
                                            </div>
                                            <select id="tahunBerakhir" name="tahun_berakhir_pendidikan" class="form-select me-2">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="p-2 mx-2 btn btn-outline-black"
                                            onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/images/trash.svg') }}" alt="">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark"
                                            onclick="selesaiInput('formRiwayatPendidikan')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPendidikanList" class="mt-3"></div>
                            </div>
                            <hr class="border border-1">

                            <!-- Pengalaman Kerja Section -->
                            <div class="mb-4 form-group">
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <label class="form-label fw-bold">Pengalaman Kerja</label>
                                    <button type="button" class="btn"
                                        onclick="toggleForm('formPengalamanKerja')">
                                        <img src="{{ asset('template3/images/plus.svg') }}" alt="Tambah">
                                    </button>
                                </div>
                                <div id="formPengalamanKerja" class="p-3 border rounded"
                                    style="background-color: #F2F4F7; display: none;">
                                    <!-- Form inputs for Pengalaman Kerja -->
                                    <div class="mb-3">
                                        <label for="posisi" class="form-label fw-500">Posisi</label>
                                        <input type="text" id="posisi" name="posisi" class="form-control"
                                            placeholder="Tulis Posisi">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for ="pemberiKerja" class="form-label fw-500">Pemberi Kerja</label>
                                            <input type="text" id="pemberiKerja" name="pemberi_kerja"
                                                class="form-control" placeholder="Tulis Pemberi Kerja">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="kotaKerja" class="form-label fw-500">Kota</label>
                                            <input type="text" id="kotaKerja" name="kota_kerja"
                                                class="form-control" placeholder="Tulis Kota">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="tahunMulaiKerja" class="form-label fw-500">Tahun Mulai</label>
                                            <select id="tahunMulaiKerja" name="tahun_mulai_kerja"
                                                class="form-select">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <label for="tahunBerakhirKerja" class="form-label fw-500">Tahun
                                                    Berakhir</label>
                                                <div class="form-check d-flex">
                                                    <label class="form-check-label me-2"
                                                        for="sekarangPendidikan">Sekarang</label>
                                                        <input class="form-check-input ms-auto" type="checkbox" id="tanggalSekarangKerja" onclick="toggleEndYear()">
                                                </div>
                                            </div>
                                            <select id="tahunBerakhirKerja" name="tahun_berakhir_kerja"
                                                class="form-select">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="p-2 mx-2 btn btn-outline-black"
                                            onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/images/trash.svg') }}" alt="">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark"
                                            onclick="selesaiInput('formPengalamanKerja')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPengalamanKerjaList" class="mt-3"></div>
                            </div>
                            <hr class="border border-1">

                            <!-- Prestasi Section -->
                            <div class="mb-4 form-group">
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <label class="form-label fw-bold">Prestasi</label>
                                    <button type="button" class="btn" onclick="toggleForm('formPrestasi')">
                                        <img src="{{ asset('template3/images/plus.svg') }}" alt="Tambah">
                                    </button>
                                </div>
                                <div id="formPrestasi" class="p-3 border rounded"
                                    style="background-color: #F2F4F7; display: none;">
                                    <!-- Form inputs for Prestasi -->
                                    <div class="mb-3">
                                        <label for="lomba" class="form-label fw-500">Lomba</label>
                                        <input type="text" id="lomba" name="lomba" class="form-control"
                                            placeholder="Tulis Lomba">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="penyelenggara" class="form-label fw-500">Penyelenggara</label>
                                            <input type="text" id="penyelenggara" name="penyelenggara"
                                                class="form-control" placeholder="Tulis Penyelenggara">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="predikat" class="form-label fw-500">Predikat/Juara</label>
                                            <input type="text" id="predikat" name="predikat"
                                                class="form-control" placeholder="Tulis Predikat">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="tingkat" class="form-label fw-500">Tingkat</label>
                                            <select id="tingkat" name="tingkat" class="form-select">
                                                <option selected>Pilih Tingkat</option>
                                                <option>Sekolah</option>
                                                <option>Kabupaten</option>
                                                <option>Provinsi</option>
                                                <option>Nasional</option>
                                                <option>Internasional</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="tahunPrestasi" class="form-label fw-500">Tahun</label>
                                            <select id="tahunPrestasi" name="tahun_prestasi" class="form-select">
                                                @for ($year =  date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="p-2 mx-2 btn btn-outline-black"
                                            onclick="showModalHapus(this)">
                                            <img src="{{ asset('template3/images/trash.svg') }}" alt="">
                                        </button>
                                        <button type="button" class="px-5 btn btn-dark"
                                            onclick="selesaiInput('formPrestasi')">Selesai</button>
                                    </div>
                                </div>
                                <div id="savedPrestasiList" class="mt-3"></div>
                            </div>
                            <hr class="border border-1">

                        </div>

                        <div class="col-md-3">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview"
                                    onerror="this.style.display='none'" alt="Foto Pengasuh">
                                <label for="foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw -700">Upload , or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">960x960px size required in
                                            PNG or JPG format only.</small>
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
                                        *Centang box disamping untuk publish data ke website!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end align-items-end">
                                <button class="mt-auto btn btn-primary fw-500 mb -2 w-100" type="button"
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
                                        Konfirmasi Simpan Data
                                    </h1>
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
                                        <button type="button" class="btn btn-danger fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 "
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

    <script>
        var publish_sekarang = 'waiting';

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
                    <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
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
            form.reset();
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
            item.className = 'border rounded p-2 mb-2';
            item.innerHTML = `
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fw-bold">${displayText}</div>
                        <div class="small text-muted">${additionalInfo}</div>
                    </div>
                    <div>
                        <button onclick="editData(this, '${formId}')" class="btn">
                                       <img src="{{ asset('template3/image/icon/edit.svg') }}">
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

            // Append basic data
            formData.append("nama", $('#nama').val());
            formData.append("jabatan", $('#jabatan').val());
            formData.append("image", $("#foto")[0].files[0]);
            formData.append("status", $("#publishSekarang").prop("checked") ? 'published' : 'draft');
            formData.append("type", "pengasuh");

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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('guru-staff.store') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    showLoading();
                },
                success: function(response) {
                    if (response.status === "success") {
                        showAlert("Sukses!", "Data berhasil disimpan", "success");
                        setTimeout(function() {
                            window.location.href =
                                "{{ route('admin.tentang_kami.dewan.pengasuh.index') }}";
                        }, 1500);
                    } else {
                        showAlert("Error!", response.message || "Terjadi kesalahan", "error");
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert("Error!", "Terjadi kesalahan pada server", "error");
                    }
                },
                complete: function() {
                    closeLoading();
                }
            });
        });

        function toggleForm(formId) {
            var formDiv = document.getElementById(formId);
            if (formDiv.style.display === "none" || formDiv.style.display === "") {
                formDiv.style.display = "block";
                resetForm(formId); // Call resetForm instead of form.reset()
            } else {
                formDiv.style.display = "none";
            }
        }

        function showModalHapus(button) {
            // Simpan referensi form group yang akan dihapus
            formGroupToDelete = button.closest('.border.rounded.p-3');
            // Simpan ID form parent untuk digunakan nanti
            var parentForm = formGroupToDelete.closest('div[id^="form"]');
            if (parentForm) {
                formGroupToDelete.dataset.parentId = parentForm.id;
            }

            // Tampilkan modal konfirmasi
            var modalHapus = new bootstrap.Modal(document.getElementById('modalHapus'));
            modalHapus.show();
        }

        function hapusFormGroup() {
            if (formGroupToDelete) {
                formGroupToDelete.style.display = 'none'; // Sembunyikan form, tidak menghapus
                formGroupToDelete.dataset.isDeleted = 'true'; // Tandai sebagai dihapus untuk identifikasi

                formGroupToDelete = null;
                var modalHapus = bootstrap.Modal.getInstance(document.getElementById('modalHapus'));
                modalHapus.hide();
            }
        }

        function restoreFormGroup(formId) {
            // Cari semua elemen form yang tersembunyi dan memiliki tanda `data-isDeleted`
            var formGroups = document.querySelectorAll(`#${formId} .border.rounded.p-3[data-isDeleted="true"]`);

            // Tampilkan form yang telah disembunyikan
            formGroups.forEach(function(formGroup) {
                formGroup.style.display = 'block';
                formGroup.removeAttribute('data-isDeleted'); // Hapus tanda dihapus agar tidak diidentifikasi lagi
            });
        }

        function resetForm(formId) {
            var formDiv = document.getElementById(formId);
            if (formDiv) {
                var inputs = formDiv.getElementsByTagName('input');
                var selects = formDiv.getElementsByTagName('select');

                // Reset all input fields
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].type === 'checkbox') {
                        inputs[i].checked = false;
                    } else {
                        inputs[i].value = '';
                    }
                }

                // Reset all select fields
                for (var i = 0; i < selects.length; i++) {
                    selects[i].selectedIndex = 0;
                }
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
    </script>

</x-app-layout>
