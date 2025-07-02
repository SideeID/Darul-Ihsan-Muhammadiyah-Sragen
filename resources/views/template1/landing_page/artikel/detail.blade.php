<x-landing-page-layout>
    <!-- artikel -->
    <section class="berita detail">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-2">

                <div class="col col-md-8 tanglet-diskusi-container pe-md-5">
                    <a href="{{ url('/artikel') }}" class="btn py-2 px-4 rounded-pill border border-secondary btn-kembali">
                        <img src="{{ asset('landingpage/assets/images/arrow-left.svg') }}" alt="" class="">
                    </a>

                    <div class="d-flex align-items-center mb-2">
                        <p class="berita-sumber fw-700 mb-0" id="sumber_artikel"></p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                            <circle cx="2" cy="2" r="2" fill="black" />
                        </svg>
                        <p class="text-secondary mb-0 berita-date" id="tanggal_artikel"></p>
                    </div>
                    <h2 class="berita-judul" id="judul_artikel"></h2>
                    <img src="" class="w-100 berita-image" id="image_artikel" alt="">

                    <div id="isi_artikel">

                    </div>
                    <a href="javascript:window.location=waCurrentPage();" class="awa text-decoration-none" style="width:100%!important">
                        <button class="btn btn-success d-flex align-items-center fw-600 py-2 px-3" style="margin:0 !important">
                            <img src="{{ asset('image/icon/whatsapp.svg') }}" class="me-2" alt=""><small>Share Whatsapp</small>
                        </button>
                    </a>
                </div>

                <div class="col col-md-4">
                    <h4 class="mb-5 side-article-header mt-5 mt-md-0">Artikel lainnya</h4>

                    <div id="list_artikel">

                    </div>

                    <div class="rounded-5 mt-5">
                        <img src="" alt="" class="w-100 h-100 object-fit-cover rounded-4" id="adsImage">
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- artikel end-->

    <script>
        var id = {!!json_encode($data) !!};
        var title, description, imageUrl;

        // Function to create meta tags
        function createMetaTagsForWhatsAppLink(link, title, description, imageUrl) {
            var metaTags = [
                { property: 'og:url', content: link },
                { property: 'og:title', content: title },
                { property: 'og:description', content: description },
                { property: 'og:image', content: imageUrl }
            ];

            metaTags.forEach(tag => {
                var metaTag = document.createElement('meta');
                metaTag.setAttribute('property', tag.property);
                metaTag.setAttribute('content', tag.content);
                document.head.appendChild(metaTag);
            });
        }

        function limitText(text, maxLength) {
            if (text.length <= maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength - 3) + '...';
            }
        }

        //get detail artikel
        req({
            url: `${path}/landing/artikel/${id}`,
            type: "GET",
            success: function(response) {
                var data = response.data

                $("#judul_artikel").html(data.judul)
                $("#sumber_artikel").html(data.sumber)
                $("#tanggal_artikel").html(moment(data.tanggal).format("DD MMMM YYYY"))
                $("#image_artikel").attr("src", path + data.image)
                $("#isi_artikel").html(data.isi)
                title = limitText(data.judul, 35)
                description = limitText(data.summary, 65);
                imageUrl = path + data.image;

                // Create WhatsApp meta tags
                var waLink = waCurrentPage();
                createMetaTagsForWhatsAppLink(waLink, title, description, imageUrl);
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

        // Function to get WhatsApp current page link
        function waCurrentPage() {
            return encodeURI("https://wa.me/?text= " + title + ". Klik disini untuk membaca " + 'https://' + window.location.hostname + window.location.pathname);
        }
    </script>
</x-landing-page-layout>