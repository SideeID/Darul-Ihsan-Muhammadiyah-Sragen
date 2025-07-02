@extends('admin.layouts.navigation')

@section('title', 'Data Sosial Media')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sosial Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
            text-align: left;
            font-size: 16px;
            color: #6c757d;
        }

        .modal-footer {
            justify-content: center;
            border-top: none;
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

        .btn-primary {
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .upload-section {
            border: 2px dashed #D3D3D3;
            border-radius: 10px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #000;
            background-color: #F7F7F7;
            position: relative;
            overflow: hidden;
        }

        .upload-section input[type="file"] {
            display: none;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: none;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .image-container .button-group {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }

        .button-group button {
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-change {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
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

        @keyframes fadein {
            from { bottom: 0; opacity: 0; }
            to { bottom: 30px; opacity: 1; }
        }

        @keyframes fadeout {
            from { bottom: 30px; opacity: 1; }
            to { bottom: 0; opacity: 0; }
        }
    </style>
</head>
<body style="background-color:#F5F6FA">

<div class="container">
    <h3>Data Sosial Media</h3>
    <div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="deleteImageModalLabel" aria-hidden="true" style="z-index: 10000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center;">
                    <h5 class="modal-title" id="deleteImageModalLabel" style="text-align: center;">Konfirmasi Hapus Gambar</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                    Apakah Anda yakin ingin menghapus gambar ini?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn" style="background-color: #D32246; color:white;" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #fff; border:solid 1px #898FA0; color:black;" id="confirmDeleteImage">Ya, Hapus!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="saveConfirmationModal" tabindex="-1" aria-labelledby="saveConfirmationModalLabel" aria-hidden="true" style="z-index: 100000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center;">
                    <h5 class="modal-title" id="saveConfirmationModalLabel" style="text-align: center;">Konfirmasi Simpan Data</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                    Apakah anda yakin ingin menambahkan data ini?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn" style="border: 0.5px solid #898FA0; color:black; background-color:white;" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="color: white; background-color:#3C7B46;" id="confirmSave">Ya, simpan!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="publishConfirmationModal" tabindex="-1" aria-labelledby="publishConfirmationModalLabel" aria-hidden="true" style="z-index: 100000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center;">
                    <h5 class="modal-title" id="publishConfirmationModalLabel" style="text-align: center;">Konfirmasi Publish Data</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                    Apakah anda yakin ingin mempublish data ini?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn" style="border: 0.5px solid #898FA0; color:black; background-color:white;" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="color: white; background-color:#1763D3;" id="confirmPublish">Ya, publish!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahMediaModal" tabindex="-1" aria-labelledby="tambahMediaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMediaModalLabel">Tambah Media</h5>
                </div>
                <div class="modal-body">
                    <form id="mediaForm">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="me-3 flex-grow-1">
                                <label for="medium" class="form-label">Medium</label>
                                <select class="form-select" id="medium" required>
                                    <option selected>Pilih Medium</option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Youtube Short">Youtube Short</option>
                                    <option value="Instagram">Instagram</option>
                                </select>
                            </div>
                            <div class="flex-grow-1">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fileURL" class="form-label">File URL</label>
                            <input type="url" class="form-control" id="fileURL" placeholder="e.g; https://" required>
                        </div>
                        <div class="col-md-8 mb-5">
                            <div class="upload-section" id="uploadSection">
                                <label for="imageUpload" class="upload-label" id="uploadLabel">
                                    <img src="{{ asset('template2/images/gallery.svg') }}" alt=""><br>
                                    <span class="fw-semibold">Upload image, or <a href="#" onclick="document.getElementById('imageUpload').click(); return false;">browse</a></span><br>
                                    <small>960x960px size required in PNG or JPG format only.</small>
                                </label>
                                <input type="file" id="imageUpload" name="thumbnail" class="form-control" accept="image/*">
                                <div class="image-container" id="imageContainer">
                                    <img id="imagePreview" src="#" alt="Image Preview">
                                    <div class="button-group">
                                        <button type="button" class="btn-change" onclick="document.getElementById('imageUpload').click();" style="border: solid #fff 1px; background-color:#505968;">Ganti</button>
                                        <button type="button" id="deleteImageButton" style="background: none; border: none; padding: 0;">
                                            <img src="{{ asset('template2/images/hapusimg.svg') }}" alt="Delete Image" style="border: solid #D32246 0.5px;">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="publishCheckbox">
                            <label class="form-check-label" for="publishCheckbox">
                                *Centang box disamping untuk publish data ke website!
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn" style="border: solid 1px #898FA0; width:80px;" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color:#1763D3; color:white;" id="saveMedia">Simpan data</button>
                </div>
            </div>
        </div>
    </div>

    <div id="snackbar" style="width: 300px; visibility: hidden; min-width: 250px; background-color: #E6F4EA; color: #0F5132; text-align: left; border-radius: 8px; padding: 16px; position: fixed; z-index: 1; left: 50%; bottom: 30px; font-size: 16px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transform: translateX(-50%);">
        <div id="snackbar-message"></div>
        <div class="close-btn" onclick="document.getElementById('snackbar').style.visibility='hidden';">×</div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-container mb-4">
        <ol class="breadcrumb" style="background-color: #F5F6FA;">
            <li class="breadcrumb-item"><a href="#" style="text-decoration: none; color:#898FA0;">Informasi</a></li>
            <li class="breadcrumb-item"><a href="#" style="text-decoration: none; color:#898FA0;">Sosial Media</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:#254B2B; font-weight:500">Data Sosial Media</li>
        </ol>
    </nav>

    <div class="p-5 mb-5" style="background-color:white; border-radius:5px;">
        <div class="data d-flex align-items-center">
            <p class="p-2" style="font-size: 20px; font-weight:500;">Data Sosial Media</p>
            <button class="ms-auto" style="color: white; background-color:#1763D3; border-radius:5px; border:none; padding:0px 15px; height:40px;" data-bs-toggle="modal" data-bs-target="#tambahMediaModal">
                <img src="{{ asset('template2/images/tambah.svg') }}" alt="" style="padding-right:5px;">
                <a href="#" style="text-decoration:none; color:white;">Tambah Media</a>
            </button>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 p-2">
            <div class="d-flex align-items-center">
                <img src="{{ asset('template2/images/filter.svg') }}" alt="" style="border: solid 0.5px #D6D8DB; padding:8.5px; border-radius:5px 0px 0px 5px;">
                <input type="date" class="form-control filter-element" style=" padding: 7px; border-left: 0px solid #fff; border-right: 0px solid #fff; border-radius:0px;">
                <select class="form-select filter-element" style="padding: 6.5px; border-radius:0px; border-right: 0px solid #fff;">
                    <option selected>Medium</option>
                    <option value="youtube">Youtube</option>
                    <option value="short">Youtube Short</option>
                    <option value="instagram">Instagram</option>
                </select>
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
            <table id="beritaTable" class="table table-hover">
                <thead>
                    <tr>
                        <th style="color: black;">No</th>
                        <th style="color: black;">Thumbnail</th>
                        <th style="color: black;">Link</th>
                        <th style="color: black;">Medium</th>
                        <th style="color: black;">Tanggal</th>
                        <th style="color: black;">Status</th>
                        <th style="color: black;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="{{ asset('template2/images/gambar1.png') }}" alt="Thumbnail" class="imgthumbnail" width="100"></td>
                        <td>https://www.youtube.com/watch?v=h5tEzd6k5c</td>
                        <td>Youtube</td>
                        <td>16 Agu 2024 09:35:56</td>
                        <td><span class="status-badge badge-publish"><span class="status-dot dot-publish"></span>Dipublish</span></td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteImageModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="{{ asset('template2/images/gambar2.png') }}" alt="Thumbnail" class="imgthumbnail" width="100"></td>
                        <td>https://www.youtube.com/shorts/YB0SlPgLJy8</td>
                        <td>Youtube Short</td>
                        <td>16 Agu 2024 09:35:56</td>
                        <td><span class="status-badge badge-publish"><span class="status-dot dot-publish"></span>Dipublish</span></td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteImageModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="{{ asset('template2/images/gambar3.png') }}" alt="Thumbnail" class="imgthumbnail" width="100"></td>
                        <td>https://www.instagram.com/p/CxdRaG7Ro9n/</td>
                        <td>Instagram</td>
                        <td>16 Agu 2024 09:35:56</td>
                        <td><span class="status-badge badge-draf"><span class="status-dot dot-draf"></span>Draf</span></td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteImageModal">
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
        var table = $('#beritaTable').DataTable({
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

        $(document).on('click', '.btn-outline-danger', function() {
            deleteRow = $(this).closest('tr');
            $('#deleteImageModal').modal('show');
        });

        $('#confirmDeleteImage').on('click', function() {
            if (deleteRow) {
                deleteRow.remove();
                $('#deleteImageModal').modal('hide');
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
                $('body').removeAttr('style');
                showSnackbar('Data berhasil dihapus', '#d4edda', '#155724');
            }
        });

        function showSnackbar(message, backgroundColor, textColor) {
            var snackbar = document.getElementById("snackbar");
            snackbar.style.backgroundColor = backgroundColor;
            snackbar.style.color = textColor;
            document.getElementById("snackbar-message").textContent = message;
            snackbar.style.display = 'flex';
            setTimeout(function() {
                snackbar.style.display = 'none';
            }, 3000);
        }

        $('#confirmSave').on('click', function() {
            var medium = $('#medium').val();
            var tanggal = $('#tanggal').val();
            var fileURL = $('#fileURL').val();
            var publish = $('#publishCheckbox').is(':checked') ? 'Dipublish' : 'Draf';

            if (medium && tanggal && fileURL) {
                $('#saveConfirmationModal').modal('show');
            } else {
                showSnackbar('Silahkan periksa kembali data anda! Pastikan semua data telah ter-input :)', '#f8d7da', '#721c24');
            }
        });

        $('#saveMedia').on('click', function() {
            $('#saveConfirmationModal').modal('show');
        });

        $('#confirmSave').on('click', function() {
            var medium = $('#medium').val();
            var tanggal = $('#tanggal').val();
            var fileURL = $('#fileURL').val();
            var publish = $('#publishCheckbox').is(':checked') ? 'Dipublish' : 'Draf';

            if (medium && tanggal && fileURL) {
                var newRow = '<tr>' +
                    '<td>#</td>' +
                    '<td><img src="path/to/thumbnail.png" alt="Thumbnail" class="img-thumbnail" width="100"></td>' +
                    '<td>' + fileURL + '</td>' +
                    '<td>' + medium + '</td>' +
                    '<td>' + tanggal + '</td>' +
                    '<td><span class="status-badge badge-' + (publish === 'Dipublish' ? 'publish' : 'draf') + '"><span class="status-dot dot-' + (publish === 'Dipublish' ? 'publish' : 'draf') + '"></span>' + publish + '</span></td>' +
                    '<td class="d-flex justify-content-center align-items-center" style="height: 100px;">' +
                    '<button class="btn btn-outline-secondary btn-sm me-2 d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;">' +
                    '<i class="bi bi-eye"></i>' +
                    '</button>' +
                    '<button class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center" style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#deleteModal">' +
                    '<i class="bi bi-trash"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>';
                $('#beritaTable tbody').append(newRow);
                $('#tambahMediaModal').modal('hide');
                $('#saveConfirmationModal').modal('hide');
                $('#mediaForm')[0].reset();
                showSnackbar('Data berhasil disimpan', '#d4edda', '#155724');
            } else {
                showSnackbar('Silahkan periksa kembali data anda! Pastikan semua data telah ter-input :)', '#f8d7da', '#721c24');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageUpload = document.getElementById('imageUpload');
        const imageContainer = document.getElementById('imageContainer');
        const imagePreview = document.getElementById('imagePreview');
        const uploadLabel = document.getElementById('uploadLabel');
        const deleteImageButton = document.getElementById('deleteImageButton');
        const confirmDeleteImageButton = document.getElementById('confirmDeleteImage');

        imageUpload.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imageContainer.style.display = 'block';
                    uploadLabel.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        deleteImageButton.addEventListener('click', function () {
            $('#deleteImageModal').modal('show');
        });

        confirmDeleteImageButton.addEventListener('click', function () {
            imagePreview.src = '';
            imageContainer.style.display = 'none';
            uploadLabel.style.display = 'block';
            imageUpload.value = '';
            $('#deleteImageModal').modal('hide');
        });
    });
</script>

<script>
    $(document).ready(function () {
        let editMode = false;
        let editRow;

        $('.btn-outline-secondary').on('click', function () {
            editMode = true;
            editRow = $(this).closest('tr');
            const medium = editRow.find('td:eq(3)').text().trim();
            const tanggal = editRow.find('td:eq(4)').text().trim();
            const fileURL = editRow.find('td:eq(2)').text().trim();
            const thumbnailSrc = editRow.find('td:eq(1) img').attr('src');
            $('#medium').val(medium);
            $('#tanggal').val(tanggal);
            $('#fileURL').val(fileURL);
            if (thumbnailSrc) {
                $('#imagePreview').attr('src', thumbnailSrc);
                $('#imageContainer').show();
                $('#uploadLabel').hide();
            } else {
                $('#imageContainer').hide();
                $('#uploadLabel').show();
            }
            $('#mediaModalLabel').text('Edit Media');
            $('#saveMediaButton').text('Simpan perubahan');
            $('#mediaModal').modal('show');
        });

        $('#saveMediaButton').on('click', function () {
            const medium = $('#medium').val();
            const tanggal = $('#tanggal').val();
            const fileURL = $('#fileURL').val();
            const publish = $('#publishCheckbox').is(':checked') ? 'Dipublish' : 'Draf';
            const thumbnailSrc = $('#imagePreview').attr('src');
            if (medium && tanggal && fileURL) {
                if (editMode) {
                    editRow.find('td:eq(3)').text(medium);
                    editRow.find('td:eq(4)').text(tanggal);
                    editRow.find('td:eq(2)').text(fileURL);
                    editRow.find('td:eq(1) img').attr('src', thumbnailSrc);
                    editRow.find('td:eq(5) .status-badge')
                        .removeClass('badge-publish badge-draf')
                        .addClass(publish === 'Dipublish' ? 'badge-publish' : 'badge-draf')
                        .html(`<span class="status-dot ${publish === 'Dipublish' ? 'dot-publish' : 'dot-draf'}"></span>${publish}`);
                    editMode = false;
                    editRow = null;
                }
                $('#mediaModal').modal('hide');
                $('#mediaForm')[0].reset();
                $('#imageContainer').hide();
                $('#uploadLabel').show();
            } else {
                alert('Semua kolom harus diisi!');
            }
        });

        const imageUpload = document.getElementById('imageUpload');
        const imageContainer = document.getElementById('imageContainer');
        const imagePreview = document.getElementById('imagePreview');
        const uploadLabel = document.getElementById('uploadLabel');
        const deleteImageButton = document.getElementById('deleteImageButton');
        const confirmDeleteImageButton = document.getElementById('confirmDeleteImage');

        imageUpload.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imageContainer.style.display = 'block';
                    uploadLabel.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        deleteImageButton.addEventListener('click', function () {
            $('#deleteImageModal').modal('show');
        });

        $('#confirmDeleteImage').on('click', function () {
            var deleteRow = $('.btn-outline-danger').closest('tr');
            deleteRow.remove();
            $('#deleteImageModal').modal('hide');
        });
    });
</script>

@endsection
