<style>
    .datepicker-modal {
        max-height: 430px !important;
    }
    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }

</style>

<form action="/asn/{{ $asn->nip }}/update"  method="POST" id="frmAsn" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path></svg>
                </span>
                <input type="text" maxlength="18" id="nip" name="nip" value="{{ $asn->nip }}" class="form-control" disabled>
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path></svg>
                </span>
                <input type="text" maxlength="18" id="nip_lama" name="nip_lama" value="{{ $asn->nip_lama }}" class="form-control" placeholder="NIP Lama (9 Digit) Jika Tidak Ada Kosongkan">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="id_asn" name="id_asn" value="{{ $asn->id_asn }}" class="form-control" placeholder="ID ASN">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $asn->nama_lengkap }}" class="form-control" placeholder="Nama Lengkap">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="gelar_depan" name="gelar_depan" value="{{ $asn->gelar_depan }}" class="form-control" placeholder="Gelar Depan ex. Drs. Ir.">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="gelar_belakang" name="gelar_belakang" value="{{ $asn->gelar_belakang }}" class="form-control" placeholder="Gelar Belakang ex. ST, SE.">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $asn->tempat_lahir }}" class="form-control" placeholder="Tempat lahir Tulis Nama Kabupaten">
            </div>

            <div class="form-group boxed mt-2 mb-2">
                <div class="input-wrapper">
                    <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="{{ $asn->tanggal_lahir }}" autocomplete="off" class="form-control datepicker" placeholder="Tanggal Lahir">
                </div>
            </div>

            <div class="input-icon mb-2">
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option {{ $asn->jenis_kelamin == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                    <option {{ $asn->jenis_kelamin == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group boxed mb-2">
                <select name="kode_pangkatgol" id="kode_pangkatgol" class="form-control">
                    <option value="">Pilih Golongan</option>
                    @foreach ($pangkat as $c)
                    <option {{ $asn->kode_pangkatgol == $c->kode_pangkatgol ? 'selected' : '' }} value="{{ $c->kode_pangkatgol }}">{{ $c->golongan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group boxed mb-2">
                <select name="kode_agama" id="kode_agama" class="form-control">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $c)
                    <option {{ $asn->kode_agama == $c->kode_agama ? 'selected' : '' }} value="{{ $c->kode_agama }}">{{ $c->agama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group boxed mb-2">
                <select name="kode_jenis_kawin" id="kode_jenis_kawin" class="form-control">
                    <option value="">Pilih Status Perkawinan</option>
                    @foreach ($kawin as $k)
                    <option {{ $asn->kode_jenis_kawin == $k->kode_jenis_kawin ? 'selected' : '' }} value="{{ $k->kode_jenis_kawin }}">{{ $k->jenis_kawin }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 2h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M20 14h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M16.707 2.293a1 1 0 0 1 .083 1.32l-.083 .094l-1.293 1.293h3.586a3 3 0 0 1 2.995 2.824l.005 .176v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-3a1 1 0 0 0 -.883 -.993l-.117 -.007h-3.585l1.292 1.293a1 1 0 0 1 -1.32 1.497l-.094 -.083l-3 -3a.98 .98 0 0 1 -.28 -.872l.036 -.146l.04 -.104c.058 -.126 .14 -.24 .245 -.334l2.959 -2.958a1 1 0 0 1 1.414 0z" stroke-width="0" fill="currentColor"></path><path d="M3 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 0 .883 .993l.117 .007h3.585l-1.292 -1.293a1 1 0 0 1 -.083 -1.32l.083 -.094a1 1 0 0 1 1.32 -.083l.094 .083l3 3a.98 .98 0 0 1 .28 .872l-.036 .146l-.04 .104a1.02 1.02 0 0 1 -.245 .334l-2.959 2.958a1 1 0 0 1 -1.497 -1.32l.083 -.094l1.291 -1.293h-3.584a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-3a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path></svg>
                </span>
                <input type="text" id="nik" name="nik" value="{{ $asn->nik }}" class="form-control" placeholder="NIK KTP">
            </div>

            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 2h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M20 14h-4a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h4a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path><path d="M16.707 2.293a1 1 0 0 1 .083 1.32l-.083 .094l-1.293 1.293h3.586a3 3 0 0 1 2.995 2.824l.005 .176v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-3a1 1 0 0 0 -.883 -.993l-.117 -.007h-3.585l1.292 1.293a1 1 0 0 1 -1.32 1.497l-.094 -.083l-3 -3a.98 .98 0 0 1 -.28 -.872l.036 -.146l.04 -.104c.058 -.126 .14 -.24 .245 -.334l2.959 -2.958a1 1 0 0 1 1.414 0z" stroke-width="0" fill="currentColor"></path><path d="M3 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 0 .883 .993l.117 .007h3.585l-1.292 -1.293a1 1 0 0 1 -.083 -1.32l.083 -.094a1 1 0 0 1 1.32 -.083l.094 .083l3 3a.98 .98 0 0 1 .28 .872l-.036 .146l-.04 .104a1.02 1.02 0 0 1 -.245 .334l-2.959 2.958a1 1 0 0 1 -1.497 -1.32l.083 -.094l1.291 -1.293h-3.584a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-3a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path></svg>
                </span>
                <input type="text" id="nomor_hp" name="nomor_hp" value="{{ $asn->nomor_hp }}" class="form-control" placeholder="Nomor HP">
            </div>

            <div class="form-group boxed mb-2">
                <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                    <option value="">Pilih Jabatan</option>
                    @foreach ($jabatan as $j)
                    <option {{ $asn->kode_jabatan == $j->kode_jabatan ? 'selected' : '' }} value="{{ $j->kode_jabatan }}">{{ $j->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group boxed mb-2">
                <select name="jenis_kepegawaian" id="jenis_kepegawaian" class="form-control">
                    <option value="">Pilih Jenis ASN</option>
                    <option {{ $asn->jenis_kepegawaian == "PNS" ? 'selected' : '' }} value="PNS">PNS</option>
                    <option {{ $asn->jenis_kepegawaian == "PPPK" ? 'selected' : '' }} value="PPPK">PPPK</option>
                </select>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <select name="kode_skpd" class="form-select" id="kode_skpd">
                        <option value="">Pilih SKPD</option>
                        @foreach ($skpd as $d)
                       <option {{ $asn->kode_skpd == $d->kode_skpd ? 'selected' : '' }} value="{{ $d->kode_skpd }}">{{ $d->nama_skpd }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <select name="kode_unitkerja" class="form-select" id="kode_unitkerja">
                        <option value="">Pilih Unit Kerja</option>
                        @foreach ($unitkerja as $d)
                        <option {{ $asn->kode_unitkerja == $d->kode_unitkerja ? 'selected' : '' }} value="{{ $d->kode_unitkerja }}">{{ $d->nama_unitkerja }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <input type="file" name="photo" class="form-control">
                    <input type="hidden" name="old_photo" value="{{ $asn->photo }}">
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

