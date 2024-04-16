<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{

    public function index(){

        return view('dashboardweb.kontak.index',[
            'kontaks' => Kontak::orderBy('id','desc')->get()
        ]);


    }

    public function create(){

        return view('dashboardweb.kontak.create');
    }

    public function store(Request $request){

        $rules = [
            // 'id'            => 'required',
            'alamat'        => 'required',
            'desa'          => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'email'         => 'required',
        ];

        $messages = [
            'alamat.required'       => 'Alamat wajib diisi!',
            'desa.required'         => 'Nama Desa wajib diisi!',
            'kecamatan.required'    => 'Nama Kecamatan wajib diisi!',
            'kabupaten.required'    => 'Nama Kabupaten wajib diisi!',
            'provinsi.required'     => 'Nama Provinsi wajib diisi!',
            'email.required'        => 'Email wajib diisi!',
            // 'website.required'       => 'Website wajib diisi!',
            // 'no_hp.required'         => 'Nomor Telepon wajib diisi!',
            // 'instagram.required'    => 'Instagram wajib diisi!',
            // 'facebook.required'    => 'Facebook wajib diisi!',
            // 'tiktok.required'     => 'Tiktok wajib diisi!',
            // 'snacvideo.required'        => 'Snack Video wajib diisi!',
            // 'twitter.required'        => 'Twitter wajib diisi!',
            // 'youtube.required'        => 'Youtube wajib diisi!',

        ];

        $this->validate($request, $rules, $messages);

        kontak::create([
            'alamat'        => $request->alamat,
            'desa'          => $request->desa,
            'kecamatan'     => $request->kecamatan,
            'kabupaten'     => $request->kabupaten,
            'provinsi'      => $request->provinsi,
            'email'         => $request->email,
            'website'       => $request->website,
            'no_hp'         => $request->no_hp,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook,
            'tiktok'        => $request->tiktok,
            'snacvideo'     => $request->snacvideo,
            'twitter'       => $request->twitter,
            'youtube'       => $request->youtube,

        ]);

        return redirect( route('kontak') )->with('success', 'Data kontak berhasil di simpan');

    }

    public function edit($id){

        $kontak = Kontak::find($id);
        return view('dashboardweb.kontak.edit', [
            'kontak' => $kontak
        ]);

    }

    public function update(Request $request, $id){
        $kontak = kontak::find($id);

        
        $rules = [
            'alamat'        => 'required',
            'desa'          => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'email'         => 'required',
        ];

        $messages = [
            'alamat.required'       => 'Alamat wajib diisi!',
            'desa.required'         => 'Nama Desa wajib diisi!',
            'kecamatan.required'    => 'Nama Kecamatan wajib diisi!',
            'kabupaten.required'    => 'Nama Kabupaten wajib diisi!',
            'provinsi.required'     => 'Nama Provinsi wajib diisi!',
            'email.required'        => 'Email wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        $kontak->update([
            'alamat'        => $request->alamat,
            'desa'          => $request->desa,
            'kecamatan'     => $request->kecamatan,
            'kabupaten'     => $request->kabupaten,
            'provinsi'      => $request->provinsi,
            'email'         => $request->email,
            'website'       => $request->website,
            'no_hp'         => $request->no_hp,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook,
            'tiktok'        => $request->tiktok,
            'snacvideo'     => $request->snacvideo,
            'twitter'       => $request->twitter,
            'youtube'       => $request->youtube,
        ]);

        return redirect(route('kontak'))->with('success', 'Data kontak berhasil di update');


    }


    public function delete($id){

        $kontak = kontak::find($id);
        
        $kontak->delete();

        return redirect(route('kontak'))->with('success', 'data berhasil di hapus');

    }

}
