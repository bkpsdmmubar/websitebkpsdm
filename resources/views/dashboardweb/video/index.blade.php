@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Halaman Video Kegiatan</p>

            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahModal">Tambah Video Kegiatan</a>

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
                            <th>Video Youtube</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($videos as $video)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $video->judul }}</td>
                            <td>
                                <iframe height="150" src="https://www.youtube.com/embed/{{ $video->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $video->id }}" data-bs-toggle="modal">Edit</a>
                                <form action="{{ route('video.delete', $video->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus video Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        <!-- Modal Edit Foto -->
                        <div class="modal fade" id="editModal{{ $video->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Kegiatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('video.update', $video->id ) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $video->id }}">

                                        <div class="form-group mb-4">
                                            <label for="">Judul Video</label>
                                            <input type="text" name="judul" id="" class="form-control" value="{{ $video->judul }}">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="">Kode Youtube</label>
                                            <input type="text" name="youtube_code" id="" class="form-control" value="{{ $video->youtube_code }}">
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        <!-- Modal Edit Video -->
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
<div class="modal fade" id="TambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Video</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('video.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="">Judul Video</label>
                    <input type="text" name="judul" id="" class="form-control" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="">Kode Youtube</label>
                    <input type="text" name="youtube_code" id="" class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal Tambah Foto -->
@endsection