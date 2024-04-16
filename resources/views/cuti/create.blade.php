@extends('layouts.presensi')

<!-- Header -->
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal {
        max-height: 430px !important;
    }
    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }

    #keterangan {
        height: 6rem !important;
    }
</style>
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Buat Izin Cuti</div>
    <div class="right"></div>
</div>

@endsection
<!-- End Header -->

<!-- Content -->
@section('content')

<div class="row" style="margin-top: 4rem">
    <div class="col">
        @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        @endphp

        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ $messagesuccess }}
            </div>
        @endif
        @if(Session::get('error'))
            <div class="alert alert-danger">
                {{ $messageerror }}
            </div>
        @endif
    </div>
</div>

<form action="/izincuti/store" method="POST" id="frmCuti" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="col">
        <div class="form-group boxed">
            <select name="kode_cuti" id="kode_cuti" class="form-control">
                <option value="">Pilih Cuti</option>
                @foreach ($mastercuti as $c)
                <option value="{{ $c->kode_cuti }}">{{ $c->nama_cuti }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" id="tgl_izin_dari" name="tgl_izin_dari" value="" autocomplete="off" class="form-control datepicker" placeholder="Dari">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" id="tgl_izin_sampai" name="tgl_izin_sampai" value="" autocomplete="off" class="form-control datepicker" placeholder="Sampai">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" id="jml_hari" name="jml_hari" value="" class="form-control" placeholder="Jumlah Hari" readonly>
            </div>
        </div>

        <div class="custom-file-upload" id="fileUpload1" style="height: 100px !important">
            <input type="file" name="fileizin" id="fileizin" accept=".png, .jpg, .jpeg">
            <label for="fileizin">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
            aria-label="cloud upload outline"></ion-icon>
                        <i>Tap to Upload Surat Cuti</i>
                    </strong>
                </span>
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input class="form-control" name="keterangan" id="keterangan" cols="10" rows="5" placeholder="Isi Keterangan"></input>
            </div>
        </div>

            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="save-outline"></ion-icon> Kirim
                </button>
        </div>
    </div>
</form>




@endsection

@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();

    $(document).ready(function() {
        $(".datepicker").datepicker({

            format: "yyyy-mm-dd"
        });

    function loadjumlahhari() {
        var dari    = $("#tgl_izin_dari").val();
        var sampai  = $("#tgl_izin_sampai").val();
        var date1   = new Date(dari);
        var date2   = new Date(sampai);
            var Difference_In_Time = date2.getTime() - date1.getTime();
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

            if (dari == "" || sampai == "") {
                var jmlhari = 0;
            } else {
                var jmlhari = Difference_In_Days + 1;
            }

            $("#jml_hari").val(jmlhari + " Hari");
    }
    $("#tgl_izin_dari,#tgl_izin_sampai").change(function(e) {
        loadjumlahhari();
    });


    $("#frmCuti").submit(function() {
        var tgl_izin_dari       = $("#tgl_izin_dari").val();
        var tgl_izin_sampai     = $("#tgl_izin_sampai").val();
        var keterangan          = $("#keterangan").val();
        var kode_cuti           = $("#kode_cuti").val();
        var fileuploadInput         = $("#fileizin").val();
        if (tgl_izin_dari > tgl_izin_sampai ) {
            Swal.fire({
                title: 'Oops !',
                text: 'Tanggal Dari Harus Lebih Kecil dari Tanggal Sampai',
                icon: 'Warning',
            });
            return false;
        } else {

        if (kode_cuti == "") {
            Swal.fire({
                title: 'Oops !',
                text: 'Jenis Cuti Harus Di Isi',
                icon: 'Warning',
            });
            return false;
        } else if (tgl_izin_dari == "" || tgl_izin_sampai == "") {
            Swal.fire({
                title: 'Oops !',
                text: 'Tanggal Harus Di Isi',
                icon: 'Warning',
            });
            return false;
        } else if (fileizin == "") {
            Swal.fire({
                title: 'Oops !',
                text: 'File Surat Cuti Harus Di Isi',
                icon: 'Warning',
            });
            return false;
        } else if (keterangan == "") {
            Swal.fire({
                title: 'Oops !',
                text: 'Keterangan Harus Di Isi',
                icon: 'Warning',
            });
            return false;
        }
    }
    });
});

</script>
@endpush
