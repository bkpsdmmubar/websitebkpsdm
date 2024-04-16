@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Detail Data Set Jam Kerja SKPD
          </h2>
        </div>
      </div>
    </div>
  </div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <select name="kode_skpd" id="kode_skpd" class="form-select" disabled    >
                                <option value="">Pilih SKPD</option>
                                @foreach ($skpd as $d)
                                <option {{ $jamkerjaskpd->kode_skpd == $d->kode_skpd ? 'selected' : '' }} value="{{ $d->kode_skpd }}">{{ $d->nama_skpd }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select name="kode_unitkerja" id="kode_unitkerja" class="form-select" disabled>
                                <option value="">Pilih Unit Kerja</option>
                                @foreach ($unitkerja as $e)
                                <option {{ $jamkerjaskpd->kode_unitkerja == $d->kode_unitkerja ? 'selected' : '' }} value="{{ $e->kode_unitkerja }}">{{ $e->nama_unitkerja }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                    <table class="table">
                        <thead>
                            <tr style="text-align:center">
                                <th>Hari</th>
                                <th>Jam Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jamkerjaskpd_detail as $s)
                            <tr>
                                <td>
                                    {{ $s->hari }}
                                    <input type="hidden" name="hari[]" value="{{ $s->hari }}">
                                </td>
                                <td>
                                    {{ $s->nama_jam_kerja }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr style="text-align:center">
                            <th colspan="6">Master Jam Kerja</th>
                        </tr>
                        <tr style="text-align:center">
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Min. Masuk</th>
                            <th>Masuk Kerja</th>
                            <th>Max. Masuk</th>
                            <th>Jam Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jamkerja as $d)
                            <tr>
                                <td>{{ $d->kode_jam_kerja }}</td>
                                <td>{{ $d->nama_jam_kerja }}</td>
                                <td>{{ $d->awal_jam_masuk }}</td>
                                <td>{{ $d->jam_masuk }}</td>
                                <td>{{ $d->akhir_jam_masuk }}</td>
                                <td>{{ $d->jam_pulang }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

