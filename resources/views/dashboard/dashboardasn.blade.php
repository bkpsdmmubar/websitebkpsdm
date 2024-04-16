@extends('layouts.presensi')
@section('content')

<div class="section" id="user-section">
    <div id="user-detail">
        <div class="avatar">
            @if (!@empty(Auth::guard('asn')->user()->photo))
            @php
                $path = Storage::url('uploads/asn/' .Auth::guard('asn')->user()->photo);
            @endphp
            <img src="{{ url($path)}}" alt="avatar" class="imaged w64" style="height: 60px absolut">
            @else
            <img src="{{ asset('/assets/img/sample/avatar/avatar1.jpg') }}" alt="avatar" class="imaged w64 rounded">
            @endif

        </div>
        <div id="user-info">
            <h3 id="user-name">{{ Auth::guard('asn')->user()->nama_lengkap }}</h3>
            @foreach ($leaderboard as $d)
                <small class="badge bg-danger">{{ $d->nama_jabatan }}</small>
            @endforeach
        </div>
    </div>
</div>

<div class="section" id="menu-section">
    <div class="card">
        <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/editprofile" class="green" style="font-size: 40px;">
                            <ion-icon name="person-sharp"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Profil</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/presensi/izin" class="danger" style="font-size: 40px;">
                            <ion-icon name="calendar-number"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Cuti</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="/presensi/histori" class="warning" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Histori</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ asset('/proseslogoutasn')}}" class="orange" style="font-size: 40px;">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Keluar
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section mt-2" id="presence-section">
    <div class="todaypresence">
        <div class="row">
            <div class="col-6">
                <div class="card gradasigreen">
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                                @if ($presensihariini != null)
                                @php
                                    $path = Storage::url('uploads/absensi/'.$presensihariini->foto_in);
                                @endphp
                                <img src="{{ url($path)}}" alt="" class="imaged w48">
                                @else
                                    <ion-icon name="camera"></ion-icon>
                                @endif
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Masuk</h4>
                                <span>{{ $presensihariini != null ? $presensihariini->jam_in : 'Belum Absen'  }}</span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card gradasired">
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                                @if ($presensihariini != null  && $presensihariini->jam_out != null)
                                @php
                                    $path = Storage::url('uploads/absensi/'.$presensihariini->foto_out);
                                @endphp
                                <img src="{{ url($path)}}" alt="" class="imaged w48">
                                @else
                                    <ion-icon name="camera"></ion-icon>
                                @endif
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Pulang</h4>
                                <span>{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : 'Belum Absen'  }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rekappresensi">
        <h3 class="text-center">Presensi Bulan {{ $namabulan[$bulanini]}} Tahun {{ $tahunini}} </h3>
        {{-- <div id="chartdiv"></div> --}}
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="newspaper-outline" style="font-size: 1.6rem;" class="text-success mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmlhadir}}</span>
                            </div>
                        </div>

                        <span style="font-size: 0.8rem">Hadir</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="accessibility-outline" style="font-size: 1.6rem;" class="text-primary mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmlizin}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Izin</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="medkit-outline" style="font-size: 1.6rem;" class="text-warning mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmlsakit}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Sakit</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="calendar-number-outline" style="font-size: 1.6rem;" class="text-danger mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmlcuti}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Cuti</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rekappresensi mt-2">
        {{-- <div id="chartdiv"></div> --}}
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="airplane-outline" style="font-size: 1.6rem;" class="text-info mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmltugasluar}}</span>
                            </div>
                        </div>

                        <span style="font-size: 0.8rem">Perjadin</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="hourglass-outline" style="font-size: 1.6rem;" class="text-danger mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmlalpa}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Alpa</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="alarm-outline" style="font-size: 1.6rem;" class="text-success mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmltepat}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Tepat</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-heigh: 0.8rem">
                        <div class="row">
                            <div class="col-6">
                                <ion-icon name="timer-outline" style="font-size: 1.6rem;" class="text-danger mb-1"></ion-icon>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-danger">{{ $rekappresensi->jmltelat}}</span>
                            </div>
                        </div>
                        <span style="font-size: 0.8rem">Telat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="presencetab mt-2">
        <div class="tab-pane fade show active" id="pilled" role="tabpanel">
            <ul class="nav nav-tabs style1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                        Bulan Ini
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                        Leaderboard
                    </a>
                </li>
            </ul>
        </div>

        <!-- Bulan Ini -->

        <div class="tab-content mt-2" style="margin-bottom:100px;">
            <div class="tab-pane fade show active" id="home" role="tabpanel">
                <!-- Kode Lama
                <ul class="listview image-listview">
                    @foreach ($historibulanini as $d)
                    @php
                        $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
                    @endphp
                    <li>
                        <div class="item">
                            <div class="icon-box bg-primary">
                                <img src="{{ url($path) }}" alt="" class="img-fluid rounded">
                            </div>
                            <div class="in">
                                <div>{{ date("d-m-Y", strtotime($d->tgl_presensi))}}</div>
                                <span class="badge badge-success">{{ $d->jam_in}} </span>
                                <span class="badge badge-danger">{{ $presensihariini != null && $d->jam_out != null ? $d->jam_out
                                : 'Belum Absen'}} </span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                -->
            <style>
                .historicontent {
                    display: flex;
                    margin-top: 10px;
                }
                .datapresensi {
                    margin-left: 15px;
                    /* line-height: 1px; */
                }
                .card {
                    border: 1px solid rgb(112, 214, 255);
                }
            </style>
            @foreach ($historibulanini as $d)
            @if ($d->status=="H")
            <div class="card historicard mb-1" style="border: 1px solid">
                <div class="card-body" style="margin: 2px !important">
                    <div class="historicontent">
                        <div class="iconpresensi">
                             <ion-icon name="finger-print-outline" style="font-size: 48px" class="text-success"></ion-icon>
                        </div>
                        <div class="datapresensi">
                            <h3 style="line-height: 3px">{{ $d->nama_jam_kerja }}</h3>
                            <h4 style="margin: 0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi))  }}</h4>
                            {{-- <h4>{{ DateToIndo2($d->tgl_presensi) }}</h4> --}}
                            <span>
                                {!! $d->jam_in !== null ? date("H:i", strtotime($d->jam_in)) : '<span class="text-danger">Belum Absen</span>' !!}
                                {!! $d->jam_out !== null ? "-". date("H:i", strtotime($d->jam_out)) : '<span class="text-danger">- Belum Absen</span>' !!}
                            </span>
                            <div id="keterangan">
                                @php
                                    //Jam Ketika Absen
                                    $jam_in = date("H:i", strtotime($d->jam_in));

                                    //Jam Jadwal Masuk
                                    $jam_masuk = date("H:i", strtotime($d->jam_masuk));

                                    $jadwal_jam_masuk = $d->tgl_presensi." ".$jam_masuk;
                                    $jam_presensi = $d->tgl_presensi." ". $jam_in;
                                @endphp
                                @if ($jam_in > $jam_masuk)
                                    @php
                                        $jmlterlambat = hitungjamterlambat($jadwal_jam_masuk,$jam_presensi);
                                        $jmlterlambatdesimal = hitungjamterlambatdesimal($jadwal_jam_masuk,$jam_presensi);
                                    @endphp
                                    <span class="danger">Terlambat {{ $jmlterlambat }} ({{ $jmlterlambatdesimal }} Jam)</span>
                                @else
                                    <span style="color:green">Tepat Waktu</span>
                                @endif
                            </div>
                            {{-- <span>
                                {!! date("H:i", strtotime($d->jam_in)) > date("H:i", strtotime($d->jam_masuk)) ? '<span class="text-danger">Terlambat</span>' : '<span class="text-success">Tepat Waktu</span>' !!}
                            </span> --}}
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($d->status=="I")
            <div class="card historicard mb-1">
                <div class="card-body" style="margin: 2px !important">
                    <div class="historicontent">
                        <div class="iconpresensi">
                             <ion-icon name="document-attach-outline" style="font-size: 48px" class="text-primary"></ion-icon>
                        </div>
                        <div class="datapresensi">
                            <h3 style="line-height: 3px">IZIN - {{ $d->kode_izin }}</h3>
                            <h4 style="margin: 0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                            <span>{{ $d->keterangan }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($d->status=="S")
            <div class="card historicard mb-1">
                <div class="card-body" style="margin: 2px !important">
                    <div class="historicontent">
                        <div class="iconpresensi">
                             <ion-icon name="medkit-outline" style="font-size: 48px" class="text-danger"></ion-icon>
                        </div>
                        <div class="datapresensi">
                            <h3 style="line-height: 3px">SAKIT - {{ $d->kode_izin }}</h3>
                            <h4 style="margin: 0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                            <span>{{ $d->keterangan }}</span>
                            <br>
                            @if (!@empty($d->file_dokumen))
                            <span style="color: blue">
                                <ion-icon name="document-attach-outline"></ion-icon> Lihat Dokumen
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($d->status=="C")
            <div class="card historicard mb-1">
                <div class="card-body" style="margin: 2px !important">
                    <div class="historicontent">
                        <div class="iconpresensi">
                             <ion-icon name="calendar-outline" style="font-size: 48px" class="text-warning"></ion-icon>
                        </div>
                        <div class="datapresensi">
                            <h3 style="line-height: 3px">CUTI - {{ $d->kode_izin }}</h3>
                            <h4 style="margin: 0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                            <span class="text-info">
                                {{ $d->nama_cuti }}
                            </span>
                            <br>
                            <span>{{ $d->keterangan }}</span>
                            <br>
                            @if (!@empty($d->file_dokumen))
                            <span style="color: blue">
                                <ion-icon name="document-attach-outline"></ion-icon> Lihat Dokumen
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($d->status=="T")
            <div class="card historicard mb-1">
                <div class="card-body" style="margin: 2px !important">
                    <div class="historicontent">
                        <div class="iconpresensi">
                             <ion-icon name="airplane" style="font-size: 48px" class="text-danger"></ion-icon>
                        </div>
                        <div class="datapresensi">
                            <h3 style="line-height: 3px">TUGAS LUAR - {{ $d->kode_izin }}</h3>
                            <h4 style="margin: 0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                            <span>{{ $d->keterangan }}</span>
                            <br>
                            @if (!@empty($d->file_dokumen))
                            <span style="color: blue">
                                <ion-icon name="document-attach-outline"></ion-icon> Lihat Dokumen
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @endforeach
            </div>

            <!-- End Bulan Ini -->

            <!-- leaderboard -->
            <div class="tab-pane fade" id="profile" role="tabpanel">
                <ul class="listview image-listview">
                    @foreach ($leaderboard as $d)
                    @php
                    $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
                    @endphp
                        <li>
                            <div class="item">
                                {{-- <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image"> --}}
                                <img src="{{ url($path_in)}}" class="image" alt="">
                                <div class="in">
                                    <div>
                                        <b>{{ $d->nama_lengkap }}</b>
                                        <br>
                                        <small class="text-muted">{{ $d->nama_jabatan }}</small>
                                    </div>
                                    <span class="badge {{ $d->jam_in < $d->jam_masuk ? "bg-success" : "bg-danger"}} ">
                                        <b>{{ $d->jam_in }}</b>
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End leaderboard -->

        </div>
    </div>
</div>

@endsection
