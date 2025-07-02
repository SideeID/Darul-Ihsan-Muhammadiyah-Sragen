<x-app-layout>
<div class="ekstrakurikuler">
    <div class="judul">
        <h2>Ekstrakurikuler</h2>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Ekstrakurikuler</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Ekstrakurikuler</li>
        </ol>
    </nav>

    {{-- start card --}}
    <div class="p-4 card">
        <div class="row-pertama d-flex justify-content-between align-items-center">
            <h5>
                Data Ekstrakurikuler
            </h5>
            <div class="button-add">
                <a href="" data-bs-toggle="modal" data-bs-target="#modal-tambah-media">
                    <img src="{{asset('template2/assets/image/dashboard-ekskul/Other Icon.svg')}}" alt="">
                <span>Tambah Ekstrakurikuler</span>
                </a>
            </div>
        </div>
        <div class="my-4 row-kedua d-flex justify-content-between align-items-center">
            <div class="filter-container">
                <div class="filter-item filter-icon">
                    <button><img src="{{ asset('template2/assets/image/dashboard-ekskul/filter-square.svg') }}" alt="Filter Icon"></button>
                </div>
                <div class="filter-item filter-date" id="filter-date">
                    <input type="text" id="datepicker" class="btn dropdown-toggle"
                        placeholder="4 Sep 2024" style="cursor: pointer;" readonly>
                    <div class="arrow"><i class="fa fa-chevron-down"></i></div>
                </div>
                {{-- <div class="filter-item filter-status">
                    <select class="status-link">
                        <option value="" disabled selected hidden>Status</option>
                        <option value="1">Dipublish</option>
                        <option value="2">Draf</option>
                    </select>
                </div> --}}
                <div class="custom-select filter-status">
                    <div class="selected">Status</div>
                    <div class="arrow"><i class="fa fa-chevron-down"></i></div> <!-- Panah dropdown -->
                    <div class="options">
                        <div class="option" data-value="1">Draf</div>
                        <div class="option" data-value="2">Dipublish</div>
                    </div>
                </div>
                <div class="filter-item filter-reset">
                    <img src="{{asset('template2/assets/image/dashboard-ekskul/rotate-left.svg')}}" alt="Reset Icon">
                    <a href="#" class="reset-link" data-bs-toggle="modal" data-bs-target="#modal-hapus">Reset Filter</a>
                </div>
            </div>
            <input type="text" class="form-control-cari search-input" placeholder="Search mail"/>
        </div>
        <div class="ekskul-list">
            <table class="data-ekskul">
                <thead>
                    <tr>
                        <th class="col-1"><span>No </span><button><img src="{{asset('template2/assets/image/dashboard-ekskul/arrow-3.svg')}}" alt=""></button></th>
                        <th class="col-2"><span>Thumbnail </span><button><img src="{{asset('template2/assets/image/dashboard-ekskul/arrow-3.svg')}}" alt=""></button></th>
                        <th class="col-3"><span>Judul </span><button><img src="{{asset('template2/assets/image/dashboard-ekskul/arrow-3.svg')}}" alt=""></button></th>
                        <th class="col-3"><span>File URL </span><button><img src="{{asset('template2/assets/image/dashboard-ekskul/arrow-3.svg')}}" alt=""></button></th>
                        <th class="col-2"><span>Status </span><button><img src="{{asset('template2/assets/image/dashboard-ekskul/arrow-3.svg')}}" alt=""></button></th>
                        <th class="col-1"><span>Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="data-list">
                        <td>1</td>
                        <td>
                            <img src="{{asset('template2/assets/image/dashboard-ekskul/Rectangle 557.svg')}}" alt="Thumbnail" style="width: 100px; height: auto;">
                        </td>
                        <td>Menjahit</td>
                        <td>Menjahit.mp4</td>
                        <td>
                            <span class="badge badge-success">
                                <i class="fa fa-circle"></i> Dipublish
                            </span>
                        </td>
                        <td class="tombol-aksi">
                            <button class="tombol-lihat" data-bs-toggle="modal" data-bs-target="#modal-edit-media">
                                <img src="{{asset('template2/assets/image/dashboard-ekskul/eye.svg')}}" alt="">
                            </button>
                            <button class="tombol-hapus" data-bs-toggle="modal" data-bs-target="#modal-hapus"data-bs-toggle="modal" data-bs-target="#modal-hapus">
                                <img src="{{asset('template2/assets/image/dashboard-ekskul/trash.svg')}}" alt="">
                            </button>
                        </td>
                    </tr>
                    <tr class="data-list">
                        <td>2</td>
                        <td>
                            <img src="{{asset('template2/assets/image/dashboard-ekskul/robotic.svg')}}" alt="Thumbnail" style="width: 100px; height: auto;">
                        </td>
                        <td>Robotic</td>
                        <td>Robotic-video.mp4</td>
                        <td>
                            <span class="badge badge-warning">
                                <i class="fa fa-circle"></i> Draf
                            </span>
                        </td>
                        <td class="tombol-aksi">
                            <button class="tombol-lihat" data-bs-toggle="modal" data-bs-target="#modal-edit-media">
                                <img src="{{asset('template2/assets/image/dashboard-ekskul/eye.svg')}}" alt="">
                            </button>
                            <button class="tombol-hapus" data-bs-toggle="modal" data-bs-target="#modal-hapus"data-bs-toggle="modal" data-bs-target="#modal-hapus">
                                <img src="{{asset('template2/assets/image/dashboard-ekskul/trash.svg')}}" alt="">
                            </button>
                        </td>
                    </tr>
                    <tr class="no-data" style="display: none;">
                        <td colspan="6" style="text-align: center;"><p>Tidak ada data</p></td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination d-flex justify-content-between align-items-center">
                <div class="show-data">
                    <span>Show</span>
                    <select id="jumlah-data" class="form-select custom-select" style="width: 60px; margin-inline: 5px; font-size: 14px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <span>entries</span>
                    <p>Showing <span class="page1">1</span> to <span class="page1">2</span> of the <span class="page2">3</span> entries</p>
                </div>
                <ul class="mb-0 pagination1">
                    <li class="page-item"><a class="page-link" href="#">&lt;</a></li>
                    <li class="page-item active"><a class="page-link" href="#">&gt;</a></li>
                </ul>
            </div>
        </div>

    </div>
    {{-- end card --}}

