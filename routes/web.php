<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AsnController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinabsenController;
use App\Http\Controllers\IzincutiController;
use App\Http\Controllers\IzinsakitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HonorerController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PresensihonorerController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TugasluarController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['guest'])->group(function(){

//     Route::get('/login',[AuthController::class,'index'])->name('login');
//     Route::post('/login',[AuthController::class,'login']);
    

// });

Route::middleware(['guest:asn'])->group(function(){
    Route::get('/panelasn', function () {
        return view('auth.loginasn');
    })->name('loginasn');
    Route::post('/prosesloginasn', [AuthController::class, 'prosesloginasn']);
});

// Route::middleware(['guest:user'])->group(function(){
//     Route::get('/panel', function () {
//         return view('auth.loginadmin');
//     })->name('loginadmin');
//     Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
// });

// Route::middleware(['auth:user'])->group(function () {
    // Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
    // Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);

Route::middleware(['auth:asn'])->group(function() {
    Route::get('/panelasn/dashboardasn', [DashboardController::class, 'index']);
    Route::get('/proseslogoutasn', [AuthController::class, 'proseslogoutasn']);

    //Presensi
    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);
    Route::get('/presensi/gethari', [PresensiController::class, 'gethari']);

    //Edit Profil
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nip}/updateprofile', [PresensiController::class, 'updateprofile']);

    //Histori
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

     //izin
     Route::get('/presensi/izin', [PresensiController::class, 'izin']);
     Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
     Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);

    //Izin Absen
    Route::get('/izinabsen', [IzinabsenController::class, 'create']);
    Route::post('/izinabsen/store', [IzinabsenController::class, 'store']);
    Route::get('/izinabsen/{kode_izin}/edit', [IzinabsenController::class, 'edit']);
    Route::post('/izinabsen/{kode_izin}/update', [IzinabsenController::class, 'update']);

    //Izin Sakit
    Route::get('/izinsakit', [IzinsakitController::class, 'create']);
    Route::post('/izinsakit/store', [IzinsakitController::class, 'store']);
    Route::get('/izinsakit/{kode_izin}/edit', [IzinsakitController::class, 'edit']);
    Route::post('/izinsakit/{kode_izin}/update', [IzinsakitController::class, 'update']);

    //Izin Cuti
    Route::get('/izincuti', [IzincutiController::class, 'create']);
    Route::post('/izincuti/store', [IzincutiController::class, 'store']);
    Route::get('/izincuti/{kode_izin}/edit', [IzincutiController::class, 'edit']);
    Route::post('/izincuti/{kode_izin}/update', [IzincutiController::class, 'update']);

    //Tugas Luar
    Route::get('/tugasluar', [TugasluarController::class, 'createtugasluar']);
    Route::post('/tugasluar/store', [TugasluarController::class, 'storetugasluar']);
    Route::get('/tugasluar/{kode_izin}/edit', [TugasluarController::class, 'edittugasluar']);
    Route::post('/tugasluar/{kode_izin}/update', [TugasluarController::class, 'updatetugasluar']);

    Route::get('/izin/{kode_izin}/showact',[PresensiController::class, 'showact']);
    Route::get('/izin/{kode_izin}/delete',[PresensiController::class, 'deleteizin']);



});

// ROT PANEL ADMIN

Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});

