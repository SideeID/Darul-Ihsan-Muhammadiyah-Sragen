@extends('admin.layouts.main')

@section('style')
    <style>
        .btn-group .btn {
            padding: 10px 20px;
            border-radius: 4px;
        }

        .badge-kuning {
            font-size: 12px;
            padding: 2px 8px 2px 6px;
            border-radius: 5px;
            background-color: #FFF9EA;
            color: #524224;
            height: 21px;
            width: 51px;
            gap: 6px;
        }

        .badge-hijau {
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 5px;
            background-color: #ECFDF3;
            color: #027A48;
            height: 21px;
            width: 78px;
            gap: 6px;
        }

        .aksi-button {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid #d6d8db;
            padding: 0;
            background-color: transparent;
            cursor: pointer;
        }

        .aksi-button img {
            width: 16px;
            height: 16px;
        }

    </style>
@endsection


@section('content')
    <div class="container-fluid p-3">
        <br>
        <div class="row">
            <div class="col-12">
                <h4 class="tentangkami-judul">Fasilitas</h4>
            </div>
            <div class="col-auto">
                <span class="text-breadcumbs mr-2" style="font-size:14px;">Tentang Kami</span>
                <span class="text-breadcumbs-active">/</span>
                <span class="text-breadcumbs-ml-2" style="font-size:14px;">Fasilitas</span>
                <span class="text-breadcumbs-active">/</span>
                <span class="text-breadcumbs-active ml-2" style="font-size:14px;">Data Fasilitas</span>
            </div>
        </div>
        <br>

        <div class="col-12">
            <div class="card tentangkami-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="tentangkami-subjudul">Data Galeri</h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end mb-4">
                            <a href="{{ route('tentangkami.fasilitas.new') }}" class="btn btn-primary" role="button">
                                <img src="{{ asset('template2/img/icon-add.svg') }}" class="me-2" alt="icon-add">Tambah
                                Fasilitas
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="btn-group" role="group" aria-label="Button group">
                                <button type="button" class="btn">
                                    <img src="{{ asset('template2/img/icon-filter.svg') }}" alt="">
                                </button>
                                <!-- Date Picker Dropdown -->
                                <div class="btn-group" role="group">
                                    <input type="text" id="datepicker" class="btn dropdown-toggle"
                                        placeholder="4 Sep 2024" style="cursor: pointer;" readonly>
                                    <img src="{{ asset('template2/img/icon-DropDown.svg') }}" alt="Dropdown Icon"
                                        style="width: 16px; height: 16px; margin-left: -25px; cursor: pointer;"
                                        onclick="document.getElementById('datepicker').click();">
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Status
                                        <img src="{{ asset('template2/img/icon-DropDown.svg') }}" alt="Dropdown Icon"
                                            style="width: 16px; height: 16px; margin-left: 8px;">
                                    </button>
                                    <ul class="dropdown-menu status-dropdown">
                                        <li><a class="dropdown-item" href="#">Draf</a></li>
                                        <li><a class="dropdown-item" href="#">Di Publish</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn">
                                    <img src="{{ asset('template2/img/icon-rotate-left.svg') }}" alt=""
                                        class="me-2">
                                    <span class="text-danger">Reset Filter</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="input-group">
                                <span class="input-group-text border-end-0 tentangkami-search">
                                    <img src="{{ asset('template2/img/icon-search.svg') }}" alt="search icon">
                                </span>
                                <input type="text" class="form-control border-start-0 tentangkami-search" id="search"
                                    placeholder="Search mail">
                            </div>
                        </div>
                    </div>

                    <!-- Tabel -->
                    <div class="row">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">No
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                    <th scope="col">Link
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                    <th scope="col">Jumlah Foto
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                    <th scope="col">Tanggal
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                    <th scope="col">Status
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                    <th scope="col">Aksi
                                        <img src="{{ asset('template2/img/icon-arrow-tabel.svg') }}" alt=""
                                            class="ms-2">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Asrama Santri</td>
                                    <td>6</td>
                                    <td>16 Agu 2024 09:35:56</td>
                                    <td>
                                        <div class="badge badge-hijau"><span style="color: #12B76A;"
                                                class="me-1">&#8226;</span>Dipublish</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 8px;">
                                            <a href="{{ route('tentangkami.fasilitas.detail') }}" class="btn btn-outline-secondary aksi-button" role="button">
                                                <img src="{{ asset('template2/img/icon-eye.svg') }}" alt="">
                                            </a>
                                            <button type="button" class="btn btn-outline-danger aksi-button"
                                                data-bs-toggle="modal" data-bs-target="#modal-hapus-data">
                                                <img src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Gedung Pandidikan</td>
                                    <td>5</td>
                                    <td>17 Agu 2024 09:35:56</td>
                                    <td>
                                        <div class="badge badge-kuning"><span style="color: #FFAD00;"
                                                class="me-1">&#8226;</span>Draf</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 8px;">
                                            <a href="{{ route('tentangkami.fasilitas.detail') }}" class="btn btn-outline-secondary aksi-button" role="button">
                                                <img src="{{ asset('template2/img/icon-eye.svg') }}" alt="">
                                            </a>
                                            <button type="button" class="btn btn-outline-danger aksi-button"
                                                data-bs-toggle="modal" data-bs-target="#modal-hapus-data">
                                                <img src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="col d-flex justify-content-between align-items-center p-4">
                            <div class="data-control d-flex align-items-center">
                                <span class="judul-selec">Show</span>
                                <select id="jumlah-data" class="form-select custom-select"
                                    style="width: 60px; margin-inline: 5px; font-size: 14px;">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select>
                                <span class="judul-selec">entries</span>
                                <span style="font-size: 14px; margin-left: 15px;">Showing 1 to 4 of 4 entries</span>
                            </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><img src="{{ asset('template2/img/row-left.svg') }}"
                                                    alt=""></span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><img
                                                    src="{{ asset('template2/img/icon-row-right.svg') }}"
                                                    alt=""></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div id="alertDone" class="alert alert-success custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #3C7B46;">Done</strong>
                <p class="m-0 text-secondary">Data berhasil dihapus</p>
            </div>
            <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>
    <!-- Include Modal Components -->
    @include('admin.components.modal-simpan-data')
    @include('admin.components.modal-hapus-gambar')
    @include('admin.components.modal-hapus-data')
