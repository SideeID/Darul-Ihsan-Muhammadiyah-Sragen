<x-landing-page-layout>
    <section class="section-hero bg-tertiary">
        <div class="container">
            <h1 class="section-hero-title" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">
                Artikel
            </h1>
        </div>
    </section>

    <section class="berita">
        <div class="container">

            <div id="berita_content">

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
    </section>

    <script>
        //get berita
        function setBerita(params) {
            req({
                url: `${params}`,
                type: "GET",
                success: function(response) {
                    var data = response.data
                    var links_length = data.links.length - 2

                    $("#links").html("")
                    for (let index = 1; index <= links_length; index++) {
                        if (index === data.current_page) {
                            $("#links").append(`<button class="active" disabled>${index}</button>`)
                        } else {
                            $("#links").append(`<button class="" onclick="setBerita('${path}/landing/artikel/paginate?page=${index}')">${index}</button>`)
                        }
                    }

                    $("#berita_content").html(
                        data.data.map((item) => {
                            return `
                                <a href="${path}/artikel/${item.id}" class="text-decoration-none">
                                    <div class="row mb-5 hover-card">
                                        <div class="col-md-4">
                                            <img src="${path + item.image}" class="berita-image mb-4 mb-md-0" alt="">
                                        </div>
                                        <div class="col-md-8 d-flex flex-column justify-content-center">
                                            <div class="d-flex align-items-center mb-3 mb-md-4">
                                                <p class="berita-sumber fw-700 mb-0 text-black">${item.sumber}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                                    <circle cx="2" cy="2" r="2" fill="black" />
                                                </svg>
                                                <p class="text-secondary mb-0 berita-date">${moment(item.tanggal).format("DD MMMM YYYY")}</p>
                                            </div>
                                            <h2 class="berita-judul line-clamp-3 mb-3 text-black">${item.judul}</h2>
                                            <p class="berita-summary line-clamp-3 fw-500 mb-0 text-black">${item.summary}</p>
                                        </div>
                                    </div>
                                </a>
                            `
                        })
                    )

                    if (data.prev_page_url !== null) {
                        $("#prev_page_url").attr("onclick", `setBerita('${data.prev_page_url}')`)
                        $("#prev_page_url").attr("disabled", false)
                    } else {
                        $("#prev_page_url").attr("disabled", true)
                    }

                    if (data.next_page_url !== null) {
                        $("#next_page_url").attr("onclick", `setBerita('${data.next_page_url}')`)
                        $("#next_page_url").attr("disabled", false)
                    } else {
                        $("#next_page_url").attr("disabled", true)
                    }
                }
            })
        }

        $(function() {
            setBerita(`${path}/landing/artikel/paginate`)
        });
    </script>
</x-landing-page-layout>