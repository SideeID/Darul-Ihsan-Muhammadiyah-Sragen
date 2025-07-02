<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="modalTambahMediaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahMediaLabel">Tambah Data Partner</h5>
            </div>
            <div class="modal-body">
                <div class="col d-flex flex-column align-items-center">
                    <label for="upload" class="media-link"></label>
                    <div class="mb-4 img-preview" style="overflow:hidden;">
                        <input type="file" hidden name="logo" id="logo" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#logo', '#img_preview');">
                        <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                        <label for="logo" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('template3/image/gallery-add.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                        <div class="label-content">
                            <p class="mb-2 text-center text-black fw-700">Unggah sampul, atau <span class="text-primary">telusuri</span></p>
                            <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan dalam format PNG atau JPG saja.</small>
                        </div>
                        </label>
                    </div>
                </div>
                {{-- <div class="media-upload" id="upload-section">
                    <label for="upload" class="media-link"></label>
                    <div class="upload-box">
                        <img src="{{asset('template3/image/gallery-add.svg')}}" alt="Upload Icon">
                        <input type="file" id="upload" accept="image/png, image/jpeg" style="display: none;" onchange="showSelectedFile(event)">
                        <p>Seret & sisipkan file, atau <a href="#" onclick="document.getElementById('upload').click();">Telusuri</a></p>
                        <span>File yang didukung hanya PNG</span>
                    </div>
                </div>
                <div id="completed-section" style="display: none;">
                    <label for="thumbnail-preview" class="media-link">Thumbnail Preview</label>
                    <img id="thumbnail-preview" src="" alt="Selected Thumbnail" style="width: 100%; height: auto; border-radius: 8px; border: 2px dashed #ccc; margin-bottom: 10px;"> --}}
                <div class="mt-3 form-group">
                    <label for="nama-partner" class="nama-partner">Nama Partner</label>
                    <input type="text" class="form-control" id="nama-partner" placeholder="e.g; Kemenag" onblur="validateInput()">
                    <small id="error-msg" style="color: red; display: none;">Kolom ini tidak boleh kosong!</small>
                </div>
                {{-- <div class="mt-1 form-group" id="url-section" style="display: none;">
                    <label for="url" class="url">Link URL</label>
                    <input type="text" class="form-control" id="url" placeholder="e.g; https://" onblur="validateInput()">
                    <small id="error-msg-url" style="color: red; display: none;">Kolom link url wajib diisi!</small>
                </div> --}}
                <div class="mt-3 form-check" id="checkbox-section" style="display: none;">
                    <input class="form-check-input" type="checkbox" id="publish-checkbox">
                    <label class="form-check-label" for="publish-checkbox">
                        *Centang box disamping untuk publish data ke website!
                    </label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="save-button" onclick="simpanData()">Simpan data</button>
            </div>
        </div>
    </div>
</div>
<div id="notification-merah" class="hidden notification-merah">
    <span class="notification-merah-icon">
        <img src="{{asset('template3/image/warning.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text">
        <h6>Permintaan Tidak Sesuai</h6>
        <p>Silahkan periksa kembali data anda!</p>
    </span>
    <button id="close-notification-merah" class="close-btn">✖</button>
</div>

<div id="notification-hijau" class="hidden notification-hijau">
    <span class="notification-hijau-icon">
        <img src="{{asset('template3/image/tick-circle.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text">
        <h6>Done</h6>
        <p>Data berhasil ditambahkan</p>
    </span>
    <button id="close-notification-hijau" class="close-btn">✖</button>
</div>


<script>
// function showSelectedFile(event) {
//     const fileInput = document.getElementById('upload');
//     const file = fileInput.files[0];

//     if (file) {
//         const fileURL = URL.createObjectURL(file);

//         const thumbnailPreview = document.getElementById('thumbnail-preview');
//         thumbnailPreview.src = fileURL;

//         document.getElementById('upload-section').style.display = 'none';

//         document.getElementById('completed-section').style.display = 'block';
//     }
// }

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

function showNotification(type, message) {
    const notification = document.getElementById(`notification-${type}`);
    notification.classList.remove('hidden');
    const messageElement = notification.querySelector('.notification-text p');
    messageElement.textContent = message;

    setTimeout(() => {
        notification.classList.add('hidden');
    }, 5000);
}

function showInputError(inputId, errorMsgId, message) {
    const input = document.getElementById(inputId);
    const errorMsg = document.getElementById(errorMsgId);
    input.style.borderColor = 'red';
    errorMsg.textContent = message;
    errorMsg.style.display = 'block';
}

function hideInputError(inputId, errorMsgId) {
    const input = document.getElementById(inputId);
    const errorMsg = document.getElementById(errorMsgId);
    input.style.borderColor = '';
    errorMsg.style.display = 'none';
}

// function deleteFile() {
//     document.getElementById('upload-section').style.display = 'block';
//     document.getElementById('completed-section').style.display = 'none';
//     document.getElementById('upload').value = '';
//     document.getElementById('thumbnail-preview').src = '';
// }

function deleteFile() {
    const fileInput = document.getElementById('logo'); // ID input file baru
    const imgPreview = document.getElementById('img_preview'); // Elemen <img> untuk pratinjau

    fileInput.value = ''; // Reset nilai input file
    imgPreview.src = ''; // Kosongkan gambar pratinjau
    imgPreview.style.display = 'none'; // Sembunyikan elemen gambar
}


function simpanData() {
    const inputTambah = document.getElementById('nama-partner').value.trim();
    const thumbnailInput = document.getElementById('logo');

    let isValid = true;

    hideInputError('nama-partner', 'error-msg');

    if (inputTambah === '') {
        showInputError('nama-partner', 'error-msg', 'Kolom ini tidak boleh kosong');
        showNotification('merah', "Perhatikan kembali data anda");
        isValid = false;
    }

    if (isValid) {
        const handleDataSubmission = () => {
            const formData = new FormData();
            formData.append('nama', inputTambah);

            formData.append('status', 'inactive');

            if (thumbnailInput.files[0]) {
                formData.append('logo', thumbnailInput.files[0]);
            }

            fetch("{{ route('partner-lembaga.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal menyimpan data' + response.statusText);
                }
                const contentType = response.headers.get('Content-Type');
                if (!contentType || !contentType.includes('application/json')) {
                    return response.text().then(text => {
                        throw new Error('Response bukan JSON, melainkan: ' + text);
                    });
                }

                return response.json();
            })
            .then(data => {
                showNotification('hijau', "Data berhasil ditambahkan!");
                const modalTambahMedia = bootstrap.Modal.getInstance(document.getElementById('modal-tambah'));
                modalTambahMedia.hide();
                setTable(`${path}/api/partner-lembaga/list-all?class=table-data&table=true`);
                resetModal();
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('merah', "Terjadi kesalahan saat menyimpan data!");
            });
        };

        handleDataSubmission();
    }
}