@endsection


@section('script')
    <script>
        //Js Setting date
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

        // Js alert Done
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.querySelector('#modal-hapus-data .btn-outline-secondary');
            const alertDone = document.getElementById('alertDone');

            deleteButton.addEventListener('click', function() {
                // Tampilkan alertDone
                alertDone.style.display = 'block';

                // modal konfirmasi hapus
                const modal = document.getElementById('modal-hapus-data');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                // Sembunyikan alertDone setelah 3 detik (opsional)
                setTimeout(function() {
                    alertDone.style.display = 'none';
                }, 3000);
            });
        });

         // Js fungsi search tabel
        document.getElementById('search').addEventListener('input', function() {
            // Ambil nilai dari kolom pencarian
            let searchValue = this.value.toLowerCase();

            // Ambil semua baris tabel (tbody tr)
            let rows = document.querySelectorAll('table tbody tr');

            rows.forEach(function(row) {
                // Ambil nilai dari kolom Link dan tanggal (kolom ke-2 dan ke-4)
                let judul = row.cells[1].textContent.toLowerCase();
                let tanggal = row.cells[3].textContent.toLowerCase();

                // Cek apakah nilai dari input pencarian ada di Nama atau Jabatan
                if (judul.includes(searchValue) || tanggal.includes(searchValue)) {
                    // Jika ada, tampilkan baris
                    row.style.display = '';
                } else {
                    // Jika tidak ada, sembunyikan baris
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
