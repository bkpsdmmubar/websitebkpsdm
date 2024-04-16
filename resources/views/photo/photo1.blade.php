@extends('layouts.website.layouts')

@section('content')
  <h1>Daftar Berita</h1>

  {{-- Foto --}}
  <section id="foto" class="section-foto parallax">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex align-items-center">
          <div class="stripe-putih me-2"></div>
            <h5 class="fw-bold text-danger">Foto Kegiatan</h5>
        </div>
      </div>

      <div class="row">
        @foreach ($photos as $photo)
          <div class="col-lg-3 col-md-6 col-6">
            <div id="portfolio">
              <div class="portfolio-item">
                  <a class="portfolio-popup" href="{{ asset('storage/photo/' . $photo->image) }}">
                      <img src="{{ asset('storage/photo/' . $photo->image) }}" class="img-fluid" alt="">
                  </a>
                  <p class="text-bold text-black">{{ $photo->judul }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection