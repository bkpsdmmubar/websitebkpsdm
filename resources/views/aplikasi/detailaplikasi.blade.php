@extends('layouts.website.layouts')

@section('content')
    
<section id="detail" class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <div class="d-flex mb-3">
            <a href="/"> Home </a> / <a href="/aplikasi"> Aplikasi </a> / <a href="{{ $aplikasi->slug }}">{!! $aplikasi->judul !!}</a>
        </div>
        <img src="{{ asset('storage/aplikasi/'.$aplikasi->icon) }}" class="img-fluid mb-3" alt="">
            <div class="konten-aplikasi">
                <p class="mb-3 text-secondary">{{ $aplikasi->create_at }}</p>
                <h4 class="fw-bold mb-3">{{ $aplikasi->judul }}</h4>
                <p class="text-secondary">{{ $aplikasi->desc }}</p>
            </div>
    </div>
</section>

@endsection