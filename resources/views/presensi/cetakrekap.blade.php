<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>F4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { size: legal
  }
  #title {
  font-family: Arial, Helvetica, sans-serif;
  font-size:16px;
  font-weight:bolt;
  }
  .tabeldatakaryawan {
    margin-top: 40px;
  }

  .tabeldatakaryawan tr td {
    padding: 5px;
  }
  .tabelpresensi {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 10px;
  }
  .tabelpresensi  tr th {
    border: 1px solid #000000;
    padding: 8px;
    background-color: aliceblue;
  }
  .tabelpresensi  tr td {
    border: 1px solid #000000;
    padding: 5px;
    font-size: 12px;
  }
  .foto {
    width: 50px;
    height: 50px;
  }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="legal landscape">

    <?php
    function selisih($jam_in, $jam_out)
       {
           list($h, $m, $s) = explode(":", $jam_in);
           $dtAwal = mktime($h, $m, $s, "1", "1", "1");
           list($h, $m, $s) = explode(":", $jam_out);
           $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
           $dtSelisih = $dtAkhir - $dtAwal;
           $totalmenit = $dtSelisih / 60;
           $jam = explode(".", $totalmenit / 60);
           $sisamenit = ($totalmenit / 60) - $jam[0];
           $sisamenit2 = $sisamenit * 60;
           $jml_jam = $jam[0];
           return $jml_jam . ":" . round($sisamenit2);
       }
    ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            <td style="width: 30px">
                <img src="{{ asset('assets/img/login.png')}}" width="70" height="70" alt="">
            </td>
            <td>
                <span id="title">
                  PEMERINTAH KABUPATEN MUNA BARAT<br>
                  REKAP PRESENSI ASN<br>
                  PERIODE BULAN {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}<br>
                </span>
                <span><i>Alamat : Kompleks Perkantoran Bumi Praja Laworo</i></span>
            </td>
        </tr>
    </table>
    <hr color="black">
    <table class="tabelpresensi">
        <tr style="text-align:center">
            <th rowspan="2">Nama ASN</th>
            <th rowspan="2">NIP</th>
            <th colspan="{{ $jmlhari }}">Bulan {{ $namabulan[$bulan] }} {{ $tahun }}</th>
            <th rowspan="2">H</th>
            <th rowspan="2">I</th>
            <th rowspan="2">S</th>
            <th rowspan="2">C</th>
            <th rowspan="2">TL</th>
            <th rowspan="2">A</th>
        </tr>
        <tr style="text-align:center">
            @foreach ($rangetanggal as $d)
            @if ($d != NULL)
            <th>{{ date("d", strtotime($d)) }}</th>
            @endif
            @endforeach
        </tr style="text-align:center">
            @foreach ($rekap as $r)
                <tr style="text-align:center">
                    <td style="text-align:left">{{ $r->nama_lengkap }}</td>
                    <td style="text-align:left">{{ $r->nip }}</td>

                    <?php
                        $jml_hadir      = 0;
                        $jml_izin       = 0;
                        $jml_sakit      = 0;
                        $jml_cuti       = 0;
                        $jml_tugasluar  = 0;
                        $jml_alpa       = 0;
                        for ($i=1; $i <= $jmlhari; $i++) {
                            $tgl = "tgl_".$i;
                            $datapresensi = explode("|",$r->$tgl);
                            if ($r->$tgl != NULL) {
                                $status = $datapresensi[2];
                            } else {
                                $status = "";
                            }

                            if ($status == "H") {
                                $jml_hadir += 1;
                                $color = "#76b852";
                            }

                            if ($status == "I") {
                                $jml_izin += 1;
                                $color = "#fff200";
                            }
                            if ($status == "S") {
                                $jml_sakit += 1;
                                $color = "#ff4f81";
                            }
                            if ($status == "C") {
                                $jml_cuti += 1;
                                $color = "#ff9933";
                            }
                            if ($status == "T") {
                                $jml_tugasluar += 1;
                                $color = "#74d2e7";
                            }
                            if (empty($status)) {
                                $jml_alpa += 1;
                                $color = "#fff9ea";
                            }
                    ?>
                    <td style="background-color:{{ $color }}">
                        {{-- @if ($r->$tgl != NULL) --}}
                        {{ $status }}
                        {{-- @endif --}}
                    </td>
                        <?php
                            }
                        ?>
                    <td style="text-align:center">{{ !empty($jml_hadir) ? $jml_hadir : "" }}</td>
                    <td style="text-align:center">{{ !empty($jml_izin) ? $jml_izin : "" }}</td>
                    <td style="text-align:center">{{ !empty($jml_sakit) ? $jml_sakit : "" }}</td>
                    <td style="text-align:center">{{ !empty($jml_cuti) ? $jml_cuti : "" }}</td>
                    <td style="text-align:center">{{ !empty($jml_tugasluar) ? $jml_tugasluar : "" }}</td>
                    <td style="text-align:center">{{ !empty($jml_alpa) ? $jml_alpa : "" }}</td>

                </tr>
            @endforeach
    </table>

    <table width="100%" style="margin-top: 100px">
      <tr>
        <td></td>
        <td colspan="2" style="text-align: center">Laworo, {{ date('d-m-Y')}}</td>
      </tr>
      <tr>
        <td style="text-align: center; vertical-align:bottom" height="100px">
          <u>Mas Joko</u><br>
          <i><b>HRD Manager</b></i>
        </td>
        <td style="text-align: center; vertical-align:bottom">
          <u>Mas Budi</u><br>
          <i><b>Direktur</b></i>
        </td>
      </tr>
    </table>
  </section>

</body>

</html>
