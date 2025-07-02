@foreach ($items as $item)
    @if ($item)
        <a href="{{ $item->url }}"
            style="text-decoration: none; display: flex; flex-direction: column; row-gap: 24px;">
            <img src="{{ asset($item->image) }}" alt="{{ $item->judul }}" class="object-fit-cover rounded {{ $item->type }}" style="object-fit: cover; width: 100%; height: 400px;">
            <p style="display: flex; column-gap: 4px; color: #000000; margin: 0;">
                @if ($item->type === 'Instagram')
                    <img src="{{ asset('image/icon/instagram-icon.svg') }}" alt="{{ $item->type }}">
                @else
                    <img src="{{ asset('image/icon/youtube-icon.svg') }}" alt="{{ $item->type }}">
                @endif
                <span>{{ $item->judul }}</span>
            </p>
        </a>
    @endif
@endforeach
