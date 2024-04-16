@extends('layouts.admin.tabler')
@section('content')

{{-- <style>
    .datepicker-modal {
        max-height: 430px !important;
    }
    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }

    #keterangan {
        height: 6rem !important;
    }
</style> --}}

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data ASN
          </h2>
        </div>
      </div>
    </div>
  </div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if (Session::get('success'))
                                    <div class="alert alert-success" >
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('warning'))
                                    <div class="alert alert-warning" >
                                        {{ Session::get('warning') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <a href="#" class="btn btn-primary" id="btnTambahasn">
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

                            <div class="col-3">
                                <a href="/exportasn" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                     </svg>
                                    Export Data
                                  </a>
                        </div>
                    </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/asn" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_asn" id="nama_asn" class="form-control" placeholder="Cari Nama ASN" value="{{ Request('nama_asn')}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_skpd" class="form-select" id="kode_skpd" placeholder="Cari Nama ASN">
                                                <option value="">SKPD</option>
                                                @foreach ($skpd as $d)
                                                    <option {{ Request('kode_skpd')==$d->kode_skpd ? 'selected' : ''  }} value="{{ $d->kode_skpd}}">{{ $d->nama_skpd}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>Cari ASN
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row  mt-3">
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
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asn as $d)
                                        @php
                                            $path = Storage::url('uploads/asn/'.$d->photo);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nip}}</td>
                                            <td>{{ $d->nama_lengkap}}</td>
                                            <td>{{ $d->nama_jabatan}}</td>
                                            <td>{{ $d->nomor_hp}}</td>
                                            <td>{{ $d->nama_skpd}}</td>
                                            <td>
                                                @if (empty($d->photo))
                                                   <img src="{{ asset('assets/img/nofoto.png')}}" class="avatar avatar-lg" alt="">
                                                   @else
                                                    <img src="{{ url($path)}}" class="avatar avatar-lg" alt="">
                                                @endif
                                            </td>
                                           
                                            <td>
                                                <div class="d-flex justify-content-md-center">
                                                    <div>
                                                        <a href="/asn/{{ $d->nip }}/viewasn" class="btn btn-warning btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" nip="{{ $d->nip }}" class="edit btn btn-success btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/konfigurasi/{{ $d->nip }}/setjamkerja" class="btn btn-info btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-question" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.975 11.33a9 9 0 1 0 -5.717 9.06" /><path d="M12 7v5l2 2" /><path d="M19 22v.01" /><path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/asn/{{ Crypt::encrypt($d->nip) }}/resetpassword" class="btn btn-warning btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17v4" /><path d="M10 20l4 -2" /><path d="M10 18l4 2" /><path d="M5 17v4" /><path d="M3 20l4 -2" /><path d="M3 18l4 2" /><path d="M19 17v4" /><path d="M17 20l4 -2" /><path d="M17 18l4 2" /><path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <form action="/asn/{{ $d->nip }}/delete" method="POST" style="margin-left: 3px"> 
                                                            @csrf
                                                            <a class="btn btn-danger delete-confirm btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $asn->links('vendor.pagination.bootstrap-5')}}
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Data Modals Input asn --}}

