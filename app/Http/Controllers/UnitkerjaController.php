<?php

namespace App\Http\Controllers;

use App\Models\Unitkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UnitkerjaController extends Controller
{
    public function index(Request $request){
        $nama_unitkerja = $request->nama_unitkerja;
        $query = Unitkerja::query();
        $query->select('*');
        if (!empty($nama_unitkerja)) {
            $query->where('nama_unitkerja','like','%'.$request->nama_unitkerja.'%');
        }
        $unitkerja = $query->get();

        return view('unitkerja.index', compact('unitkerja'));


    }

    public function store(Request $request)
    {
        $kode_unitkerja      = $request->kode_unitkerja;
        $nama_unitkerja      = $request->nama_unitkerja;

        $data = [
                'kode_unitkerja'      => $kode_unitkerja,
                'nama_unitkerja'      => $nama_unitkerja

            ];

        $cek = DB::table('unitkerja')->where('kode_unitkerja', $kode_unitkerja)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Kode Unit Kerja '.$kode_unitkerja. ' Sudah Ada']);
        }

        $simpan = DB::table('unitkerja')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_unitkerja = $request->kode_unitkerja;
        $unitkerja = DB::table('unitkerja')->where('kode_unitkerja', $kode_unitkerja)->first();
        return view('unitkerja.edit', compact('unitkerja'));
    }

    public function update($kode_unitkerja, Request $request){
        $kode_unitkerja      = $request->kode_unitkerja;
        $nama_unitkerja      = $request->nama_unitkerja;

        $data = [
                'kode_unitkerja'      => $kode_unitkerja,
                'nama_unitkerja'      => $nama_unitkerja

            ];
            $update = DB::table('unitkerja')->where('kode_unitkerja', $kode_unitkerja)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_unitkerja) {
        $delete = DB::table('unitkerja')->where('kode_unitkerja', $kode_unitkerja)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
