@extends('layouts.website.layouts')

@section('content')

    {{-- Video --}}
    <section id="video_youtube" class="py-5">
      <div class="container py-5">
        <div class="header-berita text-center">
          {{-- <h2 class="fw-bold">Video BKPSDM Muna Barat</h2> --}}
        </div>
        <div class="row py-5">
          @foreach ($videos as $video)
            <div class="col-lg-3">
              <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $video->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
              </iframe>
            </div>
          @endforeach
      </div>
    </section>
  {{-- And Video --}}
@endsection