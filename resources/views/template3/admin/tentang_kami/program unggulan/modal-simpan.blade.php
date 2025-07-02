<div class="modal fade" id="modal-simpan" tabindex="-1" aria-labelledby="modalSimpanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h4 class="modal-title" id="modalSimpanLabel">Konfirmasi Simpan Data</h4>
            <p>Apakah anda yakin ingin menyimpan data ini?</p>
            <div class="modal-button">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-simpan" onclick="submitForm()">Ya, Simpan!</button>
            </div>
        </div>
    </div>
</div>


<style>
    #modal-simpan {
        z-index: 1060;
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
        margin-top: 5px;
        display:flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    #modal-simpan .btn-simpan{
        background-color: #3C7B46;
        color: #ffffff;
        font-size: 12px;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }

    #modal-simpan .btn-simpan:hover{
        background-color: #2f6037;
        color: #ffffff;
    }

    #modal-simpan .btn-batal{
        color: black;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px 15px;
        background-color: #ffffff;
    }

    #modal-simpan .btn-batal:hover{
        color: black;
        border: 1px solid black;
        background-color: #e2e2e2;
    }
</style>

<script>
    function simulateSimpan() {
    console.log('Simulasi simpan data...');
    const modalPublish = document.getElementById('modal-publish');
    const modalInstancePublish = bootstrap.Modal.getInstance(modalPublish);
    if (modalInstancePublish) modalInstancePublish.hide(); // Tutup modal publish jika terbuka

    const modalSimpan = document.getElementById('modal-simpan');
    const modalInstanceSimpan = bootstrap.Modal.getOrCreateInstance(modalSimpan);
    modalInstanceSimpan.show(); // Tampilkan modal simpan
}

</script>
