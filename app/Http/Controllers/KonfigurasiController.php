<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setjamkerja;
use App\Models\Setjamkerjaskpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KonfigurasiController extends Controller
{
    public function lokasikantor(){
        $lok_kantor  = DB::table('konfigurasi_lokasi')->where('id',1)->first();
        return view('konfigurasi.lokasikantor',compact('lok_kantor'));
    }

    public function updatelokasikantor(Request $request)
    {
        $lokasi_kantor  = $request->lokasi_kantor;
        $radius         = $request->radius;
        $update = DB::table('konfigurasi_lokasi')->where('id', 1)->update([
            'lokasi_kantor' => $lokasi_kantor,
            'radius'        => $radius
        ]);

        if($update){
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function jamkerja()
    {
        $jamkerja = DB::table('jam_kerja')->orderBy('kode_jam_kerja')->get();
        return view('konfigurasi.jamkerja', compact('jamkerja'));
    }

    public function storejamkerja(Request $request)
    {
        $kode_jam_kerja     = $request->kode_jam_kerja;
        $nama_jam_kerja     = $request->nama_jam_kerja;
        $awal_jam_masuk     = $request->awal_jam_masuk;
        $jam_masuk          = $request->jam_masuk;
        $akhir_jam_masuk    = $request->akhir_jam_masuk;
        $jam_pulang         = $request->jam_pulang;
        $lintashari         = $request->lintashari;
        $data = [
                'kode_jam_kerja'     => $kode_jam_kerja,
                'nama_jam_kerja'     => $nama_jam_kerja,
                'awal_jam_masuk'     => $awal_jam_masuk,
                'jam_masuk'          => $jam_masuk,
                'akhir_jam_masuk'    => $akhir_jam_masuk,
                'jam_pulang'         => $jam_pulang,
                'lintashari'         => $lintashari
            ];

        $cek = DB::table('jam_kerja')->where('kode_jam_kerja', $kode_jam_kerja)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Kode SKPD '.$kode_jam_kerja. ' Sudah Ada']);
        }

        $simpan = DB::table('jam_kerja')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function editjamkerja(Request $request){
        $kode_jam_kerja = $request->kode_jam_kerja;
        $jamkerja = DB::table('jam_kerja')->where('kode_jam_kerja', $kode_jam_kerja)->first();
        return view('konfigurasi.editjamkerja', compact('jamkerja'));
    }

    public function updatejamkerja($kode_jam_kerja, Request $request){
        $kode_jam_kerja     = $request->kode_jam_kerja;
        $nama_jam_kerja     = $request->nama_jam_kerja;
        $awal_jam_masuk     = $request->awal_jam_masuk;
        $jam_masuk          = $request->jam_masuk;
        $akhir_jam_masuk    = $request->akhir_jam_masuk;
        $jam_pulang         = $request->jam_pulang;
        $lintashari         = $request->lintashari;
        $data = [
                'kode_jam_kerja'     => $kode_jam_kerja,
                'nama_jam_kerja'     => $nama_jam_kerja,
                'awal_jam_masuk'     => $awal_jam_masuk,
                'jam_masuk'          => $jam_masuk,
                'akhir_jam_masuk'    => $akhir_jam_masuk,
                'jam_pulang'         => $jam_pulang,
                'lintashari'         => $lintashari
            ];
            $update = DB::table('jam_kerja')->where('kode_jam_kerja', $kode_jam_kerja)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function deletejamkerja($kode_jam_kerja) {
        $delete = DB::table('jam_kerja')->where('kode_jam_kerja', $kode_jam_kerja)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    public function setjamkerja($nip){
        $asn = DB::table('asn')
            ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
            ->join('unitkerja','asn.kode_unitkerja','=','unitkerja.kode_unitkerja')
            ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
            ->where('nip', $nip)
            ->first();
        $jamkerja = DB::table('jam_kerja')->orderBy('nama_jam_kerja')->get();

        //pengecekan sudah ada data atau belum
        $cekjamkerja = DB::table('konfigurasi_jamkerja')->where('nip', $nip)->count();

        if($cekjamkerja > 0) {
            $setjamkerja = DB::table('konfigurasi_jamkerja')->where('nip', $nip)->get();
            return view('konfigurasi.editsetjamkerja', compact('asn', 'jamkerja', 'setjamkerja'));
        } else {
        return view('konfigurasi.setjamkerja', compact('asn', 'jamkerja'));
        }
    }

    public function storesetjamkerja(Request $request)
    {
        $nip                = $request->nip;
        $hari               = $request->hari;
        $kode_jam_kerja     = $request->kode_jam_kerja;

        for($i=0; $i < count($hari); $i++ ){
            $data[] = [
                'nip'               => $nip,
                'hari'              => $hari[$i],
                'kode_jam_kerja'    => $kode_jam_kerja[$i],
            ];
        }

        try {
            Setjamkerja::insert($data);
            return Redirect('/asn')->with(['success' => 'Jam Kerja Berhasil di Setting']);
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Jam Kerja Gagal di Setting']);
            // dd($e);
        }
    }

    public function updatesetjamkerja(Request $request)
    {
        $nip                = $request->nip;
        $hari               = $request->hari;
        $kode_jam_kerja     = $request->kode_jam_kerja;

        for($i=0; $i < count($hari); $i++ ){
            $data[] = [
                'nip'               => $nip,
                'hari'              => $hari[$i],
                'kode_jam_kerja'    => $kode_jam_kerja[$i],
            ];
        }

        DB::beginTransaction();

        try {
            DB::table('konfigurasi_jamkerja')->where('nip', $nip)->delete();
            Setjamkerja::insert($data);
            DB::commit();
            return Redirect('/asn')->with(['success' => 'Jam Kerja Berhasil di Setting']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect::back()->with(['warning' => 'Jam Kerja Gagal di Setting']);
            // dd($e);
        }
    }

    public function jamkerjaskpd()
    {
        $jamkerjaskpd = DB::table('konfigurasi_jk_skpd')
        ->join('skpd','konfigurasi_jk_skpd.kode_skpd', '=', 'skpd.kode_skpd')
        ->join('unitkerja','konfigurasi_jk_skpd.kode_unitkerja', '=', 'unitkerja.kode_unitkerja')
        ->get();
        return view('konfigurasi.jamkerjaskpd', compact('jamkerjaskpd'));
    }

    public function createjamkerjaskpd()
    {
        $jamkerja = DB::table('jam_kerja')->orderBy('nama_jam_kerja')->get();
        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        return view('konfigurasi.createjamkerjaskpd', compact('jamkerja', 'skpd', 'unitkerja'));
    }

    public function storejamkerjaskpd(Request $request)
    {
        $kode_skpd          = $request->kode_skpd;
        $kode_unitkerja     = $request->kode_unitkerja;
        $hari               = $request->hari;
        $kode_jam_kerja     = $request->kode_jam_kerja;
        $kode_jk_skpd       = "J".$kode_skpd.$kode_unitkerja;

        DB::beginTransaction();
        try {
            //menyimpan data ke tabel konfigurasi_jk_skpd
            DB::table('konfigurasi_jk_skpd')->insert([
                'kode_jk_skpd'      => $kode_jk_skpd,
                'kode_skpd'         => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja
            ]);

            for($i=0; $i < count($hari); $i++ ){
                $data[] = [
                    'kode_jk_skpd'      => $kode_jk_skpd,
                    'hari'              => $hari[$i],
                    'kode_jam_kerja'    => $kode_jam_kerja[$i]
                ];
            }
            Setjamkerjaskpd::insert($data);
            DB::commit();
            return Redirect('/konfigurasi/jamkerjaskpd')->with(['success' => 'Jam Kerja Berhasil di Setting']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect::back()->with(['warning' => 'Jam Kerja Gagal di Setting']);
        }
    }

    public function editjamkerjaskpd($kode_jk_skpd)
    {
        $jamkerjaskpd = DB::table('konfigurasi_jk_skpd')->where('kode_jk_skpd', $kode_jk_skpd)->first();
        $jamkerja = DB::table('jam_kerja')->orderBy('nama_jam_kerja')->get();
        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $jamkerjaskpd_detail = DB::table('konfigurasi_jk_skpd_detail')->where('kode_jk_skpd', $kode_jk_skpd)->get();
        return view('konfigurasi.editjamkerjaskpd', compact('jamkerja', 'skpd', 'unitkerja', 'jamkerjaskpd', 'jamkerjaskpd_detail'));
    }

    public function updatejamkerjaskpd($kode_jk_skpd, Request $request)
    {
        $hari               = $request->hari;
        $kode_jam_kerja     = $request->kode_jam_kerja;

        DB::beginTransaction();
        try {
            //Hapus data jam kerja sebelumnya
            DB::table('konfigurasi_jk_skpd_detail')->where('kode_jk_skpd',$kode_jk_skpd)->delete();
            for($i=0; $i < count($hari); $i++ ){
                $data[] = [
                    'kode_jk_skpd'      => $kode_jk_skpd,
                    'hari'              => $hari[$i],
                    'kode_jam_kerja'    => $kode_jam_kerja[$i]
                ];
            }
            Setjamkerjaskpd::insert($data);
            DB::commit();
            return Redirect('/konfigurasi/jamkerjaskpd')->with(['success' => 'Jam Kerja Berhasil di Setting']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect::back()->with(['warning' => 'Jam Kerja Gagal di Setting']);
        }
    }


    public function showjamkerjaskpd($kode_jk_skpd)
    {
        $jamkerjaskpd = DB::table('konfigurasi_jk_skpd')->where('kode_jk_skpd', $kode_jk_skpd)->first();
        $jamkerja = DB::table('jam_kerja')->orderBy('nama_jam_kerja')->get();
        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $jamkerjaskpd_detail = DB::table('konfigurasi_jk_skpd_detail')
            ->join('jam_kerja','konfigurasi_jk_skpd_detail.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('kode_jk_skpd', $kode_jk_skpd)->get();
        return view('konfigurasi.showjamkerjaskpd', compact('jamkerja', 'skpd', 'unitkerja', 'jamkerjaskpd', 'jamkerjaskpd_detail'));
    }

    public function deletejamkerjaskpd($kode_jk_skpd) {

        try {
            DB::table('konfigurasi_jk_skpd')->where('kode_jk_skpd', $kode_jk_skpd)->delete();
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }

    }




}
