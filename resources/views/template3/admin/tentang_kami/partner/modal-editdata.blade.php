<div class="modal fade" id="modal-edit-media" tabindex="-1" aria-labelledby="modalEditMediaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditMediaLabel">Edit Partner</h5>
            </div>
            <div class="modal-body">
                <div class="col d-flex flex-column align-items-center ms-2">
                    <div class="mb-4 img-preview" style="overflow:hidden;">
                        <input type="file" hidden name="gambar" id="logo"
                            accept="image/png, image/jpeg"
                            onchange="onchangeImgPreview('#logo', '#img_preview');">
                        <img src="" id="img_preview" class="preview" onerror="this.style.display='none'"
                            alt="">
                        <label for="logo"
                            class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('template3/image/gallery-add.svg') }}" class="mx-auto mb-3"
                                alt="icon upload foto">
                            <div class="label-content">
                                <p class="mb-2 text-center text-black fw-700">Unggah sampul, atau <span
                                        class="text-primary">telusuri</span></p>
                                <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan
                                    dalam format PNG atau JPG saja.</small>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mt-3 form-group">
                    <label for="edit-nama-partner" class="nama-partner">Nama Partner</label>
                    <input type="text" class="form-control" id="edit-nama-partner" placeholder="e.g; Kemenag" onblur="validateEditInput()">
                    <small id="edit-error-msg" style="color: red; display: none;">Kolom ini wajib diisi!</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary--edit" id="update-button" onclick="updateData()">Update data</button>
            </div>
        </div>
    </div>
</div>

<div id="notification-merah" class="hidden notification-merah">
    <span class="notification-merah-icon">
        <img src="{{ asset('image/icon/dashboard-ekskul/warning.svg') }}" alt="">
    </span>
    <span id="notification-message" class="notification-text">
        <h6>Permintaan Tidak Sesuai</h6>
        <p>Silahkan periksa kembali data anda!</p>
    </span>
    <button id="close-notification-merah" class="close-btn">✖</button>
</div>


