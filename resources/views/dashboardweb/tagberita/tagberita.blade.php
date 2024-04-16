@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Halaman Tag Berita</p>

            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadModal">Tambah Tag Berita</a>

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
                            <th>Tag Berita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($tagberitas as $tagberita)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $tagberita->tag_berita }}</td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $tagberita->id }}" data-bs-toggle="modal">Edit</a>
                                <form action="{{ route('tagberita.deletetagberita', $tagberita->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus Tag Berita Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        <!-- Modal Edit Foto -->
                        <div class="modal fade" id="editModal{{ $tagberita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tag Berita</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('tagberita.updatetagberita', $tagberita->id ) }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $tagberita->id }}">

                                        <div class="form-group mb-4">
                                            <label for="">Tag Berita</label>
                                            <input type="text" name="tag_berita" id="" class="form-control" value="{{ $tagberita->tag_berita }}">
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
            <form action="{{ route('tagberita.storetagberita') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="">Tag Berita</label>
                    <input type="text" name="tag_berita" id="" class="form-control" value="">

                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal Tambah Foto -->
@endsection