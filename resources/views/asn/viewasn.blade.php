@extends('layouts.admin.tabler')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-2">
                            @php
                                $path = Storage::url('uploads/asn/'.$asn->photo);
                            @endphp
                            <img src="{{ url($path)}}" class="img-thumbnail rounded mx-auto d-block" width="120" height="170">


                        </div>
                        <div class="col-md-10">
                                <div class="row mb-1">
                                    <label for="name" class="col-md-2 col-form-label text-md-star">{{ __('Name') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $asn->nama_lengkap }}</label>
                                        
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nip" class="col-md-2 col-form-label text-md-star">{{ __('NIP') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $asn->nip }}</label>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nip" class="col-md-2 col-form-label text-md-star">{{ __('Jabatan') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $asn->nama_jabatan }}</label>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nip" class="col-md-2 col-form-label text-md-star">{{ __('Unit Kerja') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $asn->nama_skpd }}</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-6 col-lg-12">
                <!-- Cards with tabs component -->
                <div class="card-tabs">
                  <!-- Cards navigation -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a href="#tab-top-1" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Kepangkatan</a></li>
                    <li class="nav-item" role="presentation"><a href="#tab-top-2" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Jabatan</a></li>
                    <li class="nav-item" role="presentation"><a href="#tab-top-3" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Pendidikan</a></li>
                    <li class="nav-item" role="presentation"><a href="#tab-top-4" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Unit Kerja</a></li>
                  </ul>
                  <div class="tab-content">
                    <!-- Content of card #1 -->
                    <div id="tab-top-1" class="card tab-pane active show" role="tabpanel">
                      <div class="card-body">
                        <div class="card-title">Data Riwayat Kepangkatan</div>
                        <div class="col-3">
                            <a href="#" class="btn btn-primary btn-sm" id="btnTambahkepangkatan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M16 19h6"></path>
                                    <path d="M19 16v6"></path>
                                 </svg>
                                Tambah Data
                              </a>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>No.</th>
                                            <th>Pangkat Golongan</th>
                                            <th>Nomor SK Pangkat/Golongan</th>
                                            <th>TMT Golongan</th>
                                            <th>Tanggal Golongan</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayatgolongan as $d )
                                        @php
                                            $path = Storage::url('uploads/riwayatgolongan/'.$d->file_dokumen);
                                        @endphp
                                        <tr style="text-align:center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->pangkat }}, {{ $d->golongan }}</td>
                                            <td>{{ $d->nomor_sk_golongan }}</td>
                                            <td>{{ $d->tmt_golongan }}</td>
                                            <td>{{ $d->tgl_golongan }}</td>
                                            <td>
                                                @if (empty($d->file_dokumen))
                                                   <img src="{{ asset('assets/img/nofoto.png')}}" class="avatar avatar-lg" alt="">
                                                   @else
                                                    <img src="{{ url($path)}}" class="avatar avatar-lg" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-md-center">
                                                    <div>
                                                        <a href="#" kode_riwayat_golongan="{{ $d->kode_riwayat_golongan }}" class="edit-kepangkatan btn btn-success btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                    <div>
                                                        <form action="/asn/{{ $d->kode_riwayat_golongan }}/deleteriwayatgolongan" method="POST" style="margin-left: 3px" enctype="multipart/form-data"> 
                                                            @csrf
                                                            <a class="btn btn-danger delete-confirm btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- {{ $asn->links('vendor.pagination.bootstrap-5')}} --}}
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- Content of card #2 -->
                    <div id="tab-top-2" class="card tab-pane" role="tabpanel">
                      <div class="card-body">
                        <div class="card-title">Data Riwayat Jabatan</div>
                        <div class="col-3">
                            <a href="#" class="btn btn-primary btn-sm" id="btnTambahjabatan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M16 19h6"></path>
                                    <path d="M19 16v6"></path>
                                 </svg>
                                Tambah Data
                              </a>
                        </div>
                        <div class="col-12 mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>No.</th>
                                        <th>Jabatan</th>
                                        <th>Unit Kerja</th>
                                        <th>No SK Jabatan</th>
                                        <th>TMT Jabatan</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayatjabatan as $e )
                                    @php
                                            $path = Storage::url('uploads/riwayatjabatan/'.$d->file_dokumen);
                                        @endphp
                                    <tr style="text-align:center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $e->nama_jabatan }}</td>
                                        <td>{{ $e->nama_unitkerja }}</td>
                                        <td>{{ $e->no_sk_pelantikan }}</td>
                                        <td>{{ $e->tmt_pelantikan }}</td>
                                        <td>
                                            @if (empty($d->file_dokumen))
                                                   <img src="{{ asset('assets/img/nofoto.png')}}" class="avatar avatar-lg" alt="">
                                                   @else
                                                    <img src="{{ url($path)}}" class="avatar avatar-lg" alt="">
                                                @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-md-center">
                                                <div>
                                                    <a href="#" kode_riwayat_jabatan="{{ $e->kode_riwayat_jabatan }}" class="edit btn btn-success btn-sm" style="margin-left: 3px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                </div>
                                                <div>
                                                <div>
                                                    <form action="/asn/{{ $e->kode_riwayat_jabatan }}/deleteriwayatgolongan" method="POST" style="margin-left: 3px" enctype="multipart/form-data"> 
                                                        @csrf
                                                        <a class="btn btn-danger delete-confirm btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{-- {{ $asn->links('vendor.pagination.bootstrap-5')}} --}}
                        </div>
                      </div>
                    </div>
                    <!-- Content of card #3 -->
                    <div id="tab-top-3" class="card tab-pane" role="tabpanel">
                      <div class="card-body">
                        <div class="card-title">Data Riwayat Pendidikan</div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Whatsapp</th>
                                        <th>SKPD</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>{{ $asn->nip }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex justify-content-md-center">
                                                <div>
                                                    <a href="#" nip="{{ $asn->nip }}" class="edit btn btn-success btn-sm" style="margin-left: 3px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                </div>
                                                <div>
                                                <div>
                                                    <form action="/asn/{{ $asn->nip }}/delete" method="POST" style="margin-left: 3px"> 
                                                        @csrf
                                                        <a class="btn btn-danger delete-confirm btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- {{ $asn->links('vendor.pagination.bootstrap-5')}} --}}
                        </div>
                      </div>
                    </div>
                    <!-- Content of card #4 -->
                    <div id="tab-top-4" class="card tab-pane" role="tabpanel">
                      <div class="card-body">
                        <div class="card-title">Data Riwayat Unit Kerja</div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Whatsapp</th>
                                        <th>SKPD</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>{{ $asn->nip }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex justify-content-md-center">
                                                <div>
                                                    <a href="#" nip="{{ $asn->nip }}" class="edit btn btn-success btn-sm" style="margin-left: 3px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                </div>
                                                <div>
                                                <div>
                                                    <form action="/asn/{{ $asn->nip }}/delete" method="POST" style="margin-left: 3px"> 
                                                        @csrf
                                                        <a class="btn btn-danger delete-confirm btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- {{ $asn->links('vendor.pagination.bootstrap-5')}} --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

{{-- Star Modals Input Golongan --}}
<div class="modal modal-blur fade" id="modal-inputkepangkatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Pangkat/Golongan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/asn/storeriwayatgolongan"  method="POST" id="frmGolongan" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-2">
                            <input type="hidden" id="nip" name="nip" value="{{ Request('nip')}}" class="form-control" >
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_golongan" id="kode_golongan" class="form-control">
                                <option value="">Pilih Golongan</option>
                                @foreach ($golongan as $j)
                                <option value="{{ $j->kode_golongan }}">{{ $j->golongan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-icon mb-2">
                            <input type="text" id="nomor_sk_golongan" name="nomor_sk_golongan" value="" class="form-control" placeholder="Nomor SK Pangkat/Golongan">
                        </div>

                        <div class="form-group boxed mt-2 mb-2">
                            <div class="input-wrapper">
                                <input type="text" id="tmt_golongan" name="tmt_golongan" value="" autocomplete="off" class="form-control datepicker" placeholder="TMT Golongan">
                            </div>
                        </div>

                        <div class="form-group boxed mt-2 mb-2">
                            <div class="input-wrapper">
                                <input type="text" id="tgl_golongan" name="tgl_golongan" value="" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Golongan">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="file" id="file_dokumen" name="file_dokumen" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 14l11 -11"></path><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path></svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>
{{-- End Modals Input Golongan --}}

{{-- star Edit Golongan --}}
<div class="modal modal-blur fade" id="modal-editkepangkatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Riwayat Pangkat Golongan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditformeditkepangkatan">

        </div>
        </div>
    </div>
</div>
{{-- End Modals Edit Golongan --}}

{{-- Star Modals Input Jabatan --}}
<div class="modal modal-blur fade" id="modal-inputjabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Jabatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/asn/storeriwayatjabatan"  method="POST" id="frmJabatan" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-2">
                            <input type="hidden" id="nip" name="nip" value="{{ Request('nip')}}" class="form-control" >
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_jenis_mutasi" id="kode_jenis_mutasi" class="form-control">
                                <option value="">Pilih Jenis  Mutasi</option>
                                @foreach ($jenismutasi as $j)
                                <option value="{{ $j->kode_jenis_mutasi }}">{{ $j->nama_jenis_mutasi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_skpd" id="kode_skpd" class="form-control">
                                <option value="">Pilih SKPD</option>
                                @foreach ($skpd as $j)
                                <option value="{{ $j->kode_skpd }}">{{ $j->nama_skpd }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_unitkerja" id="kode_unitkerja" class="form-control">
                                <option value="">Pilih Unit Kerja</option>
                                @foreach ($unitkerja as $j)
                                <option value="{{ $j->kode_unitkerja }}">{{ $j->nama_unitkerja }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_jenis_jabatan" id="kode_jenis_jabatan" class="form-control">
                                <option value="">Pilih Jenis Jabatan</option>
                                @foreach ($jenisjabatan as $j)
                                <option value="{{ $j->kode_jenis_jabatan }}">{{ $j->jenis_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group boxed mb-2">
                            <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $j)
                                <option value="{{ $j->kode_jabatan }}">{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mt-2 mb-2">
                            <div class="input-wrapper">
                                <input type="text" id="tmt_golongan" name="tmt_golongan" value="" autocomplete="off" class="form-control datepicker" placeholder="TMT Golongan">
                            </div>
                        </div>

                        <div class="form-group boxed mt-2 mb-2">
                            <div class="input-wrapper">
                                <input type="text" id="tgl_golongan" name="tgl_golongan" value="" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Golongan">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="file" id="file_dokumen" name="file_dokumen" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 14l11 -11"></path><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path></svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>
{{-- End Modals Input Jabatan --}}

{{-- star Edit Jabatan --}}
<div class="modal modal-blur fade" id="modal-editkepangkatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Riwayat Pangkat Golongan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditformeditjabatan">

        </div>
        </div>
    </div>
</div>
{{-- End Modals Edit Jabatan --}}

@endsection

@push('myscript')
{{-- <script src="{{ asset('tabler/dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{ asset('tabler/dist/js/demo.min.js?1692870487')}}" defer></script> --}}

<script>

    $(function(){
        $("#nip").mask("000000000000000000");
        $("#nomor_hp").mask("0000000000000");
        $("#btnTambahkepangkatan").click(function(){
            $("#modal-inputkepangkatan").modal("show");
        });
        $("#btnTambahjabatan").click(function(){
            $("#modal-inputjabatan").modal("show");
        });

        $(".edit-kepangkatan").click(function(){
            var kode_riwayat_golongan = $(this).attr('kode_riwayat_golongan');
            $.ajax({
                type    :'POST',
                url     :'/asn/editriwayatgolongan',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        kode_riwayat_golongan     : kode_riwayat_golongan
                },
                success:function(respond){
                    $("#loadeditformeditkepangkatan").html(respond);
                }
            });
            $("#modal-editkepangkatan").modal("show");
        });

        $(".edit").click(function(){
            var kode_riwayat_golongan = $(this).attr('kode_riwayat_golongan');
            $.ajax({
                type    :'POST',
                url     :'/asn/editriwayatgolongan',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        kode_riwayat_golongan     : kode_riwayat_golongan
                },
                success:function(respond){
                    $("#loadeditformeditkepangkatan").html(respond);
                }
            });
            $("#modal-editkepangkatan").modal("show");
        });

        var currYear = (new Date()).getFullYear();
        $(".datepicker").datepicker({
            format: "yyyy-mm-dd"
        });

        $(".delete-confirm").click(function(e){
            var form = $(this).closest('form');
            e.preventDefault();
            Swal.fire({
                title: 'Yakin Hapus Data ini?',
                text: "Jika Ya Data Akan Terhapus Permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data ini !'
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                    'Deleted!',
                    'Data Berhasil Di Hapus',
                    'success'
                    )
                }
                })
        });

    $("#frmGolongan").submit(function(){
        var kode_riwayat_golongan   = $("#kode_riwayat_golongan").val();
        var nip                     = $("#nip").val();
        var kode_golongan           = $("#kode_golongan").val();
        var nomor_sk_golongan       = $("#nomor_sk_golongan").val();
        var tmt_golongan            = $("#nomor_hp").val();
        var tgl_golongan            = $("#tgl_golongan").val();
        var file_dokumen            = $("#file_dokumen").val();
        if(kode_golongan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Pangkat Golongan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
            return false;
        
        } else if (nomor_sk_golongan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nomor SK Pangkat Golongan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#nomor_sk_golongan").focus();
            });
            return false;
        } else if (tgl_golongan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Tanggal SK Pangkat Golongan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#tgl_golongan").focus();
            });
            return false;
        } else if (tgl_golongan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Tanggal SK Pangkat Golongan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#tgl_golongan").focus();
            });
            return false;
        } else if (file_dokumen==""){
            Swal.fire({
                title: 'warning!',
                text: 'File SK Pangkat Golongan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#file_dokumen").focus();
            });
            return false;
        }
    });
});
</script>
@endpush


