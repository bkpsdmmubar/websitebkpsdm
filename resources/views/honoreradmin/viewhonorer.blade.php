@extends('layouts.honorer.tabler')
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
                                $path = Storage::url('uploads/honorer/'.$honorer->photo);
                            @endphp
                            <img src="{{ url($path)}}" class="img-thumbnail rounded mx-auto d-block" width="120" height="170">


                        </div>
                        <div class="col-md-10">
                                <div class="row mb-1">
                                    <label for="name" class="col-md-2 col-form-label text-md-star">{{ __('Name') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $honorer->nama_lengkap }}</label>
                                        
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nik" class="col-md-2 col-form-label text-md-star">{{ __('nik') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $honorer->nik }}</label>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nik" class="col-md-2 col-form-label text-md-star">{{ __('Jabatan') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $honorer->nama_jabatan }}</label>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="nik" class="col-md-2 col-form-label text-md-star">{{ __('Unit Kerja') }}</label>
                                    <div class="col-md-9">
                                        <label for=":" class="col-md-9 col-form-label text-md-star">{{ __(': ') }}{{ $honorer->nama_skpd }}</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
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
        $("#nik").mask("000000000000000000");
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
                url     :'/honorer/editriwayatgolongan',
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
                url     :'/honorer/editriwayatgolongan',
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
        var nik                     = $("#nik").val();
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


