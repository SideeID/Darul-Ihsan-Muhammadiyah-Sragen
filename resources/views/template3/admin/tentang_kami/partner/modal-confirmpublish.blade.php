<div class="modal fade" id="modal-publish" style="z-index: 1050;" tabindex="-1" aria-labelledby="modalPublishLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="text-align: center !important;">
        <div class="modal-content text-align-center p-5">
            <h4 class="modal-title" id="modalPublishLabel" style="font-weight: 600">Konfirmasi Publish Data</h4>
            <p style="margin-top: 10px; font-size: 15px; color: #666E7A;">Apakah anda yakin ingin mempublish data ini?</p>
            <div class="modal-button mt-3 d-flex flex-direction-row justify-content-center align-items-center gap-2">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal" style="color: black; font-weight: 600; border: 1px solid black;">Batal</button>
                <button type="button" class="btn btn-publish" onclick="changeStatus()" style="color: #ffffff; border: none;">Ya, Publish!</button>
            </div>
        </div>
    </div>
</div>

<script>
    function changeStatus() {
        const id = document.getElementById('modal-publish').dataset.itemId;
        const newStatus = document.getElementById('modal-publish').dataset.newStatus;

        fetch(`/api/partner-lembaga/publish/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            const checkbox = document.querySelector(`#switch-${id}`);
            const statusText = document.querySelector(`#statusText-${id}`);
                if (checkbox && statusText) {
                checkbox.checked = newStatus === 'active';
                statusText.textContent = newStatus === 'active' ? 'active' : 'inactive';
            }

            // Hide the modal
            $('#modal-publish').modal('hide');
            })
            .catch(error => console.error('Error updating status:', error));
        }
</script>

<style>
    .btn{
        font-size: 12px;
        border-radius: 5px;
        padding: 10px 15px;
    }
    #modal-publish .btn-publish{
        background-color: #1763D3;
    }

    #modal-publish .btn-publish:hover{
        background-color: #124da6;
    }

    #modal-publish .btn-batal{
        background-color: #ffffff;
    }

    #modal-publish .btn-batal:hover{
        background-color: #e2e2e2;
    }
</style>

{{-- <script>
function simulatePublish() {
    console.log('Simulasi publish data...');

    const modalPublish = document.getElementById('modal-publish');
    const modalInstance = bootstrap.Modal.getInstance(modalPublish);
    modalInstance.hide(); // Tutup modal
}

</script> --}}
