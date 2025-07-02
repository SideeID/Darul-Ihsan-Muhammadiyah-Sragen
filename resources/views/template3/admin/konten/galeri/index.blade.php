@extends('admin.layouts.navigation')

@section('title', 'Data Galeri')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Galeri</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>

        .filter-element {
            min-width: 150px;
        }

        .dataTables_filter, .dataTables_info, .dataTables_paginate {
            display: none;
        }

        .table-hover tbody tr:hover {
            background-color: #f9f9f9;
        }
        .table thead th {
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
            color: #6c757d;
            background-color: #f5f5f5;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .table td img {
            border-radius: 5px;
        }

        .btn-outline-secondary, .btn-outline-danger {
            border-radius: 8px;
            padding: 5px 10px;
        }
        .btn-outline-secondary i, .btn-outline-danger i {
            font-size: 1.2rem;
        }

        .entries-select {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 5px;
            width: 70px;
            text-align: center;
        }

        .entries-info {
            font-size: 14px;
        }
        .entries-info span {
            font-weight: bold;
        }
        .entries-info .total {
            color: #007bff;
        }

        .pagination-custom {
            display: flex;
            align-items: center;
        }
        .pagination-button {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 5px 10px;
            background-color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pagination-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        .badge-draf {
            background-color: #fff7e6;
            color: #5c3d00;
        }

        .badge-publish {
            background-color: #e6fff5;
            color: #007b55;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
        .dot-draf {
            background-color: #ffab00;
        }
        .dot-publish {
            background-color: #00c853;
        }


        <style>

    .modal-content {
        border-radius: 10px;
        padding: 20px;
    }

    .modal-header {
        border-bottom: none;
        text-align: center;
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;

    }

    .modal-body {
        text-align: center;
        font-size: 16px;
        color: #6c757d;
    }

    .modal-footer {
        justify-content: center;
        border-top: none;
    }

     .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
 }


    .btn-secondary {
        background-color: #D32246;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 16px;
    }

    .btn-secondary:hover {
        background-color: #B71C39;
    }

    .btn-danger {
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 16px;
    }

         #snackbar {
            visibility: hidden;
            min-width: 250px;
            background-color: #E6F4EA;
            color: #0F5132;
            text-align: left;
            border-radius: 8px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateX(-50%);
        }

        #snackbar.show {
            visibility: visible;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        #snackbar .close-btn {
            margin-left: auto;
            cursor: pointer;
            font-weight: bold;
            color: #000;
        }
</style>

    </style>
</head>
<body style="background-color:#F5F6FA">