function resetModal() {
    // Reset elemen img-preview
    const imgPreview = document.getElementById('img_preview');
    const fileInput = document.getElementById('logo');

    imgPreview.src = ''; // Kosongkan pratinjau gambar
    imgPreview.style.display = 'none'; // Sembunyikan gambar
    fileInput.value = ''; // Reset nilai input file

    // Reset elemen lainnya
    const namaPartnerInput = document.getElementById('nama-partner');
    namaPartnerInput.value = '';
    namaPartnerInput.style.borderColor = '';
    document.getElementById('error-msg').style.display = 'none';
}

function validateInput(inputId, errorMsgId) {
    const inputTambah = document.getElementById(inputId);
    const errorMsg = document.getElementById(errorMsgId);

    if (!inputTambah || !errorMsg) {  // Pastikan elemen ditemukan
        console.error(`Input atau error message dengan ID ${inputId} atau ${errorMsgId} tidak ditemukan.`);
        return;  // Jika elemen tidak ada, hentikan eksekusi fungsi
    }

    if (inputTambah.value.trim() === '') {
        errorMsg.style.display = 'block';
        inputTambah.style.borderColor = 'red';
    } else {
        errorMsg.style.display = 'none';
        inputTambah.style.borderColor = '';
    }
}

document.querySelectorAll('.close-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        this.closest('.notification-merah, .notification-hijau').classList.add('hidden');
    });
});

document.getElementById('nama-partner').addEventListener('input', function() {
    this.style.color = this.value ? '#000000' : '#9EA3A9';
});


document.querySelector('#modal-tambah .btn-secondary').addEventListener('click', function() {
    resetModal();
});

document.getElementById('modal-tambah').addEventListener('hidden.bs.modal', resetModal);
</script>

<style>
.modal {
    z-index: 1040; /* Pastikan lebih rendah dari notifikasi */
}

#modal-publish {
    z-index: 1050; /* Lebih tinggi dari modal tambah data */
}

#modal-simpan {
    z-index: 1050; /* Lebih tinggi dari modal tambah data */
}

.modal-backdrop {
    z-index: 1030; /* Lebih rendah dari modal */
}

/* Style yang sama seperti sebelumnya */
.modal-content {
    padding: 20px;
    border-radius: 10px;
}

.modal-header{
    border-bottom: none;
}

.modal-title {
    font-weight: 700;
    margin-bottom: 0px;
}

.modal-body{
    margin-top: 0px;
    border: none;
}

.media-upload .media-link{
    text-align: left;
    font-weight: 600;
    font-size: 14px;
}

label.media-link {
    text-align: left; /* Untuk memastikan teks rata kiri */
    display: block;   /* Pastikan label berada dalam satu baris */
    font-weight: 600;
    font-size: 14px;
}

.media-upload {
    text-align: left;
}

