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
                <a href="{{ route('berita') }}">Berita</a>
                <div class="mx-1"> . </div>
                <a href="">Buat Berita</a>
              </div>
            {{-- Navigasi --}}

            <p class="card-title py-3">Buat Berita</p>
            <div class="table-responsive">
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-4">
                    <label for="">Judul Berita</label>
                    <input type="text" name="judul" id="" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                    @error('judul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="">Foto Berita</label>
                    <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror" value="">
                    @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="">Isi Berita</label>
                    <textarea name="desc" id="summernote">
                      {{ old('desc') }}
                    </textarea>
                    @error('desc')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
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