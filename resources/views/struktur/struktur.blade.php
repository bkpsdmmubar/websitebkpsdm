@extends('layouts.website.layouts')

@section('content')
<h1 class="hidden py-1">STRUKTUR</h1>
  <section id="aplikasi" class="py-5">
    <div class="container py-5">
      
      {{-- KEPALA BADAN --}}
      <div class="row d-flex d-flex justify-content-evenly">
        <div class="col col-lg-4 mb-4">
        </div>
        <div class="col col-lg-4 mb-4 d-flex d-flex justify-content-evenly">
          <div class="card d-flex justify-content-center">
            <div class="card-header d-flex justify-content-center">
              <a href="" target="_blank" class="text-center">Kepala BKPSDM</a>
            </div>
            <div class="card-body">
              <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
            </div>
            <div class="card-footer d-flex justify-content-center">
              <p>Nama</p>
            </div>
          </div>
        </div>
        <div class="col col-lg-4 mb-4">
        </div>
      </div>
      {{-- KEPALA BADAN --}}

      {{-- SEKRETARIS --}}
      <div class="row d-flex d-flex justify-content-evenly">
        <div class="col-lg-6 mb-3 d-flex justify-content-center">
          <div class="col-6 d-flex justify-content-center">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
              </div>
              <div class="card-body">
                <p>Pranata Komputer Ahli Utama</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-3 d-flex justify-content-center">
          <div class="col-6 d-flex justify-content-center">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Sekretaris BKPSDM</a>
              </div>
              <div class="card-body mb-3">
                <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
              </div>
              <div class="card-footer d-flex justify-content-center">
                <p>Nama</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- SEKRETARIS --}}

      {{-- SUB BAGIAN --}}
      <div class="row d-flex d-flex justify-content-evenly">
        <div class="col-lg-6 mb-6">
        </div>

        <div class="col-lg-6 mb-6">
          <div class="row">
            <div class="col-lg-6 mb-3 d-flex justify-content-center">
              <div class="row">
                <div class="col py-2">
                  <div class="card">
                    <div class="card-header d-flex justify-content-center">
                      <a href="" target="_blank" class="text-center">Sub Bagian Perencanaan, Aset Dan Evaluasi</a>
                    </div>
                    <div class="card-body">
                      <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                      <p>Nama</p>
                    </div>
                  </div>
                </div>
                <div class="col py-2">
                  <div class="card d-flex justify-content-center">
                    <div class="card-header d-flex justify-content-center">
                      <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
                    </div>
                    <div class="card-body">
                      <p>- Pranata Komputer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-3 d-flex justify-content-center">
              <div class="row">
                <div class="col py-2">
                  <div class="card">
                    <div class="card-header d-flex justify-content-center">
                      <a href="" target="_blank" class="text-center">Sub Bagian Keuangan, Umum Dan Kepegawaian</a>
                    </div>
                    <div class="card-body">
                      <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                      <p>Nama</p>
                    </div>
                  </div>
                </div>
                <div class="col py-2">
                  <div class="card d-flex justify-content-center">
                    <div class="card-header d-flex justify-content-center">
                      <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
                    </div>
                    <div class="card-body">
                      <p>- Pranata Komputer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- SUB BAGIAN --}}

      {{-- BIDANG --}}
      <div class="row d-flex d-flex justify-content-evenly">
        <div class="col col-lg-4 mb-4">
          <div class="col">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Bidang Pengembangan Karir Aparatur</a>
              </div>
              <div class="card-body">
                <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
              </div>
              <div class="card-footer d-flex justify-content-center">
                <p>Nama</p>
              </div>
            </div>
          </div>
          <div class="col py-2">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
              </div>
              <div class="card-body">
                <p>- Pranata Komputer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-lg-4 mb-4">
          <div class="col">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Bidang Mutasi Dan Promosi</a>
              </div>
              <div class="card-body">
                <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
              </div>
              <div class="card-footer d-flex justify-content-center">
                <p>Nama</p>
              </div>
            </div>
          </div>
          <div class="col py-2">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
              </div>
              <div class="card-body">
                <p>- Pranata Komputer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-lg-4 mb-4">
          <div class="col">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Bidang Pengadaan, Pemberhentian Dan Informasi</a>
              </div>
              <div class="card-body">
                <img src="{{ asset('storage/aplikasi/1713113360.jpg')}}" height="150" width="150" class="card-img-top" alt="...">
              </div>
              <div class="card-footer d-flex justify-content-center">
                <p>Nama</p>
              </div>
            </div>
          </div>
          <div class="col py-2">
            <div class="card d-flex justify-content-center">
              <div class="card-header d-flex justify-content-center">
                <a href="" target="_blank" class="text-center">Jabatan Fungsional</a>
              </div>
              <div class="card-body">
                <p>- Pranata Komputer</p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      {{-- BIDANG --}}


    </div>
  </section>
@endsection