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
                <div class="mx-1"> . </div>
                <a href="{{ route('honorer.create') }}" class="btn btn-primary">Buat Honorer</a>
              </div>
            {{-- Navigasi --}}

            <p class="card-title py-3">Buat Berita</p>
            <div class="table-responsive">
                <form action="{{ route('honorer.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group mb-2">
                    <label for="">NIK KTP</label>
                    <input type="text" name="nik" id="" class="form-control" value="{{ old('nik') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" id="" class="form-control" value="{{ old('no_kk') }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Nomor K2</label>
                    <input type="text" name="no_k2" id="" class="form-control" value="{{ old('no_k2') }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Status Honorer</label>
                    <select name="status_k2" id="status_k2" class="form-control">
                        <option value="" class="text-black">Pilih Status Honorer</option>
                        <option value="Eks THK-II yang pindah instansi">Eks THK-II yang pindah instansi</option>
                        <option value="Honorer Daerah">Honorer Daerah</option>
                    </select>
                  </div>

                  <div class="form-group mb-4">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="" class="form-control" value="{{ old('nama') }}">
                  </div>

                  <div class="form-group mb-4">
                    <div class="input-wrapper">
                      <label for="">Tanggal Lahir</label>
                        <input type="text" id="tgl_lhr" name="tgl_lhr" value="" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Lahir">
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Tempat lahir</label>
                    <input type="text" name="tempat_lahir" id="" class="form-control" value="{{ old('tempat_lahir') }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="" class="text-black">Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="" class="text-black">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Registrasi</label>
                    <input type="text" name="no_registrasi" id="" class="form-control" value="{{ old('no_registrasi') }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenajang Pendidikan Terdaftar</label>
                    <select name="jenjang_pendidikan_daftar" id="jenjang_pendidikan_daftar" class="form-control">
                        <option value="" class="text-black">Pilih Jenajang Pendidikan Terdaftar</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D-I">D-I</option>
                        <option value="D-II">D-II</option>
                        <option value="D-III">D-III</option>
                        <option value="D-IV">D-IV</option>
                        <option value="S-1">S-1</option>
                        <option value="S-2">S-2</option>
                        <option value="S-3">S-3</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Jenajang Pendidikan Sekarang</label>
                    <select name="jenjang_pendidikan_sekarang" id="jenjang_pendidikan_sekarang" class="form-control">
                        <option value="" class="text-black">Pilih Jenajang Pendidikan Sekarang</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D-I">D-I</option>
                        <option value="D-II">D-II</option>
                        <option value="D-III">D-III</option>
                        <option value="D-IV">D-IV</option>
                        <option value="S-1">S-1</option>
                        <option value="S-2">S-2</option>
                        <option value="S-3">S-3</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Pendidikan</label>
                    <input type="text" name="pendidikan" id="" class="form-control" value="{{ old('pendidikan') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Ijazah</label>
                    <input type="text" name="no_ijazah" id="" class="form-control" value="{{ old('no_ijazah') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" id="" class="form-control" value="{{ old('nama_sekolah') }}">
                  </div>

                  <div class="form-group mb-4">
                    <div class="input-wrapper">
                      <label for="">Tanggal Lulus</label>
                        <input type="text" id="tgl_lulus" name="tgl_lulus" value="" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Lulus">
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Unit Kerja</label>
                    <input type="text" name="unit_kerja" id="" class="form-control" value="{{ old('unit_kerja') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan" id="" class="form-control" value="{{ old('jabatan') }}">
                  </div>

                  <div class="form-group mb-3">
                    <label for="">Status Keaktifan</label>
                    <select name="status_keaktifan" id="status_keaktifan" class="form-control">
                        <option value="" class="text-black">Pilih Status Keaktifan</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <option value="Lulus CPNS">Lulus CPNS</option>
                        <option value="Lulus PPPK">Lulus PPPK</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="">Nomor Whatsapp</label>
                    <input type="text" name="no_wa" id="" class="form-control" value="{{ old('no_wa') }}">
                  </div>

                  <div class="form-group mb-5">
                    <label for="">Foto Profil</label>
                    <input type="file" name="image" id="" class="form-control" value="">
                  </div>

                  <button type="submit" class="btn btn-success">Simpan</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    

@endsection
