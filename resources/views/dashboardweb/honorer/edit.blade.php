@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- Navigasi --}}
              <div class="d-flex">
                <a href="{{ route('honorer') }}" class="btn btn-success">Honorer</a>
              </div>
            {{-- Navigasi --}}

            <p class="card-title py-3">Buat Berita</p>
            <div class="table-responsive">
                <form action="{{ route('honorer.update',$honorer->nik) }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group mb-2">
                    <label for="">NIK KTP</label>
                    <input type="text" name="nik" id="" class="form-control" value="{{ $honorer->nik }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" id="" class="form-control" value="{{ $honorer->no_kk }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Nomor K2</label>
                    <input type="text" name="no_k2" id="" class="form-control" value="{{ $honorer->no_k2 }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Status Honorer</label>
                    <select name="status_k2" id="status_k2" class="form-control">
                        <option value="" class="text-black">Pilih Status Honorer</option>
                        <option {{ $honorer->status_k2 == "Eks THK-II yang pindah instansi" ? 'selected' : '' }} value="Eks THK-II yang pindah instansi">Eks THK-II yang pindah instansi</option>
                        <option {{ $honorer->status_k2 == "Honorer Daerah" ? 'selected' : '' }} value="Honorer Daerah">Honorer Daerah</option>
                    </select>
                  </div>

                  <div class="form-group mb-4">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="" class="form-control" value="{{ $honorer->nama }}">
                  </div>

                  <div class="form-group mb-4">
                    <div class="input-wrapper">
                      <label for="">Tanggal Lahir</label>
                        <input type="text" id="tgl_lhr" name="tgl_lhr" value="{{ $honorer->tgl_lhr }}" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Lahir">
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Tempat lahir</label>
                    <input type="text" name="tempat_lahir" id="" class="form-control" value="{{ $honorer->tempat_lahir }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="" class="text-black">Pilih Jenis Kelamin</option>
                        <option {{ $honorer->jenis_kelamin == "Pria" ? 'selected' : '' }} value="Pria">Pria</option>
                        <option {{ $honorer->jenis_kelamin == "Wanita" ? 'selected' : '' }} value="Wanita">Wanita</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="" class="text-black">Pilih Agama</option>
                        <option {{ $honorer->agama == "Islam" ? 'selected' : '' }} value="Islam">Islam</option>
                        <option {{ $honorer->agama == "Hindu" ? 'selected' : '' }} value="Hindu">Hindu</option>
                        <option {{ $honorer->agama == "Budha" ? 'selected' : '' }} value="Budha">Budha</option>
                        <option {{ $honorer->agama == "Kristen" ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ $honorer->agama == "Katholik" ? 'selected' : '' }} value="Katholik">Katholik</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" name="no_registrasi" id="" class="form-control" value="{{ $honorer->no_registrasi }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenajang Pendidikan Terdaftar</label>
                    <select name="jenjang_pendidikan_daftar" id="jenjang_pendidikan_daftar" class="form-control">
                        <option value="" class="text-black">Pilih Jenajang Pendidikan Terdaftar</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "SD" ? 'selected' : '' }} value="SD">SD</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "SMP" ? 'selected' : '' }} value="SMP">SMP</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "SMA Sederajat" ? 'selected' : '' }} value="SMA Sederajat">SMA Sederajat</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "D-I" ? 'selected' : '' }} value="D-I">D-I</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "D-II" ? 'selected' : '' }} value="D-II">D-II</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "D-III" ? 'selected' : '' }} value="D-III">D-III</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "D-IV" ? 'selected' : '' }} value="D-IV">D-IV</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "S-1" ? 'selected' : '' }} value="S-1">S-1</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "S-2" ? 'selected' : '' }} value="S-2">S-2</option>
                        <option {{ $honorer->jenjang_pendidikan_daftar == "S-3" ? 'selected' : '' }} value="S-3">S-3</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenajang Pendidikan Terdaftar</label>
                    <select name="jenjang_pendidikan_sekarang" id="jenjang_pendidikan_sekarang" class="form-control">
                        <option value="" class="text-black">Pilih Jenajang Pendidikan Terdaftar</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "SD" ? 'selected' : '' }} value="SD">SD</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "SMP" ? 'selected' : '' }} value="SMP">SMP</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "SMA Sederajat" ? 'selected' : '' }} value="SMA Sederajat">SMA Sederajat</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "D-I" ? 'selected' : '' }} value="D-I">D-I</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "D-II" ? 'selected' : '' }} value="D-II">D-II</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "D-III" ? 'selected' : '' }} value="D-III">D-III</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "D-IV" ? 'selected' : '' }} value="D-IV">D-IV</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "S-1" ? 'selected' : '' }} value="S-1">S-1</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "S-2" ? 'selected' : '' }} value="S-2">S-2</option>
                        <option {{ $honorer->jenjang_pendidikan_sekarang == "S-3" ? 'selected' : '' }} value="S-3">S-3</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Pendidikan</label>
                    <input type="text" name="pendidikan" id="" class="form-control" value="{{ $honorer->pendidikan }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Ijazah</label>
                    <input type="text" name="no_ijazah" id="" class="form-control" value="{{ $honorer->no_ijazah }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" id="" class="form-control" value="{{ $honorer->nama_sekolah }}">
                  </div>

                  <div class="form-group mb-4">
                    <div class="input-wrapper">
                      <label for="">Tanggal Lulus</label>
                        <input type="text" id="tgl_lulus" name="tgl_lulus" value="{{ $honorer->tgl_lulus }}" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Lulus">
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Unit Kerja</label>
                    <input type="text" name="unit_kerja" id="" class="form-control" value="{{ $honorer->unit_kerja }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan" id="" class="form-control" value="{{ $honorer->jabatan }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Status Keaktifan</label>
                    <select name="status_keaktifan" id="status_keaktifan" class="form-control">
                        <option value="" class="text-black">Pilih Status Keaktifan</option>
                        <option {{ $honorer->status_keaktifan == "Aktif" ? 'selected' : '' }} value="Aktif">Aktif</option>
                        <option {{ $honorer->status_keaktifan == "Tidak Aktif" ? 'selected' : '' }} value="Tidak Aktif">Tidak Aktif</option>
                        <option {{ $honorer->status_keaktifan == "Lulus CPNS" ? 'selected' : '' }} value="Lulus CPNS">Lulus CPNS</option>
                        <option {{ $honorer->status_keaktifan == "Lulus PPPK" ? 'selected' : '' }} value="Lulus PPPK">Lulus PPPK</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Whatsapp</label>
                    <input type="text" name="no_wa" id="" class="form-control" value="{{ $honorer->no_wa }}">
                  </div>

                  <div class="form-group mb-4">
                    <label for="">Foto Profil</label>
                    <input type="hidden" name="old_image" value="{{ $honorer->image }}">
                    <div>
                      <img src="{{ asset('storage/honorer/'.$honorer->image) }}" class="col-lg-2"  alt="">
                    </div>
                    <input type="file" name="image" id="" class="form-control" value="">
                  </div>

                  <button type="submit" class="btn btn-success">Update</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    

@endsection
