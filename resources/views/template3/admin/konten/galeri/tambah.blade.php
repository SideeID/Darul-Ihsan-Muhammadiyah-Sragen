@extends('admin.layouts.navigation')

@section('title', 'Tambah Galeri')

<style>

    .{
        background-color: #F5F6FA;
    }
    .container {
        background-color: #ffffff;
        padding: 20px 40px;
        border-radius: 10px;
        margin-bottom: 20px;;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .form-control, .form-select {
        background-color: #F5F6FA;
        color: #2B2B2B;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-control.error {
        border-color: #FF0000; 
    }

    .error-message {
        color: #FF0000;
        font-size: 14px;
        margin-top: 5px;
        display: none; 
    }

    .kembali {
        text-decoration: none;
        color: #080E1E;
        font-weight: 600;
        margin-bottom: 20px;
        margin-left: 25px;
        display: block;
    }

    .kembali:hover {
        text-decoration: none;
        color: #080E1E;
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
    }

    .upload-section small {
        font-weight: 400;
        line-height: 20px;
        text-align: center;
        color: #808080;
    }

    .upload-section input[type="file"] {
        display: none;
    }

    .editor-toolbar {
        background-color: #BBBFC3;
        border-radius: 5px;
        padding: 5px;
        display: flex;
        gap: 10px;
    }

    #saveButton {
        border-radius: 5px;
        width: 100%;
        max-width: 200px;
    }

    .editor-container {
        border-radius: 5px;
        border: 1px solid #ccc;
        overflow: hidden;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toolbar .tool-list {
        background-color: #BBBFC3;
        border-radius: 5px 5px 0 0;
        margin-bottom: -5px;
        display: flex;
        flex-flow: row nowrap;
        list-style: none;
        overflow: hidden;
        padding: 20px;
    }

    .tool--btn-center {
           display: block;
                    border:#808080 solid 0.5px;
                    height: 30px;
                    width: 40px;
                    font-size: 16px;
                    cursor: pointer;
                    color: #292D32;
                    background-color: white;
                    padding: 10px;
    }

    .tool--btn-left {
        display: block;
                    border:#808080 solid 0.5px;
                    height: 30px;
                    width: 40px;
                    font-size: 16px;
                    cursor: pointer;
                    color: #292D32;
                    background-color: white;
                    border-radius: 10px 0px  0px 10px ;
                    padding: 10px;
    }

    .tool--btn-right {
        display: block;
                    border:#808080 solid 0.5px;
                    height: 30px;
                    width: 40px;
                    font-size: 16px;
                    cursor: pointer;
                    color: #292D32;
                    background-color: white;
                    border-radius: 0 10px  10px 0 ;
                    padding: 10px;
    }

    .tool--btn:hover {
        background-color: #dddddd;
    }

    #output {
        height: 400px;
        padding: 1rem;
        border: 1px solid #D6D8DB;
        border-radius: 0 0 5px 5px;
        background-color: white;
    }

/* POPUP */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
        width: 80%;
    }

    .btn-secondary, .btn-success {
        border: none;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: #f0f0f0;
        color: #000;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-secondary:hover, .btn-success:hover {
        opacity: 0.8;
    }


    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
        width: 80%;
    }

    .btn-secondary, .btn-success {
        border: none;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: #f0f0f0;
        color: #000;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-secondary:hover, .btn-success:hover, .btn-danger:hover {
        opacity: 0.8;
    }

/* SNACKBAR */
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

    #snackbar icon {
        background-color: #198754;
        border-radius: 50%;
        width: 800px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
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

    #snackbar {
        visibility: hidden;
        min-width: 250px;
        background-color: #E6F4EA; /* Default success background */
        color: #0F5132; /* Default success text color */
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

    /* UPLOAD GAMBAR */
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

    .upload-section input[type="file"] {
        display: none;
    }



</style>

@section('content')


<div class="kembali">
    <a href="{{ route('admin.konten.galeri.index') }}" class="kembali"><i class="fas fa-chevron-left"></i> Kembali</a>
