<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SkpdController extends Controller
{
    public function index(Request $request){
        $nama_skpd = $request->nama_skpd;
        $query = Skpd::query();
        $query->select('*');
        if (!empty($nama_skpd)) {
            $query->where('nama_skpd','like','%'.$request->nama_skpd.'%');
        }
        $skpd = DB::table('skpd')->get();

        return view('skpd.index', compact('skpd'));

    }

    public function store(Request $request)
    {
        $kode_skpd      = $request->kode_skpd;
        $nama_skpd      = $request->nama_skpd;
        $lokasi_kantor  = $request->lokasi_kantor;
        $radius         = $request->radius;
        $data = [
                'kode_skpd'      => $kode_skpd,
                'nama_skpd'      => $nama_skpd,
                'lokasi_kantor'  => $lokasi_kantor,
                'radius'         => $radius
            ];

        $cek = DB::table('skpd')->where('kode_skpd', $kode_skpd)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Kode SKPD '.$kode_skpd. ' Sudah Ada']);
        }

        $simpan = DB::table('skpd')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_skpd = $request->kode_skpd;
        $skpd = DB::table('skpd')->where('kode_skpd', $kode_skpd)->first();
        return view('skpd.edit', compact('skpd'));
    }

    public function update($kode_skpd, Request $request){
        $kode_skpd      = $request->kode_skpd;
        $nama_skpd      = $request->nama_skpd;
        $lokasi_kantor  = $request->lokasi_kantor;
        $radius         = $request->radius;
        $data = [
                'kode_skpd'      => $kode_skpd,
                'nama_skpd'      => $nama_skpd,
                'lokasi_kantor'  => $lokasi_kantor,
                'radius'         => $radius
            ];
            $update = DB::table('skpd')->where('kode_skpd', $kode_skpd)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_skpd) {
        $delete = DB::table('skpd')->where('kode_skpd', $kode_skpd)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
