<form action="/konfigurasi/{{ $jamkerja->kode_jam_kerja }}/updatejamkerja"  method="POST" id="frmJamKerja_edit">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v1a2 2 0 0 0 2 2h2"></path><path d="M16 4h2a2 2 0 0 1 2 2v1"></path><path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path><path d="M5 11h1v2h-1z"></path><path d="M10 11l0 2"></path><path d="M14 11h1v2h-1z"></path><path d="M19 11l0 2"></path>
                </svg>
                </span>
                <input type="text" id="kode_jam_kerja_edit" name="kode_jam_kerja" value="{{ $jamkerja->kode_jam_kerja }}" class="form-control" placeholder="Kode Jam Kerja">
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19l18 0" /><path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /></svg>
                </span>
                <input type="text" id="nama_jam_kerja_edit" name="nama_jam_kerja" value="{{ $jamkerja->nama_jam_kerja }}" class="form-control" placeholder="Nama Jam Kerja">
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                </span>
                <input type="text" id="awal_jam_masuk_edit" name="awal_jam_masuk" value="{{ $jamkerja->awal_jam_masuk }}" class="form-control" placeholder="Jam Awal Mulai Absen">
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-play" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 7v5l2 2" /><path d="M17 22l5 -3l-5 -3z" /><path d="M13.017 20.943a9 9 0 1 1 7.831 -7.292" /></svg>
                </span>
                <input type="text" id="jam_masuk_edit" name="jam_masuk" value="{{ $jamkerja->jam_masuk }}" class="form-control" placeholder="Jam Masuk">
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.926 13.15a9 9 0 1 0 -7.835 7.784" /><path d="M12 7v5l2 2" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                </span>
                <input type="text" id="akhir_jam_masuk_edit" name="akhir_jam_masuk" value="{{ $jamkerja->akhir_jam_masuk }}" class="form-control" placeholder="Batas Jam Masuk">
            </div>

            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-24" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 0 0 5.998 8.485m12.002 -8.485a9 9 0 1 0 -18 0" /><path d="M12 7v5" /><path d="M12 15h2a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-1a1 1 0 0 0 -1 1v1a1 1 0 0 0 1 1h2" /><path d="M18 15v2a1 1 0 0 0 1 1h1" /><path d="M21 15v6" /></svg>
                </span>
                <input type="text" id="jam_pulang_edit" name="jam_pulang" value="{{ $jamkerja->jam_pulang }}" class="form-control" placeholder="Jam Pulang">
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <select name="lintashari" id="lintashari_edit" class="form-select">
                            <option value="">Lintas Hari</option>
                            <option value="1" {{ $jamkerja->lintashari == 1 ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ $jamkerja->lintashari == 0 ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
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
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#awal_jam_masuk_edit, #jam_masuk_edit, #akhir_jam_masuk_edit, #jam_pulang_edit").mask("00:00");
    $("#frmJamKerja_edit").submit(function(){
        var kode_jam_kerja      = $("#kode_jam_kerja_edit").val();
        var nama_jam_kerja      = $("#nama_jam_kerja_edit").val();
        var awal_jam_masuk      = $("#awal_jam_masuk_edit").val();
        var jam_masuk           = $("#jam_masuk_edit").val();
        var akhir_jam_masuk     = $("#akhir_jam_masuk_edit").val();
        var jam_pulang          = $("#jam_pulang_edit").val();
        var lintashari          = $("#lintashari_edit").val();
        if(kode_jam_kerja==""){
            // alert('Kode jabatan Harus Diisi');
            Swal.fire({
                title: 'warning!',
                text: 'Kode Jam Kerja Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
            return false;
        } else if (nama_jam_kerja==""){
            Swal.fire({
                title: 'warning!',
                text: 'Nama Jam Kerja Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#nama_jam_kerja").focus();
            });
            return false;
        } else if (awal_jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Awal Jam Masuk Absen Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#awal_jam_masuk").focus();
            });
            return false;
        } else if (jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jam Masuk Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#jam_masuk").focus();
            });
            return false;
        } else if (akhir_jam_masuk==""){
            Swal.fire({
                title: 'warning!',
                text: 'Akhir Jam Masuk Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#akhir_jam_masuk").focus();
            });
            return false;
        } else if (jam_pulang==""){
            Swal.fire({
                title: 'warning!',
                text: 'Jam Pulang Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#jam_pulang").focus();
            });
            return false;
        } else if (lintashari==""){
            Swal.fire({
                title: 'warning!',
                text: 'Lintas Hari Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                 $("#lintashari").focus();
            });
            return false;
        }
    });
</script>