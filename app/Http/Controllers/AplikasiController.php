<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AplikasiController extends Controller
{

    public function index(){

        return view('dashboardweb.aplikasi.index',[
            'aplikasis' => Aplikasi::orderBy('id','desc')->get()
        ]);


    }

    public function create(){

        return view('dashboardweb.aplikasi.create');


    }

    public function store(Request $request){

        $rules = [
            'judul' => 'required',
            'desc'  => 'required',
            'icon' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
            'link'  => 'required',
        ];

        $messages = [
            'judul.required'    => 'Judul wajib diisi!',
            'desc.required'     => 'Judul wajib diisi!',
            'icon.required'    => 'Gambar wajib diisi!',
            'link.required'    => 'Link wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // icon
        $fileName = time() . '.' . $request->icon->extension();
        $request->file('icon')->storeAs('public/aplikasi', $fileName);

        Aplikasi::create([
            'judul' => $request->judul,
            'desc'  => $request->desc,
            'slug' => Str::slug($request->judul, '-'),
            'icon' => $fileName,
            'link' => $request->link,
        ]);

        return redirect( route('aplikasi') )->with('success', 'data aplikasi berhasil di simpan');

    }

    public function edit($id){


    }

    public function update(Request $request, $id){
        $aplikasi = Aplikasi::find($id);

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
            'link'  => 'required',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'desc.required'  => 'Deskripsi wajib diisi!',
            'icon.required' => 'Gambar wajib diisi!',
            'link.required'    => 'Link wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada Icon baru
        if ($request->hasFile('icon')) {
            if (\File::exists('storage/aplikasi/' . $aplikasi->icon)) {
                \File::delete('storage/aplikasi/' . $request->old_icon);
            }
            $fileName = time() . '.' . $request->icon->extension();
            $request->file('icon')->storeAs('public/aplikasi', $fileName);
        }

        if ($request->hasFile('icon')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_icon;
        }

        
        $aplikasi->update([
            'judul' => $request->judul,
            'desc'  => $request->desc,
            'image' => $checkFileName,
            'link' => $request->link,
        ]);

        return redirect(route('aplikasi'))->with('success', 'data aplikasi berhasil di update');


    }


    public function delete($id){

        $aplikasi = Aplikasi::find($id);
        if (\File::exists('storage/aplikasi/' . $aplikasi->icon)) {
            \File::delete('storage/aplikasi/' . $aplikasi->icon);
        }

        $aplikasi->delete();

        return redirect(route('aplikasi'))->with('success', 'data berhasil di hapus');

    }

}
