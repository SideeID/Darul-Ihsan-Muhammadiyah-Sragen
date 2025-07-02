@extends('components.navbar')

@section('title', 'Question & Answer')

@section('content')

    <!-- Header Section -->
    <section class="text-white bg-dark d-flex align-items-center"
        style="background-image: url('{{ asset('template3/images/bgqna.jpeg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container">
            <h1 class="mt-5 display-6 fw-bold">Question & <br> Answer</h1>
        </div>
    </section>

    <!-- Q&A Section -->
    <div class="container mt-5 mb-5">
        <div class="accordion" id="qnaAccordion">
            @if ($qnas->count())
                @foreach ($qnas as $index => $qna)
                    <div class="mb-3 accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $index }}">
                                {{ sprintf('%02d', $index + 1) }}. {{ $qna->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            aria-labelledby="heading{{ $index }}" data-bs-parent="#qnaAccordion">
                            <div class="accordion-body">
                                {{ $qna->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mt-5 text-center">Belum ada pertanyaan yang tersedia.</p>
            @endif
        </div>
    </div>

@endsection
