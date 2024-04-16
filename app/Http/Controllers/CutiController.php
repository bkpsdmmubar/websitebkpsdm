<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CutiController extends Controller
{
    public function index(){
        $query = Cuti::query();
        $mastercuti = DB::table('master_cuti')->orderBy('kode_cuti', 'asc')->get();


        return view('mastercuti.index', compact('mastercuti'));


    }

    public function store(Request $request)
    {
        $kode_cuti     = $request->kode_cuti;
        $nama_cuti     = $request->nama_cuti;
        $jml_hari      = $request->jml_hari;

        try {
            $cek = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->count();
                if($cek>0){
                    return Redirect::back()->with(['warning'=>'Data dengan Kode Jabatan '.$kode_cuti. ' Sudah Ada']);
                }
            DB::table('master_cuti')->insert([
                'kode_cuti'     => $kode_cuti,
                'nama_cuti'     => $nama_cuti,
                'jml_hari'      => $jml_hari
            ]);
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_cuti = $request->kode_cuti;
        $mastercuti = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->first();

        return view('mastercuti.edit', compact('mastercuti'));
    }

    public function update($kode_cuti, Request $request){
        $kode_cuti     = $request->kode_cuti;
        $nama_cuti     = $request->nama_cuti;
        $jml_hari      = $request->jml_hari;

        try {
            DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->update([
                'kode_cuti'     => $kode_cuti,
                'nama_cuti'     => $nama_cuti,
                'jml_hari'      => $jml_hari
            ]);
            return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_cuti) {
        $delete = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