.upload-box {
    text-align: center;
    /* border: 2px dashed #ccc; */
    padding: 20px;
    border-radius: 10px;
    background-color: #f8f9fa;
}

.thumbnail-preview{
    border: 2px dashed #ccc;
}

.upload-box img {
    width: 50px;
    margin-bottom: 0px;
}

.upload-box p {
    margin-top: 7px;
    font-size: 14px;
    color: #666;
    font-weight: 600;
    margin-bottom: 0px;
}

.upload-box a{
    text-decoration: none;
}

.upload-box span {
    display: block;
    font-size: 12px;
    color: #999;
    margin-top: 7px;
}

.form-group {
    text-align: left;
}

.form-group .nama-ekskul {
    display: block;
    font-weight: 600;
    font-size: 14px;
}

.form-group input.form-control{
    font-size: 14px;
    color: #9EA3A9;
    padding-block: 7px;
}

.is-invalid {
    border-color: red;
}


.form-check {
    text-align: left;
}

.form-check .form-check-label{
    font-size: 14px;
}

.modal-footer{
    border-top: none;
}

.modal-footer .btn {
    padding: 10px 20px;
    border-radius: 5px;
}

.btn-secondary{
    border: 1px solid #898FA0;
    background-color: #fff;
    color: #080E1E;
}

.btn-primary{
    border: none;
    background-color: #0048ff;
    color: #ffffff;
}

.btn-primary:hover{
    border: none;
    background-color: #0043ec !important;
    color: #ffffff;
}

/* Menata tampilan file-icon agar berada di sebelah kiri */
.file-icon {
    width: 30px;
    height: auto;
    margin-right: 10px;
}

#progress-section label.media-link,
#completed-section label.media-link {
    text-align: left; /* Untuk memastikan teks rata kiri */
    display: block;   /* Pastikan label berada dalam satu baris */
    font-weight: 600;
    font-size: 14px;
}

.progress-section{
    padding-inline: 20px;
}

#progress-section .row {
    display: flex;
    padding: 23px;
    margin-inline: 0px;
    margin-bottom: 80px;
    border: 1px solid #9EA3A9;
    border-radius: 10px;
    justify-content: space-between;
    align-items: center;
}

.completed-section{
    padding-inline: 0px;
}

#completed-section .row {
    display: flex;
    flex-direction: row;
    padding: 15px 10px;
    margin-inline: 0px;
    margin-bottom: 80px;
    border: 1px solid #9EA3A9;
    border-radius: 10px;
    align-items: center;
}

#progress-section .d-flex {
    display: flex;
    align-items: center;
    padding-top: 0px;
    padding-right: 0px;
}

#progress-section .progress {
    height: 6px;
    background-color: #f3f3f3;
    border-radius: 5px;
    margin-top: 10px;
}

#progress-section .progress-bar {
    background-color: #4caf50;
    height: 100%;
    width: 0%;
    transition: width 0.3s;
}

#progress-section .btn-link {
    font-size: 14px;
    padding: 0px;
    text-decoration: none;
    color: #808080 !important;
}

.completed-section button .btn-link{
    border: none;
    background-color: transparent;
    flex: end;
}

.completed-section  img.file-icon{
    width: 30px;
    margin-right: 5px;
    margin-bottom: 0px;
    padding: 0px;
}

.completed-section button{
    margin: 0px;
    padding: 0px
}



.notification-merah, .notification-hijau {
    display: flex;
    align-items: flex-start; /* Supaya icon berada di bagian kiri dan text di kanan */
    justify-content: flex-start;
    position: relative; /* Agar tombol close bisa diatur absolut */
    padding: 10px;
    border-radius: 5px;
    color: #333;
    font-family: Arial, sans-serif;
    font-size: 14px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    width: 300px;
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1050; /* Pastikan lebih tinggi dari modal */
}

.notification-merah{
    background-color: #FFE1DF;
}

.notification-hijau{
    background-color: #EBFAF4;
}

/* Atur ikon di sebelah kiri */
.notification-merah-icon,
.notification-hijau-icon {
    margin-right: 10px;
}

/* Pesan di sebelah kanan icon */
.notification-text {
    display: flex;
    flex-direction: column; /* Susun vertikal antara h6 dan p */
}

.notification-merah .notification-text h6 {
    margin: 0;
    font-weight: 600;
    color: #D32246;
}

.notification-hijau .notification-text h6 {
    margin: 0;
    font-weight: 600;
    color: #3C7B46;
}

.notification-text p {
    margin: 0;
    color: #666;
    font-size: 12px;
}

/* Tombol close di pojok kanan atas */
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

/* Untuk menghilangkan notifikasi secara default */
.hidden {
  display: none;
}

::placeholder {
    color: #9EA3A9; /* Warna placeholder */
    opacity: 1; /* Agar warna placeholder tidak transparan */
}

</style>
