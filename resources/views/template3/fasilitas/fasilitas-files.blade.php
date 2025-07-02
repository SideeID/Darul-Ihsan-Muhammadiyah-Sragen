@foreach($fasilitas as $index => $item)
    @if($index % 3 == 0)
        <div class="mb-3 content-1">
            <div class="gap-4 fasilitas-grid-container d-grid">
                <div class="border-0 card fasilitas-img-big-container">
                    <a href="{{ asset($item->files->first()->file) }}" data-fancybox="{{ $item->judul }}"
                        data-caption="{{ $item->judul }}">
                        <img src="{{ asset($item->files->first()->file) }}" class="card-img-top"
                            alt="{{ $item->judul }}" style="border-radius: 8px; width: 100%; height:574px;" />
                        @foreach($item->files->skip(1) as $file)
                            <a href="{{ asset($file->file) }}" data-fancybox="{{ $item->judul }}"
                                class="w-100" data-caption="{{ $item->judul }}"></a>
                        @endforeach
                    </a>
                    <div class="px-0 card-body text-start d-inline-block">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">{{ $item->judul }}</p>
                    </div>
                </div>

                @if(isset($fasilitas[$index + 1]))
                    <div class="d-grid fasilitas-img-small-container">
                        <div class="border-0 card">
                            <a href="{{ asset($fasilitas[$index + 1]->files->first()->file) }}" data-fancybox="{{ $fasilitas[$index + 1]->judul }}"
                                data-caption="{{ $fasilitas[$index + 1]->judul }}">
                                <img src="{{ asset($fasilitas[$index + 1]->files->first()->file) }}" class="card-img-top"
                                    alt="{{ $fasilitas[$index + 1]->judul }}" style="border-radius: 8px; width: 100%; height: 16rem;" />
                                @foreach ($fasilitas[$index + 1]->files->skip(1) as $file)
                                    <a href="{{ asset($file->file) }}" data-fancybox="{{ $fasilitas[$index + 1]->judul }}"
                                        class="w-100" data-caption="{{ $fasilitas[$index + 1]->judul }}"></a>
                                @endforeach
                            </a>
                            <div class="px-0 card-body text-start">
                                <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">{{ $fasilitas[$index + 1]->judul }}</p>
                            </div>
                        </div>

                        @if(isset($fasilitas[$index + 2]))
                            <div class="border-0 card">
                                <a href="{{ asset($fasilitas[$index + 2]->files->first()->file) }}" data-fancybox="{{ $fasilitas[$index + 2]->judul }}"
                                    data-caption="{{ $fasilitas[$index + 2]->judul }}">
                                    <img src="{{ asset($fasilitas[$index + 2]->files->first()->file) }}" class="card-img-top"
                                        alt="{{ $fasilitas[$index + 2]->judul }}" style="border-radius: 8px; width: 100%; height: 16rem;" />
                                    @foreach ($fasilitas[$index + 2]->files->skip(1) as $file)
                                        <a href="{{ asset($file->file) }}" data-fancybox="{{ $fasilitas[$index + 2]->judul }}"
                                            class="w-100" data-caption="{{ $fasilitas[$index + 2]->judul }}"></a>
                                    @endforeach
                                </a>
                                <div class="px-0 card-body text-start">
                                    <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">{{ $fasilitas[$index + 2]->judul }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endif
@endforeach