<script>
    function showNotification(type, message) {
        const notification = document.getElementById(`notification-${type}`);
        notification.classList.remove('hidden');
        notification.querySelector('p').textContent = message;

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

//     function onchangeImgPreview(inputId, previewId) {
//     const input = document.querySelector(inputId);
//     const preview = document.querySelector(previewId);

//     if (input.files && input.files[0]) {
//         const reader = new FileReader();

//         reader.onload = function (e) {
//             preview.src = e.target.result;
//             preview.style.display = "block"; // Tampilkan preview
//         };

//         reader.readAsDataURL(input.files[0]);
//     } else {
//         preview.src = ""; // Reset gambar
//         preview.style.display = "none"; // Sembunyikan jika kosong
//     }
// }

function onchangeImgPreview(imageInput, imagePreview) {
    const fileInput = document.querySelector(imageInput);
    const previewImg = document.querySelector(imagePreview);

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
    }
}


    // function showEditModal(partnerId) {
    // // Fetch data partner dari API (ganti URL sesuai kebutuhan)
    // fetch(`/api/partner-lembaga/detail/${partnerId}`)
    //     .then(response => response.json())
    //     .then(data => {
    //         // Periksa apakah data tersedia
    //         if (data && data.data) {
    //             const partner = data.data;

    //             // Isi gambar logo
    //             const imgPreview = document.getElementById('img_preview');
    //             imgPreview.src = partner.logo || ''; // Ganti 'logo' sesuai dengan field API Anda
    //             imgPreview.style.display = partner.logo ? 'block' : 'none'; // Tampilkan jika ada logo

    //             // Isi nama partner
    //             const namaPartnerInput = document.getElementById('edit-nama-partner');
    //             namaPartnerInput.value = partner.nama || ''; // Ganti 'nama' sesuai dengan field API Anda

    //             // Tampilkan modal
    //             const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));
    //             modal.show();
    //         } else {
    //             // Tampilkan notifikasi jika data tidak ditemukan
    //             console.error('Data partner tidak ditemukan');
    //             showNotification('Permintaan Tidak Sesuai', 'Data partner tidak tersedia.');
    //         }
    //     })
    //     .catch(error => {
    //         // Tangani error
    //         console.error('Terjadi kesalahan:', error);
    //         showNotification('Kesalahan Server', 'Tidak dapat mengambil data partner.');
    //     });
    // }

    // preview gambar
    // function showEditSelectedFile(event) {
    //     const fileInput = event.target;
    //     const file = fileInput.files[0];

    //     if (file) {
    //         const fileURL = URL.createObjectURL(file);
    //         document.getElementById('edit-upload-section').style.display = 'none';
    //         document.getElementById('edit-completed-section').style.display = 'block';
    //         document.getElementById('edit-thumbnail-preview').src = fileURL;
    //     }
    // }

    function changeImage() {
        document.getElementById('edit-upload').click();
    }

    // function deleteImage() {
    //     document.getElementById('edit-thumbnail-preview').src = '';
    //     document.getElementById('edit-upload').value = '';
    //     document.getElementById('edit-upload-section').style.display = 'block';
    //     document.getElementById('edit-completed-section').style.display = 'none';
    // }

    function validateEditInput() {
        const namaPartner = document.getElementById('edit-nama-partner').value.trim();

        hideInputError('edit-nama-partner', 'edit-error-msg');

        let isValid = true;

        if (namaEkskul === '') {
            showInputError('edit-nama-partner', 'edit-error-msg', 'Kolom ini wajib diisi!');
            isValid = false;
        }

        return isValid;
    }

    function resetEditForm() {
        document.getElementById('edit-nama-partner').value = '';
        document.getElementById('logo').value = '';
        document.getElementById('img_preview').src = '';
        hideInputError('edit-nama-partner', 'edit-error-msg');
    }

    function openForm(id) {
        resetEditForm();
        document.getElementById('update-button').dataset.id = id;
        const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));

        fetch(`${path}/api/partner-lembaga/detail/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                if (data?.data) {
                    document.getElementById('edit-nama-partner').value = data.data.nama || '';
                    const logoPreview = document.getElementById('img_preview');
                    if (data.data.logo) {
                        logoPreview.src = `${path}/${data.data.logo}`;
                        logoPreview.style.display = 'block';
                    } else {
                        logoPreview.src = '';
                        logoPreview.style.display = 'none';
                    }
                    const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));
                    modal.show();
                } else {
                    throw new Error('Data tidak ditemukan di respons API');
                }
            })
            .catch(error => {
                showNotification('merah', 'Gagal mengambil data partner.');
                console.error('Error fetching data:', error);
            });
    }

    function updateData() {
        if (!validateEditInput()) {
            return;
        }

        const id = document.getElementById('update-button').dataset.id;
        const formData = new FormData();
        formData.append('nama', document.getElementById('edit-nama-ekskul').value);

        const thumbnailInput = document.getElementById('logo');
        if (logoInput.files[0]) {
            formData.append('logo', logoInput.files[0]);
        }

        fetch(`${path}/api/partner-lembaga/update/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Jaringan bermasalah. Silakan coba lagi.');
                }
                return response.json();
            })
            .then(data => {
                bootstrap.Modal.getInstance(document.getElementById('modal-edit-media')).hide();
                setTable(`${path}/api/partner-lembaga/list-all?class=table-data&table=true`);
                showNotification('hijau', 'Data partner berhasil diperbarui.');
            })
            .catch(error => {
                showNotification('merah', 'Gagal memperbarui data ekstrakurikuler.');
                console.error('Error updating data:', error);
            })
            .finally(() => {
                document.getElementById('update-button').disabled = false;
            });
    }

    // function resetEditForm() {
    //     document.getElementById('edit-nama-partner').value = '';
    //     document.getElementById('edit-upload').value = '';
    //     document.getElementById('edit-upload-section').style.display = 'block';
    //     document.getElementById('edit-completed-section').style.display = 'none';
    //     document.getElementById('edit-thumbnail-preview').src = '';
    //     hideInputError('edit-nama-partner', 'edit-error-msg');
    // }

    document.getElementById('edit-nama-partner').addEventListener('input', function() {
        this.style.color = this.value ? '#000000' : '#9EA3A9';
        if (this.value.trim() !== '') {
            hideInputError('edit-nama-partner', 'edit-error-msg');
        }
    });

    document.getElementById('modal-edit-media').addEventListener('hidden.bs.modal', resetEditForm);
