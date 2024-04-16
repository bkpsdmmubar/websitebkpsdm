@extends('layouts.website.layouts')

@section('content')
    
<section id="detail" class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <div class="d-flex mb-3">
            <a href="/"> Home </a> / <a href="/pelayanan"> Pelayanan </a> / <a href="{{ $pelayanan->slug }}">{!! $pelayanan->judul !!}</a>
        </div>
        <img src="{{ asset('storage/pelayanan/'.$pelayanan->icon) }}" class="img-fluid mb-3" alt="">
            <div class="konten-pelayanan">
                <p class="mb-3 text-secondary">{{ $pelayanan->create_at }}</p>
                <h4 class="fw-bold mb-3">{{ $pelayanan->judul }}</h4>
                <p class="text-secondary">{{ $pelayanan->desc }}</p>
            </div>
    </div>
</section>

@endsection