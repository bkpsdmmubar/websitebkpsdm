<form action="/jabatan/{{ $jabatan->kode_jabatan }}/update"  method="POST" id="frmJabatan">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path>
                 </svg>
                </span>
                <input type="text" id="kode_jabatan" name="kode_jabatan" readonly value="{{ $jabatan->kode_jabatan }}" class="form-control">
            </div>

            <div class="input-icon mb-3">
                <select id="kode_skpd" name="kode_skpd" value="" class="form-select">
                    <option value="">SKPD</option>
                    @foreach ($skpd as $d)
                        <option {{ $jabatan->kode_skpd==$d->kode_skpd ? 'selected' : ''}} value="{{ $d->kode_skpd }}">
                        {{ $d->nama_skpd }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-icon mb-3">
                <select id="kode_unitkerja" name="kode_unitkerja" value="" class="form-select">
                    <option value="">Pilih Unit Kerja</option>
                    @foreach ($unitkerja as $d)
                        <option {{ $jabatan->kode_unitkerja==$d->kode_unitkerja ? 'selected' : ''}} value="{{ $d->kode_unitkerja }}">
                        {{ $d->nama_unitkerja }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" class="form-control" placeholder="Nama Lengkap">
            </div>

            <div class="form-group boxed mb-2">
                <select name="eselon" id="eselon" class="form-control">
                    <option value="">Pilih Eselon</option>
                    <option {{ $jabatan->eselon == "II.a" ? 'selected' : '' }} value="II.a">II.a</option>
                    <option {{ $jabatan->eselon == "II.b" ? 'selected' : '' }} value="II.b">II.b</option>
                    <option {{ $jabatan->eselon == "III.a" ? 'selected' : '' }} value="III.a">III.a</option>
                    <option {{ $jabatan->eselon == "III.b" ? 'selected' : '' }} value="III.b">III.b</option>
                    <option {{ $jabatan->eselon == "IV.b" ? 'selected' : '' }} value="IV.b">IV.b</option>
                    <option {{ $jabatan->eselon == "IV.b" ? 'selected' : '' }} value="IV.b">IV.b</option>
                    <option {{ $jabatan->eselon == "JFT" ? 'selected' : '' }} value="JFT">JFT</option>
                    <option {{ $jabatan->eselon == "JFU" ? 'selected' : '' }} value="JFU">JFU</option>
                </select>
            </div>

            <div class="input-icon mb-3">
                <select id="kode_jenis_jabatan" name="kode_jenis_jabatan" value="" class="form-select">
                    <option value="">Pilih Jenis Jabatan</option>
                    @foreach ($jenis_jabatan as $d)
                        <option {{ $jabatan->kode_jenis_jabatan==$d->kode_jenis_jabatan ? 'selected' : ''}} value="{{ $d->kode_jenis_jabatan }}">
                        {{ $d->jenis_jabatan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <input type="text" id="kelas_jabatan" name="kelas_jabatan" value="{{ $jabatan->kelas_jabatan }}" class="form-control" placeholder="Nama Lengkap">
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
