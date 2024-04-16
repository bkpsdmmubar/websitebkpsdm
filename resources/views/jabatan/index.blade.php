@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Jabatan
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
                                <a href="#" class="btn btn-primary" id="btnTambahjabatan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                     </svg>
                                    Tambah Data Jabatan
                                  </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/jabatan" method="GET">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <input type="text" name="nama_jabatan" class="form-control" placeholder="Cari jabatan" value="{{ Request('nama_jabatan')}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>Cari Jabatan
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
                                            <th>Kode Jabatan</th>
                                            <th>Nama SKPD</th>
                                            <th>Kode Unit Kerja</th>
                                            <th>Nama Jabatan</th>
                                            <th>Eselon</th>
                                            <th>Jenis Jabatan</th>
                                            <th>Kelas Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jabatan as $d)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration + $jabatan->firstItem()-1 }}</td> --}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->kode_jabatan}}</td>
                                            <td>{{ $d->nama_skpd}}</td>
                                            <td>{{ $d->nama_unitkerja}}</td>
                                            <td>{{ $d->nama_jabatan}}</td>
                                            <td>{{ $d->eselon}}</td>
                                            <td>{{ $d->jenis_jabatan}}</td>
                                            <td>{{ $d->kelas_jabatan}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="col-3 col-sm col-md-2 col-xl-auto py-3" >
                                                        <a href="#" kode_jabatan="{{ $d->kode_jabatan }}" class="edit btn btn-tabler w-100 btn-icon" aria-label="Tabler">
                                                          <!-- Download SVG icon from http://tabler-icons.io/i/brand-tabler -->
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                            <path d="M16 5l3 3"></path>
                                                         </svg>
                                                        </a>
                                                      </div>
                                                      <div class="col-3 col-sm-2 col-md-2 col-xl-auto py-3" >
                                                        <form action="/jabatan/{{ $d->kode_jabatan }}/delete" method="POST" style="margin-left: 5px">
                                                            @csrf
                                                            <a class="btn btn-danger w-100 btn-icon delete-confirm" aria-label="Tabler">
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
                                                      </div>
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
<div class="modal modal-blur fade" id="modal-inputjabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/jabatan/store"  method="POST" id="frmjabatan">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path>
                                </svg>
                                </span>
                                <input type="text" maxlength="8" id="kode_jabatan" name="kode_jabatan" value="" class="form-control" placeholder="Kode jabatan">
                            </div>

                            <div class="input-icon mb-3">
                                <select id="kode_skpd" name="kode_skpd" value="" class="form-select">
                                    <option value="">Pilih SKPD</option>
                                    @foreach ($skpd as $d)
                                        <option {{ Request('kode_skpd')==$d->kode_skpd ? 'selected' : ''}} value="{{ $d->kode_skpd }}">
                                        {{ $d->nama_skpd }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-icon mb-3">
                                <select id="kode_unitkerja" name="kode_unitkerja" value="" class="form-select">
                                    <option value="">Pilih Unit Kerja</option>
                                    @foreach ($unitkerja as $d)
                                        <option {{ Request('kode_unitkerja')==$d->kode_unitkerja ? 'selected' : ''}} value="{{ $d->kode_unitkerja }}">
                                        {{ $d->nama_unitkerja }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                                </span>
                                <input type="text" id="nama_jabatan" name="nama_jabatan" value="" class="form-control" placeholder="Nama Jabatan">
                            </div>

                            <div class="form-group boxed mb-2">
                                <select name="eselon" id="eselon" class="form-control">
                                    <option value="">Pilih Eselon</option>
                                    <option value="II.a">II.a</option>
                                    <option value="II.b">II.b</option>
                                    <option value="III.a">III.a</option>
                                    <option value="III.b">III.b</option>
                                    <option value="IV.a">IV.a</option>
                                    <option value="IV.b">IV.b</option>
                                    <option value="JFT">JFT</option>
                                    <option value="JFU">JFU</option>
                                </select>
                            </div>

                            <div class="input-icon mb-3">
                                <select id="kode_jenis_jabatan" name="kode_jenis_jabatan" value="" class="form-select">
                                    <option value="">Pilih Unit Kerja</option>
                                    @foreach ($jenis_jabatan as $d)
                                        <option {{ Request('kode_jenis_jabatan')==$d->kode_jenis_jabatan ? 'selected' : ''}} value="{{ $d->kode_jenis_jabatan }}">
                                        {{ $d->jenis_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-ascending" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l7 0" /><path d="M4 12l7 0" /><path d="M4 18l9 0" /><path d="M15 9l3 -3l3 3" /><path d="M18 6l0 12" /></svg>
                                </span>
                                <input type="text" id="kelas_jabatan" name="kelas_jabatan" value="" class="form-control" placeholder="Kelas Jabatan">
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
<div class="modal modal-blur fade" id="modal-editjabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data jabatan</h5>
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
        $("#kode_jabatan").mask("0000000000");
        $("#btnTambahjabatan").click(function(){
            $("#modal-inputjabatan").modal("show");
        });

        $(".edit").click(function(){
            var kode_jabatan = $(this).attr('kode_jabatan');
            $.ajax({
                type    :'POST',
                url     :'/jabatan/edit',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        kode_jabatan     : kode_jabatan
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editjabatan").modal("show");
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

    $("#frmjabatan").submit(function(){
        var kode_jabatan        = $("#kode_jabatan").val();
        var nama_jabatan        = $("#nama_jabatan").val();
        var kode_skpd           = $("#kode_skpd").val();
        var kelas_jabatan       = $("#kelas_jabatan").val();
        if(kode_jabatan==""){
            // alert('Kode jabatan Harus Diisi');
            Swal.fire({
                title: 'warning!',
                text: 'Kode jabatan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
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
        } else if (nama_jabatan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nama jabatan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#nama_jabatan").focus();
            });
            return false;
        } else if (eselom==""){
            Swal.fire({
                title: 'warning!',
                text: 'Eselon Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#eselom").focus();
            });
            return false;
        } else if (jenis==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jenis Jabatan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#jenis").focus();
            });
            return false;
        } else if (kelas_jabatan==""){
            Swal.fire({
                title: 'warning!',
                text: 'Kelas Jabatan Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#kelas_jabatan").focus();
            });
            return false;
        }
    });
});
</script>
@endpush
