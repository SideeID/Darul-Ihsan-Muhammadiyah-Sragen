<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h4 class="modal-title" id="modalEditLabel">Konfirmasi Edit Data</h4>
            <p>Apakah anda yakin ingin mengubah data ini?</p>
            <div class="modal-button">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-edit" onclick="simulateSimpan()">Ya, Ubah!</button>
            </div>
        </div>
    </div>
</div>


<style>
    #modal-edit {
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

    #modal-edit .btn-edit{
        background-color: #ffb013;
        color: #000000;
        font-size: 12px;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }

    #modal-edit .btn-edit:hover{
        background-color: #eca414;
        color: #000000;
    }

    #modal-edit .btn-batal{
        color: black;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px 15px;
        background-color: #ffffff;
    }

    #modal-edit .btn-batal:hover{
        color: black;
        border: 1px solid black;
        background-color: #e2e2e2;
    }
</style>