<div class="modal fade" id="modal-edit-media" tabindex="-1" aria-labelledby="modalEditMediaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditMediaLabel">Edit Ekstrakurikuler</h5>
            </div>
            <div class="modal-body">
                <div class="img-preview" id="edit-upload-section">
                    <label for="edit-upload" class="media-link"></label>
                    <div class="upload-box h-100 w-100 d-flex flex-column align-items-center justify-content-center"
                        onclick="document.getElementById('edit-upload').click();">
                        <img src="{{ asset('template2/assets/image/dashboard-ekskul/gallery-add.svg') }}"
                            alt="Upload Icon" id="edit-upload-icon">
                        <input type="file" id="edit-upload" accept="image/png, image/jpeg" style="display: none;"
                            onchange="showEditSelectedFile(event)">
                        <p>Unggah sampul, atau <a href="#"
                                onclick="document.getElementById('edit-upload').click();">telusuri</a></p>
                        <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan
                            dalam format PNG atau JPG saja.</small>
                    </div>
                </div>
                {{-- preview --}}
                <div id="edit-completed-section" style="display: none; position: relative;">
                    <label for="edit-thumbnail-preview" class="media-link"></label>
                    <img id="edit-thumbnail-preview" src="" alt="Selected Thumbnail"
                        style="width: 100%; height: auto; border-radius: 8px; border: 2px dashed #ccc; margin-bottom: 10px;">
                    {{-- btn --}}
                    <div style="position: absolute; top: 35px; right: 15px; display: flex; gap: 10px;">
                        <button class="px-3 btn btn-outline-light btn-sm" onclick="changeImage()">Ganti</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteImage()"><img
                                src="{{ asset('image/icon/icon-delete.svg') }}" alt="delete-gambar"></button>
                    </div>
                </div>

                <div class="mt-3 form-group">
                    <label for="edit-nama-partner" class="nama-ekskul">Nama Partner</label>
                    <input type="text" class="form-control" id="edit-nama-partner" placeholder="e.g; Kemenag" onblur="validateEditInput()">
                    <small id="edit-error-msg" style="color: red; display: none;">Kolom Nama Partner wajib diisi!</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary--edit" id="update-button" onclick="updateData()">Update
                    data</button>
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

    // preview gambar
    function showEditSelectedFile(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];

        if (file) {
            const fileURL = URL.createObjectURL(file);
            document.getElementById('edit-upload-section').style.display = 'none';
            document.getElementById('edit-completed-section').style.display = 'block';
            document.getElementById('edit-thumbnail-preview').src = fileURL;
        }
    }

    function changeImage() {
        document.getElementById('edit-upload').click();
    }

    function deleteImage() {
        document.getElementById('edit-thumbnail-preview').src = '';
        document.getElementById('edit-upload').value = '';
        document.getElementById('edit-upload-section').style.display = 'block';
        document.getElementById('edit-completed-section').style.display = 'none';
    }

    function validateEditInput() {
        const namaPartner = document.getElementById('edit-nama-partner').value.trim();

        hideInputError('edit-nama-partner', 'edit-error-msg');

        let isValid = true;

        if (namaPartner === '') {
            showInputError('edit-nama-partner', 'edit-error-msg', 'Kolom nama ekstrakurikuler wajib diisi!');
            isValid = false;
        }
        return isValid;
    }

    function openForm(id) {
        resetEditForm();
        document.getElementById('update-button').dataset.id = id;
        const modal = new bootstrap.Modal(document.getElementById('modal-edit-media'));

        fetch(`${path}/api/partner-lembaga/detail/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit-nama-partner').value = data.data.nama;

                if (data.data.logo_url) {
                    document.getElementById('edit-upload-section').style.display = 'none';
                    document.getElementById('edit-completed-section').style.display = 'block';
                    document.getElementById('edit-thumbnail-preview').src = data.data.logo_url;
                }

                modal.show();
            })
            .catch(error => {
                showNotification('merah', 'Gagal mengambil data ekstrakurikuler.');
                console.error('Error fetching data:', error);
            });
    }

    function updateData() {
        if (!validateEditInput()) {
            return;
        }

        const id = document.getElementById('update-button').dataset.id;

        const formData = new FormData();

        formData.append('nama', document.getElementById('edit-nama-partner').value);
        const thumbnailInput = document.getElementById('edit-upload');
        if (thumbnailInput.files[0]) {
            formData.append('logo', thumbnailInput.files[0]);
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
                showNotification('hijau', 'Data ekstrakurikuler berhasil diperbarui.');
            })
            .catch(error => {
                showNotification('merah', 'Gagal memperbarui data ekstrakurikuler.');
                console.error('Error updating data:', error);
            })
            .finally(() => {
                document.getElementById('update-button').disabled = false;
            });
    }

    function resetEditForm() {
        document.getElementById('edit-nama-partner').value = '';
        document.getElementById('logo').value = '';
        document.getElementById('img_preview').src = '';
        hideInputError('edit-nama-partner', 'edit-error-msg');
    }

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