</div>
<div class="container">
    <div id="confirmPopup" class="popup">
        <div class="popup-content" style="padding:50px 20px;">
            <h5 style="font-weight: bold; margin-bottom:15px;">Konfirmasi Simpan Data</h5>
            <p style=" margin-bottom:15px; color:#666E7A;">Apakah Anda yakin ingin menambahkan data ini?</p>
            <button id="cancelButton" class="btn btn-secondary" style="
            color:black; background-color:white; border: #898FA0 solid 0.5px;
            ">Batal</button>
            <button id="confirmSaveButton" class="btn btn-success" style="color:white; background-color:#3C7B46;">Ya, simpan!</button>
        </div>
    </div>


    <!-- Snackbar -->
<div id="snackbar" class="snackbar" style="width:300px;">
    <img id="snackbar-icon" src="" alt="" style="width: 20px; height: 20px;">
    <div id="snackbar-content">
        <strong id="snackbar-title">Title</strong><br>
        <span id="snackbar-message">Message</span>
    </div>
    <div class="close-btn" onclick="closeSnackbar()">×</div>
</div>
     <!-- Confirmation Popup for Checkbox -->
     <div id="checkboxPopup" class="popup" >
        <div class="popup-content" style="padding:50px 20px; ">
            <h5 style="font-weight: bold; margin-bottom:15px;">Konfirmasi Publish Data</h5>
            <p style=" margin-bottom:15px; color:#666E7A;">Apakah Anda yakin ingin mempublish data ini?</p>
            <button id="cancelCheckbox" class="btn" style="
color:black; background-color:white; border: #898FA0 solid 0.5px;
">Batal</button>
            <button id="confirmCheckbox" class="btn" style="color:white; background-color:#1763D3;">Ya, publish!</button>
        </div>
    </div>

   <!-- Confirmation Popup for Image Deletion -->
<div id="deletePopup" class="popup">
    <div class="popup-content" style="padding:50px 20px; ">
        <h5 style="font-weight: bold; margin-bottom:15px;">Konfirmasi Hapus Gambar</h5>
        <p style=" margin-bottom:15px; color:#666E7A;">Apakah Anda yakin ingin menghapus gambar ini?</p>
        <button id="cancelDelete" class="btn" style=" padding:5px; background-color:#D32246; color:white; width:100px;">Batal</button>
        <button id="confirmDelete" class="btn" style="border:solid 1px #898FA0; padding:5px; width:100px;">Ya, Hapus!</button>
    </div>
</div>


    <!-- Snackbar -->
    <div id="snackbar" style="width: 300px;">
        <img src="{{ asset('template2/images/Vector.png') }}" alt="">
       
        <div>
            <strong>Done</strong><br>
            Data berhasil ditambahkan
        </div>
        <div class="close-btn" onclick="closeSnackbar()">×</div>
    </div>


    <div class="tambah-galeri">
        <h5 class="fw-bold">Tambah Galeri</h5>

        <form enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
                <div class="col-md-12">
                   
                    <!-- Tanggal dan Kategori -->
                    <div class="row">
 <!-- Judul galeri -->
 <div class="col-md-6 mb-3">
  <label for="judul" class="form-label ">Judul <span style="color: red; position: absolute; right: 15;">*</span></label>
  <input type="text" class="form-control" id="judul" name="judul" placeholder="e.g; Judul Gambar" required>
  <div id="judulError" class="error-message">*Kolom ini wajib diisi</div>