</div>

<!-- Tempatkan elemen notifikasi flashdata di bagian yang mudah terlihat -->
<div id="notification" class="hidden notification">
    <span class="notification-icon">
        <img src="{{asset('template2/assets/image/dashboard-ekskul/checklist.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text">
        <h6>Done</h6>
        <p>Data berhasil dihapus</p>
    </span>
    <button id="close-notification" class="close-btn">✖</button>
</div>


<style>
    .ekstrakurikuler{
    padding-inline: 10px;
    padding-block: 10px;
}

.ekstrakurikuler h2{
    color: #212122;
    font-weight: 700;
    margin-top: 15px;
}

.ekstrakurikuler .breadcrumb-item a {
    color: #898FA0;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.ekstrakurikuler .breadcrumb-item a:hover {
    color: #707583;
}

.ekstrakurikuler .breadcrumb-item.active {
    color: #3C7B46;
    font-size: 14px;
    font-weight: 500;
}

.ekstrakurikuler .card{
    border: none;
    border-radius: 5px;
}

.ekstrakurikuler .card h5{
    padding-left: 0px;
    margin-left: 0px;
    font-weight: 600;
}

.ekstrakurikuler .button-add{
    background-color: #1763D3;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 8px 8px;
    border-radius: 5px;
    gap: 5px;
}

.ekstrakurikuler .button-add:hover{
    background-color: #1553af;
}

