@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Halaman Daftar</p>

            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadModal">Tambah Daftar</a>

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
                            <th>Sub Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($daftars as $daftar)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $daftar->judul }}</td>
                            <td>{{ $daftar->subjudul }}</td>
                            <td>{!! $daftar->desc !!}</td>
                            <td>
                                <img src="{{ asset('storage/daftar/' . $daftar->image) }}" height="150" alt="">
                            </td>
                            <td>{{ $daftar->link }}</td>
                            
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $daftar->id }}" data-bs-toggle="modal">Edit</a>
                                <form action="{{ route('daftar.delete', $daftar->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus daftar Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        <!-- Modal Edit Foto -->
                        <div class="modal fade" id="editModal{{ $daftar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Daftar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('daftar.update', $daftar->id ) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $daftar->id }}">

                                        <div class="form-group mb-4">
                                            <label for="">Judul</label>
                                            <input type="text" name="judul" id="" class="form-control" value="{{ $daftar->judul }}">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="">Sub Judul</label>
                                            <input type="text" name="subjudul" id="" class="form-control" value="{{ $daftar->subjudul }}">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="">Deskripsi</label>
                                            <textarea name="desc" id="summernote">
                                             {!! $daftar->desc !!}
                                            </textarea>
                                          </div>

                                        <div class="form-group mb-4">
                                            <label for="">Gambar</label>
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/daftar/'.$daftar->image) }}" class="col-lg-4"  alt="">
                                            </div>
                                            <input type="hidden" name="old_image" value="{{ $daftar->image }}">
                                            <input type="file" name="image" id="" class="form-control" value="">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="">Link</label>
                                            <input type="text" name="link" id="" class="form-control" value="{{ $daftar->link }}">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="">Judul</label>
                    <input type="text" name="judul" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Sub Judul</label>
                    <input type="text" name="subjudul" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Deskripsi</label>
                    <div>
                        <textarea name="desc" id="desc" cols="55" rows="10"></textarea>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="">Gambar</label>
                    <input type="file" name="image" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Link</label>
                    <input type="text" name="link" id="" class="form-control" value="">
                </div>


                <button type="submit" class="btn btn-success">Simpan</button>

            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal Tambah Foto -->
@endsection