</div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Hari ini">
                        </div>
                    </div>
                </div>

                         <!-- Image Upload -->
                <div class="col-4 mb-1">
                    <div class="upload-section" id="uploadSection">
                        <label for="imageUpload" class="upload-label" id="uploadLabel">
                            <img src="{{ asset('template2/images/gallery.svg') }}" alt=""><br>
                            <span class="fw-semibold">Upload image, or <a href="#" onclick="document.getElementById('imageUpload').click(); return false;">browse</a></span><br>
                            <small>960x960px size required in PNG <br>or JPG format only.</small>
                        </label>
                        <input type="file" id="imageUpload" name="thumbnail" class="form-control" accept="image/*">
                        
                        <!-- Image Container for Preview, Change, and Delete -->
                        <div class="image-container" id="imageContainer">
                            <img id="imagePreview" src="#" alt="Image Preview">
                            <div class="button-group">
                                <button type="button" class="btn-change" onclick="document.getElementById('imageUpload').click();" style="border: solid #fff 1px; background-color:#505968;">Ganti</button>
                                <!-- Wrap the image with a button for the delete action -->
                                <button type="button" id="deleteImageButton" style="background: none; border: none; padding: 0;">
                                    <img src="{{ asset('template2/images/hapusimg.svg') }}" alt="Delete Image" style="border: solid #D32246 0.5px;">
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>



            <!-- Save Button and Checkbox -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="checkbox-container pl-4">
                    <input type="checkbox" class="form-check-input" id="publish">
                    <label class="form-check-label" for="publish">*Centang box untuk publish data ke website!</label>
                </div>
                <button type="button" id="saveButton" class="btn btn-primary" style="background-color: #2B67E9;">Simpan data</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('galeriForm');
        const saveButton = document.getElementById('saveButton');
        const judulInput = document.getElementById('judul');
        const penulisInput = document.getElementById('penulis');

        const judulError = document.getElementById('judulError');
        const penulisError = document.getElementById('penulisError');

        saveButton.addEventListener('click', function () {
            let isValid = true;

            // Validate "Judul"
            if (judulInput.value.trim() === '') {
                judulInput.classList.add('error');
                judulError.style.display = 'block';
                isValid = false;
            } else {
                judulInput.classList.remove('error');
                judulError.style.display = 'none';
            }

            // Validate "Penulis"
            if (penulisInput.value.trim() === '') {
                penulisInput.classList.add('error');
                penulisError.style.display = 'block';
                isValid = false;
            } else {
                penulisInput.classList.remove('error');
                penulisError.style.display = 'none';
            }

            // If all fields are valid, proceed with the form submission or further logic
            if (isValid) {
                // Implement your form submission logic here
                alert('Form is valid and ready to be submitted!');
            }
        });
    });
</script>

<script src="texteditor.js"></script>
<script>
    // Dapatkan elemen output
    let output = document.getElementById('output');

    // Gabungkan semua tombol dengan kelas 'tool--btn' (sesuaikan jika perlu)
    let buttons = document.querySelectorAll('.tool--btn-left, .tool--btn-center, .tool--btn-right');

    // Iterasi setiap tombol dan tambahkan event listener
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            let cmd = btn.dataset['command'];
            
            // Jika tombol adalah untuk membuat tautan
            if (cmd === 'createlink') {
                let url = prompt("Enter the link here: ", "http://");
                document.execCommand(cmd, false, url);
            } 
            // Jika tombol adalah untuk membuat kutipan
            else if (cmd === 'blockquote') {
                document.execCommand('formatBlock', false, 'blockquote');
            }
            // Jika tombol adalah untuk perintah lain
            else {
                document.execCommand(cmd, false, null);
            }
        });
    });

      // Handle heading selection
      document.getElementById('headingSelect').addEventListener('change', (event) => {
        let heading = event.target.value;
        document.execCommand('formatBlock', false, heading);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('saveButton').addEventListener('click', function () {
            document.getElementById('confirmPopup').style.display = 'flex';
        });

        document.getElementById('cancelButton').addEventListener('click', function () {
            document.getElementById('confirmPopup').style.display = 'none';
        });

        document.getElementById('confirmSaveButton').addEventListener('click', function () {
            document.getElementById('confirmPopup').style.display = 'none';
            showSnackbar();
        });
    });

    // Function to show the snackbar
    function showSnackbar() {
        var snackbar = document.getElementById("snackbar");
        snackbar.className = "show";
        setTimeout(function() {
            snackbar.className = snackbar.className.replace("show", "");
        }, 3000);
    }

    // Function to close the snackbar
    function closeSnackbar() {
        var snackbar = document.getElementById("snackbar");
        snackbar.className = snackbar.className.replace("show", "");
    }
