<?php

namespace App\Http\Controllers;

use App\Models\Honorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
{
    public function index(){

        return view('dashboardweb.honorer.index',[
            'honorers' => Honorer::orderBy('nik')->paginate(10)
        ]);
    }

    public function create(){

        return view('dashboardweb.honorer.create');
    }

    public function store(Request $request){

        $rules = [
            'nik'                           => 'required',
            'no_kk'                         => 'required',
            'no_k2'                         => 'required',
            'status_k2'                     => 'required',
            'nama'                          => 'required',
            'tgl_lhr'                       => 'required',
            'tempat_lahir'                  => 'required',
            'jenis_kelamin'                 => 'required',
            'agama'                         => 'required',
            'no_registrasi'                 => 'required',
            'jenjang_pendidikan_daftar'     => 'required',
            'jenjang_pendidikan_sekarang'   => 'required',
            'pendidikan'                    => 'required',
            'no_ijazah'                     => 'required',
            'nama_sekolah'                  => 'required',
            'tgl_lulus'                     => 'required',
            'unit_kerja'                    => 'required',
            'jabatan'                       => 'required',
            'image'                         => 'required|max:1000|mimes:jpg,jpeg,png',
            'no_wa'                         => 'required',
            'status_keaktifan'              => 'required',
            'password'                      => 'required',
        ];

        $messages = [
            'nik'                           => 'Nomor Induk Kependudukan Wajib disi',
            'no_kk'                         => 'Nomor Kartu Keluarga Wajib disi',
            'no_k2'                         => 'Nomor K2 Wajib disi',
            'status_k2'                     => 'Status K2 Wajib disi',
            'nama'                          => 'Nama Wajib disi',
            'tgl_lhr'                       => 'Tanggal Lahir Wajib disi',
            'tempat_lahir'                  => 'Tempat Lahir Wajib disi',
            'jenis_kelamin'                 => 'Jenis Kelamin Wajib disi',
            'agama'                         => 'Agama Wajib disi',
            'no_registrasi'                 => 'Nomor Registrasi Wajib disi',
            'jenjang_pendidikan_daftar'     => 'Jenjang Pendidikan Saat Mendaftar Wajib disi',
            'jenjang_pendidikan_sekarang'   => 'Jenjang Pendidikan Sekarang Wajib disi',
            'pendidikan'                    => 'Pendidikan Wajib disi',
            'no_ijazah'                     => 'Nomor Ijazah Wajib disi',
            'nama_sekolah'                  => 'Nama Sekolah Wajib disi',
            'tgl_lulus'                     => 'Tanggal Lulus Wajib disi',
            'unit_kerja'                    => 'Unit Kerja Wajib disi',
            'jabatan'                       => 'Jabatan Wajib disi',
            'image.required'                => 'Gambar wajib diisi!',
            'no_wa.required'                => 'Nomor Whatsapp wajib diisi!',
            'status_keaktifan'              => 'Status Keaktifan Wajib disi',
        ];

        

        $this->validate($request, $rules, $messages);

        // Image
        $fileName = $nik.".".$request->file('image')->getClientOriginalExtension();
        // $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/honorer', $fileName);

        # Baca di https://dosenit.com/php/fungsi-libxml-php
        // $images = $dom->getElementsByTagName('img');
        // foreach ($images as $img) {
        //    $src = $img->getAttribute('src');
        //    if (preg_match('/data:image/', $src)) {
        //        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //        $mimetype = $groups['mime'];
        //        $fileNameContent = uniqid();
        //        $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
        //        $filePath = ("$storage/$fileNameContentRand.$mimetype");
        //        $image = Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
        //        $new_src = asset($filePath);
        //        $img->removeAttribute('src');
        //        $img->setAttribute('src', $new_src);
        //        $img->setAttribute('class', 'img-responsive');
        //    }
        // }
        $password           = Hash::make($nik);

        Honorer::create([
            'nik'                           => $request->nik,
            'no_kk'                         => $request->no_kk,
            'no_k2'                         => $request->no_k2,
            'status_k2'                     => $request->status_k2,
            'nama'                          => $request->nama,
            'tgl_lhr'                       => $request->tgl_lhr,
            'tempat_lahir'                  => $request->tempat_lahir,
            'jenis_kelamin'                 => $request->jenis_kelamin,
            'agama'                         => $request->agama,
            'no_registrasi'                 => $request->no_registrasi,
            'jenjang_pendidikan_daftar'     => $request->jenjang_pendidikan_daftar,
            'jenjang_pendidikan_sekarang'   => $request->jenjang_pendidikan_sekarang,
            'pendidikan'                    => $request->pendidikan,
            'no_ijazah'                     => $request->no_ijazah,
            'nama_sekolah'                  => $request->nama_sekolah,
            'tgl_lulus'                     => $request->tgl_lulus,
            'unit_kerja'                    => $request->unit_kerja,
            'jabatan'                       => $request->jabatan,
            'image'                         => $fileName,
            'no_wa'                         => $request->no_wa,
            'status_keaktifan'              => $request->status_keaktifan,
            'password'                      => $password,

        ]);

        return redirect( route('honorer') )->with('success', 'Data Honorer berhasil di simpan');

    }

    public function edit($nik){

        $honorer = Honorer::find($nik);
        return view('dashboardweb.honorer.edit', [
            'honorer' => $honorer
        ]);

    }

    public function update(Request $request, $nik){
        $honorer = Honorer::find($nik);

        # Jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        
        $rules = [
            'nik'                           => 'required',
            'no_kk'                         => 'required',
            'no_k2'                         => 'required',
            'status_k2'                     => 'required',
            'nama'                          => 'required',
            'tgl_lhr'                       => 'required',
            'tempat_lahir'                  => 'required',
            'jenis_kelamin'                 => 'required',
            'agama'                         => 'required',
            'no_registrasi'                 => 'required',
            'jenjang_pendidikan_daftar'     => 'required',
            'jenjang_pendidikan_sekarang'   => 'required',
            'pendidikan'                    => 'required',
            'no_ijazah'                     => 'required',
            'nama_sekolah'                  => 'required',
            'tgl_lulus'                     => 'required',
            'unit_kerja'                    => 'required',
            'jabatan'                       => 'required',
            'image'                         => 'required|max:1000|mimes:jpg,jpeg,png',
            'no_wa'                         => 'required',
            'status_keaktifan'              => 'required',
        ];

        $messages = [
            'nik'                           => 'Nomor Induk Kependudukan Wajib disi',
            'no_kk'                         => 'Nomor Kartu Keluarga Wajib disi',
            'no_k2'                         => 'Nomor K2 Wajib disi',
            'status_k2'                     => 'Status K2 Wajib disi',
            'nama'                          => 'Nama Wajib disi',
            'tgl_lhr'                       => 'Tanggal Lahir Wajib disi',
            'tempat_lahir'                  => 'Tempat Lahir Wajib disi',
            'jenis_kelamin'                 => 'Jenis Kelamin Wajib disi',
            'agama'                         => 'Agama Wajib disi',
            'no_registrasi'                 => 'Nomor Registrasi Wajib disi',
            'jenjang_pendidikan_daftar'     => 'Jenjang Pendidikan Saat Mendaftar Wajib disi',
            'jenjang_pendidikan_sekarang'   => 'Jenjang Pendidikan Sekarang Wajib disi',
            'pendidikan'                    => 'Pendidikan Wajib disi',
            'no_ijazah'                     => 'Nomor Ijazah Wajib disi',
            'nama_sekolah'                  => 'Nama Sekolah Wajib disi',
            'tgl_lulus'                     => 'Tanggal Lulus Wajib disi',
            'unit_kerja'                    => 'Unit Kerja Wajib disi',
            'jabatan'                       => 'Jabatan Wajib disi',
            'image.required'                => 'Gambar wajib diisi!',
            'no_wa.required'                => 'Nomor Whatsapp wajib diisi!',
            'status_keaktifan'              => 'Status Keaktifan Wajib disi',
            
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/honorer/' . $honorer->image)) {
                \File::delete('storage/honorer/' . $request->old_image);
            }
            // $fileName = time() . '.' . $request->image->extension();
            $fileName = $nik.".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/honorer', $fileName);
        }

        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        // $images = $dom->getElementsByTagName('img');

        // foreach ($images as $img) {
        //     $src = $img->getAttribute('src');
        //     if (preg_match('/data:image/', $src)) {
        //         preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //         $mimetype = $groups['mime'];
        //         $fileNameContent = uniqid();
        //         $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
        //         $filePath = ("$storage/$fileNameContentRand.$mimetype");
        //         $image = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filePath));
        //         $new_src = asset($filePath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', $new_src);
        //         $img->setAttribute('class', 'img-responsive');
        //     }
        // }


        $honorer->update([
            'nik'                           => $request->nik,
            'no_kk'                         => $request->no_kk,
            'no_k2'                         => $request->no_k2,
            'status_k2'                     => $request->status_k2,
            'nama'                          => $request->nama,
            'tgl_lhr'                       => $request->tgl_lhr,
            'tempat_lahir'                  => $request->tempat_lahir,
            'jenis_kelamin'                 => $request->jenis_kelamin,
            'agama'                         => $request->agama,
            'no_registrasi'                 => $request->no_registrasi,
            'jenjang_pendidikan_daftar'     => $request->jenjang_pendidikan_daftar,
            'jenjang_pendidikan_sekarang'   => $request->jenjang_pendidikan_sekarang,
            'pendidikan'                    => $request->pendidikan,
            'no_ijazah'                     => $request->no_ijazah,
            'nama_sekolah'                  => $request->nama_sekolah,
            'tgl_lulus'                     => $request->tgl_lulus,
            'unit_kerja'                    => $request->unit_kerja,
            'jabatan'                       => $request->jabatan,
            'image'                         => $fileName,
            'no_wa'                         => $request->no_wa,
            'status_keaktifan'              => $request->status_keaktifan,
        ]);

        return redirect(route('honorer'))->with('success', 'Data Honorer berhasil di update');


    }


    public function delete($nik){

        $honorer = Honorer::find($nik);
        if (\File::exists('storage/honorer/' . $honorer->image)) {
            \File::delete('storage/honorer/' . $honorer->image);
        }
        
        $honorer->delete();

        return redirect(route('honorer'))->with('success', 'data berhasil di hapus');

    }










}
