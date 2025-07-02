<div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text">
        <div class="modal-content" style="padding: 20px; text-align: center !important;">
            <h4 class="modal-title justify-content-center" style="font-weight: 600" id="modalHapus">Konfirmasi Hapus Data</h4>
            <p class="justify-content-center" style="margin-top: 25px; font-size: 15px; color: #666E7A;">Apakah anda yakin ingin menghapus data ini?</p>
            <div class="mt-3 modal-button d-flex flex-direction-row justify-content-center align-items-center" style="gap: 10px;">
                <button type="button" class="btn btn-batal" data-bs-dismiss="modal" style="color: #ffffff; font-size: 12px; border: none; border-radius: 5px; padding: 10px 15px;">Batal</button>
                <button type="button" class="btn btn-hapus" id="btn-confirm-hapus" style="color: black; border: 1px solid #898FA0; font-size: 12px; font-weight: 600; border-radius: 5px; padding: 10px 15px;">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>

<div id="notif-done" class="d-none notif">
    <span class="notif-done-icon">
        <img src="{{asset('template3/image/tick-circle.svg')}}" alt="">
    </span>
    <span id="notification-message" class="px-2 notification-text d-flex flex-direction-column">
        <h6 class="m-0" style="font-weight: 600; color: #3C7B46;">Yeah</h6>
        <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil dihapus!</p>
    </span>
    <button id="close-notif-done" class="close-btn">✖</button>
</div>

<style>
    .btn-batal{
        background-color: #D32246;
    }

    .btn-batal:hover{
        background-color: #b31d3b;
        color: #ffffff;
    }

    .btn-hapus:hover{
        background-color: #e2e2e2;
    }

    #notif-done {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        position: relative;
        padding: 10px;
        background-color: #;
        border-radius: 5px;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        width: 300px;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        background-color: #EBFAF4;
    }

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
</style>

<script>
let dataToDeleteId = null;

function deleteRow(id) {
    dataToDeleteId = id;
    const modal = new bootstrap.Modal(document.getElementById('modal-hapus'));
    modal.show();
}

document.getElementById('btn-confirm-hapus').addEventListener('click', function() {
    if (dataToDeleteId === null) return;

    fetch(`/api/partner-lembaga/delete/${dataToDeleteId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal menghapus data');
        }
        return response.json();
    })
    .then(data => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modal-hapus'));
        modal.hide();

        showSuccessNotification();

        setTable(`{{ route('partner-lembaga.all') }}?class=table-data&table=true`)
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menghapus data.');
    })
    .finally(() => {
        dataToDeleteId = null;
    });
});

function showSuccessNotification() {
    const notif = document.getElementById('notif-done');
    notif.classList.remove('d-none');

    setTimeout(() => {
        notif.classList.add('d-none');
    }, 5000);
}

function renderTable(data) {
    const tableBody = document.querySelector('#table-body');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.other_column}</td>
            <td>
                <button type="button" class="btn btn-danger" onclick="deleteRow(${item.id})">Hapus</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}
</script>
