@extends('layouts.website.layouts')

@section('content')
    
<section id="detail" class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <div class="d-flex mb-3">
            <a href="/" class="btn btn-primary"> Home </a>  <a href="/berita" class="btn btn-warning" > Berita </a>  <a href="{{ $berita->slug }}" class="btn btn-danger">{!! $berita->judul !!}</a>
        </div>
        <img src="{{ asset('storage/berita/'.$berita->image) }}" class="img-fluid mb-3" alt="">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">{{ $berita->create_at }}</p>
                <h4 class="fw-bold mb-3">{{ $berita->judul }}</h4>
                <p class="text-secondary">{!! $berita->desc !!}</p>
            </div>
    </div>
</section>

@endsection