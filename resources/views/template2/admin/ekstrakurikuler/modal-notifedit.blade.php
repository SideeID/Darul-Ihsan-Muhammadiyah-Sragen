<div class="modal fade" id="modal-notifedit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h4 class="modal-title" id="modalPublishLabel">Konfirmasi Simpan Data</h4>
            <p>Apakah anda yakin ingin mengedit data ini?</p>
            <div class="modal-button">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-simpan" onclick="simulateEdit()">Ya, Simpan!</button>
            </div>
        </div>
    </div>
</div>

<div id="notification-hijau" class="notification-hijau hidden">
    <span class="notification-hijau-icon">
        <img src="{{asset('image/icon/dashboard-ekskul/checklist.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text">
        <h6>Done</h6>
        <p>Data berhasil diedit</p>
    </span>
    <button id="close-notification-hijau" class="close-btn">✖</button>
</div>


<style>
#modal-simpan {
    z-index: 1050; /* Lebih tinggi dari modal tambah data */
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
        margin-top: 20px;
        display:flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    #modal-notifedit .btn-batal{
        color: black;
        background-color: #ffffff;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px 15px;
    }

    #modal-notifedit .btn-batal:hover{
        color: black;
        border: 1px solid black;
        background-color: #e2e2e2;
    }

    #modal-notifedit .btn-simpan{
        color: black;
        background-color: #F9BF39;
        font-size: 12px;
        font-weight: 600;
        border-radius: 5px;
        padding: 10px 15px;
    }

    #modal-notifedit .btn-simpan:hover{
        color: black;
        background-color: #deaa33;
    }


    .notification-hijau {
    display: flex;
    align-items: flex-start; /* Supaya icon berada di bagian kiri dan text di kanan */
    justify-content: flex-start;
    position: relative; /* Agar tombol close bisa diatur absolut */
    padding: 10px;
    background-color: #E6F4EA;
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

.notification-hijau-icon {
    margin-right: 10px;
}

/* Pesan di sebelah kanan icon */
.notification-text {
    display: flex;
    flex-direction: column; /* Susun vertikal antara h6 dan p */
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
</style>

<script>
function simulateEdit() {
    // Logika simulasi penghapusan data
    console.log('Simulasi edit data...');

    // Tampilkan notifikasi bahwa data berhasil "dihapus"
    showNotification('Data berhasil diedit!');

    // Tutup modal notifikasi edit
    const modalEditConfirm = bootstrap.Modal.getInstance(document.getElementById('modal-notifedit'));
    if (modalEditConfirm) {
        modalEditConfirm.hide();
    }
}

function showNotificationHijau(message) {
    const notification = document.getElementById('notification-hijau');
    const notificationMessage = document.querySelector('#notification-hijau .notification-text p');

    // Set message
    notificationMessage.textContent = message;
    notification.classList.remove('hidden');

    // Sembunyikan notifikasi setelah 5 detik
    setTimeout(() => {
        notification.classList.add('hidden');
    }, 5000);
}

document.getElementById('close-notification-hijau').addEventListener('click', function() {
    const notification = document.getElementById('notification-hijau');
    notification.classList.add('hidden'); // Sembunyikan notifikasi
});

</script>
