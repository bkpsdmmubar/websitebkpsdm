<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index(Request $request){
        $nama_jabatan = $request->nama_jabatan;
        $query = Pengadaan::query();
        $query->join('skpd','jabatan.kode_skpd','=','skpd.kode_skpd');
        $query->join('unitkerja','jabatan.kode_unitkerja','=','unitkerja.kode_unitkerja');
        $query->select('*');
        if (!empty($nama_jabatan)) {
            $query->where('nama_jabatan','like','%'.$request->nama_jabatan.'%');
        }
        $jabatan = $query->get();

        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();

        return view('jabatan.index', compact('jabatan', 'skpd','unitkerja'));


    }

    public function store(Request $request)
    {
        $kode_jabatan      = $request->kode_jabatan;
        $kode_skpd         = $request->kode_skpd;
        $kode_unitkerja    = $request->kode_unitkerja;
        $nama_jabatan      = $request->nama_jabatan;
        $eselon            = $request->eselon;
        $jenis             = $request->jenis;
        $kelas_jabatan     = $request->kelas_jabatan;
        $data = [
                'kode_jabatan'      => $kode_jabatan,
                'kode_skpd'         => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'nama_jabatan'      => $nama_jabatan,
                'eselon'            => $eselon,
                'jenis'             => $jenis,
                'kelas_jabatan'     => $kelas_jabatan
            ];

        $cek = DB::table('jabatan')->where('kode_jabatan', $kode_jabatan)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Kode Jabatan '.$kode_jabatan. ' Sudah Ada']);
        }

        $simpan = DB::table('jabatan')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_jabatan = $request->kode_jabatan;
        $jabatan = DB::table('jabatan')->where('kode_jabatan', $kode_jabatan)->first();
        $unitkerja = DB::table('unitkerja')->get();
        $skpd = DB::table('skpd')->get();
        return view('jabatan.edit', compact('jabatan', 'skpd','unitkerja'));
    }

    public function update($kode_jabatan, Request $request){
        $kode_jabatan      = $request->kode_jabatan;
        $kode_skpd         = $request->kode_skpd;
        $kode_unitkerja    = $request->kode_unitkerja;
        $nama_jabatan      = $request->nama_jabatan;
        $eselon            = $request->eselon;
        $jenis             = $request->jenis;
        $kelas_jabatan     = $request->kelas_jabatan;
        $data = [
                'kode_jabatan'       => $kode_jabatan,
                'kode_skpd'          => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'nama_jabatan'       => $nama_jabatan,
                'eselon'             => $eselon,
                'jenis'              => $jenis,
                'kelas_jabatan'      => $kelas_jabatan,
            ];
            $update = DB::table('jabatan')->where('kode_jabatan', $kode_jabatan)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_jabatan) {
        $delete = DB::table('jabatan')->where('kode_jabatan', $kode_jabatan)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}

