@extends('layouts.website.layouts')

{{-- @section('content') --}}

@section('content')
        <div class="content-wrapper py-2"  style="margin-top: 100px">
            <div class="row ">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($kontaks as $kontak)
                            <div class="row"> 
                                <div class="col-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Alamat
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="alamat" value="{{ $kontak->alamat }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Desa
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="desa" value="{{ $kontak->desa }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kecamatan
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="kecamatan" value="{{ $kontak->kecamatan }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kabupaten
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="kabupaten" value="{{ $kontak->kabupaten }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Provinsi
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="provinsi" value="{{ $kontak->provinsi }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Email
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="email" value="{{ $kontak->email }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Website
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="website" value="{{ $kontak->website }}" disabled>
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
                                                    <input type="text" class="form-control" name="no_hp" value="{{ $kontak->no_hp }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Instagram
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="instagram" value="{{ $kontak->instagram }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Facebook
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="facebook" value="{{ $kontak->facebook }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tiktok
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="tiktok" value="{{ $kontak->tiktok }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Snack Video
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="snacvideo" value="{{ $kontak->snacvideo }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Twitter
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="twitter" value="{{ $kontak->twitter }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Youtube
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="youtube" value="{{ $kontak->youtube }}" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection