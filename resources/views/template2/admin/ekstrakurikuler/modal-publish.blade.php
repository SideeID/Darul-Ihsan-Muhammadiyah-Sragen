<div class="modal fade" id="modal-publish" tabindex="-1" aria-labelledby="modalPublishLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h4 class="modal-title" id="modalPublishLabel">Konfirmasi Publish Data</h4>
            <p>Apakah anda yakin ingin mempublish data ini?</p>
            <div class="modal-button">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-publish" onclick="simulatePublish()">Ya, Publish!</button>
            </div>
        </div>
    </div>
</div>


<style>
#modal-publish {
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

    #modal-publish .btn-publish{
        background-color: #1763D3;
        color: #ffffff;
        font-size: 12px;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }

    #modal-publish .btn-publish:hover{
        background-color: #124da6;
        color: #ffffff;
    }

    #modal-publish .btn-batal{
        color: black;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px 15px;
        background-color: #ffffff;
    }

    #modal-publish .btn-batal:hover{
        color: black;
        border: 1px solid black;
        background-color: #e2e2e2;
    }
</style>

<script>
function simulatePublish() {
    // Logika simulasi penghapusan data
    console.log('Simulasi publish data...');

    // Jika Anda menggunakan modal, tutup modal setelah klik
    const modalPublish = document.getElementById('modal-publish');
    const modalInstance = bootstrap.Modal.getInstance(modalPublish);
    modalInstance.hide(); // Tutup modal
}

</script>

@include(config('app.template') . 'admin.ekstrakurikuler.modal-simpan')
