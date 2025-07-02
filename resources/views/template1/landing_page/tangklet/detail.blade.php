<x-landing-page-layout>
    <!-- tanglet-diskusi -->
    <section class="tanglet-diskusi detail">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-2">

                <div class="col col-md-8 tanglet-diskusi-container pe-md-5">
                    <a href="{{ url('/nderek-tangklet') }}" class="btn py-2 px-4 rounded-pill border border-secondary btn-kembali">
                        <img src="{{ asset('landingpage/assets/images/arrow-left.svg') }}" alt="" class="">
                    </a>

                    <div class="">
                        <div class="d-inline-flex gap-4 w-100">
                            <div class="img-profile d-flex align-items-center justify-content-center text-uppercase" id="img_profile"></div>
                            <div class="d-flex justify-content-between tanglet-detail-pertanyaan-container w-100">
                                <div class="w-100">
                                    <h4 class="tanglet-diskusi-card-title tanglet-detail-title mb-2" id="judul">
                                        judul
                                    </h4>
                                    <p class="text-secondary">
                                        Oleh :
                                        <span class="fw-bold" id="nama">
                                           
                                        </span>
                                    </p>
                                </div>
                                <div class="text-secondary w-100 d-flex flex-column">
                                    <p class="d-flex align-items-center ms-auto mb-2">
                                        <span class="me-3">
                                            1 Balasan
                                        </span>
                                        <img src="{{ asset('landingpage/assets/icons/message.svg') }}" alt="" class="">
                                    </p>

                                    <p class="d-flex align-items-center ms-auto">
                                        <span class="me-3" id="tanggal">
                                           
                                        </span>
                                        <img src="{{ asset('landingpage/assets/icons/clock.svg') }}" alt="" class="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tanglet-detail-pertanyaan mt-3 mb-4">
                        <p class="fw-medium" id="pertanyaan">
                            
                        </p>
                    </div>
                    <div class="p-4 rounded-4 border border-secondary-subtle">
                        <p class="text-green">
                            Dijawab oleh
                            <span class="fw-bold" id="narasumber">
                            
                            </span>
                        </p>
                        <p class="fw-medium tanglet-detail-jawab m-0" id="jawaban">
                            
                        </p>
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
    </section>
    <!-- tanglet-diskusi end-->

    <script>
        var id = {!!json_encode($data) !!};

        //get detail tangklet
        req({
            url: `${path}/landing/nderek/${id}`,
            type: "GET",
            success: function(response) {
                var data = response.data

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

                $("#pertanyaan").html(data.pertanyaan)
                $("#img_profile").html(data.nama.charAt(0))
                $("#nama").html(convertToStars(data.nama))
                $("#tanggal").html(moment(data.created_at).format("DD MMMM YYYY"))
                $("#narasumber").html(data.narasumber.nama)
                $("#jawaban").html(data.jawaban)
            }
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