@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Halaman Pelayanan</p>

            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadModal">Tambah Pelayanan</a>

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
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pelayanans as $pelayanan)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $pelayanan->judul }}</td>
                            <td>{{ $pelayanan->desc }}</td>
                            <td>
                                <img src="{{ asset('storage/pelayanan/' . $pelayanan->icon) }}" height="150" alt="">
                            </td>
                            
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $pelayanan->id }}" data-bs-toggle="modal">Edit</a>
                                <form action="{{ route('pelayanan.delete', $pelayanan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus pelayanan Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        <!-- Modal Edit Foto -->
                        <div class="modal fade" id="editModal{{ $pelayanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Kegiatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pelayanan.update', $pelayanan->id ) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $pelayanan->id }}">

                                        <div class="form-group mb-4">
                                            <label for="">Judul</label>
                                            <input type="text" name="judul" id="" class="form-control" value="{{ $pelayanan->judul }}">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="">Deskripsi</label>
                                            <input type="text" name="desc" id="" class="form-control" value="{{ $pelayanan->desc }}">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="">Icon</label>
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/pelayanan/'.$pelayanan->icon) }}" class="col-lg-4"  alt="">
                                            </div>
                                            <input type="hidden" name="old_icon" value="{{ $pelayanan->icon }}">
                                            <input type="file" name="icon" id="" class="form-control" value="">
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>

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
            <form action="{{ route('pelayanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="">Judul</label>
                    <input type="text" name="judul" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Deskripsi</label>
                    <input type="text" name="desc" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Icon</label>
                    <input type="file" name="icon" id="" class="form-control" value="">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>

            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal Tambah Foto -->
@endsection