<style>
    .datepicker-modal {
        max-height: 430px !important;
    }
    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }

</style>

<form action="/asn/{{ $riwayatgolongan->kode_riwayat_golongan }}/updateriwayatgolongan"  method="POST" id="frmEditGolongan" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">

            <div class="input-icon mb-2">
                <input type="hidden" id="kode_riwayat_golongan" name="kode_riwayat_golongan" value="{{ Request('kode_riwayat_golongan')}}" class="form-control" >
            </div>

            <div class="input-icon mb-2">
                <input type="text" id="nip" name="nip" value="{{ $riwayatgolongan->nip }}" class="form-control" >
            </div>

            <div class="form-group boxed mb-2">
                <select name="kode_golongan" id="kode_golongan" class="form-control">
                    <option value="">Pilih Golongan</option>
                    @foreach ($golongan as $c)
                    <option {{ $riwayatgolongan->kode_golongan == $c->kode_golongan ? 'selected' : '' }} value="{{ $c->kode_golongan }}">{{ $c->golongan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-icon mb-2">
                <input type="text" id="nomor_sk_golongan" name="nomor_sk_golongan" value="{{ $riwayatgolongan->nomor_sk_golongan }}" class="form-control" placeholder="Nomor SK Pangkat/Golongan">
            </div>

            <div class="form-group boxed mt-2 mb-2">
                <div class="input-wrapper">
                    <input type="text" id="tmt_golongan" name="tmt_golongan" value="{{ $riwayatgolongan->tmt_golongan }}" autocomplete="off" class="form-control datepicker" placeholder="TMT Golongan">
                </div>
            </div>

            <div class="form-group boxed mt-2 mb-2">
                <div class="input-wrapper">
                    <input type="text" id="tgl_golongan" name="tgl_golongan" value="{{ $riwayatgolongan->tgl_golongan }}" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Golongan">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <input type="file" name="file_dokumen" class="form-control">
                    <input type="hidden" name="old_photo" value="{{ $riwayatgolongan->file_dokumen }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 14l11 -11"></path>
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                </svg>
                                Simpan</button>
                    </div>
                </div>
    </div>
</form>

<script>
    $(function(){
        var currYear = (new Date()).getFullYear();
        $(".datepicker").datepicker({
            format: "yyyy-mm-dd"
        });
    });
</script>

