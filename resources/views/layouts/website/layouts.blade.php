<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('assetsweb/icons/lg-munabarat.ico') }}">

        {{-- Meta untuk tampil di Whatsapp --}}
    @if (Request::segment(1) == '')
    <meta property="og:title" content="BKPSDM MUNA BARAT" />
    <meta name="description" content="Badan Kepegawaian dan Pengembangan SDM Muna Barat" />
    <meta property="og:url" content="http://bkpsdm.munabarat.go.id" />
    <meta property="og:description" content="BKPSDM MUNA BARAT" />
    <meta property="og:image" content="{{ asset('assetsweb/icons/lg-munabarat.png') }}" />
    <meta property="og:type" content="article" />
    <title>BKPSDM MUNA BARAT</title>
@elseif (Request::segment(1) == 'detail')
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta name="description" content="{{ $berita->judul }}" />
    <meta property="og:url" content="http://bkpsdm.munabarat.go.id/detailberita/{{ $berita->slug }}" />
    <meta property="og:description" content="{{ $berita->judul }}" />
    @if ($berita->image)
        <meta property="og:image" content="{{ asset('storage/berita/' . $berita->image) }}" />
    @else
        <meta property="og:image" content="{{ asset('assetsweb/icons/lg-munabarat.png') }}" />
    @endif
    <meta property="og:type" content="article" />

    <title>BKPSDM MUNA BARAT | {{ $berita->title }}</title>
@endif

{{-- Meta untuk tampil di Whatsapp --}}




        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        {{-- AOS --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        {{-- CSS --}}
        <link href="{{ asset('assetsweb/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assetsweb/css/magnific.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assetsweb/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assetsweb/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assetsweb/css/bootstrap4.min.css') }}" />

    </head>
    <body>

        {{-- Navbar --}}
        @include('layouts.website.navbar')

        {{-- Content --}}
        @yield('content')


        {{-- Footer --}}
        <section id="footer" class="bg-dark py-5 text-white">
        <div class="container">
            @foreach ($kontaks as $kontak)
            <footer>
            <div class="row">
                {{-- Kolom 1 Navigasi--}}
                <div class="col-12 col-md-3 mb-3">
                <h5 class="fw-bold mb-3 text-white">Navigasi</h5>
                <div class="d-flex">
                    <ul class="nav flex-colomn me-5 text-white">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Berita BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Kegiatan BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Gallery BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pelayanan BKPSDM</a></li>
                    </ul>
                    {{-- <ul class="nav flex-colomn">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Berita BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kegiatan BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Gallery BKPSDM</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pelayanan BKPSDM</a></li>
                    </ul> --}}
                </div>
                </div>

                {{-- Kolom 2 Media Sosial--}}
                <div class="col-12 col-md-3 mb-3">
                <h5 class="fw-bold mb-3">Ikuti kami</h5>
                <div class="d-flex mb-3">
                    <a href="{{ $kontak->instagram }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ asset('assetsweb/icons/ig.jpg') }}" height="30" width="30" class="me-4" alt="">
                    </a>
                    <a href="{{ $kontak->facebook }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ asset('assetsweb/icons/fb.png') }}" height="30" width="30" class="me-4" alt="">
                    </a>
                    <a href="{{ $kontak->tiktok }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ asset('assetsweb/icons/tiktok.png') }}" height="30" width="30" class="me-4" alt="">
                    </a>
                    <a href="{{ $kontak->twitter }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ asset('assetsweb/icons/tw.jpg') }}" height="30" width="30" class="me-4" alt="">
                    </a>
                    <a href="{{ $kontak->youtube }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ asset('assetsweb/icons/youtube.png') }}" height="30" width="30" class="me-4" alt="">
                    </a>
                </div>
                </div>

                {{-- Kolom 3 Kontak--}}
                <div class="col-12 col-md-3 mb-3">
                <h5 class="fw-bold mb-3">Kontak Kami</h5>
                    <ul class="nav flex-colomn">
                    <li class="nav-item mb-2"><a href="{{ $kontak->email }}" class="nav-link p-0 text-white">{{ $kontak->email }}</a></li>
                    <li class="nav-item mb-2"><a href="{{ $kontak->website }}" class="nav-link p-0 text-white">{{ $kontak->website }}</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">{{ $kontak->no_hp }}</a></li>
                    </ul>
                </div>

                {{-- Kolom 4 Alamat--}}
                <div class="col-12 col-md-3 mb-3">
                <h5 class="fw-bold mb-3">Alamat</h5>
                <p>{{ $kontak->alamat }}<br>
                    {{ $kontak->desa }} - {{ $kontak->kecamatan }} <br>
                    {{ $kontak->kabupaten }} - {{ $kontak->provinsi }}
                </p>
                </div>

            </div>
            </footer>
            @endforeach
        </div>
        </section>
        {{-- Footer --}}

        {{-- <section class="bg-light border-top">
        <div class="container py-4">
            <div class="d-flex justify-content-between">
            <div>
                Bkpsdm Muna Barat
            </div>
            <div class="d-flex">
                <p class="me-4">Syart dan Ketentuan</p>
                <p>
                <a href="/kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                </p>
            </div>
            </div>
        </div>
        </section> --}}


        {{-- Sript --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


        <script src="//ajax.googleapis.com/ajx/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ asset('assetsweb/js/magnific.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assetsweb/js/jquery.js') }}"></script>
        <script src="{{ asset('assetsweb/js/dataTables.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assetsweb/js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('assetsweb/js/jquery.dataTables.min.js') }}"></script>

        <script>
            const navbar = document.querySelector(".fixed-top");
            window.onscroll = () => {
            if (window.scrollY > 100) {
                navbar.classList.add("scroll-nav-active");
                navbar.classList.add("text-nav-active");
                // navbar.classList.add("text-nav-active");
                navbar.classList.remove("navbar-dark");
            } else {
                navbar.classList.remove("scroll-nav-active");
                // navbar.classList.add("navbar-dark");
            }
            };
            // Animasi AOS
            AOS.init();

            // Magnific
            // $(document).ready(function() {
            //     $('.image-link').magnificPopup({
            //         type: 'image',
            //         retina : {
            //             ratio: 1,
            //             replaceSrc: function(item, ratio) {
            //                 return item.src.replace(/\.\w+$/, function(m) {
            //                     return '@2x'+ m;
            //                 });
            //             }
            //         }
            //     });
            // });

            // memanggil plugin magnific popup
            $('.portfolio-popup').magnificPopup({
                type: 'image',
                removalDelay: 300,
                mainClass: 'mfp-fade',
                gallery: {
                enabled: true
                },
                zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
                }
            });
            // memanggil datatable membuat callback datatable pada magnific popup agar gambar 
            // yang di munculkan sesuai pada saat pindah paginasi dari 1 ke 2 
            // dan seterusnya
            $(document).ready(function() {
                var table = $('#example').dataTable({
                "fnDrawCallback": function () {
                    $('.portfolio-popup').magnificPopup({
                    type: 'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300,
                        easing: 'ease-in-out',
                        opener: function (openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                        }
                    }
                    });
                    }
                });
            });





        </script>
        {{-- End Sript --}}
    
    
    </body>
</html>