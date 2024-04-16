        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow' }}">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/icons/lg-munabarat.png') }}" height="55" width="55" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Struktur</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Kegiatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Pelayanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/foto">Galery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/berita">Berita</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/berita">Data Honorer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/kontak">Kontak</a>
                  </li>
                </ul>
                <form class="d-flex">
                  {{-- <button class="btn btn-danger">Login</button> --}}
                  <a class="btn btn-danger" href="/login">Login</a>
                </form>
              </div>
            </div>
          </nav>
        {{-- End Navbar --}}