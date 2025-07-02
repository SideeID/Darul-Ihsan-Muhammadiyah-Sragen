@include('components.navbar')


<section id="panduan-page" style="padding: 100px 0px">
    <div class="container">
        <div class="header-fas mt-5">
            <h3 class="mt-5 mb-4 fw-bold">Panduan Tata Tertib</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="elementor-element" data-id="d11a5c5" data-element_type="widget"
                    data-widget_type="html.default">
                    <div class="elementor-widget-container">
                        @foreach ($tatatertib as $item)
                            {{-- <iframe src="https://heyzine.com/flip-book/516ce8d525.html" width="100%" height="770"
                            style="border-radius: 16px; background-color:#F2F4F7;" allow="autoplay"></iframe> --}}

                            <iframe src="{{ $item->url }}" width="100%" height="770"
                                style="border-radius: 16px; background-color:#F2F4F7;" allow="autoplay"></iframe>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('components.footer')
