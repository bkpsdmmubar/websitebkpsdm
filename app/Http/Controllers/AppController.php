<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Models\Berita;
use App\Models\Daftar;
use App\Models\Honorer;
use App\Models\Kontak;
use App\Models\Pelayanan;
use App\Models\Photo;
use App\Models\Struktur;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'beritas' => Berita::orderBy('id', 'desc')->limit(4)->get(),
            'beritautama' => Berita::orderBy('id', 'desc')->limit(1)->get(),
            'photos' => Photo::orderBy('id', 'desc')->limit(4)->get(),
            'videos' => Video::orderBy('id', 'desc')->limit(3)->get(),
            'videos1' => Video::orderBy('id', 'desc')->limit(1)->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
            'pelayanans' => Pelayanan::orderBy('id', 'desc')->limit(4)->get(),
            'honorers' => Honorer::orderBy('nik')->get(),
            'daftars' => Daftar::orderBy('id')->limit(1)->get(),
            'aplikasis' => Aplikasi::orderBy('id')->limit(4)->get(),
            'strukturs' => Struktur::orderBy('id')->limit(4)->get(),
        ]);
    }

    public function berita()
    {
        return view('berita.berita', [
            'beritas' => Berita::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function detailberita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        return view('berita.detailberita', [
            'berita' => $berita,
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function pelayanan()
    {
        return view('pelayanan.pelayanan', [
            'pelayanans' => Pelayanan::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function detailpelayanan($slug)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->first();
        return view('pelayanan.detailpelayanan', [
            'pelayanan' => $pelayanan,
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function aplikasi()
    {
        return view('aplikasi.aplikasi', [
            'aplikasis' => Aplikasi::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function struktur()
    {
        return view('struktur.struktur', [
            'strukturs' => Struktur::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function detailaplikasi($slug)
    {
        $aplikasi = Aplikasi::where('slug', $slug)->first();
        return view('aplikasi.detailaplikasi', [
            'aplikasi' => $aplikasi,
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function photo()
    {
        return view('photo.photo', [
            'photos' => Photo::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function video()
    {
        return view('video.video', [
            'videos' => Video::orderBy('id', 'desc')->get(),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

    public function kontak()
    {
        return view('kontak.kontak', [
            'kontaks' => Kontak::orderBy('id', 'desc')->get(),
        ]);
    }

    public function honorer()
    {
        return view('honorer.honorer', [
            'honorer' => Honorer::orderBy('nik', 'desc')->paginate(5),
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }


    public function caridata(Request $request)
	{
		// menangkap data pencarian
		$caridata = $request->caridata;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$honorer = DB::table('honorer')
		->where('nik','like',"%".$caridata."%")
		->paginate(5);

        $kontaks = Kontak::orderBy('id')->get();
 
    		// mengirim data pegawai ke view index
		return view('honorer.gethonorer',['honorer' => $honorer],['kontaks' => $kontaks]);
 
	}

    public function detailhonorer($nik)
    {
        $honorer = Honorer::where('nik', $nik)->first();
        return view('honorer.detailhonorer', [
            'honorer' => $honorer,
            'kontaks' => Kontak::orderBy('id')->get(),
        ]);
    }

}
