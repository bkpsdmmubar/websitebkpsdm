@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
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
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Monitoring Presensi
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
                                <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M16 3v4"></path>
                                                    <path d="M8 3v4"></path>
                                                    <path d="M4 11h16"></path>
                                                    <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                 </svg>
                                                </span>
                                                <input type="text" id="dari" name="dari" value="{{ Request('dari')}}" class="form-control" placeholder="Dari Tanggal">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M16 3v4"></path>
                                                    <path d="M8 3v4"></path>
                                                    <path d="M4 11h16"></path>
                                                    <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                 </svg>
                                                </span>
                                                <input type="text" id="sampai" name="sampai" value="{{ Request('sampai')}}" class="form-control" placeholder="Sampai Tanggal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                                    <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                                    <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M5 11h1v2h-1z"></path>
                                                    <path d="M10 11l0 2"></path>
                                                    <path d="M14 11h1v2h-1z"></path>
                                                    <path d="M19 11l0 2"></path>
                                                 </svg>
                                                </span>
                                                <input type="text" id="nip" name="nip" value="{{ Request('nip')}}" class="form-control" placeholder="NIP">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                                 </svg>
                                                </span>
                                                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ Request('nama_lengkap')}}" class="form-control" placeholder="Nama ASN">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <select name="status_approved" id="status_approved" class="form-select">
                                                    <option value="">Pilih Status</option>
                                                    <option value="0" {{ Request('status_approved') === '0' ? 'selected': '' }}>Pending</option>
                                                    <option value="1" {{ Request('status_approved') == 1 ? 'selected': ''}}>Disetujui</option>
                                                    <option value="2" {{ Request('status_approved') == 2 ? 'selected': ''}}>Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>
                                                    Cari Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr style="text-align:center">
                            <th>No.</th>
                            {{-- <th>Kode Izin</th> --}}
                            <th>Dari s/d Sampai</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            {{-- <th>Jabatan</th> --}}
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Status Aprove</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($izinsakit as $d)
                              <tr>
                                <td>{{ $loop->iteration}}</td>
                                {{-- <td>{{ $d->kode_izin }}</td> --}}
                                <td style="text-align:center">{{ date('d-m-Y', strtotime($d->tgl_izin_dari)) }} <br> s/d <br>{{ date('d-m-Y', strtotime($d->tgl_izin_sampai)) }}</td>
                                <td>{{ $d->nip }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                {{-- <td>{{ $d->jabatan }}</td> --}}
                                <td>
                                    @if($d->status=="I")
                                    <span>Izin</span>
                                    @elseif($d->status=="C")
                                    <span>Cuti</span>
                                    @elseif($d->status=="S")
                                    <span>Sakit</span>
                                    @elseif($d->status=="T")
                                    <span>Tugas Luar</span>
                                @endif
                                </td>
                                <td>{{ $d->keterangan }}</td>
                                <td>
                                    @if ($d->status_approved==1)
                                        <span class="badge bg-success text-white">Disetujui</span>
                                        @elseif($d->status_approved==2)
                                        <span class="badge bg-danger text-white">Ditolak</span>
                                        @else
                                        <span class="badge bg-warning text-white">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($d->status_approved==0)
                                    <a href="" class="btn btn-sm bg-primary approve" kode_izin="{{ $d->kode_izin }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                            <path d="M16 5l3 3"></path>
                                         </svg>
                                         Periksa
                                    </a>
                                    @else
                                    <a href="/presensi/{{ $d->kode_izin }}/batalkanizinsakit" class="btn btn-sm bg-danger" id="cancel">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                         </svg>
                                         Batalkan
                                        </a>
                                    @endif

                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $izinsakit->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Show Map --}}
<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Izin Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/presensi/approveizinskit" method="POST">
                    @csrf
                    <input type="hidden" id="kode_izin_form" name="kode_izin_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <select name="status_approved" id="status_approved" class="form-select">
                                    <option value="1">Disetujui</option>
                                    <option value="2">Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                     </svg>
                                     Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@push('myscript')
<script>
    $(function(){
       $(".approve").click(function(e){
        e.preventDefault();
        var kode_izin = $(this).attr("kode_izin");
        $("#kode_izin_form").val(kode_izin);
        $("#modal-izinsakit").modal("show");
       });

       $("#dari, #sampai").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $("#tgl_izin_dari").change(function(e) {
        var tgl_izin_dari = $(this).val();
        alert(tgl_izin_dari);
    });

  });
</script>
@endpush
