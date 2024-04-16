@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Halaman Struktur</p>

            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadModal">Tambah Struktur ASN</a>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi </strong>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Menampilkan Pesan Error --}}
            @if (count($errors)>0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif


            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIP</th>
                            <th>Pangkat/Golongan</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($strukturs as $struktur)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $struktur->nama }}</td>
                            <td>{{ $struktur->nip }}</td>
                            <td>{{ $struktur->golongan }}</td>
                            <td>{{ $struktur->nama_jabatan }}</td>
                            <td>{{ $struktur->bidang }}</td>
                            <td>
                                <img src="{{ asset('storage/struktur/' . $struktur->image) }}" height="150" alt="">
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $struktur->id }}" data-bs-toggle="modal">Edit</a>
                                <form action="{{ route('struktur.delete', $struktur->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus struktur Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        <!-- Modal Edit Foto -->
                        <div class="modal fade" id="editModal{{ $struktur->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Kegiatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('struktur.update', $struktur->id ) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $struktur->id }}">
                                        <div class="row mt-2">
                                            <label for="">Nama Lengkap</label>
                                            <input name="nama" class="form-control mt-2" list="datalistOptions" id="exampleDataList" value="{{ $struktur->nama }}">
                                            <datalist id="datalistOptions">
                                                @foreach ($asn as $j)
                                                <option value="{{ $j->nama_lengkap }}">{{ $j->nama_lengkap }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="row mt-2">
                                            <label for="">N I P</label>
                                            <input name="nip" class="form-control mt-2" list="datalistnip" id="exampleDataList" value="{{ $struktur->nip }}">
                                            <datalist id="datalistnip">
                                                @foreach ($asn as $j)
                                                <option value="{{ $j->nip }}">{{ $j->nama_lengkap }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="row mt-2">
                                            <label for="">Golongan</label>
                                            <input name="kode_pangkatgol" class="form-control mt-2" list="datalistpangkat" id="exampleDataList" value="{{ $struktur->golongan }}">
                                            <datalist id="datalistpangkat">
                                                @foreach ($pangkat as $j)
                                                <option value="{{ $j->kode_pangkatgol }}">{{ $j->golongan }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="row mt-2">
                                            <label for="">Jabatan</label>
                                            <input name="kode_jabatan" class="form-control mt-2" list="datalistjabatan" id="exampleDataList" value="{{ $struktur->nama_jabatan }}">
                                            <datalist id="datalistjabatan">
                                                @foreach ($jabatan as $j)
                                                <option value="{{ $j->kode_jabatan }}">{{ $j->nama_jabatan }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Bidang</label>
                                            <select name="bidang" id="bidang" class="form-control" value="{{ $struktur->bidang }}">
                                                <option value="" class="text-black">Pilih Bidang</option>
                                                <option value="Kepala">Kepala</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Bidang Pengembangan">Bidang Pengembangan</option>
                                                <option value="Bidang Mutasi">Bidang Mutasi</option>
                                                <option value="Bidang Pemberhentian">Bidang Pemberhentian</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="">Foto Profil</label>
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/struktur/'.$struktur->image) }}" class="col-lg-4"  alt="">
                                            </div>
                                            <input type="hidden" name="old_image" value="{{ $struktur->image }}">
                                            <input type="file" name="image" id="" class="form-control" value="">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        <!-- Modal Edit Foto -->
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Tambah Foto -->
<div class="modal fade" id="UploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Foto Kegiatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <label for="">Nama Lengkap</label>
                    <input name="nama" class="form-control mt-2" list="datalistOptions" id="exampleDataList" placeholder="Cari Nama">
                    <datalist id="datalistOptions">
                        @foreach ($asn as $j)
                        <option value="{{ $j->nama_lengkap }}">{{ $j->nama_lengkap }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="row mt-2">
                    <label for="">N I P</label>
                    <input name="nip" class="form-control mt-2" list="datalistnip" id="exampleDataList" placeholder="Cari NIP">
                    <datalist id="datalistnip">
                        @foreach ($asn as $j)
                        <option value="{{ $j->nip }}">{{ $j->nama_lengkap }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="row mt-2">
                    <label for="">Golongan</label>
                    <input name="kode_pangkatgol" class="form-control mt-2" list="datalistpangkat" id="exampleDataList" placeholder="Cari Golongan">
                    <datalist id="datalistpangkat">
                        @foreach ($pangkat as $j)
                        <option value="{{ $j->kode_pangkatgol }}">{{ $j->golongan }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="row mt-2">
                    <label for="">Jabatan</label>
                    <input name="kode_jabatan" class="form-control mt-2" list="datalistjabatan" id="exampleDataList" placeholder="Cari Jabatan">
                    <datalist id="datalistjabatan">
                        @foreach ($jabatan as $j)
                        <option value="{{ $j->kode_jabatan }}">{{ $j->nama_jabatan }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="form-group mb-3">
                    <label for="">Bidang</label>
                    <select name="bidang" id="bidang" class="form-control">
                        <option value="" class="text-black">Pilih Bidang</option>
                        <option value="Kepala">Kepala</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bidang Pengembangan">Bidang Pengembangan</option>
                        <option value="Bidang Mutasi">Bidang Mutasi</option>
                        <option value="Bidang Pemberhentian">Bidang Pemberhentian</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Foto Profil</label>
                    <input type="file" name="image" id="" class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal Tambah Foto -->
@endsection