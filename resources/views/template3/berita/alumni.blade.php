@include('components.navbar')

<section id="alumni">
    <div class="mt-3 container-fluid px-sm-5" style="padding-inline: 100px !important;">
        <h3 class="mb-4 font-weight-bold">Data Alumni</h3>
        <div class="mb-5 row align-items-center justify-content-between">
            <div class="col-md-2 col-sm-3 col-12 d-flex align-items-center">
                <label for="angkatan" class="font-weight-bold me-2">Angkatan</label>
                <div class="dropdown-container position-relative w-200">
                    <select id="angkatan" class="form-control custom-dropdown w-200">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                    <div class="arrow"
                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); pointer-events: none;">
                        <i class="fa fa-chevron-down" style="font-size: 0.9rem; color: #1e2a5a;"></i>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-md-3 col-sm-6 mt-sm-0 ms-auto">
                <input type="text" id="searchInput" class="form-search"
                    style="background-color: #F9FAFB; border: none; color #667085; height: 40px; width: 100%"
                    placeholder="Cari Sesuatu">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-left" id="table">
                <thead>
                    <tr>
                        <th class="col-6 fw-bold" scope="col">
                            <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                <span>Nama</span>
                            </div>
                        </th>

                        <th class="col-2 fw-bold" scope="col">
                            <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                <span>Angkatan</span>
                            </div>
                        </th>

                        <th class="col-4 fw-bold" scope="col">
                            <div class="px-2 th-content d-flex justify-content-between align-items-center">
                                <span>Lembaga Pendidikan/Perusahaan</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($alumnis->count())
                        @foreach ($alumnis as $alumni)
                            <tr>
                                <td>{{ $alumni->nama }}</td>
                                <td>{{ $alumni->tahun_lulus }}</td>
                                <td>{{ $alumni->lembaga_perusahaan }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr id="noDataRow">
                            <td class="text-center" colspan="3">Belum ada data alumni.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="d-none d-md-flex data-entry align-items-center">
                <label class="me-2">Show</label>
                <form id="pagination-form" action="{{ url()->current() }}" method="GET"
                    style="display: inline-block;">
                    <select class="form-control pagination-dropdown" name="per_page"
                        style="width: auto; padding-right: 2rem;"
                        onchange="document.getElementById('pagination-form').submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
                <label class="ms-2 me-3">entries</label>
                <span class="ml-4 showing-entries">
                    Showing
                    <span style="font-weight: 600">{{ $alumnis->firstItem() }}</span>
                    to
                    <span style="font-weight: 600">{{ $alumnis->lastItem() }}</span>
                    of
                    <span style="font-weight: 600; color: #007bff">{{ $alumnis->total() }}</span>
                    entries
                </span>
            </div>
            <nav aria-label="Page navigation">
                {{ $alumnis->appends(['per_page' => request('per_page')])->links('pagination::bootstrap-4') }}
            </nav>
        </div>

    </div>
</section>

@include('components.footer')

<style>
    .custom-dropdown {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: white;
        border: 1px solid #ced4da;
        padding-right: 2.5rem;
        font-size: 14px;
        color: #1e2a5a;
        border-radius: 0.25rem;
        position: relative;
        width: 100%;
    }

    .form-search {
        background-image: url('/template3/image/search-normal.svg');
        background-repeat: no-repeat;
        background-position: 12px center;
        padding-left: 45px;
        background-size: 20px 20px;
    }

    .table th .th-content {
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.2;
        white-space: nowrap;
    }

    .table thead th {
        font-weight: 600;
        background-color: #f8f9fa;
    }

    .table td {
        padding-left: 17px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        border-radius: 8px;
    }

    .pagination .page-item:first-child .page-link:hover,
    .pagination .page-item:last-child .page-link:hover {
        background-color: transparent;
        border-color: transparent;
    }

    .pagination .page-item .page-link {
        color: black;
        border: none;
        margin: 0 2px;
    }

    .pagination .page-item.disabled .page-link {
        background-color: transparent;
        color: #999;
        border: none;
        pointer-events: none;
    }


    .pagination-dropdown {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: white;
        border: 1px solid #ced4da;
        font-size: 1rem;
        color: #1e2a5a;
        border-radius: 0.25rem;
        padding-right: 2rem;
    }

    @media (max-width: 767.98px) {

        #table th:nth-child(3),
        #table td:nth-child(3),
        #searchInput {
            display: none;
        }

        .row.align-items-center.mb-5.justify-content-between .col-md-2.col-sm-3.d-flex.align-items-center {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .row.align-items-center.mb-5.justify-content-between .col-md-2.col-sm-3.d-flex.align-items-center label {
            margin-bottom: 8px;
        }

        .custom-dropdown,
        .dropdown-container {
            width: 100%;
        }

        .col-12.d-flex {
            flex-direction: column;
            align-items: flex-start;
        }

        .font-weight-bold.me-3 {
            margin-bottom: 0.5rem;
            margin-right: 0;
        }

        .pagination {
            justify-content: center;
            display: flex;
        }
    }
</style>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input = this.value.toLowerCase();
        var table = document.getElementById('table');
        var rows = table.getElementsByTagName('tr');
        var noDataRow = document.getElementById('noDataRow');
        var hasVisibleRows = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].id !== 'noDataRow') {
                var cells = rows[i].getElementsByTagName('td');
                var rowContainsSearchTerm = false;

                for (var j = 0; j < cells.length; j++) {
                    var cellContent = cells[j].textContent || cells[j].innerText;
                    if (cellContent.toLowerCase().indexOf(input) > -1) {
                        rowContainsSearchTerm = true;
                        break;
                    }
                }

                if (rowContainsSearchTerm) {
                    rows[i].style.display = '';
                    hasVisibleRows = true;
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        if (!hasVisibleRows) {
            noDataRow.style.display = '';
        } else {
            noDataRow.style.display = 'none';
        }
    });

    document.getElementById('searchInput').addEventListener('keyup', filterTable);
    document.getElementById('angkatan').addEventListener('change', filterTable);

    function filterTable() {
        var searchInput = document.getElementById('searchInput').value.toLowerCase();
        var selectedAngkatan = document.getElementById('angkatan').value;
        var table = document.getElementById('table');
        var rows = table.getElementsByTagName('tr');
        var noDataRow = document.getElementById('noDataRow');
        var hasVisibleRows = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].id !== 'noDataRow') {
                var cells = rows[i].getElementsByTagName('td');
                var rowContainsSearchTerm = false;
                var matchesAngkatan = selectedAngkatan === '' || cells[1].textContent === selectedAngkatan;

                for (var j = 0; j < cells.length; j++) {
                    var cellContent = cells[j].textContent || cells[j].innerText;
                    if (cellContent.toLowerCase().indexOf(searchInput) > -1) {
                        rowContainsSearchTerm = true;
                        break;
                    }
                }

                if (rowContainsSearchTerm && matchesAngkatan) {
                    rows[i].style.display = '';
                    hasVisibleRows = true;
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        noDataRow.style.display = hasVisibleRows ? 'none' : '';
    }
</script>