<div class="container">
    <h3>Galeri</h3>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="padding:5px; background-color:#D32246; color:white; width:100px;" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn" style="border:solid 1px #898FA0; padding:5px; width:100px;" id="confirmDelete">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>

    <nav aria-label="breadcrumb" class="breadcrumb-container mb-4">
        <ol class="breadcrumb" style="background-color: #F5F6FA;">
            <li class="breadcrumb-item"><a href="#" style="text-decoration: none; color:#898FA0;">Informasi</a></li>
            <li class="breadcrumb-item"><a href="#" style="text-decoration: none; color:#898FA0;">Galeri</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:#254B2B; font-weight:500">Data Galeri</li>
        </ol>
    </nav>

    <div class="p-5 mb-5" style="background-color:white; border-radius:5px;">
        <div class="data d-flex align-items-center">
            <p class="p-2" style="font-size: 20px; font-weight:500;">Data Galeri</p>
            <button class="ms-auto" style="color: white; background-color:#1763D3; border-radius:5px; border:none; padding:0px 15px; height:40px;">
                <img src="{{ asset('template2/images/tambah.svg') }}" alt="" style="padding-right:5px;">
                <a href="{{ route('admin.konten.galeri.tambah') }}" style="text-decoration:none; color:white;">Tambah Galeri</a>
            </button>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 p-2">
            <div class="d-flex align-items-center">
                <img src="{{ asset('template2/images/filter.svg') }}" alt="" style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                <input type="date" class="form-control filter-element" style="border-radius:0px; border-left: 0px solid #fff; border-right: 0px solid #fff; padding:7px;">
                <select class="form-select filter-element" style="padding: 6.5px; border-radius:0px;">
                    <option selected>Status</option>
                    <option value="draft">Draf</option>
                    <option value="published">Dipublish</option>
                </select>
                <button class="btn filter-element d-flex align-items-center" style="border: solid 0.5px #D6D8DB; border-radius:0px 5px 5px 0px; padding:6.5px; border-left: 0px solid #fff; color:#D32246;">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                </button>
            </div>


            <div class="input-group" style="width: 300px; padding: 6.5px;">
                <span class="input-group-text" style="background-color: #EFEFF0; border: none;">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" id="searchmail" class="form-control" placeholder="Search mail" style="background-color: #EFEFF0; border: none;">
            </div>
        </div>

        <div class="table-responsive">
            <table id="galeriTable" class="table table-hover">
                <thead>
                    <tr>
                        <th style="color: black;">No</th>
                        <th style="color: black;">Link</th>
                        <th style="color: black;">Jumlah Foto</th>
                        <th style="color: black;">Tanggal</th>
                        <th style="color: black;">Status</th>
                        <th style="color: black;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>HUT RI 79 di SMP Darun Najah 2</td>
                        <td>3</td>
                        <td>16 Aug 2024 09:35:56</td>
                        <td><span class="status-badge badge-publish"><span class="status-dot dot-publish"></span>Dipublish</span></td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">
                                <a href="{{ route('admin.konten.galeri.detail') }}" style="text-decoration: none; color:black;"><i class="bi bi-eye"> </i></a>
                            </button>
                            <button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Peringatan Maulid Rasulullah</td>
                        <td>2</td>
                        <td>16 Aug 2024 09:35:56</td>
                        <td><span class="status-badge badge-draf"><span class="status-dot dot-draf"></span>Draf</span></td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">
                                <a href="{{ route('admin.konten.galeri.detail') }}" style="text-decoration: none; color:black;"><i class="bi bi-eye"> </i></a>
                            </button>
                            <button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="d-flex align-items-center">
                <span>Show</span>
                <select class="form-select entries-select ms-2 me-2" id="entriesSelect">
                    <option selected>5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
                <span>entries</span>

                <div class="entries-info ms-4">
                    Showing <span id="currentPageStart">1</span> to <span id="currentPageEnd">2</span> of <span class="total">2</span> entries
                </div>
            </div>
            <div class="pagination-custom">
                <button class="pagination-button" style="border: solid 0.5px #D6D8DB; border-radius:5px 0 0 5px;" id="prevPage"><i class="bi bi-chevron-left"></i></button>
                <button class="pagination-button" style="border: solid 0.5px #D6D8DB; border-left: 0.5px #D6D8DB; border-radius:0 5px 5px 0;" id="nextPage"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {

        var table = $('#galeriTable').DataTable({
            "paging": false,
            "info": false
        });

        var currentPage = 0;
        var entriesPerPage = parseInt($('#entriesSelect').val());

        function updateTable() {
            var totalRows = table.data().count();
            var pageStart = currentPage * entriesPerPage + 1;
            var pageEnd = Math.min((currentPage + 1) * entriesPerPage, totalRows);


            table.page.len(entriesPerPage).draw();
            table.page(currentPage).draw(false);


            $('#currentPageStart').text(pageStart);
            $('#currentPageEnd').text(pageEnd);
            $('.total').text(totalRows);


            $('#prevPage').prop('disabled', currentPage <= 0);
            $('#nextPage').prop('disabled', pageEnd >= totalRows);
        }


        $('#prevPage').on('click', function() {
            if (currentPage > 0) {
                currentPage--;
                updateTable();
            }
        });

        $('#nextPage').on('click', function() {
            var totalRows = table.data().count();
            if ((currentPage + 1) * entriesPerPage < totalRows) {
                currentPage++;
                updateTable();
            }
        });


        $('#entriesSelect').on('change', function() {
            entriesPerPage = parseInt($(this).val());
            currentPage = 0;
            updateTable();
        });


        $('#searchmail').on('keyup', function() {
            table.search(this.value).draw();
            updateTable();
        });

        updateTable();
    });
</script>

<script>
    $(document).ready(function() {

    let deleteRow;


    $('.btn-outline-danger').on('click', function() {
        deleteRow = $(this).closest('tr');
    });


    $('#confirmDelete').on('click', function() {

        deleteRow.remove();


        $('#deleteModal').modal('hide');


        $('body').removeClass('modal-open');


        $('body').removeAttr('style');


        $('.modal-backdrop').remove();

        $('.modal').removeClass('show');
        $('.modal').removeAttr('style');


        showSnackbar();
        updateTable();
    });
});

function showSnackbar() {
    var snackbar = document.getElementById("snackbar");
    snackbar.style.visibility = "visible";
    setTimeout(function() {
        snackbar.style.visibility = "hidden";
    }, 3000);
}
</script>


  <div id="snackbar" style="width: 300px;">
    <img src="{{ asset('template2/images/Vector.png') }}" alt="">
    <div>
        <strong>Done</strong><br>
        Data berhasil dihapus
    </div>
    <div class="close-btn" onclick="closeSnackbar()">×</div>
</div>

@endsection
