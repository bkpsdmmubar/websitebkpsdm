<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{

    public function index(){

        return view('dashboardweb.pelayanan.index',[
            'pelayanans' => Pelayanan::orderBy('id','desc')->get()
        ]);


    }

    public function create(){

        return view('dashboardweb.pelayanan.create');


    }

    public function store(Request $request){

        $rules = [
            'judul' => 'required',
            'desc'  => 'required',
            'icon' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'desc.required'     => 'Judul wajib diisi!',
            'icon.required'    => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // icon
        $fileName = time() . '.' . $request->icon->extension();
        $request->file('icon')->storeAs('public/pelayanan', $fileName);

        Pelayanan::create([
            'judul' => $request->judul,
            'desc'  => $request->desc,
            'slug' => Str::slug($request->judul, '-'),
            'icon' => $fileName,
        ]);

        return redirect( route('pelayanan') )->with('success', 'data pelayanan berhasil di simpan');

    }

    public function edit($id){


    }

    public function update(Request $request, $id){
        $pelayanan = Pelayanan::find($id);

        # Jika ada Icon baru
        if ($request->hasFile('icon')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'desc'  => 'required',
            'icon' => $fileCheck,
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'desc.required'  => 'Deskripsi wajib diisi!',
            'icon.required' => 'Gambar wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada Icon baru
        if ($request->hasFile('icon')) {
            if (\File::exists('storage/pelayanan/' . $pelayanan->icon)) {
                \File::delete('storage/pelayanan/' . $request->old_icon);
            }
            $fileName = time() . '.' . $request->icon->extension();
            $request->file('icon')->storeAs('public/pelayanan', $fileName);
        }

        if ($request->hasFile('icon')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_icon;
        }

        
        $pelayanan->update([
            'judul' => $request->judul,
            'desc'  => $request->desc,
            'image' => $checkFileName,
        ]);

        return redirect(route('pelayanan'))->with('success', 'data pelayanan berhasil di update');


    }


    public function delete($id){

        $pelayanan = Pelayanan::find($id);
        if (\File::exists('storage/pelayanan/' . $pelayanan->icon)) {
            \File::delete('storage/pelayanan/' . $pelayanan->icon);
        }

        $pelayanan->delete();

        return redirect(route('pelayanan'))->with('success', 'data berhasil di hapus');

    }

}