.ekstrakurikuler .button-add a{
    text-decoration: none;
}

.ekstrakurikuler .button-add span{
    color: #ffffff;
    font-size: 14px;
}

.ekstrakurikuler .filter-container {
    display: flex;
    height: 40px;
    align-items: center;
    width: max-content;
    border: 1px solid #EAEAEA;
    border-radius: 8px;
    padding: 0px 0px;
    background-color: #fff;
}

.ekstrakurikuler .filter-container .filter-item {
    padding-block: 0px;
    padding-left: 10px;
    padding-right: 10px;
    height: 100%;
    display: flex;
    align-items: center;
    position: relative;
    transition: background-color 0.3s ease;
}

.ekstrakurikuler .custom-select::after {
    content: "";
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    border-right: 1px solid #EAEAEA; /* Garis pemisah */
    height: 100%;
}

.ekstrakurikuler .custom-select {
    position: relative;
    cursor: pointer;
    width: 150px;
}

.ekstrakurikuler .custom-select:hover {
    background-color: #f1f1f1;
}

.ekstrakurikuler .selected {
    display: inline-block;
    border: none;
    padding: 10px;
}

.ekstrakurikuler .arrow {
    position: absolute;
    right: 10px; /* Jarak dari kanan */
    top: 50%;
    transform: translateY(-50%); /* Pusatkan secara vertikal */
}

.ekstrakurikuler .options {
    display: none; /* Sembunyikan opsi secara default */
    position: absolute;
    top: 100%;
    padding: 10px;
    left: 0;
    right: 0;
    border: 1px solid #EAEAEA;
    border-radius: 8px;
    background-color: #fff;
    z-index: 100;
}

.ekstrakurikuler .option {
    padding: 10px;
}

.ekstrakurikuler .option:hover {
    padding: 10px;
    background-color: #0b1122;
    border-radius: 5px;
    color: #fff
}

.ekstrakurikuler .filter-container .filter-item:hover {
    background-color: #f1f1f1; /* Ganti dengan warna bg yang diinginkan saat hover */
}

/* Gaya hover untuk reset link khusus */
.ekstrakurikuler .filter-container .filter-reset:hover {
    background-color: #ffecec; /* Contoh warna hover untuk filter reset */
}


.ekstrakurikuler .filter-icon img {
    width: 20px; /* Atur ukuran ikon */
    height: auto;
}

.ekstrakurikuler .row-kedua button{
    border: none;
    padding: 0px 0px;
    background-color: #ffffff00;
}

.ekstrakurikuler .filter-date, .filter-status {
    font-size: 14px; /* Ukuran font */
    font-weight: 500; /* Tebal font */
    color: #212121; /* Warna teks */
}

.ekstrakurikuler #filter-date{
    padding-left: 0px !important;
    display: flex;
    justify-content: space-between;
    width: 130px;
}

.ekstrakurikuler #datepicker {
    border: none; /* Menghilangkan border jika perlu */
    outline: none; /* Menghilangkan outline saat fokus */
    flex-grow: 1; /* Ubah menjadi 0 untuk membatasi lebar */ /* Kurangi lebar untuk memberi ruang pada ikon */
    text-align: left; /* Pastikan teks rata kiri */ /* Memungkinkan input mengisi ruang yang tersisa */
}

/* Tanda dropdown (untuk dropdown status dan tanggal) */
.ekstrakurikuler .filter-status::after, .filter-date::after {
    content: '';
}

/* Gaya untuk bagian reset filter */
.ekstrakurikuler .filter-reset {
    display: flex;
    align-items: center;
}

/* Gaya untuk ikon reset */
.ekstrakurikuler .filter-reset img {
    width: 16px; /* Ukuran ikon reset */
    height: auto;
    margin-right: 8px; /* Jarak antara ikon dan teks */
}

/* Gaya untuk teks reset link */
.ekstrakurikuler .reset-link {
    color: #F53838; /* Warna teks merah */
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}