</script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    const imageUpload = document.getElementById('imageUpload');
    const imageContainer = document.getElementById('imageContainer');
    const imagePreview = document.getElementById('imagePreview');
    const uploadLabel = document.getElementById('uploadLabel');
    const deleteImageButton = document.getElementById('deleteImageButton');

    const deletePopup = document.getElementById('deletePopup');
    const confirmDeleteButton = document.getElementById('confirmDelete');
    const cancelDeleteButton = document.getElementById('cancelDelete');

    // Handle image upload and preview
    imageUpload.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imageContainer.style.display = 'block'; // Show the image container
                uploadLabel.style.display = 'none'; // Hide the upload label
            };
            reader.readAsDataURL(file);
        }
    });

    // Show confirmation popup for image deletion
    deleteImageButton.addEventListener('click', function() {
        deletePopup.style.display = 'flex';
    });

    // Handle image deletion confirmation
    confirmDeleteButton.addEventListener('click', function() {
        imagePreview.src = '#';
        imageContainer.style.display = 'none'; // Hide the image container
        uploadLabel.style.display = 'block'; // Show the upload label
        imageUpload.value = ''; // Clear the file input
        deletePopup.style.display = 'none'; // Hide the popup
    });

    // Handle cancellation of image deletion
    cancelDeleteButton.addEventListener('click', function() {
        deletePopup.style.display = 'none'; // Hide the popup
    });

    // Close the popup when clicking outside of the popup-content
    window.addEventListener('click', function(event) {
        if (event.target === deletePopup) {
            deletePopup.style.display = 'none'; // Hide the popup
        }
    });
});


</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const publishCheckbox = document.getElementById('publish');
        const checkboxPopup = document.getElementById('checkboxPopup');
        const confirmCheckboxButton = document.getElementById('confirmCheckbox');
        const cancelCheckboxButton = document.getElementById('cancelCheckbox');

        // Event listener for checkbox
        publishCheckbox.addEventListener('change', function(event) {
            if (publishCheckbox.checked) {
                // Show the popup when the checkbox is checked
                checkboxPopup.style.display = 'flex';
                // Temporarily disable the checkbox to prevent further changes until confirmed
                publishCheckbox.disabled = true;
            }
        });

        // Confirm the checkbox action
        confirmCheckboxButton.addEventListener('click', function() {
            // Allow the checkbox to remain checked
            publishCheckbox.disabled = false;
            checkboxPopup.style.display = 'none'; // Hide the popup
        });

        // Cancel the checkbox action
        cancelCheckboxButton.addEventListener('click', function() {
            // Uncheck the checkbox and hide the popup
            publishCheckbox.checked = false;
            publishCheckbox.disabled = false;
            checkboxPopup.style.display = 'none';
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('saveButton').addEventListener('click', function () {
        const judulInput = document.getElementById('judul');
        const tanggalInput = document.getElementById('tanggal');
        const imageUpload = document.getElementById('imageUpload');

        if (judulInput.value.trim() === '' || tanggalInput.value.trim() === '' || imageUpload.value.trim() === '') {
           
            showSnackbar(
                'warning', 
                'Permintaan Tidak Sesuai', 
                'Silahkan periksa kembali data anda!.',
                "{{ asset('template2/images/warning.svg') }}" 
            );
        } else {
            
            showSnackbar(
                'success', 
                'Done', 
                'Data berhasil ditambahkan', 
                "{{ asset('template2/images/success.svg') }}" 
            );

            
            document.getElementById('confirmPopup').style.display = 'flex';
        }
    });

    
    function showSnackbar(type, title, message, iconPath) {
        var snackbar = document.getElementById('snackbar');
        var snackbarIcon = document.getElementById('snackbar-icon');
        var snackbarTitle = document.getElementById('snackbar-title');
        var snackbarMessage = document.getElementById('snackbar-message');

        
        snackbarIcon.src = iconPath;
        snackbarTitle.innerText = title;
        snackbarMessage.innerText = message;

        if (type === 'success') {
            snackbar.style.backgroundColor = '#E6F4EA'; 
            snackbarTitle.style.color = '#0F5132'; 
        } else if (type === 'warning') {
            snackbar.style.backgroundColor = '#FFE1DF'; 
            snackbarTitle.style.color = '#D32246'; 
        }

       
        snackbar.className = "show";
        setTimeout(function() {
            snackbar.className = snackbar.className.replace("show", "");
        }, 3000);
    }

    
    function closeSnackbar() {
        var snackbar = document.getElementById('snackbar');
        snackbar.className = snackbar.className.replace("show", "");
    }
});

</script>


@endsection
