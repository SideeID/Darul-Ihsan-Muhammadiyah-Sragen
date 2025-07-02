@foreach ($galleryFiles as $file)
    @if ($file)
        <div class="mb-4 col-lg-3 col-md-6 col-12 filter {{ $file->type }}">
            <a data-fancybox="{{ $file->type }}" data-caption="{{ $file->judul }}" href="{{ asset($file->image) }}">
                <img src="{{ asset($file->image) }}" alt="{{ $file->judul }}" class="img-thumbnail" style="object-fit: cover; width: 100%; height: 200px;">
            </a>
        </div>
    @endif
@endforeach
