<div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="padding: 20px; text-align: center !important;">
            <h4 class="modal-title justify-content-center" style="font-weight: 600" id="modalHapus">Konfirmasi Hapus Data</h4>
            <p class="justify-content-center" style="margin-top: 25px; font-size: 15px; color: #666E7A;">Apakah anda yakin ingin menghapus data ini?</p>
            <div class="modal-button d-flex flex-direction-row justify-content-center align-items-center mt-3" style="gap: 10px;">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal" style="color: #ffffff; font-size: 12px; border: none; border-radius: 5px; padding: 10px 15px;">Batal</button>
                <button type="button" class="btn btn-hapus" onclick="" style="color: black; border: 1px solid #898FA0; font-size: 12px; font-weight: 600; border-radius: 5px; padding: 10px 15px;">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>

<div id="notif-done" class="d-none notif">
    <span class="notif-done-icon">
        <img src="{{asset('template3/image/tick-circle.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text d-flex flex-direction-column px-2">
        <h6 class="m-0" style="font-weight: 600; color: #3C7B46;">Yeah</h6>
        <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil dihapus!</p>
    </span>
    <button id="close-notif-done" class="close-btn">✖</button>
</div>

<style>
    .btn-batal{
        background-color: #D32246;
    }

    .btn-batal:hover{
        background-color: #b31d3b;
        color: #ffffff;
    }

    .btn-hapus:hover{
        background-color: #e2e2e2;
    }

    #notif-done {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        position: relative;
        padding: 10px;
        background-color: #;
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
        background-color: #EBFAF4;
    }

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
</style>

<script>
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
