@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Jam Kerja
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
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahJamKerja">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                     </svg>
                                    Tambah Data Jam Kerja
                                  </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/jamkerja" method="GET">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <input type="text" name="nama_jam_kerja" class="form-control" placeholder="Cari jabatan" value="{{ Request('nama_jabatan')}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>Cari Jam Kerja
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
                                            <th>Kode Jam Kerja</th>
                                            <th>Nama Jam Kerja</th>
                                            <th>Awal Jam Masuk</th>
                                            <th>Jam Masuk</th>
                                            <th>Akhir Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Lintas Hari</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jamkerja as $d)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration + $jabatan->firstItem()-1 }}</td> --}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->kode_jam_kerja}}</td>
                                            <td>{{ $d->nama_jam_kerja}}</td>
                                            <td>{{ $d->awal_jam_masuk}}</td>
                                            <td>{{ $d->jam_masuk}}</td>
                                            <td>{{ $d->akhir_jam_masuk}}</td>
                                            <td>{{ $d->jam_pulang}}</td>
                                            <td>
                                                @if ($d->lintashari==1)
                                                <span class="badge bg-success text-align:left">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                                </span>
                                                @else
                                                <span class="badge bg-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    {{-- <div class="col-3 col-sm col-md-2 col-xl-auto py-3" > --}}
                                                        <a href="#" kode_jam_kerja="{{ $d->kode_jam_kerja }}" class="edit btn btn-tabler w-100 btn-icon btn-sm" aria-label="Tabler">
                                                          <!-- Download SVG icon from http://tabler-icons.io/i/brand-tabler -->
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                            <path d="M16 5l3 3"></path>
                                                         </svg>
                                                        </a>
                                                      {{-- </div> --}}
                                                      {{-- <div class="col-3 col-sm-2 col-md-2 col-xl-auto py-3" > --}}
                                                        <form action="/konfigurasi/{{ $d->kode_jam_kerja }}/deletejamkerja" method="POST" style="margin-left: 5px">
                                                            @csrf
                                                            <a class="btn btn-danger w-100 btn-icon delete-confirm btn-sm" aria-label="Tabler">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-tabler -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M4 7l16 0"></path>
                                                                    <path d="M10 11l0 6"></path>
                                                                    <path d="M14 11l0 6"></path>
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                 </svg>
                                                              </a>
                                                        </form>
                                                      {{-- </div> --}}
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $jabatan->links('vendor.pagination.bootstrap-5')}} --}}
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Data Modals Input jabatan --}}
<div class="modal modal-blur fade" id="modal-inputjamkerja" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/konfigurasi/storejamkerja"  method="POST" id="frmjamkerja">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path>
                                </svg>
                                </span>
                                <input type="text" id="kode_jam_kerja" name="kode_jam_kerja" value="" class="form-control" placeholder="Kode Jam Kerja">
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19l18 0" /><path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /></svg>
                                </span>
                                <input type="text" id="nama_jam_kerja" name="nama_jam_kerja" value="" class="form-control" placeholder="Nama Jam Kerja">
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                                </span>
                                <input type="text" id="awal_jam_masuk" name="awal_jam_masuk" value="" class="form-control" placeholder="Jam Awal Mulai Absen">
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-play" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 7v5l2 2" /><path d="M17 22l5 -3l-5 -3z" /><path d="M13.017 20.943a9 9 0 1 1 7.831 -7.292" /></svg>
                                </span>
                                <input type="text" id="jam_masuk" name="jam_masuk" value="" class="form-control" placeholder="Jam Masuk">
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.926 13.15a9 9 0 1 0 -7.835 7.784" /><path d="M12 7v5l2 2" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                                </span>
                                <input type="text" id="akhir_jam_masuk" name="akhir_jam_masuk" value="" class="form-control" placeholder="Batas Jam Masuk">
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-24" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 0 0 5.998 8.485m12.002 -8.485a9 9 0 1 0 -18 0" /><path d="M12 7v5" /><path d="M12 15h2a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-1a1 1 0 0 0 -1 1v1a1 1 0 0 0 1 1h2" /><path d="M18 15v2a1 1 0 0 0 1 1h1" /><path d="M21 15v6" /></svg>
                                </span>
                                <input type="text" id="jam_pulang" name="jam_pulang" value="" class="form-control" placeholder="Jam Pulang">
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="lintashari" id="lintashari" class="form-select">
                                            <option value="">Lintas Hari</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 14l11 -11"></path>
                                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                            </svg>
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


  {{-- Edit Input jabatan --}}
<div class="modal modal-blur fade" id="modal-editjamkerja" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Jam Kerja</h5>
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
        $("#awal_jam_masuk, #jam_masuk, #akhir_jam_masuk, #jam_pulang").mask("00:00");
        $("#btnTambahJamKerja").click(function(){
            $("#modal-inputjamkerja").modal("show");
        });

        $(".edit").click(function(){
            var kode_jam_kerja = $(this).attr('kode_jam_kerja');
            $.ajax({
                type    :'POST',
                url     :'/konfigurasi/editjamkerja',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        kode_jam_kerja     : kode_jam_kerja
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editjamkerja").modal("show");
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

    $("#frmjamkerja").submit(function(){
        var kode_jam_kerja      = $("#kode_jam_kerja").val();
        var nama_jam_kerja      = $("#nama_jam_kerja").val();
        var awal_jam_masuk      = $("#awal_jam_masuk").val();
        var jam_masuk           = $("#jam_masuk").val();
        var akhir_jam_masuk     = $("#akhir_jam_masuk").val();
        var jam_pulang          = $("#jam_pulang").val();
        var lintashari          = $("#lintashari").val();
        if(kode_jam_kerja==""){
            // alert('Kode jabatan Harus Diisi');
            Swal.fire({
                title: 'warning!',
                text: 'Kode Jam Kerja Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
            return false;
        } else if (nama_jam_kerja==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nama Jam Kerja Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#nama_jam_kerja").focus();
            });
            return false;
        } else if (awal_jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Awal Jam Masuk Absen Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#awal_jam_masuk").focus();
            });
            return false;
        } else if (jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jam Masuk Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#jam_masuk").focus();
            });
            return false;
        } else if (akhir_jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Akhir Jam Masuk Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#akhir_jam_masuk").focus();
            });
            return false;
        } else if (jam_pulang==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jam Pulang Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#jam_pulang").focus();
            });
            return false;
        } else if (lintashari==""){
            Swal.fire({
                title: 'warning!',
                text: 'Lintas Hari Harus Pilih !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#lintashari").focus();
            });
            return false;
        }
    });
});
</script>
@endpush
