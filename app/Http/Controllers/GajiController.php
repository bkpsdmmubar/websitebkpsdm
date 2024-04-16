<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Blade;


class GajiController extends Controller
{
    public function index(Request $request){
        $golongan = $request->golongan;
        $query = Gaji::query();
        $query->select('*');
        if (!empty($golongan)) {
            $query->where('golongan','like','%'.$request->golongan.'%');
        }
        $gaji = DB::table('gaji')
        ->orderBy('id')
        ->paginate(10);

        // $gaji = DB::table('gaji')
        // ->get();

        return view('gaji.index', compact('gaji'));

    }

    public function store(Request $request)
    {
        // $id             = $request->id;
        $golongan       = $request->golongan;
        $masa_kerja     = $request->masa_kerja;
        $gaji_pokok     = $request->gaji_pokok;
        $data = [
                'golongan'       => $golongan,
                'masa_kerja'     => $masa_kerja,
                'gaji_pokok'     => $gaji_pokok
            ];

        $cek = DB::table('gaji')->where('golongan', $golongan)->count();
        if($cek>0){
            return Redirect::back()->with(['warning'=>'Data dengan Golongan '.$golongan. ' Sudah Ada']);
        }

        $simpan = DB::table('gaji')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $id = $request->id;
        $gaji = DB::table('gaji')->where('id', $id)->first();
        return view('gaji.edit', compact('gaji'));
    }

    public function update($id, Request $request){
        $golongan       = $request->golongan;
        $masa_kerja     = $request->masa_kerja;
        $gaji_pokok     = $request->gaji_pokok;
        $data = [
                'golongan'       => $golongan,
                'masa_kerja'     => $masa_kerja,
                'gaji_pokok'     => $gaji_pokok
            ];
            $update = DB::table('gaji')->where('id', $id)->update($data);
            if($update){
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($id) {
        $delete = DB::table('gaji')->where('id', $id)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