.ekstrakurikuler .filter-item:not(:last-child)::after {
    content: "";
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    border-right: 1px solid #EAEAEA; /* Garis pemisah */
    height: 100%;
}

.ekstrakurikuler .search-input {
    background-image: url('/template2/assets/image/dashboard-ekskul/search-normal.svg');
    background-repeat: no-repeat;
    background-position: 12px center; /* Memastikan ikon tidak terlalu mepet */
    padding-left: 45px; /* Jarak lebih besar antara ikon dan teks */
    background-size: 20px 20px; /* Ukuran ikon yang proporsional */
    font-size: 14px;
}

.ekstrakurikuler input.form-control-cari{
    width: 300px;
    height: 40px;
    background-color: #F5F6FA;
    border: none;
    border-radius: 5px;
    color: #666E7A;
}

.ekstrakurikuler table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
}

.ekstrakurikuler table thead {
    background-color: #F5F6FA; /* Warna latar belakang */
}

.ekstrakurikuler table thead th {
    padding-inline: 10px;
    padding-block: 10px;
    font-weight: 600;
    text-align: left;
    align-items: center;
}

.ekstrakurikuler table thead th:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.ekstrakurikuler table thead th:last-child {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}

.ekstrakurikuler table span{
    float: left;
}

.ekstrakurikuler table button{
    background-color: #898fa000;
    border: none;
    float: right;
}

.ekstrakurikuler table button img{
    width: 14px;
}

.ekstrakurikuler table tbody td {
    padding-inline: 10px;
    padding-block: 10px;
    vertical-align: middle;
}

.ekstrakurikuler table {
    border-collapse: collapse; /* Pastikan border-collapse diatur ke collapse */
}

.ekstrakurikuler table tbody tr{
    border-bottom: 1px solid #F5F6FA; /* Warna dan ketebalan border */
}

.ekstrakurikuler table thead th,
.ekstrakurikuler table tbody td {
    border: none; /* Menghapus border default */
}

.ekstrakurikuler .badge {
    display: inline-flex;
    align-items: center;
    padding: 8px 12px;
    border-radius: 10px;
    font-size: 12px;
}

.ekstrakurikuler .badge i {
    font-size: 8px;
    margin-right: 5px;
}

.ekstrakurikuler .badge-success .fa{
    color: #12B76A;
}

.ekstrakurikuler .badge-warning .fa{
    color: #FFAD00;
}

.ekstrakurikuler .badge-success {
    background-color: #e6f7e6;
    color: #027A48;
}

.ekstrakurikuler .badge-warning {
    background-color: #fff4e5;
    color: #524224;
}

.ekstrakurikuler table td.tombol-aksi {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
    padding-block: 30px;
    gap: 7px;
}

.ekstrakurikuler table .tombol-lihat{
    border-radius: 10px;
    border: 1px solid rgb(0, 0, 0);
    background-color: #fff;
    order: 1;
}

.ekstrakurikuler table .tombol-lihat:hover{
    background-color: #eeeeee;
}

.ekstrakurikuler table .tombol-hapus:hover{
    background-color: rgb(255, 210, 210);

}

.ekstrakurikuler table .tombol-hapus{
    border-radius: 10px;
    border: 1px solid red;
    background-color: #fff;
    order: 2;
}

.pagination{
    margin-top: 30px;
    display: flex;
    align-items: center;
}

.pagination .show-data{
    display: flex;
    align-items: center;
    justify-content: row;
}

.show-data select {
    margin-inline: 5px;
}

.pagination p{
    padding-block: 10px;
    margin-left: 30px;
    margin-block: 0px;
    font-size: 16px;
    color: #000000;
    align-items: center;
}

.pagination .page1{
    padding-top: 15px;
    font-size: 16px;
    color: #000000;
    font-weight: 600;
}

.pagination .page2{
    padding-top: 15px;
    font-size: 16px;
    color: #0037ff;
    font-weight: 600;
}

