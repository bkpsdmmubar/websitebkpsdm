<?php

namespace App\Http\Controllers;

use App\Models\Asn;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukturController extends Controller
{

    public function index(){

        return view('dashboardweb.struktur.index',[
            'strukturs' => Struktur::orderBy('id','desc')
            ->join('pangkat','struktur.kode_pangkatgol','=','pangkat.kode_pangkatgol')
            ->join('jabatan','struktur.kode_jabatan','=','jabatan.kode_jabatan')
            ->join('asn','struktur.nip','=','asn.nip')
            ->get(),
            'jabatan' => Jabatan::orderBy('kode_jabatan')->get(),
            'pangkat' => Pangkat::orderBy('kode_pangkatgol')->get(),
            'asn' => Asn::orderBy('nip')->get(),
            

        ]);


    }

    public function create(){

        return view('dashboardweb.struktur.create');


    }

    public function store(Request $request){

        $rules = [
            'nama'      => 'required',
            'nip'       => 'required',
            'kode_jabatan'   => 'required',
            'bidang'    => 'required',
            'kode_pangkatgol'   => 'required',
            'image'     => 'required|max:1000|mimes:jpg,jpeg,png,webp',
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'nip.required'      => 'NIP wajib diisi!',
            'jabatan.required'  => 'Jabatan wajib diisi!',
            'bidang.required'   => 'Bidang wajib diisi!',
            'pangkat.required'  => 'Pangkat wajib diisi!',
            'image.required'    => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/struktur', $fileName);

        Struktur::create([
            'nama'      => $request->nama,
            'nip'       => $request->nip,
            'kode_jabatan'   => $request->kode_jabatan,
            'bidang'    => $request->bidang,
            'kode_pangkatgol'   => $request->kode_pangkatgol,
            'image'     => $fileName,
        ]);

        return redirect( route('struktur') )->with('success', 'data struktur berhasil di simpan');

    }

    public function edit($id){


    }

    public function update(Request $request, $id){
        $struktur = struktur::find($id);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'nama'      => 'required',
            'nip'       => 'required',
            'kode_jabatan'   => 'required',
            'bidang'    => 'required',
            'kode_pangkatgol'   => 'required',
            'image'     => 'required|max:1000|mimes:jpg,jpeg,png,webp',
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'nip.required'      => 'NIP wajib diisi!',
            'jabatan.required'  => 'jabatan wajib diisi!',
            'bidang.required'   => 'Bidang wajib diisi!',
            'pangkat.required'  => 'Pangkat wajib diisi!',
            'image.required'    => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/struktur/' . $struktur->image)) {
                \File::delete('storage/struktur/' . $request->old_image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/struktur', $fileName);
        }

        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        
        $struktur->update([
            'nama'      => $request->nama,
            'nip'       => $request->nip,
            'kode_jabatan'   => $request->kode_jabatan,
            'bidang'    => $request->bidang,
            'kode_pangkatgol'   => $request->kode_pangkatgol,
            'image'     => $checkFileName,
        ]);

        return redirect(route('struktur'))->with('success', 'data struktur berhasil di update');


    }


    public function delete($id){

        $struktur = Struktur::find($id);
        if (\File::exists('storage/struktur/' . $struktur->image)) {
            \File::delete('storage/struktur/' . $struktur->image);
        }

        $struktur->delete();

        return redirect(route('struktur'))->with('success', 'data berhasil di hapus');

    }

}
