<x-landing-page-layout>
    <section class="pengurus">
        <div class="container">

            <h3 class="section-title">
                Pengurus PCNU Batu
            </h3>

            <div class="row" id="list_pengurus">

            </div>

            <div class="d-flex align-items-center justify-content-center justify-content-md-start pagination">
                <button class="btn-prev" id="prev_page_url">Previous</button>
                <div class="d-flex align-items-center" id="links">

                </div>
                <button class="btn-next" id="next_page_url">Next</button>
            </div>

        </div>
    </section>

    <script>
        //get pengurus
        function setPengurus(params) {
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
                            $("#links").append(`<button class="" onclick="setPengurus('${path}/landing/pengurus/paginate?page=${index}')">${index}</button>`)
                        }
                    }

                    $("#list_pengurus").html(
                        data.data.map((item) => {
                            return `
                                <div class="col-6 col-md-3 mb-4">
                                    <div class="overflow-hidden position-relative rounded-4 w-100 mb-3" style="background-color: #d9d9d9">
                                        <img src="${path + item.image}" alt="siluet" class="object-fit-cover w-100 h-100" />
                                    </div>
                                    <div class="d-flex flex-column gap-2 align-items-start">
                                        <h4 class="text-black fw-700">${item.nama}</h4>
                                        <p class="text-secondary">${item.jabatan}</p>
                                    </div>
                                </div>
                            `
                        })
                    )

                    if (data.prev_page_url !== null) {
                        $("#prev_page_url").attr("onclick", `setPengurus('${data.prev_page_url}')`)
                        $("#prev_page_url").attr("disabled", false)
                    } else {
                        $("#prev_page_url").attr("disabled", true)
                    }

                    if (data.next_page_url !== null) {
                        $("#next_page_url").attr("onclick", `setPengurus('${data.next_page_url}')`)
                        $("#next_page_url").attr("disabled", false)
                    } else {
                        $("#next_page_url").attr("disabled", true)
                    }
                }
            })
        }

        $(function() {
            setPengurus(`${path}/landing/pengurus/paginate`)
        });
    </script>
</x-landing-page-layout>