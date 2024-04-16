<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { size: A4
  }
  #title {
  font-family: Arial, Helvetica, sans-serif;
  font-size:16px;
  font-weight:bolt;
  }
  .tabeldataasn {
    margin-top: 40px;
  }

  .tabeldataasn tr td {
    padding: 5px;
  }
  .tabelpresensi {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
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
<body class="A4">

    <?php
      function selisih($jam_masuk, $jam_keluar)
       {
           list($h, $m, $s) = explode(":", $jam_masuk);
           $dtAwal = mktime($h, $m, $s, "1", "1", "1");
           list($h, $m, $s) = explode(":", $jam_keluar);
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
                  LAPORAN PRESENSI ASN<br>
                  PERIODE BULAN {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}<br>
                </span>
                <span><i>Alamat : Kompleks Perkantoran Bumi Praja Laworo</i></span>
            </td>
        </tr>
    </table>
    <hr color="black">
    <table class="tabeldataasn">
      <tr>
        <td rowspan="7">
           @php
              $path = Storage::url('uploads/asn/'.$asn->photo);
          @endphp
          <img src="{{ url($path)}}" alt="" width="120" height="170">
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><b>{{ $asn->nama_lengkap }}</b></td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $asn->nip }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $asn->nama_jabatan }}</td>
      </tr>
      <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td>{{ $asn->nama_skpd }}</td>
      </tr>
      <tr>
        <td>Status Kepegawaian</td>
        <td>:</td>
        <td>{{ $asn->jenis_kepegawaian }}</td>
      </tr>
      <tr>
        <td>Nomor Telepon</td>
        <td>:</td>
        <td>{{ $asn->nomor_hp }}</td>
      </tr>
    </table>
    <table class="tabelpresensi">
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Foto masuk</th>
        <th>Jam Pulang</th>
        <th>Foto Pulang</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Jml Jam</th>
      </tr>
      @foreach ($presensi as $d)
      @if ($d->status == "h")
        @php
        $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
        $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
        $jamterlambat = selisih($d->jam_masuk,$d->jam_in);
        @endphp
        <tr style="text-align:center">
          <td>{{ $loop->iteration}}</td>
          <td>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
          <td>{{ $d->jam_in}}</td>
          <td><img src="{{ url($path_in)}}" class="foto" alt=""></td>
          <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen'}}</td>
          <td>
              @if ($d->jam_out != null)
                <img src="{{ url($path_out)}}" class="foto" alt="">
              @else
                <img src="{{ asset('assets/img/nofoto.png')}}" class="foto" alt="">
              @endif
          </td>
          <td style="text-align: center">{{ $d->status }}</td>
          <td>
            @if ($d->jam_in > $d->jam_masuk)
            
            <span class="badge bg-danger text-white">Terlambat {{ $jamterlambat }}</span>
            @else
            <span class="badge bg-success text-white">Tepat Waktu</span>
            @endif
          </td>
          <td>
              @if ($d->jam_out != null)
                  @php
                      $jmljamkerja = selisih($d->jam_in,$d->jam_out);
                  @endphp
              @else
                  @php
                      $jmljamkerja = 0;
                  @endphp
            @endif
            {{ $jmljamkerja}}
          </td>
        </tr>
      @else
        <tr style="text-align:center">
          <td>{{ $loop->iteration}}</td>
          <td>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align: center">{{ $d->status }}</td>
          <td>{{ $d->keterangan }}</td>
          <td></td>
        </tr>
      @endif
      
      @endforeach
    </table>
    <table width="100%" style="margin-top: 100px">
      <tr>
        <td colspan="2" style="text-align: right">Laworo, {{ date('d-m-Y')}}</td>
      </tr>
      <tr>
        <td style="text-align: center; vertical-align:bottom" height="100px">
          <i><b>HRD Manager</b></i>
          <br>
          <br>
          <br>
          </br>
          <u>Mas Joko</u><br>
        </td>
        <td style="text-align: center; vertical-align:bottom">
          <i><b>Direktur</b></i>
          <br>
          <br>
          <br>
          </br>
          <u>Mas Budi</u><br>
        </td>
      </tr>
    </table>
  </section>

</body>

</html>
