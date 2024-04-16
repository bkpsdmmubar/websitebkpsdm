@extends('layouts.honorer.tabler')
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
            Data honorer
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
                    </div>

                        <div class="row  mt-3">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>nik</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jabatan</th>
                                            <th>Whatsapp</th>
                                            <th>SKPD</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($honorer as $d)
                                        @php
                                            $path = Storage::url('uploads/honorer/'.$d->photo);
                                        @endphp
                                        <tr>
                                            <td>{{ $d->nik}}</td>
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
                                                        <a href="/honorer/{{ $d->nik }}/viewhonorer" class="btn btn-warning btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" nik="{{ $d->nik }}" class="edit btn btn-success btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/honorer/{{ Crypt::encrypt($d->nik) }}/resetpassword" class="btn btn-warning btn-sm" style="margin-left: 3px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17v4" /><path d="M10 20l4 -2" /><path d="M10 18l4 2" /><path d="M5 17v4" /><path d="M3 20l4 -2" /><path d="M3 18l4 2" /><path d="M19 17v4" /><path d="M17 20l4 -2" /><path d="M17 18l4 2" /><path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2" /></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $honorer->links('vendor.pagination.bootstrap-5')}}
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


  {{-- Edit Input honorer --}}
<div class="modal modal-blur fade" id="modal-edithonorer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data honorer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">

        </div>
        </div>
    </div>
</div>

@endsection

@push('myscript')

<script>

    $(function(){
        $("#nik").mask("000000000000000000");
        $("#nomor_hp").mask("0000000000000");
        $("#btnTambahhonorer").click(function(){
            $("#modal-inputhonorer").modal("show");
        });

        $(".edit").click(function(){
            var nik = $(this).attr('nik');
            $.ajax({
                type    :'POST',
                url     :'/honorer/edit',
                cache   :false,
                data    : {
                        _token  : "{{ csrf_token(); }}",
                        nik     : nik
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-edithonorer").modal("show");
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

    $("#frmhonorer").submit(function(){
        var nik                 = $("#nik").val();
        var nama_lengkap        = $("#nama_lengkap").val();
        var jenis_kelamin       = $("#jenis_kelamin").val();
        var nomor_hp            = $("#nomor_hp").val();
        var kode_jabatan        = $("frmhonorer").find("#kode_jabatan").val();
        var jenis_kepegawaian   = $("#jenis_kepegawaian").val();
        var kode_skpd           = $("frmhonorer").find("#kode_skpd").val();
        var kode_unitkerja      = $("frmhonorer").find("#kode_unitkerja").val();
        // var password            = $("#password").val();
        var photo               = $("#photo").val();
        if(nik==""){
            Swal.fire({
                title: 'warning!',
                text: 'nik Harus Diisi !',
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
