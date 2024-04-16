@extends('layouts.website.layouts')

@section('content')
  <h1 class="mb-5">Pengecekan Data Honorer Kabupaten Muna Barat</h1>

  {{-- Foto --}}
  <section id="foto" class="section py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center ">
        <div class="d-flex align-items-center">
            <h5 class="fw-bold text-danger">Hasil Pencarian Data Honorer Kabupaten Muna Barat</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <a class="nav-link btn btn-primary col-3" aria-current="page" href="/honorer">Cari Data Honorer</a>
        </div>
        {{-- <a class="nav-link btn btn-success col-3" aria-current="page" href="/honorer">Cari Data Honorer</a> --}}
          {{-- <div class="col-6">
            <p class="text-black">Cari Data Honorer :</p>
            <form action="/honorer/caridata" method="GET">
              <input class="form-control mb-2" type="text" name="caridata" placeholder="Masukkan NIK KTP Anda" value="{{ old('caridata') }}">
              <input class="btn btn-primary" type="submit" value="Cari Data">
            </form>
          </div> --}}

          <div class="table-responsive py-3">
              <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>No NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Tanggal lahir</th>
                        <th>Unit Kerja</th>
                        <th>Status Honorer</th>
                        <th>Profil</th>
                        <th>Status</th>
                        <th>Profil</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($honorer as $honorer)
                    <tr>
                        <td>{{  $no++ }}</td>
                        <td>{{ $honorer->nik }}</td>
                        <td>{{ $honorer->no_kk }}</td>
                        <td>{{ $honorer->nama }}</td>
                        <td>{{ $honorer->tgl_lhr }}</td>
                        <td>{{ $honorer->unit_kerja }}</td>
                        <td>{{ $honorer->status_k2 }}</td>
                        <td>
                          <img src="{{ asset('storage/honorer/' . $honorer->image) }}" height="100" alt="">
                        </td>
                        <td>{{ $honorer->status_keaktifan }}</td>    
                        <td>
                            <a href="{{ route('honorer.detailhonorer',$honorer->nik) }}" class="btn btn-warning">View</a>
                        </td>                       
                    </tr>  
                    @endforeach
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </section>

@endsection