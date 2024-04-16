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


@if ($histori->isEmpty())
<div class="alert alert-outline-warning">
    <p>Tidak Ada Data</p>
</div>

@endif

@foreach ($histori as $d)
@if ($d->status=="H")
            <div class="card historicard mb-1">
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


{{-- <ul class="listview image-listview">
        <li>
            <div class="item">
                @php
                    $path = Storage::url('uploads/absensi/'.$d->foto_in);
                @endphp
                <img src="{{ url($path)}}" alt="image" class="image">
                <div class="in">
                    <div>
                        <b>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</b>
                    </div>
                    <span class="badge {{ $d->jam_in < $d->jam_masuk ? "bg-success" : "bg-danger"}} ">
                        <b>{{ $d->jam_in }}</b>
                    </span>
                    <span class="badge bg-primary"><b>{{ $d->jam_out }}</b>
                    </span>
                </div>
            </div>
        </li>

</ul> --}}
@endforeach