.pagination1 {
    padding-inline: 0px;
    margin-inline: 0px;
    display: flex;
    align-items: center;
}

.pagination1 li.page-item{
    list-style: none;
    border-radius: 40px;
}

.pagination1 .page-link {
    color: #7f8a99;
    font-size: 13px;
    border: 1px solid #dcdcdc;
    padding: 8px 16px;
}

.pagination1 .page-item {
    position: relative;
}

.pagination1 .page-item:not(:last-child) {
    border-right: 1px solid #dcdcdc; /* Warna dan ketebalan garis bisa disesuaikan */
}

.pagination1 .page-item.active .page-link {
    color: #444952;
    background-color: #fff;
}

.pagination1 li:first-child .page-link {
    border-radius: 10px 0 0 10px; /* Kiri atas dan kiri bawah untuk "Sebelumnya" */
}

.pagination1 li:last-child .page-link {
    border-radius: 0 10px 10px 0; /* Kanan atas dan kanan bawah untuk "Selanjutnya" */
}

.pagination1 .page-item.active .page-link:hover {
    background-color: #e9ecef;
    color: #252946;
}

.pagination1 .page-link:hover {
    background-color: #ffffff;
    color: #252946;
}

/* Style modal agar menyerupai dropdown */
.modal-dialog #filterModal{
    max-width: 200px; /* Sesuaikan dengan lebar dropdown */
}

#filterModal .modal-content{
    border-radius: 8px;
    overflow: hidden;
}

#filterModal .modal-body{
    padding: 0;
}

#filterModal .list-group-item {
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
}

#filterModal .list-group-item.active {
    background-color: #0b1122;
    color: white;
}

#filterModal .list-group-item:hover {
    background-color: #f8f9fa;
}

/* notif berhasil hapus */

/* Container notifikasi */
.notification{
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
    z-index: 1000;
}

.notification-merah {
    display: flex;
    align-items: flex-start; /* Supaya icon berada di bagian kiri dan text di kanan */
    justify-content: flex-start;
    position: relative; /* Agar tombol close bisa diatur absolut */
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
    z-index: 1000;
}

/* Atur ikon di sebelah kiri */
.notification-icon {
    margin-right: 10px;
}

/* Pesan di sebelah kanan icon */
.notification-text {
    display: flex;
    flex-direction: column; /* Susun vertikal antara h6 dan p */
}

/* Atur tampilan judul dan pesan */
.notification h6 {
    margin: 0;
    font-weight: 600;
    color: #3C7B46;
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

/* Untuk menghilangkan notifikasi secara default */
.hidden {
  display: none;
}

.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.endRange,
.flatpickr-day.selected.inRange,
.flatpickr-day.startRange.inRange,
.flatpickr-day.endRange.inRange,
.flatpickr-day.selected:focus,
.flatpickr-day.startRange:focus,
.flatpickr-day.endRange:focus,
.flatpickr-day.selected:hover,
.flatpickr-day.startRange:hover,
.flatpickr-day.endRange:hover,
.flatpickr-day.selected.prevMonthDay,
.flatpickr-day.startRange.prevMonthDay,
.flatpickr-day.endRange.prevMonthDay,
.flatpickr-day.selected.nextMonthDay,
.flatpickr-day.startRange.nextMonthDay,
.flatpickr-day.endRange.nextMonthDay {
    background-color: #3c7b46 !important;
    color: white !important;
    border-color: #3c7b46 !important;
}


</style>

<script>
    document.querySelector('.custom-select').addEventListener('click', function() {
    const options = document.querySelector('.options');
    options.style.display = options.style.display === 'block' ? 'none' : 'block';
});

document.querySelectorAll('.option').forEach(option => {
    option.addEventListener('click', function() {
        document.querySelector('.selected').textContent = this.textContent;
        document.querySelector('.options').style.display = 'none';
    });
});

// Tutup dropdown jika mengklik di luar
document.addEventListener('click', function(event) {
    if (!event.target.closest('.custom-select')) {
        document.querySelector('.options').style.display = 'none';
    }
});

//Calendar
//JS Setting Date
document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#datepicker", {
                dateFormat: "d M Y",
                defaultDate: "2024-09-04",
                showMonths: 1,
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa', 'Mg'],
                        longhand: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                            'Saturday'
                        ],
                    },
                    months: {
                        shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                            'Nov', 'Des'
                        ],
                        longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ],
                    }
                },
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('datepicker').value = dateStr;
                },
                onReady: function(selectedDates, dateStr, instance) {
                    document.querySelector('.flatpickr-current-month .cur-year').style.display = 'none';
                },
            });
        });

