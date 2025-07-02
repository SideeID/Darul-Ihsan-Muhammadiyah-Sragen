@foreach ($galleryFiles as $file)
    @if ($file->gallery)
        <div class="mb-4 col-lg-3 col-md-6 col-12 filter {{ $file->gallery->type }}">
            <a data-fancybox="{{ $file->gallery->type }}" data-caption="{{ $file->gallery->judul }}"
                href="{{ asset($file->file) }}">
                <img src="{{ asset($file->file) }}" alt="{{ $file->gallery->judul }}" class="img-thumbnail">
            </a>
        </div>
    @endif
@endforeach
