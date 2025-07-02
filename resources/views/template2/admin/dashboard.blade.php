<x-app-layout>
    <div class="container-lg dashboard">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card card-main mb-4 h-100 bg-white">
                    <div class="card-header border-0 bg-white d-flex align-items-center justify-content-between flex-row pt-4 px-4 pb-0">
                        <h5 class="fw-700 text-dark mb-3 mb-sm-0">Nderek Tanglet</h5>
                        <img src="{{ asset('image/icon/dashboard-tanglet.svg') }}" alt="">
                    </div>
                    <div class="table-data card-body overflow-auto p-4">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="display-1 fw-700 me-4 text-black mb-0" id="nderek_all"> </h1>
                                    <p class="text-subdued mb-0">Total Pertanyaan <br> Masuk</p>
                                </div>
                                <div class="card border-0 bg-light-success">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ asset('image/icon/dashboard-dibalas.svg') }}" class="me-2" alt="icon">
                                                    <div>
                                                        <p class="text-subdued mb-0">Dibalas</p>
                                                        <h1 class="display-6 fw-700 text-black" id="nderek_answered"> </h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ asset('image/icon/dashboard-belum-dibalas.svg') }}" class="me-2" alt="icon">
                                                    <div>
                                                        <p class="text-subdued mb-0">Belum Dibalas</p>
                                                        <h1 class="display-6 fw-700 text-black" id="nderek_waiting"> </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('tanglet.index')}}" class="btn btn-black fw-600 w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card card-main bg-success mb-4">
                            <div class="card-header border-0 bg-success d-flex align-items-center justify-content-between flex-row pt-4 px-4 pb-0">
                                <h5 class="fw-700 text-white mb-3 mb-sm-0">Total Pengurus</h5>
                                <img src="{{ asset('image/icon/dashboard-anggota.svg') }}" alt="">
                            </div>
                            <div class="table-data card-body overflow-auto p-4">
                                <div class="d-flex align-items-center">
                                    <h1 class="display-1 fw-700 text-white mb-0" id="anggota"> </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="card card-main mb-0 bg-white">
                            <div class="card-header border-0 bg-white d-flex align-items-center justify-content-between flex-row pt-4 px-4 pb-0">
                                <h5 class="fw-700 text-subdued mb-3 mb-sm-0">Total Iklan Aktif</h5>
                                <img src="{{ asset('image/icon/dashboard-iklan.svg') }}" alt="">
                            </div>
                            <div class="table-data card-body overflow-auto p-4">
                                <div class="d-flex align-items-center">
                                    <h1 class="display-1 fw-700 text-black mb-0" id="active_ads"> </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        req({
            url: `${path}/api/dashboard`,
            type: "GET",
            success: function(response) {
                var data = response.data

                $("#active_ads").html(data.active_ads)
                $("#anggota").html(data.anggota)
                $("#nderek_all").html(data.nderek_all)
                $("#nderek_answered").html(data.nderek_answered)
                $("#nderek_waiting").html(data.nderek_waiting)
            }
        })
    </script>
</x-app-layout>