</script>

<style>
    .btn-primary--edit {
        background-color: #FFC107;
        border-color: #FFC107;
    }

    .btn-primary--edit:hover {
        background-color: #E0A800;
        border-color: #E0A800;
    }

    .btn-primary--edit:focus,
    .btn-primary--edit:active {
        background-color: #D39E00;
        border-color: #D39E00;
    }
    .modal {
        z-index: 1040;
        /* Pastikan lebih rendah dari notifikasi */
    }

    #modal-publish {
        z-index: 1050;
        /* Lebih tinggi dari modal tambah data */
    }

    #modal-simpan {
        z-index: 1050;
        /* Lebih tinggi dari modal tambah data */
    }

    .modal-backdrop {
        z-index: 1030;
        /* Lebih rendah dari modal */
    }

    /* Style yang sama seperti sebelumnya */
    .modal-content {
        padding: 20px;
        border-radius: 10px;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-title {
        font-weight: 700;
        margin-bottom: 0px;
    }

    .modal-body {
        margin-top: 0px;
        border: none;
    }

    .media-upload .media-link {
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    label.media-link {
        text-align: left;
        /* Untuk memastikan teks rata kiri */
        display: block;
        /* Pastikan label berada dalam satu baris */
        font-weight: 600;
        font-size: 14px;
    }

    .media-upload {
        text-align: left;
    }

    .upload-box {
        text-align: center;
        border: 2px dashed #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f8f9fa;
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

    .upload-box a {
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

    .form-group .nama-ekskul1 {
        display: block;
        font-weight: 600;
        font-size: 14px;
    }

    .form-group input.form-control {
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

    .form-check .form-check-label {
        font-size: 14px;
    }

    .modal-footer {
        border-top: none;
    }

    .modal-footer .btn {
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-secondary {
        border: 1px solid #898FA0;
        background-color: #fff;
        color: #080E1E;
    }

    /* Menata tampilan file-icon agar berada di sebelah kiri */
    .file-icon {
        width: 30px;
        height: auto;
        margin-right: 10px;
    }

    #progress-section label.media-link,
    #completed-section label.media-link {
        text-align: left;
        /* Untuk memastikan teks rata kiri */
        display: block;
        /* Pastikan label berada dalam satu baris */
        font-weight: 600;
        font-size: 14px;
    }

    .progress-section {
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

    .completed-section {
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

    .completed-section button .btn-link {
        border: none;
        background-color: transparent;
        flex: end;
    }

    .completed-section img.file-icon {
        width: 30px;
        margin-right: 5px;
        margin-bottom: 0px;
        padding: 0px;
    }

    .completed-section button {
        margin: 0px;
        padding: 0px
    }



    .notification-merah {
        display: flex;
        align-items: flex-start;
        /* Supaya icon berada di bagian kiri dan text di kanan */
        justify-content: flex-start;
        position: relative;
        /* Agar tombol close bisa diatur absolut */
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
        z-index: 1050;
        /* Pastikan lebih tinggi dari modal */
    }

    /* Atur ikon di sebelah kiri */
    .notification-merah-icon {
        margin-right: 10px;
    }

    /* Pesan di sebelah kanan icon */
    .notification-text {
        display: flex;
        flex-direction: column;
        /* Susun vertikal antara h6 dan p */
    }

    .notification-merah .notification-text h6 {
        margin: 0;
        font-weight: 600;
        color: #D32246;
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

    .modal-footer .btn-edit-primary {
        border: none;
        background-color: #F9BF39 !important;
        color: #000000 !important;
    }

    .modal-footer .btn-edit-primary:hover {
        border: none;
        background-color: #deaa33 !important;
        color: #000000 !important;
    }

    /* Untuk menghilangkan notifikasi secara default */
    .hidden {
        display: none;
    }

    ::placeholder {
        color: #9EA3A9;
        /* Warna placeholder */
        opacity: 1;
        /* Agar warna placeholder tidak transparan */
    }
</style>