<div class="modal modal-blur fade" id="modal-inputasn" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data asn</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/asn/store"  method="POST" id="frmAsn" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">

                        <div class="input-icon mb-2">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path></svg>
                            </span>
                            <input type="text" maxlength="18" id="nip" name="nip" value="" class="form-control" placeholder="NIP Bari (18 Digit)">
                        </div>

                        <div class="input-icon mb-2">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                            </span>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="" class="form-control" placeholder="Nama Lengkap">
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_pangkatgol" id="kode_pangkatgol" class="form-control">
                                <option value="">Pilih Golongan</option>
                                @foreach ($pangkat as $j)
                                <option value="{{ $j->kode_pangkatgol }}">{{ $j->golongan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_agama" id="kode_agama" class="form-control">
                                <option value="">Pilih Agama</option>
                                @foreach ($agama as $j)
                                <option value="{{ $j->kode_agama }}">{{ $j->agama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_jenis_kawin" id="kode_jenis_kawin" class="form-control">
                                <option value="">Pilih Jenis Pernikahan</option>
                                @foreach ($kawin as $j)
                                <option value="{{ $j->kode_jenis_kawin }}">{{ $j->jenis_kawin }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-icon mb-2">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 2h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M20 14h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M16.707 2.293a1 1 0 0 1 .083 1.32l-.083 .094l-1.293 1.293h3.586a3 3 0 0 1 2.995 2.824l.005 .176v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-3a1 1 0 0 0 -.883 -.993l-.117 -.007h-3.585l1.292 1.293a1 1 0 0 1 -1.32 1.497l-.094 -.083l-3 -3a.98 .98 0 0 1 -.28 -.872l.036 -.146l.04 -.104c.058 -.126 .14 -.24 .245 -.334l2.959 -2.958a1 1 0 0 1 1.414 0z" stroke-width="0" fill="currentColor"></path><path d="M3 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 0 .883 .993l.117 .007h3.585l-1.292 -1.293a1 1 0 0 1 -.083 -1.32l.083 -.094a1 1 0 0 1 1.32 -.083l.094 .083l3 3a.98 .98 0 0 1 .28 .872l-.036 .146l-.04 .104a1.02 1.02 0 0 1 -.245 .334l-2.959 2.958a1 1 0 0 1 -1.497 -1.32l.083 -.094l1.291 -1.293h-3.584a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-3a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path></svg>
                            </span>
                            <input type="text" id="nomor_hp" name="nomor_hp" value="" class="form-control" placeholder="Nomor HP">
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $j)
                                <option value="{{ $j->kode_jabatan }}">{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group boxed mb-2">
                            <select name="jenis_kepegawaian" id="jenis_kepegawaian" class="form-control">
                                <option value="">Pilih Jenis Kepegawaian</option>
                                <option value="PNS">PNS</option>
                                <option value="PPPK">PPPK</option>
                            </select>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <select name="kode_skpd" class="form-select" id="kode_skpd">
                                    <option value="">Pilih SKPD</option>
                                    @foreach ($skpd as $d)
                                    <option {{ Request('kode_skpd')==$d->kode_skpd ? 'selected' : '' }} value="{{ $d->kode_skpd}}">{{ $d->nama_skpd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <select name="kode_unitkerja" class="form-select" id="kode_unitkerja">
                                    <option value="">Pilih Unit Kerja</option>
                                    @foreach ($unitkerja as $d)
                                    <option {{ Request('kode_unitkerja')==$d->kode_unitkerja ? 'selected' : '' }} value="{{ $d->kode_unitkerja}}">{{ $d->nama_unitkerja}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="file" name="photo" class="form-control">
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


  {{-- Edit Input asn --}}
<div class="modal modal-blur fade" id="modal-editasn" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data asn</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">

        </div>
        </div>
    </div>
</div>

@endsection

@push('myscript')
{{-- <script src="{{ asset('tabler/dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{ asset('tabler/dist/js/demo.min.js?1692870487')}}" defer></script> --}}

<script>

    $(function(){
        $("#nip").mask("000000000000000000");
        $("#nomor_hp").mask("0000000000000");
        $("#btnTambahasn").click(function(){
            $("#modal-inputasn").modal("show");
        });

        $(".edit").click(function(){
            var nip = $(this).attr('nip');
            $.ajax({
                type    :'POST',
                url     :'/asn/edit',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        nip     : nip
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editasn").modal("show");
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

    $("#frmAsn").submit(function(){
        var nip                 = $("#nip").val();
        var nama_lengkap        = $("#nama_lengkap").val();
        var jenis_kelamin       = $("#jenis_kelamin").val();
        var nomor_hp            = $("#nomor_hp").val();
        var kode_jabatan        = $("frmAsn").find("#kode_jabatan").val();
        var jenis_kepegawaian   = $("#jenis_kepegawaian").val();
        var kode_skpd           = $("frmAsn").find("#kode_skpd").val();
        var kode_unitkerja      = $("frmAsn").find("#kode_unitkerja").val();
        // var password            = $("#password").val();
        var photo               = $("#photo").val();
        if(nip==""){
            Swal.fire({
                title: 'warning!',
                text: 'NIP Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
            return false;
        } else if (nama_lengkap==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nama Lengkap Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#nama_lengkap").focus();
            });
            return false;
        } else if (jenis_kelamin==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jenis Kelamin Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#jenis_kelamin").focus();
            });
            return false;
        } else if (nomor_hp==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nomor Handphone Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#nomor_hp").focus();
            });
            return false;
        } else if (kode_jabatan==""){
            Swal.fire({
                title: 'warning!',
                text: 'SKPD Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#kode_jabatan").focus();
            });
            return false;
        } else if (jenis_kepegawaian==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jenis Kepegawaian Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#jenis_kepegawaian").focus();
            });
            return false;
        } else if (kode_skpd==""){
            Swal.fire({
                title: 'warning!',
                text: 'SKPD Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#kode_skpd").focus();
            });
            return false;
        } else if (kode_unitkerja==""){
            Swal.fire({
                title: 'warning!',
                text: 'Unit Kerja Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#kode_unitkerja").focus();
            });
            return false;
        } else if (photo==""){
            Swal.fire({
                title: 'warning!',
                text: 'Foto Profil Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                $("#photo").focus();
            });
            return false;
        // } else if (password==""){
        //     Swal.fire({
        //         title: 'warning!',
        //         text: 'Password Harus Diisi !',
        //         icon: 'warning',
        //         confirmButtonText: 'OK'
        //     }).then((result) => {
        //         $("#password").focus();
        //     });
        //     return false;
        }
    });
});
</script>
@endpush
