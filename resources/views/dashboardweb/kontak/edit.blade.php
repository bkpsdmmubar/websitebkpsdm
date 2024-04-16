@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                <div class="card-body">
                    
                    <p class="card-title">Edit Kontak</p>
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

                    <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">
                        @csrf
                        <div class="row"> 
                            <div class="col-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Alamat
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="alamat" value="{{ $kontak->alamat }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Desa
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="desa" value="{{ $kontak->desa }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kecamatan
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="kecamatan" value="{{ $kontak->kecamatan }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kabupaten
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="kabupaten" value="{{ $kontak->kabupaten }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Provinsi
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="provinsi" value="{{ $kontak->provinsi }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="email" value="{{ $kontak->email }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Website
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="website" value="{{ $kontak->website }}">
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Nomor Telepon
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="no_hp" value="{{ $kontak->no_hp }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Instagram
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="instagram" value="{{ $kontak->instagram }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Facebook
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="facebook" value="{{ $kontak->facebook }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tiktok
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="tiktok" value="{{ $kontak->tiktok }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Snack Video
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="snacvideo" value="{{ $kontak->snacvideo }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Twitter
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="twitter" value="{{ $kontak->twitter }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Youtube
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="youtube" value="{{ $kontak->youtube }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                    <button class="btn btn-warning w-100" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection