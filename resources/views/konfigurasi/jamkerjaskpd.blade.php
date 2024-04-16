@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Konfigurasi jam Kerja SKPD
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
                                @if (Session::get('success'))
                                    <div class="alert alert-success" >
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('warning'))
                                    <div class="alert alert-warning" >
                                        {{ Session::get('warning') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="/konfigurasi/jamkerjaskpd/create" class="btn btn-primary" id="btnTambahJamKerja">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                     </svg>
                                    Tambah Konfigurasi
                                  </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/jamkerja" method="GET">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <input type="text" name="nama_jam_kerja" class="form-control" placeholder="Cari jabatan" value="{{ Request('nama_jabatan')}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>Cari Jam Kerja
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row  mt-3">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>S K P D</th>
                                            <th>Unit Kerja</th>
                                            <th>Detail Jam Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jamkerjaskpd as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->kode_jk_skpd }}</td>
                                            <td>{{ $d->nama_skpd }}</td>
                                            <td>{{ $d->nama_unitkerja }}</td>
                                            <td>
                                                <div class="col-3 col-sm col-md-2 col-xl-auto py-3" >
                                                    <a href="/konfigurasi/jamkerjaskpd/{{ $d->kode_jk_skpd }}/show" class="edit btn btn-warning w-100 btn-icon" aria-label="Tabler">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                                    </a>
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="col-3 col-sm col-md-2 col-xl-auto py-3" >
                                                        <a href="/konfigurasi/jamkerjaskpd/{{ $d->kode_jk_skpd }}/edit" class="edit btn btn-tabler w-100 btn-icon" aria-label="Tabler">
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 19.683a1.723 1.723 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572a1.67 1.67 0 0 1 1.106 .831" /><path d="M14.89 11.195a3.001 3.001 0 1 0 -4.457 3.364" /><path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /></svg>
                                                        </a>
                                                      </div>

                                                    <div class="col-3 col-sm-2 col-md-2 col-xl-auto py-3" >
                                                    <form action="/konfigurasi/jamkerjaskpd/{{ $d->kode_jk_skpd }}/delete" method="POST" style="margin-left: 5px">
                                                        @csrf
                                                        <a class="btn btn-danger w-100 btn-icon delete-confirm" aria-label="Tabler">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
                                                            </a>
                                                    </form>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                {{-- {{ $jabatan->links('vendor.pagination.bootstrap-5')}} --}}
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
});
</script>
@endpush
