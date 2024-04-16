@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            
            <p class="card-title">Manajemen Berita</p>

            <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi </strong>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Gambar</th>
                            {{-- <th>Tag Berita</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($beritas as $berita)
                        <tr>
                            <td>{{  $no++ }}</td>
                            <td>{{ $berita->judul }}</td>
                            <td>
                                <img src="{{ asset('storage/berita/' . $berita->image) }}" height="100" alt="">
                            </td>
                            {{-- <td>{{ $berita->id_tag_berita }}</td> --}}
                            <td>
                                <a href="{{ route('berita.edit',$berita->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('berita.delete', $berita->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Yakin Menghapus Berita Ini? Jika Yakin Silahkan Click OK')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    
@endsection