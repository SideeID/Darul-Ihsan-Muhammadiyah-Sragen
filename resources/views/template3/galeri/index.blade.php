@include('components.navbar')

<section id="galeri-page">
    <div class="container mt-4 overflow-hidden">
        <div class="header-galeri d-flex justify-content-between align-items-center mt-5 mb-4">
            <h3 class="fw-bold m-0 galeri-page-title">Galeri</h3>

            <!-- Filter Menu -->
            <div class="galeri-filter-container">
                <ul class="galeri-filter-nav nav nav-pills border rounded-3 p-1 flex-nowrap">
                    <li class="nav-item">
                        <button class="nav-link active" type="button" data-filter="all">Semua</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" type="button" data-filter="pembelajaran">Pembelajaran</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" type="button" data-filter="ekstrakurikuler">Ekstrakurikuler</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" type="button" data-filter="event">Event</button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Gallery -->
        <div class="row gallery">
            <!-- Pembelajaran -->
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter pembelajaran">
                <a data-fancybox="pembelajaran" data-caption="Belajar Kitab"
                    href="{{ asset('template2/assets/image/img-galeri1.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri1.svg') }}" alt="Image 1"
                        class="img-thumbnail">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter pembelajaran">
                <a data-fancybox="pembelajaran" data-caption="Kelas Tafsir"
                    href="{{ asset('template2/assets/image/img-galeri2.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri2.svg') }}" alt="Image 2"
                        class="img-thumbnail">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter pembelajaran">
                <a data-fancybox="pembelajaran" data-caption="Diskusi Islam"
                    href="{{ asset('template2/assets/image/img-galeri3.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri3.svg') }}" alt="Image 3"
                        class="img-thumbnail">
                </a>
            </div>

            <!-- Ekstrakurikuler -->
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter ekstrakurikuler">
                <a data-fancybox="ekstrakurikuler" data-caption="Paduan Suara"
                    href="{{ asset('template2/assets/image/img-galeri4.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri4.svg') }}" alt="Image 4"
                        class="img-thumbnail">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter ekstrakurikuler">
                <a data-fancybox="ekstrakurikuler" data-caption="Olahraga Futsal"
                    href="{{ asset('template2/assets/image/img-galeri5.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri5.svg') }}" alt="Image 5"
                        class="img-thumbnail">
                </a>
            </div>

            <!-- Event -->
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter event">
                <a data-fancybox="event" data-caption="Semaan Akbar"
                    href="{{ asset('template2/assets/image/img-galeri6.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri6.svg') }}" alt="Image 6"
                        class="img-thumbnail">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter event">
                <a data-fancybox="event" data-caption="Hari Santri"
                    href="{{ asset('template2/assets/image/img-galeri7.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri7.svg') }}" alt="Image 7"
                        class="img-thumbnail">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 filter event">
                <a data-fancybox="event" data-caption="Peringatan Maulid"
                    href="{{ asset('template2/assets/image/img-galeri8.svg') }}">
                    <img src="{{ asset('template2/assets/image/img-galeri8.svg') }}" alt="Image 8"
                        class="img-thumbnail">
                </a>
            </div>
        </div>



    </div>

    <!-- Filter Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterButtons = document.querySelectorAll('.nav-link');
            const filterItems = document.querySelectorAll('.filter');

            function updateFancybox(filterValue) {
                filterItems.forEach(item => {
                    const fancyboxLink = item.querySelector('a');
                    if (filterValue === 'all' || item.classList.contains(filterValue)) {
                        fancyboxLink.setAttribute('data-fancybox', filterValue);
                    } else {
                        fancyboxLink.removeAttribute('data-fancybox');
                    }
                });
            }

            updateFancybox('all');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.getAttribute('data-filter');

                    // Update button styles
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter items
                    filterItems.forEach(item => {
                        if (filterValue === 'all' || item.classList.contains(filterValue)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Update data-fancybox for filtered items
                    updateFancybox(filterValue);
                });
            });
        });
    </script>

    @include('components.button-muat')

</section>

@include('components.footer')
