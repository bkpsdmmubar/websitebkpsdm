@extends('layouts.presensi')
@section('header')

<!-- Style Camera -->
<style>
    .webcam-capture,
    .webcam-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }

    #map { height: 200px; }

    .jam-digital-malasngoding {
        background-color: #27272783;
        position: absolute;
        top: 65px;
        right: 10px;
        z-index: 9999;
        width: 150px;
        border-radius: 10px;
        padding: 5px;
    }

    .jam-digital-malasngoding p {
        color: #fff;
        font-size: 16px;
        text-align: center;
        margin-top: 0;
        margin-bottom: 0;
    }

</style>
<!-- Style Camera -->

<!-- Style Map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- Style Map -->
<!-- Header Camera -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">E-Presensi</div>
        <div class="right"></div>
    </div>
<!-- Header Camera -->
@endsection

<!-- Content -->
@section('content')
<!-- camera -->
    <div class="row" style="margin-top: 70px">
        <div class="col">
            <div class="alert alert-warning">
                <p>
                    <h3>Maaf Anda Tidak Memiliki Jam Kerja pada Hari ini!.</h3>
                </p>
                <p>
                    Silahkan Kontak Admin Unit Kerja Anda. Terimakasih.
                </p>
            </div>
        </div>
    </div>
<!-- camera -->

@endsection

