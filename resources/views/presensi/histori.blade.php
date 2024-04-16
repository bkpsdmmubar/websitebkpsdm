@extends('layouts.presensi')

<!-- Header -->
@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Histori Presensi</div>
    <div class="right"></div>
</div>
@endsection
<!-- End Header -->

<!-- Content -->
@section('content')
<div class="row">
    <div class="col">
        <div class="row" style="margin-top: 70px">
            <div class="col-8">
                <div class="form-grou">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                        <option {{ Request('bulan') ==$i ? 'selected' : '' }} value="{{ $i }}">{{ $namabulan[$i] }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-grou">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Tahun</option>
                        @php
                            $tahun_awal = 2024;
                            $tahun_sekarang = date("Y");
                            for($t = $tahun_awal; $t <= $tahun_sekarang; $t++) {
                                if (Request('tahun')==$t){
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                echo "<option $selected value='$t'>$t</option>"; }
                        @endphp
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <button class="btn btn-primary w-100" id="getdata">Cari Data</button>
            </div>
        </div>
    
    </div>
</div>
    
<div class="row mt-2" style="position: fixed; width:100%; margin:auto; overflow-y:scroll; height:430px">
    <div class="col" id="showhistori">

    </div>
</div>
@endsection
<!-- End Content -->

@push('myscript')
<script>
    $(function() {
        $("#getdata").click(function(e){
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                type: 'POST',
                url: '/gethistori',
                data:{
                    _token:"{{ csrf_token() }}",
                    bulan: bulan,
                    tahun: tahun
                },
                cache:false,
                success: function(respond){
                    $("#showhistori").html(respond);
                }
            });
        });
    });
</script>
@endpush