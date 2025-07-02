<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #0d1727;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            color: white;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            z-index: 1030;
        }

        .sidebar.shrink {
            width: 80px;
        }

        .sidebar.shrink .nav-link {
            justify-content: center;
        }

        .sidebar.shrink .nav-link .nav-icon {
            margin-right: 0;
        }

        .sidebar .sidebar-header {
            display: flex;
            text-align: left;
            padding: 20px;
            align-items: center;
        }

        .sidebar .sidebar-header img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .sidebar.shrink .sidebar-header h5 {
            display: none;
        }

        .sidebar .nav-link {
            color: #b1bccb;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s ease;
            margin: 0 20px;
        }

        .sidebar .nav-link.active {
            background-color: #3C7B46;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-icon {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }

        .sidebar.shrink .nav-link span {
            display: none;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-footer {
            padding: 20px;
        }

        .sidebar-footer .admin-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            background-color: #FFFFFF0D;
            cursor: pointer;
        }

        .sidebar-footer .admin-info img {
            margin-right: 20px;
        }

        .sidebar.shrink .sidebar-footer {
            justify-content: center;
        }

        .sidebar.shrink .admin-info .admin-text {
            display: none;
        }

        .navbar-custom {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-toggler {
            display: block;
            border: none;
            background: none;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 60px;
            transition: all 0.3s ease;
        }

        .main-content.shrink {
            margin-left: 80px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        var path = "{{ url('/') }}";
        var cookie_name = "{{ env('APP_COOKIE_NAME') }}";
        var arrBulan = ['', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
        var setTableData = {};

        function req(opt = null) {
            $.ajax({
                dataType: 'json',
                xhrFields: {
                    withCredentials: true
                },
                beforeSend: (xhr) => {
                    // showAlert(msg = "Loading...", type = 'info', false);
                    // showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(x, status, error) {
                    if (x.status == 401) {
                        console.log("Sorry, your session has expired. Please login again to continue");
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert(msg = "Request tidak sesuai", type = 'danger');
                        // closeLoading();
                    }
                },
                ...opt
            }).done(function() {
                // closeAlert();
                var urlChecking = window.location.pathname.split('/')
                var checking = urlChecking.pop();
                // if (urlChecking[2] == 'monitoring' && (urlChecking[3] == 'pendapatan' || urlChecking[3] == 'potongan')) {
                //     if (opt.url.pathname == '/api/review/gaji-pegawai' || opt.url.pathname == '/api/monitoring/status') {
                //         closeLoading();
                //     }
                // } else {
                //     closeLoading();
                // }
            });
        }

        // start datatable
        function setTablePage(class_table, url, page = null, callback = null) {
            url = new URL(url);
            if (page !== null) {
                url.searchParams.set('page', page);
            } else {
                let change = $(`.${class_table} .table-pagination-select`).val();
                url.searchParams.set('page', change);
            }
            setTable(url.toString(), callback);
        }

        function _getData(t, path) {
            return path.split(".").reduce((r, k) => r?.[k] ?? '-', t)
        }

        function _setTableData(class_table, data) {
            if (data.data.length < 1) {
                return `<tr><td colspan="${setTableData[class_table].length}" class="text-center text-muted" style="font-size: 1rem; background-color: #eff3f8;">.: Data Kosong :.</td</tr>`;
            }

            let tr = '';
            for (const d of data.data) {
                tr += '<tr>';
                let td = '';
                for (const key of setTableData[class_table]) {
                    td += '<td>';
                    if (typeof key !== 'object') {
                        if (key === '_increment') {
                            td += (data.from++);
                        } else if (key === '#') {
                            td += '#';
                        } else {
                            td += _getData(d, key);
                        }
                        continue;
                    }

                    if (typeof key.key === 'string') {
                        td += key.func(_getData(d, key.key))
                    } else {
                        var tmpVal = []
                        key.key.forEach(nameKey => {
                            tmpVal.push(_getData(d, nameKey))
                        });
                        td += key.func(tmpVal)
                    }

                    td += '</td>';
                }
                tr += td;
                tr += '</tr>';
            }
            return tr;
        }

        async function setTable(url, callback = null, filtered = null) {

            if (url === '#') return;

            url = new URL(url);
            let class_table = url.searchParams.get('class');
            let show_length = $(`.${class_table} .table-length-select`);
            if (show_length.val() !== '' && show_length.val() != undefined) {
                url.searchParams.set('limit', show_length.val());
            } else {
                url.searchParams.delete('limit');
            }
            if (filtered != null) {
                if (typeof(filtered) == "string") {
                    filtered = JSON.parse(filtered)
                }
                for (const key in filtered) {
                    url.searchParams.set(key, $(filtered[key]).val())
                }
                if (typeof(filtered) == "object") {
                    filtered = JSON.stringify(filtered)
                }
            }
            let page = url.searchParams.get('page') ?? 1;
            url.searchParams.set('page', page);

            let search_input = $(`.${class_table} .table-pagination-search`);
            if (search_input.val() !== '') {
                url.searchParams.set('search', search_input.val());
            } else {
                url.searchParams.delete('search');
            }

            // set select page
            let page_select = $(`.${class_table} .table-pagination-select`);
            var loading = `<tr><td colspan="${setTableData[class_table].length}" class="text-center text-muted" style="font-size: 1rem; background-color: #eff3f8;">.: Mengambil Data :.</td</tr>`;
            $(`.${class_table} table tbody`).html(loading);

            req({
                url,
                type: "get",
                success: function(response) {
                    let data_table = response.data;
                    if (data_table === null) return;
                    // select page
                    let _option = '';
                    for (var i = 1; i <= data_table.last_page; i++) {
                        _option += `<option value="${i}"${(i === data_table.current_page ? ' selected' : '')}>${i}</option>`;
                    }
                    page_select
                        .html(_option)
                        .attr('onchange', `setTablePage("${class_table}", "${data_table.first_page_url}", ${null}, ${callback})`);

                    // button prev and next
                    $(`.${class_table} .btn-prev`).attr('onclick', `setTable("${ (data_table.prev_page_url || '#') }", ${callback}, ${filtered})`);
                    $(`.${class_table} .btn-next`).attr('onclick', `setTable("${ (data_table.next_page_url || '#') }", ${callback}, ${filtered})`);

                    // length data select
                    show_length.attr('onchange', `setTable("${data_table.first_page_url}", ${callback}, ${filtered})`);

                    // input search
                    search_input.attr('onchange', `setTablePage("${class_table}", "${data_table.first_page_url}", 1, ${callback})`);
                    $(`.${class_table} .table-btn-search`).attr('onclick', `setTable("${url}", ${callback}, ${filtered})`);

                    // text content
                    $(`.${class_table} .table-last`).text(data_table.last_page);
                    $(`.${class_table} .table-show`).text(data_table.data.length);
                    $(`.${class_table} .table-total`).text(data_table.total);

                    let tbody = _setTableData(class_table, data_table);
                    $(`.${class_table} table tbody`).html(tbody);
                    if (callback != null) {
                        callback(response)
                    }

                    // tooltip()
                }
            });
        }
        // end datatable
    </script>
    @yield('head')
</head>

<body style="background-color:#F5F6FA">

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('template2/images/logo.png') }}" alt="Logo">
            <h5>SMP DARUN NAJAH 2 KARANGPLOSO</h5>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="{{ asset('template2/images/home.png') }}" alt="Beranda" class="nav-icon">
                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tentangKamiMenu" role="button" aria-expanded="false" aria-controls="tentangKamiMenu">
                    <img src="{{ asset('template2/images/aboutus.png') }}" alt="Tentang Kami" class="nav-icon">
                    <span>Tentang Kami</span>
                    <span class="chevron ms-auto bi bi-chevron-down"></span>
                </a>
                <ul class="collapse" id="tentangKamiMenu">
                    <li>
                        <a class="nav-link" href="#">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Slideshow" class="nav-icon">
                            <span>Slideshow</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Guru/Staf" class="nav-icon">
                            <span>Guru/Staf</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Fasilitas" class="nav-icon">
                            <span>Fasilitas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#informasiMenu" role="button" aria-expanded="false" aria-controls="informasiMenu">
                    <img src="{{ asset('template2/images/info.png') }}" alt="Informasi" class="nav-icon">
                    <span>Informasi</span>
                    <span class="chevron ms-auto bi bi-chevron-down"></span>
                </a>
                <ul class="collapse" id="informasiMenu">
                    <li>
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.konten.berita.index' ? 'active' : '' }}" href="{{ route('admin.konten.berita.index') }}">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Berita" class="nav-icon">
                            <span>Berita</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Artikel" class="nav-icon">
                            <span>Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.konten.sosmed.index' ? 'active' : '' }}" href="{{ route('admin.konten.sosmed.index') }}">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Sosial Media" class="nav-icon">
                            <span>Sosial Media</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.konten.galeri.index' ? 'active' : '' }}" href="{{ route('admin.konten.galeri.index') }}">
                            <img src="{{ asset('template2/images/drop.png') }}" alt="Galeri" class="nav-icon">
                            <span>Galeri</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="{{ asset('template2/images/bintang.png') }}" alt="Ekstrakurikuler" class="nav-icon">
                    <span>Ekstrakurikuler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="{{ asset('template2/images/setting.png') }}" alt="Setting" class="nav-icon">
                    <span>Setting</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="admin-info">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('template2/images/pfp.png') }}" alt="Admin Avatar">
                    <div class="admin-text">
                        <div class="admin-title">Admin</div>
                        <div class="admin-subtitle">Administrator</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar-custom">
        <button class="navbar-toggler" type="button" id="menu-toggle">
            <img src="{{ asset('template2/images/menu.png') }}" alt="Menu" style="width: 24px; height: 24px;">
        </button>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        @yield('content')
    </div>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('shrink');
            mainContent.classList.toggle('shrink');
        });

        // Dropdown
        const dropdownToggles = document.querySelectorAll('[data-bs-toggle="collapse"]');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const chevron = this.querySelector('.chevron');
                chevron.classList.toggle('rotate');
            });
        });
    </script>
    @yield('footer')
</body>

</html>