// Fungsi untuk menampilkan notifikasi
// Fungsi untuk menampilkan notifikasi
function simulateDelete() {
    // Logika simulasi penghapusan data
    console.log('Simulasi penghapusan data...');

    // Tampilkan notifikasi bahwa data berhasil "dihapus"
    showNotification('Data berhasil dihapus!');

    // Jika Anda menggunakan modal, tutup modal setelah klik
    const modal = document.getElementById('modal-hapus');
    const modalInstance = bootstrap.Modal.getInstance(modal);
    modalInstance.hide(); // Tutup modal
}

function showNotification(message) {
    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notification-message').querySelector('p');

    notificationMessage.textContent = message; // Set pesan notifikasi
    notification.classList.remove('hidden'); // Tampilkan notifikasi

    setTimeout(() => {
        notification.classList.add('hidden'); // Sembunyikan notifikasi setelah 5 detik
    }, 5000);

    // Jika ingin menutup notifikasi ketika tombol diklik
    const closeBtn = document.getElementById('close-notification');
    closeBtn.onclick = () => {
        notification.classList.add('hidden');
    };
}

function simpanData() {
    const input = document.getElementById('nama-ekskul').value.trim();
    console.log("Input:", input); // Log input untuk debug
    const notification = document.getElementById('notification-merah');
    const errorMsg = document.getElementById('error-msg');

    if (input === '') {
        console.log("Notifikasi akan ditampilkan"); // Log saat menampilkan notifikasi
        errorMsg.style.display = 'block';
        notification.classList.remove('hidden');

        setTimeout(() => {
            notification.classList.add('hidden');
        }, 5000);
    } else {
        alert("Data berhasil disimpan!");
    }
}

function validateInput() {
    const input = document.getElementById('nama-ekskul');
    const errorMsg = document.getElementById('error-msg');

    if (input.value.trim() === '') {
        // Tampilkan pesan error dan border merah
        errorMsg.style.display = 'block';
        input.style.borderColor = 'red';
    } else {
        // Sembunyikan pesan error dan kembalikan border ke warna normal
        errorMsg.style.display = 'none';
        input.style.borderColor = '';
    }
}


    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        const dataList = document.querySelectorAll('.data-list');
        const noDataRow = document.querySelector('.no-data');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            let hasData = false;

            dataList.forEach(row => {
                const fileName = row.cells[3].textContent.toLowerCase(); // Ambil nama file dari kolom yang sesuai
                if (fileName.includes(searchTerm)) {
                    row.style.display = ''; // Tampilkan baris jika cocok
                    hasData = true; // Tampilkan baris jika cocok
                } else {
                    row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
                }
            });

            if (hasData) {
                noDataRow.style.display = 'none'; // Sembunyikan pesan jika ada data
            } else {
                noDataRow.style.display = ''; // Tampilkan pesan jika tidak ada data
            }
        });
    });


</script>

@include(config('app.template') . 'admin.ekstrakurikuler.modal-hapus')
@include(config('app.template') . 'admin.ekstrakurikuler.modal-tambahdata')
@include(config('app.template') . 'admin.ekstrakurikuler.modal-edit')
</x-app-layout>
