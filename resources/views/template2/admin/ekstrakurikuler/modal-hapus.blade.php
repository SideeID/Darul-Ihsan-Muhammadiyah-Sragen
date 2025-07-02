<div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h4 class="modal-title" id="modalTolakLabel">Konfirmasi Hapus Data</h4>
            <p>Apakah anda yakin ingin menghapus data ini?</p>
            <div class="modal-button">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-hapus" onclick="simulateDelete()">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>

<style>
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

    .btn-batal{
        background-color: #D32246;
        color: #ffffff;
        font-size: 12px;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .btn-batal:hover{
        background-color: #b31d3b;
        color: #ffffff;
    }

    .btn-hapus{
        color: black;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .btn-hapus:hover{
        color: black;
        border: 1px solid black;
        background-color: #e2e2e2;
    }
</style>

<script>
    // Fungsi untuk menampilkan notifikasi
    // Fungsi untuk menampilkan notifikasi
function simulateDelete() {
    // Logika simulasi penghapusan data
    console.log('Simulasi penghapusan data...');

    // Tampilkan notifikasi bahwa data berhasil "dihapus"
    // showNotification('Data berhasil dihapus!');

    // Jika Anda menggunakan modal, tutup modal setelah klik
    const modal = document.getElementById('modal-hapus');
    const modalInstance = bootstrap.Modal.getInstance(modal);
    modalInstance.hide(); // Tutup modal
}

// function showNotification(message) {
//     const notification = document.getElementById('notification');
//     const notificationMessage = document.getElementById('notification-message').querySelector('p');

//     notificationMessage.textContent = message; // Set pesan notifikasi
//     notification.classList.remove('hidden'); // Tampilkan notifikasi

//     setTimeout(() => {
//         notification.classList.add('hidden'); // Sembunyikan notifikasi setelah 5 detik
//     }, 5000);

//     // Jika ingin menutup notifikasi ketika tombol diklik
//     const closeBtn = document.getElementById('close-notification');
//     closeBtn.onclick = () => {
//         notification.classList.add('hidden');
//     };
// }

</script>
