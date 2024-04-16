@extends('layouts.website.layouts')

@section('content')
            {{-- Berita --}}
            <section id="berita" class="py-5">
                <div class="container py-5">
      
                  <div class="header-berita text-center py-2">
                    {{-- <h2 class="fw-bold">Daftar Berita</h2> --}}
                  </div>
      
                  <div class="row py-3" data-aos="flip-down">
                    @foreach ($beritas as $berita)
      
                    <div class="col-lg-3">
                      <div class="card border-0">
                        <img src="{{ asset('storage/berita/'.$berita->image) }}" height="150" width="150" class="img-fluid mb-3" alt="">
                        <div class="konten-berita">
                          <p class="mb-3 text-secondary">{{ $berita->create_at }}</p>
                          <h5 class="fw-bold mb-3">{{ $berita->judul }}</h5>
                          <p class="text-secondary" >#bkpsdmmunabarat</p>
                          <a href="/detailberita/{{ $berita->slug }}" class="fw-bold text-decoration-none text-danger">Selengkapnya...</a>
                        </div>
                      </div>
                    </div>
      
                  @endforeach
      
                </div>
              </section>
              {{-- End Berita --}}
@endsection