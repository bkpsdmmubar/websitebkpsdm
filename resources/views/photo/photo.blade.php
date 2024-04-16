@extends('layouts.website.layouts')

@section('content')
    {{-- Pelayanan --}}
    <section id="pelayanan" class="py-5">
      <div class="container py-5">
        <div class="text-center mb-4">
          {{-- <h3 class="fw-bold">Pelayanan BKPSDM</h3> --}}
        </div>
        <div class="container">
          <div class="row ">
            @foreach ($photos as $photo)
          
          <div class="col-lg-3 col-md-6 col mb-2">
            <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
              <div class="card text-center" style="width: 18rem;">
                  <a class="portfolio-popup" href="{{ asset('storage/photo/' . $photo->image) }}">
                    <img src="{{ asset('storage/photo/' . $photo->image) }}" class="img-fluid" alt="">
                  </a>
                <div class="card-footer">
                  <p class="text-bold text-black">{{ $photo->judul }}</p>
                </div>
              </div>
            </div>
          </div>

          @endforeach
          </div>
        </div>

      </div>
      
    </section>
  {{-- And Pelayanan --}}
@endsection