<?php

namespace App\Http\Controllers;
use App\Models\Kuota;

use Illuminate\Http\Request;

class KuotaController extends Controller
{
    public function index(Request $request){
        $kuota = $request->kuota;
        $query = Kuota::query();
        $query->select('*');
        if (!empty($kuota)) {
            $query->where('kuota','like','%'.$request->kuota.'%');
        }
        $kuota = $query->get();
        
        return view('kuota.index', compact('kuota'));


    }

    public function store(Request $request)
    {
        $kode_kuota     = $request->kode_kuota;
        $kuota          = $request->kuota;
        $terisi         = $request->terisi;
        $sisa           = $request->sisa;
        $nomor_sk       = $request->nomor_sk;
        $tanggal_sk     = $request->tanggal_sk;
        $file           = $request->file;
        $data = [
                'kode_kuota'    => $kode_kuota,
                'kuota'         => $kuota,
                'terisi'        => $terisi,
                'sisa'          => $sisa,
                'nomor_sk'      => $nomor_sk,
                'tanggal_sk'    => $tanggal_sk,
                'file'          => $file
            ];

        $cek = DB::table('kuota')->where('kode_kuota', $kode_kuota)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Kode Kuota '.$kode_kuota. ' Sudah Ada']);
        }

        $simpan = DB::table('kuota')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_kuota = $request->kode_kuota;
        $jabatan = DB::table('jabatan')->where('kode_kuota', $kode_kuota)->first();
        $unitkerja = DB::table('unitkerja')->get();
        $skpd = DB::table('skpd')->get();
        return view('jabatan.edit', compact('jabatan', 'skpd','unitkerja'));
    }

    public function update($kode_kuota, Request $request){
        $kode_kuota      = $request->kode_kuota;
        $kode_skpd         = $request->kode_skpd;
        $kode_unitkerja    = $request->kode_unitkerja;
        $nama_jabatan      = $request->nama_jabatan;
        $eselon            = $request->eselon;
        $jenis             = $request->jenis;
        $kelas_jabatan     = $request->kelas_jabatan;
        $data = [
                'kode_kuota'       => $kode_kuota,
                'kode_skpd'          => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'nama_jabatan'       => $nama_jabatan,
                'eselon'             => $eselon,
                'jenis'              => $jenis,
                'kelas_jabatan'      => $kelas_jabatan,
            ];
            $update = DB::table('jabatan')->where('kode_kuota', $kode_kuota)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_kuota) {
        $delete = DB::table('jabatan')->where('kode_kuota', $kode_kuota)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
