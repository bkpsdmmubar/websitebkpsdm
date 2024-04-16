@extends('layouts.website.admin.layouts')

{{-- @section('content') --}}

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">  
                    <p class="card-title">Halaman Data Honorer</p>

                    <a href="{{ route('honorer.create') }}" class="btn btn-primary">Tambah Data Honorer</a>

                    <div class="table-responsive py-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No NIK</th>
                                    <th>No KK</th>
                                    <th>Nama</th>
                                    <th>Profil</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($honorers as $honorer)
                                <tr>
                                    <td>{{  $no++ }}</td>
                                    <td>{{ $honorer->nik }}</td>
                                    <td>{{ $honorer->no_kk }}</td>
                                    <td>{{ $honorer->nama }}</td>   
                                    <td>
                                        <img src="{{ asset('storage/honorer/' . $honorer->image) }}" height="100" alt="">
                                    </td>
                                    <td>{{ $honorer->status_keaktifan }}</td>                        
                                    <td>
                                        <a href="{{ route('honorer.edit',$honorer->nik) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('honorer.delete',$honorer->nik) }}" method="POST" class="d-inline">
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