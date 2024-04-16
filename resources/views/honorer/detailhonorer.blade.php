@extends('layouts.website.layouts')

@section('content')
    
<section id="detail" class="py-3" style="margin-top: 100px">
    <div class="container py-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('storage/honorer/'.$honorer->image) }}" class="img-fluid mb-3" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th class="py-1">Nama Lengkap</th>
                                                </tr>
                                                <tr>
                                                    <th class="py-2">N I K</th>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Nomor KK</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Nomor K2</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Status K2</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Status Aktif</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Nomor WhatsApp</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-9">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th class="py-1">
                                                        : {{ $honorer->nama }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="py-2">
                                                        : {{ $honorer->nik }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->no_kk }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->no_k2 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->status_k2 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->status_keaktifan }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->no_wa }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>         
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="py-2">Jabatan</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Tanggal Lahir</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Tempat Lahir</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Jenis Kelamin</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Agama</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Nomor Registrasi</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Jenjang Pendidikan Terdaftar</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Jenjang Pendidikan Sekarang</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Pendidikan</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Nomor Ijazah</td>

                                                <tr>
                                                    <td class="py-2">Nama Sekolah</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Tanggal Lulus</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Unit Kerja</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-9">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->jabatan }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->tgl_lhr }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->tempat_lahir }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->jenis_kelamin }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->agama }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->no_registrasi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->jenjang_pendidikan_daftar }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->jenjang_pendidikan_sekarang }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->pendidikan }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->no_ijazah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->nama_sekolah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->tgl_lulus }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">
                                                        : {{ $honorer->unit_kerja }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary col-3" aria-current="page" href="/honorer">Data Honorer</a>
            </div>
        </div>
    </div>

</section>

@endsection