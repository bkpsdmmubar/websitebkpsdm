@extends('layouts.website.layouts')

@section('content')
    {{-- aplikasi --}}
    <section id="aplikasi" class="py-5">
      <div class="container py-5">
        <div class="header-berita text-center py-3">
          {{-- <h3 class="fw-bold">APLIKASI BKPSDM</h3> --}}
        </div>
        <div class="container">
          <div class="row ">
            @foreach ($aplikasis as $aplikasi)
          
          <div class="col-lg-3 col-md-6 col mb-2">
            <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
              <div class="card text-center" style="width: 18rem;">
                <img src="{{ asset('storage/aplikasi/' . $aplikasi->icon) }}" height="150" width="100%" class="card-img-top" alt="...">
                <div class="card-body">
                  {{-- <h5 class="card-title mt-2">{{ $aplikasi->judul }}</h5> --}}
                  {{-- <p class="card-text">{{ $aplikasi->desc }}</p> --}}
                </div>
                <div class="card-footer">
                  <a href="{{ $aplikasi->link }}" target="_blank" class="btn btn-primary">{{ $aplikasi->judul }}</a>
                </div>
              </div>
            </div>
          </div>

          @endforeach
          </div>
        </div>

      </div>
      
    </section>
  {{-- And aplikasi --}}
@endsection