        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow' }}">
          <div class="container">
            <a class="navbar-brand" href="/">
              <img src="{{ asset('assetsweb/icons/lg-munabarat.png') }}" height="55" width="55" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-1">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/struktur">Struktur</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/pelayanan">Pelayanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/photo">Photo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/video">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/honorer">Data Honorer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/aplikasi">Aplikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/kontak">Kontak</a>
                </li>
              </ul>
              <form class="d-flex">
                {{-- <button class="btn btn-danger">Login</button> --}}
                <a class="btn btn-danger" target="_blank" href="/login">Login</a>
              </form>
            </div>
          </div>
        </nav>
      {{-- End Navbar --}}


{{-- <nav class="navbar fixed-top">
  <div class="container mx-auto">
    <div class="flex justify-between">
      <img src="{{ asset('assetsweb/icons/lg-munabarat.png') }}" height="55" width="55" alt="">
      <img src="{{ asset('assetsweb/icons/toggle.png') }}" height="25" width="25" alt="">
    </div>
  </div>
</nav> --}}

