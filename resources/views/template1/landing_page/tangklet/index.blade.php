<x-landing-page-layout>
    <style>
        .tanglet-hero-sub {
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.50);
            padding: 5px 30px 5px 20px;
            font-weight: 700;
            width: fit-content;
        }

        .btn {
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            padding: 8px;
            border-radius: 12px;
            letter-spacing: 0.01em;
        }
    </style>

    <!-- tanglet-hero -->
    <section class="tanglet-hero bg-tertiary">
        <div class="container py-5">
            <h5 class="tanglet-hero-sub">
                Nderek Tanglet
            </h5>
            <h1 class="w-75 my-5 tanglet-hero-title" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">
                Anda bertanya, Ulama' Menjawab
            </h1>
            <div class="d-flex tanglet-hero-btn-container">
                <a href="{{ url('/nderek-tangklet/tanya') }}" class="tanglet-btn-pertanyaan text-decoration-none text-white px-5 py-2 rounded-pill fw-bold me-3 text-center">
                    <img src="{{ asset('landingpage/assets/icons/edit-2.svg') }}" alt="" class="me-2">
                    <span>
                        Buat Pertanyaan
                    </span>
                </a>
                <button type="button" class="tanglet-btn-berdasarkan text-decoration-none text-dark px-4 py-2 rounded-pill fw-bold border border-secondary text-center" data-bs-toggle="modal" data-bs-target="#modalData">
                    <img src="{{ asset('landingpage/assets/icons/search-normal.svg') }}" alt="" class="me-2">
                    <span>
                        Berdasarkan Topik
                    </span>
                </button>
            </div>
        </div>
    </section>
    <!-- tanglet-hero-end -->

    <!-- tanglet-diskusi -->
    <section class="tanglet-diskusi">
        <div class="container py-5">
            <h3 class="mb-4 tanglet-diskusi-title">
                Diskusi terbaru
            </h3>
            <div class="row row-cols-1 row-cols-md-2 gx-5">

                <div class="col col-md-8 tanglet-diskusi-container">
                    <div id="diskusi_list">

                    </div>

                    <div class="d-flex align-items-center justify-content-center justify-content-md-start pagination">
                        <button class="btn-prev" id="prev_page_url">Previous</button>
                        <div class="d-flex align-items-center" id="links">
                            <button class="active">1</button>
                            <button>2</button>
                        </div>
                        <button class="btn-next" id="next_page_url">Next</button>
                    </div>

                </div>

                <div class="col col-md-4">
                    <h4 class="mb-5 side-article-header mt-5 mt-md-0">Kolom Artikel</h4>

                    <div id="list_artikel">

                    </div>

                    <div class="rounded-5 mt-5">
                        <img src="" alt="" class="w-100 h-100 object-fit-cover rounded-4" id="adsImage">
                    </div>

                </div>

            </div>
        </div>


        <!-- Modal Tambah -->
        <div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <form id="form_data" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group position-relative mb-4 mb-md-4">
                                <p class="text-black mb-3 fw-600">Masukkan topik yang dicari</p>
                                <input type="text" id="search" name="search" class="form-control" placeholder="Topik" aria-label="Topik">
                            </div>

                            <div class="d-flex align-items-center">
                                <input type="hidden" id="d_id">
                                <button type="button" class="btn btn-secondary fw-700 p-2 me-3 w-100" onclick="closeModalData()">Batal</button>
                                <button type="button" class="btn btn-success fw-700 p-2 w-100" id="buttonSubmit">Cari Topik</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- tanglet-diskusi end-->

    <script>
        function closeModalData() {
            $("#modalData").modal('hide');
        }

        function closeModalData() {
            $("#modalData").modal('hide');
        }

        //get tanglet
        function setNderek(params) {
            req({
                url: `${params}`,
                type: "GET",
                success: function(response) {
                    var data = response.data
                    var links_length = data.links.length - 2

                    function convertToStars(inputString) {
                        var words = inputString.split(' ');
                        var starredWords = words.map(function(word) {
                            if (word.length > 2) {
                                return word[0] + '*'.repeat(word.length - 2) + word.slice(-1);
                            } else {
                                return word;
                            }
                        });

                        var resultString = starredWords.join(' ');

                        return resultString;
                    }

                    $("#links").html("")
                    for (let index = 1; index <= links_length; index++) {
                        if (index === data.current_page) {
                            $("#links").append(`<button class="active" disabled>${index}</button>`)
                        } else {
                            $("#links").append(`<button class="" onclick="setNderek('${path}/landing/nderek/paginate?status=answered&page=${index}')">${index}</button>`)
                        }
                    }

                    if (data.total > 0) {
                        $("#diskusi_list").html(
                            data.data.map((item) => {
                                return `
                                    <a href="{{ url('/nderek-tangklet/${item.id}') }}" class="tanglet-diskusi-card hover-card d-inline-flex my-3 w-100 text-decoration-none text-dark">
                                        <div class="img-profile d-flex align-items-center justify-content-center text-uppercase me-4" id="img_profile">
                                            ${item.nama.charAt(0)}
                                        </div>
                                        <div class="tanglet-diskusi-card-sub w-100">
                                            <div class="d-flex justify-content-between w-100 mb-3">
                                                <h4 class="tanglet-diskusi-card-title">
                                                    ${item.judul}
                                                </h4>
                                                <div class="tanglet-artikel-tanggal">
                                                    <span class="text-secondary me-1">
                                                        ${moment(item.created_at).format("DD MMMM YYYY")}
                                                    </span>
                                                    <img src="{{ asset('landingpage/assets/icons/clock.svg') }}" alt="" class="">
                                                </div>
                                            </div>
                                            <p class="text-secondary mb-2">
                                                Oleh :
                                                <span class="fw-bold">
                                                    ${convertToStars(item.nama)}
                                                </span>
                                            </p>
                                            <p class="tanglet-diskusi-ustad">
                                                Dijawab oleh
                                                <span class="fw-bold">
                                                    ${item.narasumber.nama}
                                                </span>
                                            </p>
                                            <p class="fw-medium tanglet-diskusi-jawab pe-4 line-clamp-2">
                                                ${item.pertanyaan}
                                            </p>
                                        </div>
                                    </a>
                                `
                            })
                        )

                    } else {
                        $("#diskusi_list").html("<h1 class='text-center fw-600'>Topik Tidak Ada</h1>")
                        $(".pagination").addClass("d-none")
                    }

                    if (data.prev_page_url !== null) {
                        $("#prev_page_url").attr("onclick", `setNderek('${data.prev_page_url}')`)
                        $("#prev_page_url").attr("disabled", false)
                    } else {
                        $("#prev_page_url").attr("disabled", true)
                    }

                    if (data.next_page_url !== null) {
                        $("#next_page_url").attr("onclick", `setNderek('${data.next_page_url}')`)
                        $("#next_page_url").attr("disabled", false)
                    } else {
                        $("#next_page_url").attr("disabled", true)
                    }
                }
            })
        }

        $(function() {
            setNderek(`${path}/landing/nderek/paginate?status=answered`)
        });

        $("#buttonSubmit").on("click", function(event) {
            $("#modalData").modal('hide');
            setNderek(`${path}/landing/nderek/paginate?status=answered&search=${$('#search').val()}`)
        })

        //get artikel
        req({
            url: `${path}/landing/artikel`,
            type: "GET",
            success: function(response) {
                var data = response.data.slice(0, 3)

                $("#list_artikel").html(data.map((item) => {
                    return `
                        <div class="w-100 side-article-card p-4">
                            <a href="${path}/artikel/${item.id}" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center gap-2 text-secondary mb-3 side-article-tanggal">
                                    <p class="fw-bold m-0">
                                        ${moment(item.tanggal).format("MMM")}, ${moment(item.tanggal).format("DD")}
                                    </p>
                                    <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                    <p class="m-0">
                                        ${moment(item.tanggal).format("YYYY")}
                                    </p>
                                </div>
                                <h5 class="side-article-title fw-bold line-clamp-2">
                                    ${item.judul}
                                </h5>
                            </a>
                        </div>
                    `
                }))
            }
        })

        //get ads
        req({
            url: `${path}/landing/ads`,
            type: "GET",
            success: function(response) {
                var data = response.data.non_slider

                function getObjectWithLokasi(array, lokasiValue) {
                    for (var i = 0; i < array.length; i++) {
                        if (array[i].lokasi === lokasiValue) {
                            return array[i];
                        }
                    }
                    return null;
                }

                var halaman_vertical = getObjectWithLokasi(data, "halaman_vertical");

                //ads
                if (halaman_vertical.status === "waiting") {
                    $("#adsImage").hide()
                } else {
                    $("#adsImage").attr("src", halaman_vertical.image)
                }
            }
        })
    </script>
</x-landing-page-layout>