// Route::middleware(['auth:user'])->group(function () {
    Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
    Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);

    // ASN
    Route::get('/asn/{nip}/viewasn', [AsnController::class, 'viewasn']);
    Route::get('/asn', [AsnController::class, 'index']);
    Route::post('/asn/store', [AsnController::class, 'store']);
    Route::post('/asn/edit', [AsnController::class, 'edit']);
    Route::post('/asn/{nip}/update', [AsnController::class, 'update']);
    Route::post('/asn/{nip}/delete', [AsnController::class, 'delete']);
    Route::get('/exportasn', [AsnController::class, 'asnexport']);
    Route::get('/asn/{nip}/resetpassword', [AsnController::class, 'resetpassword']);
    //RIWAYAT GOLONGAN
    Route::get('/asn/riwayatgolongan', [AsnController::class, 'riwayatgolongan']);
    Route::post('/asn/storeriwayatgolongan', [AsnController::class, 'storeriwayatgolongan']);
    Route::post('/asn/editriwayatgolongan', [AsnController::class, 'editriwayatgolongan']);
    Route::post('/asn/{kode_riwayat_golongan}/updateriwayatgolongan', [AsnController::class, 'updateriwayatgolongan']);
    Route::post('/asn/{kode_riwayat_golongan}/deleteriwayatgolongan', [AsnController::class, 'deleteriwayatgolongan']);
    
    //RIWAYAT JABATAN
    Route::get('/asn/riwayatjabatan', [AsnController::class, 'riwayatjabatan']);
    Route::post('/asn/storeriwayatjabatan', [AsnController::class, 'storeriwayatjabatan']);
    Route::post('/asn/editriwayatjabatan', [AsnController::class, 'editriwayatjabatan']);
    Route::post('/asn/{kode_riwayat_jabatan}/updateriwayatjabatan', [AsnController::class, 'updateriwayatjabatan']);
    Route::post('/asn/{kode_riwayat_jabatan}/deleteriwayatjabatan', [AsnController::class, 'deleteriwayatjabatan']);

    
    // SKPD
    Route::get('/skpd', [SkpdController::class, 'index']);
    Route::post('/skpd/store', [SkpdController::class, 'store']);
    Route::post('/skpd/edit', [SkpdController::class, 'edit']);
    Route::post('/skpd/{nip}/update', [SkpdController::class, 'update']);
    Route::post('/skpd/{nip}/delete', [SkpdController::class, 'delete']);

    // Jabatan
    Route::get('/jabatan', [JabatanController::class, 'index']);
    Route::post('/jabatan/store', [JabatanController::class, 'store']);
    Route::post('/jabatan/edit', [JabatanController::class, 'edit']);
    Route::post('/jabatan/{nip}/update', [JabatanController::class, 'update']);
    Route::post('/jabatan/{nip}/delete', [JabatanController::class, 'delete']);

    // Unit Kerja
    Route::get('/unitkerja', [UnitkerjaController::class, 'index']);
    Route::post('/unitkerja/store', [UnitkerjaController::class, 'store']);
    Route::post('/unitkerja/edit', [UnitkerjaController::class, 'edit']);
    Route::post('/unitkerja/{nip}/update', [UnitkerjaController::class, 'update']);
    Route::post('/unitkerja/{nip}/delete', [UnitkerjaController::class, 'delete']);

    // Monitoring
    Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);
    Route::post('/tampilkanpeta', [PresensiController::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::get('/presensi/rekappresensi', [PresensiController::class, 'rekappresensi']);
    Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
    Route::post('/presensi/approveizinskit', [PresensiController::class, 'approveizinskit']);
    Route::get('/presensi/{kode_izin}/batalkanizinsakit', [PresensiController::class, 'batalkanizinsakit']);

    // Mutasi
    Route::get('/mastermutasi', [KuotaController::class, 'index']);
    Route::post('/kuota/store', [KuotaController::class, 'store']);
    Route::post('/kuota/edit', [KuotaController::class, 'edit']);
    Route::post('/kuota/{nip}/update', [KuotaController::class, 'update']);
    Route::post('/kuota/{nip}/delete', [KuotaController::class, 'delete']);
    
    // Kuota
    Route::get('/kuota', [KuotaController::class, 'index']);
    Route::post('/kuota/store', [KuotaController::class, 'store']);
    Route::post('/kuota/edit', [KuotaController::class, 'edit']);
    Route::post('/kuota/{nip}/update', [KuotaController::class, 'update']);
    Route::post('/kuota/{nip}/delete', [KuotaController::class, 'delete']);

     // Pengadaan
     Route::get('/pengadaan', [PengadaanController::class, 'index']);
     Route::post('/pengadaan/store', [PengadaanController::class, 'store']);
     Route::post('/pengadaan/edit', [PengadaanController::class, 'edit']);
     Route::post('/pengadaan/{nip}/update', [PengadaanController::class, 'update']);
     Route::post('/pengadaan/{nip}/delete', [PengadaanController::class, 'delete']);

    // Konfigurasi

    // GAJi
    Route::get('/gaji', [GajiController::class, 'index']);
    Route::post('/gaji/store', [GajiController::class, 'store']);
    Route::post('/gaji/edit', [GajiController::class, 'edit']);
    Route::post('/gaji/{id}/update', [GajiController::class, 'update']);
    Route::post('/gaji/{id}/delete', [GajiController::class, 'delete']);

     // Lokasi kantor
     Route::get('/konfigurasi/lokasikantor', [KonfigurasiController::class, 'lokasikantor']);
     Route::post('/konfigurasi/updatelokasikantor', [KonfigurasiController::class, 'updatelokasikantor']);

     // Jam Kerja Perorang
     Route::get('/konfigurasi/jamkerja', [KonfigurasiController::class, 'jamkerja']);
     Route::post('/konfigurasi/storejamkerja', [KonfigurasiController::class, 'storejamkerja']);
     Route::post('/konfigurasi/editjamkerja', [KonfigurasiController::class, 'editjamkerja']);
     Route::post('/konfigurasi/{kode_jam_kerja}/updatejamkerja', [KonfigurasiController::class, 'updatejamkerja']);
     Route::post('/konfigurasi/{kode_jam_kerja}/deletejamkerja', [KonfigurasiController::class, 'deletejamkerja']);
     Route::get('/konfigurasi/{kode_jam_kerja}/setjamkerja', [KonfigurasiController::class, 'setjamkerja']);
     Route::post('/konfigurasi/storesetjamkerja', [KonfigurasiController::class, 'storesetjamkerja']);
     Route::post('/konfigurasi/updatesetjamkerja', [KonfigurasiController::class, 'updatesetjamkerja']);

    // Jam Kerja SKPD
    Route::get('/konfigurasi/jamkerjaskpd', [KonfigurasiController::class, 'jamkerjaskpd']);
    Route::get('/konfigurasi/jamkerjaskpd/create', [KonfigurasiController::class, 'createjamkerjaskpd']);
    Route::post('/konfigurasi/jamkerjaskpd/store', [KonfigurasiController::class, 'storejamkerjaskpd']);
    Route::get('/konfigurasi/jamkerjaskpd/{kode_jk_skpd}/edit', [KonfigurasiController::class, 'editjamkerjaskpd']);
    Route::post('/konfigurasi/jamkerjaskpd/{kode_jk_skpd}/update', [KonfigurasiController::class, 'updatejamkerjaskpd']);
    Route::get('/konfigurasi/jamkerjaskpd/{kode_jk_skpd}/show', [KonfigurasiController::class, 'showjamkerjaskpd']);
    Route::post('/konfigurasi/jamkerjaskpd/{kode_jk_skpd}/delete', [KonfigurasiController::class, 'deletejamkerjaskpd']);

    // Master Cuti
    Route::get('/mastercuti', [CutiController::class, 'index']);
    Route::post('/mastercuti/store', [CutiController::class, 'store']);
    Route::post('/mastercuti/edit', [CutiController::class, 'edit']);
    Route::post('/mastercuti/{kode_cuti}/update', [CutiController::class, 'update']);
    Route::post('/mastercuti/{kode_cuti}/delete', [CutiController::class, 'delete']);

    // Master Tugas Luar
    Route::get('/mastertugasluar', [TugasluarController::class, 'index']);
    Route::post('/mastertugasluar/store', [TugasluarController::class, 'store']);
    Route::post('/mastertugasluar/edit', [TugasluarController::class, 'edit']);
    Route::post('/mastertugasluar/{kode_tugasluar}/update', [TugasluarController::class, 'update']);
    Route::post('/mastertugasluar/{kode_tugasluar}/delete', [TugasluarController::class, 'delete']);


    // });

// END ROT PANEL ADMIN

// ROT PANEL HONORER

Route::middleware(['guest:honorer'])->group(function(){
    Route::get('/panelhonorer', function () {
        return view('auth.loginhonorer');
    })->name('loginhonorer');
    Route::post('/prosesloginhonorer', [AuthController::class, 'prosesloginhonorer']);
});

Route::middleware(['auth:honorer'])->group(function () {
    Route::get('/panelhonorer/dashboardhonorer', [DashboardController::class, 'dashboardhonorer']);
    Route::get('/proseslogouthonorer', [AuthController::class, 'proseslogouthonorer']);

    //Presensi
    Route::get('/presensihonorer/create', [PresensihonorerController::class, 'create']);
    Route::post('/presensihonorer/store', [PresensihonorerController::class, 'store']);
    Route::get('/presensihonorer/gethari', [PresensihonorerController::class, 'gethari']);

    // //Edit Profil
    // Route::get('/editprofile', [PresensihonorerController::class, 'editprofile']);
    // Route::post('/presensi/{nip}/updateprofile', [PresensihonorerController::class, 'updateprofile']);

    // //Histori
    // Route::get('/presensi/histori', [PresensihonorerController::class, 'histori']);
    // Route::post('/gethistori', [PresensihonorerController::class, 'gethistori']);

    //  //izin
    //  Route::get('/presensi/izin', [PresensihonorerController::class, 'izin']);
    //  Route::get('/presensi/buatizin', [PresensihonorerController::class, 'buatizin']);
    //  Route::post('/presensi/storeizin', [PresensihonorerController::class, 'storeizin']);

    // //Izin Absen
    // Route::get('/izinabsen', [IzinabsenController::class, 'create']);
    // Route::post('/izinabsen/store', [IzinabsenController::class, 'store']);
    // Route::get('/izinabsen/{kode_izin}/edit', [IzinabsenController::class, 'edit']);
    // Route::post('/izinabsen/{kode_izin}/update', [IzinabsenController::class, 'update']);

    // //Izin Sakit
    // Route::get('/izinsakit', [IzinsakitController::class, 'create']);
    // Route::post('/izinsakit/store', [IzinsakitController::class, 'store']);
    // Route::get('/izinsakit/{kode_izin}/edit', [IzinsakitController::class, 'edit']);
    // Route::post('/izinsakit/{kode_izin}/update', [IzinsakitController::class, 'update']);

    // //Izin Cuti
    // Route::get('/izincuti', [IzincutiController::class, 'create']);
    // Route::post('/izincuti/store', [IzincutiController::class, 'store']);
    // Route::get('/izincuti/{kode_izin}/edit', [IzincutiController::class, 'edit']);
    // Route::post('/izincuti/{kode_izin}/update', [IzincutiController::class, 'update']);

    // //Tugas Luar
    // Route::get('/tugasluar', [TugasluarController::class, 'createtugasluar']);
    // Route::post('/tugasluar/store', [TugasluarController::class, 'storetugasluar']);
    // Route::get('/tugasluar/{kode_izin}/edit', [TugasluarController::class, 'edittugasluar']);
    // Route::post('/tugasluar/{kode_izin}/update', [TugasluarController::class, 'updatetugasluar']);

    // Route::get('/izin/{kode_izin}/showact',[PresensihonorerController::class, 'showact']);
    // Route::get('/izin/{kode_izin}/delete',[PresensihonorerController::class, 'deleteizin']);


    });

// END ROT PANEL ADMIN


//PORTAL WEBSITE BKPSDM

Route::get('/',[AppController::class, 'index']);
Route::get('/struktur',[AppController::class, 'struktur']);
Route::get('/berita',[AppController::class, 'berita']);
Route::get('/detailberita/{slag}',[AppController::class, 'detailberita']);
Route::get('/beritautama',[AppController::class, 'beritautama']);
Route::get('/pelayanan',[AppController::class, 'pelayanan']);
Route::get('/detailpelayanan/{slag}',[AppController::class, 'detailpelayanan']);
Route::get('/aplikasi',[AppController::class, 'aplikasi']);
Route::get('/detailaplikasi/{slag}',[AppController::class, 'detailaplikasi']);
Route::get('/photo',[AppController::class, 'photo']);
Route::get('/kontak',[AppController::class, 'kontak']);
Route::get('/video',[AppController::class, 'video']);
Route::get('/honorer',[AppController::class, 'honorer']);
Route::get('/honorer/caridata',[AppController::class, 'caridata']);
Route::get('/honorer/detailhonorer/{nik}',[AppController::class,'detailhonorer'])->name('honorer.detailhonorer');
Route::get('/daftar',[AppController::class, 'daftar']);



Route::middleware(['guest'])->group(function(){

    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
    

});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboardweb',[AdminController::class,'index']);

    Route::get('/dashboardweb/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/dashboardweb/editor',[AdminController::class,'editor'])->middleware('userAkses:editor');

    //Berita
    Route::get('/dashboardweb/berita',[BeritaController::class,'index'])->name('berita')->middleware('auth');
    Route::get('/dashboardweb/berita/create',[BeritaController::class,'create'])->name('berita.create')->middleware('auth');
    Route::post('/dashboardweb/berita/store',[BeritaController::class,'store'])->name('berita.store')->middleware('auth');
    Route::get('/dashboardweb/berita/edit/{id}',[BeritaController::class,'edit'])->name('berita.edit')->middleware('auth');
    Route::post('/dashboardweb/berita/update/{id}',[BeritaController::class,'update'])->name('berita.update')->middleware('auth');
    Route::post('/dashboardweb/berita/delete/{id}',[BeritaController::class,'delete'])->name('berita.delete')->middleware('auth');

    //Photo
    Route::get('/dashboardweb/photo',[PhotoController::class,'index'])->name('photo')->middleware('auth');
    Route::post('/dashboardweb/photo/store',[PhotoController::class,'store'])->name('photo.store')->middleware('auth');
    Route::post('/dashboardweb/photo/update/{id}',[PhotoController::class,'update'])->name('photo.update')->middleware('auth');
    Route::post('/dashboardweb/photo/delete/{id}',[PhotoController::class,'delete'])->name('photo.delete')->middleware('auth');

    //Video
    Route::get('/dashboardweb/video',[VideoController::class,'index'])->name('video')->middleware('auth');
    Route::post('/dashboardweb/video/store',[VideoController::class,'store'])->name('video.store')->middleware('auth');
    Route::post('/dashboardweb/video/update/{id}',[VideoController::class,'update'])->name('video.update')->middleware('auth');
    Route::post('/dashboardweb/video/delete/{id}',[VideoController::class,'delete'])->name('video.delete')->middleware('auth');
    
     //Kontak
     Route::get('/dashboardweb/kontak',[KontakController::class,'index'])->name('kontak')->middleware('auth');
     Route::get('/dashboardweb/kontak/create',[KontakController::class,'create'])->name('kontak.create')->middleware('auth');
     Route::post('/dashboardweb/kontak/store',[KontakController::class,'store'])->name('kontak.store')->middleware('auth');
     Route::get('/dashboardweb/kontak/edit/{id}',[KontakController::class,'edit'])->name('kontak.edit')->middleware('auth');
     Route::post('/dashboardweb/kontak/update/{id}',[KontakController::class,'update'])->name('kontak.update')->middleware('auth');
     Route::post('/dashboardweb/kontak/delete/{id}',[KontakController::class,'delete'])->name('kontak.delete')->middleware('auth');
     
     //Pelayanan
     Route::get('/dashboardweb/pelayanan',[PelayananController::class,'index'])->name('pelayanan')->middleware('auth');
     Route::get('/dashboardweb/pelayanan/create',[PelayananController::class,'create'])->name('pelayanan.create')->middleware('auth');
     Route::post('/dashboardweb/pelayanan/store',[PelayananController::class,'store'])->name('pelayanan.store')->middleware('auth');
     Route::get('/dashboardweb/pelayanan/edit/{id}',[PelayananController::class,'edit'])->name('pelayanan.edit')->middleware('auth');
     Route::post('/dashboardweb/pelayanan/update/{id}',[PelayananController::class,'update'])->name('pelayanan.update')->middleware('auth');
     Route::post('/dashboardweb/pelayanan/delete/{id}',[PelayananController::class,'delete'])->name('pelayanan.delete')->middleware('auth');
     
    //Aplikasi
    Route::get('/dashboardweb/aplikasi',[AplikasiController::class,'index'])->name('aplikasi')->middleware('auth');
    Route::get('/dashboardweb/aplikasi/create',[AplikasiController::class,'create'])->name('aplikasi.create')->middleware('auth');
    Route::post('/dashboardweb/aplikasi/store',[AplikasiController::class,'store'])->name('aplikasi.store')->middleware('auth');
    Route::get('/dashboardweb/aplikasi/edit/{id}',[AplikasiController::class,'edit'])->name('aplikasi.edit')->middleware('auth');
    Route::post('/dashboardweb/aplikasi/update/{id}',[AplikasiController::class,'update'])->name('aplikasi.update')->middleware('auth');
    Route::post('/dashboardweb/aplikasi/delete/{id}',[AplikasiController::class,'delete'])->name('aplikasi.delete')->middleware('auth');
     
          
    //Tag Berita
    Route::get('/dashboardweb/tagberita',[BeritaController::class,'tagberita'])->name('tagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/storetagberita',[BeritaController::class,'storetagberita'])->name('tagberita.storetagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/updatetagberita/{id}',[BeritaController::class,'updatetagberita'])->name('tagberita.updatetagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/deletetagberita/{id}',[BeritaController::class,'deletetagberita'])->name('tagberita.deletetagberita')->middleware('auth');
    
    //Honorer
    Route::get('/dashboardweb/honorer',[HonorerController::class,'index'])->name('honorer')->middleware('auth');   
    Route::get('/dashboardweb/honorer/create',[HonorerController::class,'create'])->name('honorer.create')->middleware('auth');
    Route::post('/dashboardweb/honorer/store',[HonorerController::class,'store'])->name('honorer.store')->middleware('auth');
    Route::get('/dashboardweb/honorer/edit/{nik}',[HonorerController::class,'edit'])->name('honorer.edit')->middleware('auth');
    Route::post('/dashboardweb/honorer/update/{nik}',[HonorerController::class,'update'])->name('honorer.update')->middleware('auth');
    Route::post('/dashboardweb/honorer/delete/{nik}',[HonorerController::class,'delete'])->name('honorer.delete')->middleware('auth');    

    //Daftar
    Route::get('/dashboardweb/daftar',[DaftarController::class,'index'])->name('daftar')->middleware('auth');   
    Route::post('/dashboardweb/daftar/store',[DaftarController::class,'store'])->name('daftar.store')->middleware('auth');
    Route::post('/dashboardweb/daftar/update/{id}',[DaftarController::class,'update'])->name('daftar.update')->middleware('auth');
    Route::post('/dashboardweb/daftar/delete/{id}',[DaftarController::class,'delete'])->name('daftar.delete')->middleware('auth');    


    Route::get('/dashboardweb/editor',[AdminController::class,'editor'])->middleware('userAkses:editor');

    //Berita
    Route::get('/dashboardweb/berita',[BeritaController::class,'index'])->name('berita')->middleware('auth');
    Route::get('/dashboardweb/berita/create',[BeritaController::class,'create'])->name('berita.create')->middleware('auth');
    Route::post('/dashboardweb/berita/store',[BeritaController::class,'store'])->name('berita.store')->middleware('auth');
    Route::get('/dashboardweb/berita/edit/{id}',[BeritaController::class,'edit'])->name('berita.edit')->middleware('auth');
    Route::post('/dashboardweb/berita/update/{id}',[BeritaController::class,'update'])->name('berita.update')->middleware('auth');
    Route::post('/dashboardweb/berita/delete/{id}',[BeritaController::class,'delete'])->name('berita.delete')->middleware('auth');

    //Photo
    Route::get('/dashboardweb/photo',[PhotoController::class,'index'])->name('photo')->middleware('auth');
    Route::post('/dashboardweb/photo/store',[PhotoController::class,'store'])->name('photo.store')->middleware('auth');
    Route::post('/dashboardweb/photo/update/{id}',[PhotoController::class,'update'])->name('photo.update')->middleware('auth');
    Route::post('/dashboardweb/photo/delete/{id}',[PhotoController::class,'delete'])->name('photo.delete')->middleware('auth');

    //Video
    Route::get('/dashboardweb/video',[VideoController::class,'index'])->name('video')->middleware('auth');
    Route::post('/dashboardweb/video/store',[VideoController::class,'store'])->name('video.store')->middleware('auth');
    Route::post('/dashboardweb/video/update/{id}',[VideoController::class,'update'])->name('video.update')->middleware('auth');
    Route::post('/dashboardweb/video/delete/{id}',[VideoController::class,'delete'])->name('video.delete')->middleware('auth');
    
    //Tag Berita
    Route::get('/dashboardweb/tagberita',[BeritaController::class,'tagberita'])->name('tagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/storetagberita',[BeritaController::class,'storetagberita'])->name('tagberita.storetagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/updatetagberita/{id}',[BeritaController::class,'updatetagberita'])->name('tagberita.updatetagberita')->middleware('auth');
    Route::post('/dashboardweb/tagberita/deletetagberita/{id}',[BeritaController::class,'deletetagberita'])->name('tagberita.deletetagberita')->middleware('auth');
    
    //Daftar
    Route::get('/dashboardweb/daftar',[DaftarController::class,'index'])->name('daftar')->middleware('auth');   
    Route::post('/dashboardweb/daftar/store',[DaftarController::class,'store'])->name('daftar.store')->middleware('auth');
    Route::post('/dashboardweb/daftar/update/{id}',[DaftarController::class,'update'])->name('daftar.update')->middleware('auth');
    Route::post('/dashboardweb/daftar/delete/{id}',[DaftarController::class,'delete'])->name('daftar.delete')->middleware('auth');    


    //STRUKTUR
    Route::get('/dashboardweb/struktur',[StrukturController::class,'index'])->name('struktur')->middleware('auth');   
    Route::post('/dashboardweb/struktur/store',[StrukturController::class,'store'])->name('struktur.store')->middleware('auth');
    Route::post('/dashboardweb/struktur/update/{id}',[StrukturController::class,'update'])->name('struktur.update')->middleware('auth');
    Route::post('/dashboardweb/struktur/delete/{id}',[StrukturController::class,'delete'])->name('struktur.delete')->middleware('auth');    
    
    Route::get('/logout',[AuthController::class,'logout']);
    

});
