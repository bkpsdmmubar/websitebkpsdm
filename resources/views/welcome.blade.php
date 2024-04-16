@extends('layouts.website.layouts')

@section('content')


        {{-- hero --}}
        <section id="hero">
          <div class="container text-center text-black text-bold">
              <div class="hero-title" data-aos="fade-up">
                  <div class="hero-text">* B K P S D M *</div>
                  <div class="hero-text-1">BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</div>
                  <h1></h1>
              </div>
          </div>
        </section>
        {{-- hero --}}

        {{-- Program --}}
        <section id="program" style="margin-top: -40px">
          <div class="container col-xxl-9">
              <div class="row">
                <div class="col-lg-3 col-md-6 col mb-2" data-aos="fade-up">
                  <div class="bg-light rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                    <div>
                      <p>Kesekretariatan <br>BKPSDM<br><br></p>
                    </div>
                    <img src="{{ asset('assetsweb/icons/bg-karir.png') }}" height="55" width="55" alt="">
                  </div>
                </div>
                  <div class="col-lg-3 col-md-6 col mb-2" data-aos="fade-up">
                    <div class="bg-light rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                      <div>
                        <p>Bidang <br>Pengembangan <br>Karir Aparatur</p>
                      </div>
                      <img src="{{ asset('assetsweb/icons/bg-karir.png') }}" height="55" width="55" alt="">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col mb-2" data-aos="fade-up">
                    <div class="bg-light rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                      <div>
                        <p>Bidang <br>Mutasi dan Promosi<br><br></p>
                      </div>
                      <img src="{{ asset('assetsweb/icons/bg-mutasi.jpg') }}" height="55" width="55" alt="">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col mb-2" data-aos="fade-up">
                    <div class="bg-light rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                      <div>
                        <p>Bidang Pengadaan <br>Pemberhentian <br> dan Informasi</p>
                      </div>
                      <img src="{{ asset('assetsweb/icons/bg-pengadaan.jpg') }}" height="55" width="55" alt="">
                    </div>
                  </div>
              </div>
          </div>
        </section>
        {{-- Program --}} 

      {{-- Berita --}}
      <section id="berita">
        <div class="container py-5">

          <div class="header-berita text-center">
            <h2 class="fw-bold">BERITA BKPSDM</h2>
          </div>
          <div class="row py-5">
            <div class="col-md-4">
              @foreach ($beritautama as $butama)
              <img src="{{ asset('storage/berita/'.$butama->image) }}" height="150" width="100%" class="img-fluid mb-3" alt="">
              <a href="/detailberita/{{ $butama->slug }}" class="fw-bold text-decoration-none text-black"><h5 class="fw-bold">{{ $butama->judul }}</h5></a>
              <p class="mb-3 text-secondary">{{ $butama->created_at }}
              <br><a href="/" class="fw-bold text-decoration-none">#bkpsdmmunabarat</a>
              <br><a href="/detailberita/{{ $butama->slug }}" class="fw-bold text-decoration-none text-danger">Selengkapnya...</a>
            </p>
              @endforeach
            </div>
            
            <div class="col-md-8">
              
              <div class="row">
                @foreach ($beritas as $berita)
                <div class="col-md-2">
                  <img src="{{ asset('storage/berita/'.$berita->image) }}" height="100" width="100%" class="img-fluid mb-3" alt="">
                </div>
                <div class="col-md-10 ">
                  <a href="/detailberita/{{ $berita->slug }}" class="fw-bold text-decoration-none text-black"><h5 class="fw-bold">{{ $berita->judul }}</h5></a>
                  <p class="text-secondary">{{ $berita->created_at }}
                  {{-- <p class="text-secondary" >#bkpsdmmunabarat</p> --}}
                  <br><a href="/detailberita/{{ $berita->slug }}" class="fw-bold text-decoration-none text-danger">Selengkapnya...</a>
                </p>
                </div>
                @endforeach
              </div>
              
            </div>
          </div>
          <div class="footer-berita text-center mt-3 py-2">
            <a href="/berita" class="btn btn-danger">Berita lainnya</a>
          </div>

        </div>
      </section>
      {{-- End Berita --}}

      {{-- Daftar --}}
        <section id="join" class="section-join parallax-join">
          <div class="container py-5">
            @foreach ($daftars as $daftar)
              <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 mt-3">
                  <div class="d-flex align-items-center mb-3">
                    <div class="stripe me-2"></div>
                    <h5>{{ $daftar->subjudul }}</h5>   
                  </div>
                  <h1 class="fw-bold mb-2">{{ $daftar->judul }}</h1>
                  <p class="mb-3">
                    {!! $daftar->desc !!}</p>
                    <a href="{{ $daftar->link }}" class="btn btn-danger">Daftar Sekarang</a>
                </div>
                <div class="col-lg-6 col-md-12 mt-3">
                  <img src="{{ asset('storage/daftar/'.$daftar->image) }}"  class="img-fluid mb-3" alt="">
                </div>
              </div>
              @endforeach
          </div>
        </section>
      {{-- End Daftar --}}

      {{-- Pelayanan --}}
      <section id="pelayanan" class="py-2">
        <div class="container py-5">
          <div class="text-center mb-5">
            <h3 class="fw-bold">PELAYANAN BKPSDM</h3>
          </div>
          <div class="container">
            <div class="row ">
              @foreach ($pelayanans as $pelayanan)
            
            <div class="col-lg-3 col-md-6 mt-2">
              {{-- <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center"> --}}
                <div class="card text-center">
                  <div class="card-body">
                  <img src="{{ asset('storage/pelayanan/' . $pelayanan->icon) }}" height="150" width="100%" class="card-img-top" alt="...">
                  
                    <h5 class="card-title mt-2">{{ $pelayanan->judul }}</h5>
                    {{-- <p class="card-text">{{ $pelayanan->desc }}</p> --}}
                  </div>
                  <div class="card-footer">
                    <a href="/detailpelayanan/{{ $pelayanan->slug }}" class="btn btn-primary">Informasi</a>
                  </div>
                </div>
              {{-- </div> --}}
            </div>

            @endforeach
            </div>
          </div>


          <div class="text-center py-3">
            <a href="/pelayanan" class="btn btn-danger">Pelayanan lainnya</a>
          </div>

        </div>
        
      </section>
      {{-- And Pelayanan --}}

      {{-- Aplikasi --}}
      <section id="aplikasi" class="py-2 section-aplikasi">
        <div class="container py-5">
          <div class="text-center mb-5">
            <h3 class="fw-bold">APLIKASI BKPSDM</h3>
          </div>
          <div class="container">
            <div class="row ">
              @foreach ($aplikasis as $aplikasi)
            
            <div class="col-lg-3 col-md-6 mt-2">
              {{-- <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center"> --}}
                <div class="card text-center">
                  <div class="card-body">
                  <img src="{{ asset('storage/aplikasi/' . $aplikasi->icon) }}" height="150" width="100%" class="card-img-top" alt="...">
                  
                    {{-- <h5 class="card-title mt-2">{{ $aplikasi->judul }}</h5> --}}
                    {{-- <p class="card-text">{{ $aplikasi->desc }}</p> --}}
                  </div>
                  <div class="card-footer">
                    <a href="{{ $aplikasi->link }}" target="_blank" class="btn btn-primary">{{ $aplikasi->judul }}</a>
                  </div>
                </div>
              {{-- </div> --}}
            </div>

            @endforeach
            </div>
          </div>


          <div class="text-center py-3">
            <a href="/aplikasi" class="btn btn-danger">Aplikasi lainnya</a>
          </div>

        </div>
        
      </section>
      {{-- And Aplikasi --}}

      {{-- Video --}}
      <section id="video" class="py-5 section-video parallax-video">
        
        <div class="container py-5">
          @foreach ($videos1 as $video1)
          <div class="row">
            <div class="col-lg-12 col-md-6">
              <div class="text-center">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $video1->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    {{-- End Video --}}

    <section id="video_youtube" class="py-5 section-videoyoutube">
      <div class="container">
        <div class="header-berita text-center">
          <h2 class="fw-bold">VIDEO BKPSDM</h2>
        </div>
        <div class="row py-5">
          @foreach ($videos as $video)
            <div class="col-lg-4 col-md-6 mt-3">
              <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $video->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
              </iframe>
            </div>
          @endforeach
          
        <div class="footer-berita text-center py-3">
          <a href="/video" class="btn btn-danger">Video lainnya</a>
        </div>

      </div>
    </section>

    {{-- Foto --}}
    <section id="foto" class="section-foto parallax py-5">
      <div class="container py-5">
        <div class="text-center mb-5">
          <h3 class="fw-bold text-danger">GALERY BKPSDM</h3>
        </div>
        <div class="container">
          <div class="row">
            @foreach ($photos as $photo)
          
          <div class="col-lg-3 col-md-6 col-mb-6 col-sm-6 mt-3">
            <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
              <div class="card text-center">
                  <a class="portfolio-popup" href="{{ asset('storage/photo/' . $photo->image) }}">
                    <img src="{{ asset('storage/photo/' . $photo->image) }}" class="img-fluid" alt="">
                  </a>
                {{-- <div class="card-footer"> --}}
                  <p class="text-bold text-black">{{ $photo->judul }}</p>
                {{-- </div> --}}
              </div>
            </div>
          </div>
          @endforeach
          </div>
        </div>

      </div>
      
    </section>



@endsection
