<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="px-4 pt-4 pb-0 border-0 modal-header">
                <h1 class="modal-title fw-700 text-dark fs-5" id="modalDeleteLabel">Konfirmasi Hapus Data</h1>
            </div>
            <div class="p-4 modal-body">
                <p class="mb-4 text-black">Apakah anda yakin untuk menghapus data tersebut?</p>
                <div class="d-flex align-items-center">
                    <input type="hidden" id="d_id">
                    <button type="button" class="p-2 btn btn-secondary fw-700 me-3 w-100"
                        onclick="closeModalDelete('modalDelete')">Batal</button>
                    <button class="p-2 btn btn-outline-danger fw-700 w-100" id="buttonDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function closeModalDelete(modalId) {
        $(`#${modalId}`).modal('hide');
    }
</script>
