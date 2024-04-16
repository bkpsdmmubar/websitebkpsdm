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
            @foreach ($pelayanans as $pelayanan)
          
          <div class="col-lg-3 col-md-6 col mb-2">
            <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
              <div class="card text-center" style="width: 18rem;">
                <img src="{{ asset('storage/pelayanan/' . $pelayanan->icon) }}" height="150" width="100%" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title mt-2">{{ $pelayanan->judul }}</h5>
                  {{-- <p class="card-text">{{ $pelayanan->desc }}</p> --}}
                </div>
                <div class="card-footer">
                  <a href="/detailpelayanan/{{ $pelayanan->slug }}" class="btn btn-primary">Informasi</a>
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