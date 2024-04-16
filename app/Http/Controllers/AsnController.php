<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Exports\AsnExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class AsnController extends Controller
{
    public function index(Request $request)
    {

        $query = Asn::query();
        $query->select('asn.*','nama_skpd','jabatan.*','pangkat.*');
        $query->join('skpd','asn.kode_skpd','=','skpd.kode_skpd');
        $query->join('unitkerja','asn.kode_unitkerja','=','unitkerja.kode_unitkerja');
        $query->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan');
        $query->join('pangkat','asn.kode_pangkatgol','=','pangkat.kode_pangkatgol');
        $query->orderBy('nama_lengkap');
        if (!empty($request->nama_asn)) {
            $query->where('nama_lengkap','like','%'.$request->nama_asn.'%');
        }

        if (!empty($request->kode_skpd)) {
            $query->where('asn.kode_skpd', $request->kode_skpd);
        }

        if (!empty($request->kode_unitkerja)) {
            $query->where('asn.kode_skpd', $request->kode_unitkerja);
        }

        if (!empty($request->kode_jabatan)) {
            $query->where('asn.kode_jabatan', $request->kode_jabatan);
        }

        $asn = $query->paginate(5);

        // $asn = DB::table('asn')->orderBy('nip')
        // ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
        // ->join('unitkerja','asn.kode_unitkerja','=','unitkerja.kode_unitkerja')
        // // ->join('riwayat_golongan','asn.kode_riwayat_golongan','=','riwayat_golongan.kode_riwayat_golongan')
        // ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
        // ->join('agama','asn.kode_agama','=','agama.kode_agama')
        // ->join('kawin','asn.kode_jenis_kawin','=','kawin.kode_jenis_kawin')
        // ->paginate(10);

        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $pangkat = DB::table('pangkat')->get();
        $riwayat_golongan = DB::table('riwayat_golongan')->get();
        $agama = DB::table('agama')->get();
        $kawin = DB::table('kawin')->get();
        $jabatan = DB::table('jabatan')->get();
        return view('asn.index', compact('asn','skpd','unitkerja','agama','kawin','jabatan','riwayat_golongan','pangkat'));
    }

    public function viewasn($nip, Request $request)
    {

        $query = Asn::query();
        $query->select('asn.*','nama_skpd');
        $query->join('skpd','asn.kode_skpd','=','skpd.kode_skpd');
        $query->join('unitkerja','asn.kode_unitkerja','=','unitkerja.kode_unitkerja');
        $query->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan');
        $query->join('riwayat_golongan','asn.kode_riwayat_golongan','=','riwayat_golongan.kode_riwayat_golongan');
        $query->orderBy('nama_lengkap');
        if (!empty($request->nama_asn)) {
            $query->where('nama_lengkap','like','%'.$request->nama_asn.'%');
        }

        if (!empty($request->kode_skpd)) {
            $query->where('asn.kode_skpd', $request->kode_skpd);
        }

        if (!empty($request->kode_unitkerja)) {
            $query->where('asn.kode_skpd', $request->kode_unitkerja);
        }

        if (!empty($request->kode_jabatan)) {
            $query->where('asn.kode_jabatan', $request->kode_jabatan);
        }

        // $riwayatgolongan = Asn::findOrFail($nip);

        $riwayatgolongan = DB::table('riwayat_golongan')
        ->select('riwayat_golongan.*','golongan.*')
        ->Join('golongan','riwayat_golongan.kode_golongan', '=', 'golongan.kode_golongan')
        ->where('riwayat_golongan.nip', $nip)
        ->orderBy('tmt_golongan')
        ->get();

        $riwayatjabatan = DB::table('riwayat_jabatan')
        ->select('riwayat_jabatan.*','jabatan.*','skpd.*','unitkerja.*')
        ->Join('jabatan','riwayat_jabatan.kode_jabatan', '=', 'jabatan.kode_jabatan')
        ->Join('skpd','riwayat_jabatan.kode_skpd', '=', 'skpd.kode_skpd')
        ->Join('unitkerja','riwayat_jabatan.kode_unitkerja', '=', 'unitkerja.kode_unitkerja')
        // ->Join('jenis_mutasi','riwayat_jabatan.kode_jenis_mutasi', '=', 'jenis_mutasi.kode_jenis_mutasi')
        // ->Join('jenis_jabatan','riwayat_jabatan.kode_jenis_jabatan', '=', 'jenis_jabatan.kode_jenis_jabatan')
        ->where('riwayat_jabatan.nip', $nip)
        ->orderBy('tmt_pelantikan')
        ->get();

        $asn = DB::table('asn')->where('nip', $nip)
        ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
        ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
        ->first();

        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $agama = DB::table('agama')->get();
        $kawin = DB::table('kawin')->get();
        $jabatan = DB::table('jabatan')->get();
        $golongan = DB::table('golongan')->get();
        $jenismutasi = DB::table('jenis_mutasi')->get();
        $jenisjabatan = DB::table('jenis_jabatan')->get();


        return view('asn.viewasn', compact('asn','skpd','unitkerja','agama','kawin','jabatan','riwayatgolongan','golongan','riwayatjabatan','jenismutasi','jenisjabatan'));
    }

    public function store(Request $request){
        $nip                = $request->nip;
        $nama_lengkap       = $request->nama_lengkap;
        $jenis_kelamin      = $request->jenis_kelamin;
        $kode_agama         = $request->kode_agama;
        $kode_jenis_kawin   = $request->kode_jenis_kawin;
        $nomor_hp           = $request->nomor_hp;
        $kode_jabatan       = $request->kode_jabatan;
        $jenis_kepegawaian  = $request->jenis_kepegawaian;
        $kode_skpd          = $request->kode_skpd;
        $kode_unitkerja     = $request->kode_unitkerja;
        $password           = Hash::make($nip);
        // $password           = Hash::make('12345');
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:200',
        ]);
        if ($request->hasFile('photo')) {
            $photo = $nip.".".$request->file('photo')->getClientOriginalExtension();
        } else {
            $photo = null;
        }

        try {
            $data = [
                'nip'               => $nip,
                'nama_lengkap'      => $nama_lengkap,
                'jenis_kelamin'     => $jenis_kelamin,
                'kode_agama'        => $kode_agama,
                'kode_jenis_kawin'  => $kode_jenis_kawin,
                'nomor_hp'          => $nomor_hp,
                'kode_jabatan'      => $kode_jabatan,
                'jenis_kepegawaian' => $jenis_kepegawaian,
                'kode_skpd'         => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'photo'             => $photo,
                'password'          => $password
            ];

                $cek = DB::table('asn')->where('nip', $nip)->count();
                if($cek>0){
                    return Redirect::back()->with(['warning'=>'Data dengan '.$nip. ' Sudah Ada']);
                }

            $simpan = DB::table('asn')->insert($data);
            if($simpan){
                if($request->hasFile('photo')){
                    $folderPath = "public/uploads/asn/";
                    $request->file('photo')->storeAs($folderPath, $photo);
                }
                return redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e);
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request){
        $nip = $request->nip;
        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $jabatan = DB::table('jabatan')->get();
        $agama = DB::table('agama')->get();
        $kawin = DB::table('kawin')->get();
        $pangkat = DB::table('pangkat')->get();


        $asn = DB::table('asn')->where('nip', $nip)->first();

        return view('asn.edit', compact('asn','skpd','unitkerja','jabatan','agama','kawin','pangkat'));
    }

    public function update($nip, Request $request){
        $nip                = $request->nip;
        $id_asn             = $request->id_asn;
        $nip_lama           = $request->nip_lama;
        $nama_lengkap       = $request->nama_lengkap;
        $gelar_depan        = $request->gelar_depan;
        $gelar_belakang     = $request->gelar_belakang;
        $tempat_lahir       = $request->tempat_lahir;
        $tanggal_lahir      = $request->tanggal_lahir;
        $jenis_kelamin      = $request->jenis_kelamin;
        $kode_agama         = $request->kode_agama;
        $kode_jenis_kawin   = $request->kode_jenis_kawin;
        $nik                = $request->nik;
        $nomor_hp           = $request->nomor_hp;
        $kode_jabatan       = $request->kode_jabatan;
        $jenis_kepegawaian  = $request->jenis_kepegawaian;
        $kode_skpd          = $request->kode_skpd;
        $kode_unitkerja     = $request->kode_unitkerja;
        $password           = Hash::make($request->password);
        $old_photo          = $request->photo;
        $asn = DB::table('asn')->where('nip', $nip)->first();
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:200',
        ]);
        
        $old_photo          = $request->old_photo;
        if ($request->hasFile('photo')) {
            $photo = $nik.".".$request->file('photo')->getClientOriginalExtension();
        } else {
            $photo = $old_photo;
        }
        try {
            if (empty($request->password)) {
                $data = [
                    'nip'               => $nip,
                'id_asn'            => $id_asn,
                'nip_lama'          => $nip_lama,
                'nama_lengkap'      => $nama_lengkap,
                'gelar_depan'       => $gelar_depan,
                'gelar_belakang'    => $gelar_belakang,
                'tempat_lahir'      => $tempat_lahir,
                'tanggal_lahir'     => $tanggal_lahir,
                'jenis_kelamin'     => $jenis_kelamin,
                'kode_agama'        => $kode_agama,
                'kode_jenis_kawin'  => $kode_jenis_kawin,
                'nik'               => $nik,
                'nomor_hp'          => $nomor_hp,
                'kode_jabatan'      => $kode_jabatan,
                'jenis_kepegawaian' => $jenis_kepegawaian,
                'kode_skpd'         => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'photo'             => $photo,

                ];
            } else {
                $data = [
                'nip'               => $nip,
                'id_asn'            => $id_asn,
                'nip_lama'          => $nip_lama,
                'nama_lengkap'      => $nama_lengkap,
                'gelar_depan'       => $gelar_depan,
                'gelar_belakang'    => $gelar_belakang,
                'tempat_lahir'      => $tempat_lahir,
                'tanggal_lahir'     => $tanggal_lahir,
                'jenis_kelamin'     => $jenis_kelamin,
                'kode_agama'        => $kode_agama,
                'kode_jenis_kawin'  => $kode_jenis_kawin,
                'nik'               => $nik,
                'nomor_hp'          => $nomor_hp,
                'kode_jabatan'      => $kode_jabatan,
                'jenis_kepegawaian' => $jenis_kepegawaian,
                'kode_skpd'         => $kode_skpd,
                'kode_unitkerja'    => $kode_unitkerja,
                'photo'             => $photo,
                'password'          => $password
                ];
            }

            $update = DB::table('asn')->where('nip', $nip)->update($data);
            if($update){
                if($request->hasFile('photo')){
                    $folderPath     = "public/uploads/asn/";
                    $folderPathOld  = "public/uploads/asn/".$old_photo;
                    Storage::delete($folderPathOld);
                    $request->file('photo')->storeAs($folderPath, $photo);
                }
                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($nip) {
        $delete = DB::table('asn')->where('nip', $nip)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    public function asnexport(){
        return Excel::download(new asnexport, 'asn.xlsx');
        // // return Excel::download(new AsnExport, 'asn-'. carbon::now()->timestamp .'xlsx');
        // return (new AsnExport)->download('asn.xlsx');
        // AsnExport::query()->downloadExcel('query-download.xlsx', Excel::XLSX, true);
        // return Excel::download(new asnexport, 'asn.xlsx');
    }

    public function resetpassword($nip) 
    {
        $nip = Crypt::decrypt($nip);
        $password = Hash::make($nip);
        $reset = DB::table('asn')->where('nip', $nip)->update([
            'password' => $password
        ]);

        if ($reset) {
            return Redirect::back()->with(['success' => 'Data Password Berhasil di Updatae']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Password Gagal di Updatae']);
        }
    }

    //RIWAYAT GOLONGAN
    public function riwayatgolongan(){
        $riwayatgolongan = DB::table('riwayat_golongan')->orderBy('kode_riwayat_golongan', 'asc')->get();

        return view('asn.riwayatgolongan', compact('riwayatgolongan'));
    }

    public function storeriwayatgolongan(Request $request)
    {
        $kode_riwayat_golongan  = $request->kode_riwayat_golongan;
        $nip                    = $request->nip;
        $kode_golongan          = $request->kode_golongan;
        $nomor_sk_golongan      = $request->nomor_sk_golongan;
        $tmt_golongan           = $request->tmt_golongan;
        $tgl_golongan           = $request->tgl_golongan;
        $request->validate([
            'file_dokumen' => 'required|image|mimes:png,jpg,jpeg|max:500',
        ]);

        //Membuat Kode Otomatis
        $lastriwayatgolongan = DB::table('riwayat_golongan')
        ->orderBy('kode_riwayat_golongan', 'desc')
        ->first();

        $lastkoderiwayatgolongan = $lastriwayatgolongan ==! null ? $lastriwayatgolongan->kode_riwayat_golongan : "";
        $format = "RG";
        $kode_riwayat_golongan = buatkode($lastkoderiwayatgolongan,$format,4);
        //Batas Kode Otomatis

        if ($request->hasFile('file_dokumen')) {
            $file_dokumen = $kode_riwayat_golongan."_".$nip.".".$request->file('file_dokumen')->getClientOriginalExtension();
        } else {
            $file_dokumen = null;
        }

        try {
            $data = [
                'kode_riwayat_golongan' => $kode_riwayat_golongan,
                'nip'                   => $nip,
                'kode_golongan'         => $kode_golongan,
                'nomor_sk_golongan'     => $nomor_sk_golongan,
                'tmt_golongan'          => $tmt_golongan,
                'tgl_golongan'          => $tgl_golongan,
                'file_dokumen'          => $file_dokumen,
            ];

            $simpan = DB::table('riwayat_golongan')->insert($data);
            if($simpan){
                if($request->hasFile('file_dokumen')){
                    $folderPath = "public/uploads/riwayatgolongan/";
                    $request->file('file_dokumen')->storeAs($folderPath, $file_dokumen);
                }
                return redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e);
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function editriwayatgolongan(Request $request){
        $nip = $request->nip;
        $kode_riwayat_golongan = $request->kode_riwayat_golongan;
        $golongan = DB::table('golongan')->get();
        $asn = DB::table('asn')->where('nip', $nip)->first();

        $riwayatgolongan = DB::table('riwayat_golongan')
        ->whereRaw('nip', $nip)
        ->where('kode_riwayat_golongan', $kode_riwayat_golongan)
        ->first();

        return view('asn.editkepangkatan', compact('asn','riwayatgolongan','golongan'));
    }

    public function updateriwayatgolongan($kode_riwayat_golongan, Request $request){
        $nip                = $request->nip;
        $kode_golongan      = $request->kode_golongan;
        $nomor_sk_golongan  = $request->nomor_sk_golongan;
        $tmt_golongan       = $request->tmt_golongan;
        $tgl_golongan       = $request->tgl_golongan;

        //Simpan File SID
        if ($request->hasFile('file_dokumen')) {
            $file_dokumen = $kode_riwayat_golongan."_".$nip . "." . $request->file('file_dokumen')->getClientOriginalExtension();
        } else {
            $file_dokumen = null;
        }

        $data = [
            'nip'               => $nip,
            'kode_golongan'     => $kode_golongan,
            'nomor_sk_golongan' => $nomor_sk_golongan,
            'tmt_golongan'      => $tmt_golongan,
            'tgl_golongan'      => $tgl_golongan,
            'file_dokumen'      => $file_dokumen
            ];

            try {
                DB::table('riwayat_golongan')
                    ->where('kode_riwayat_golongan', $kode_riwayat_golongan)
                    ->update($data);
                if ($request->hasFile('file_dokumen')) {
                    $file_dokumen = $kode_riwayat_golongan."_".$nip . "." . $request->file('file_dokumen')->getClientOriginalExtension();
                    $folderPath = "public/uploads/riwayatgolongan/";
                    $request->file('file_dokumen')->storeAs($folderPath, $file_dokumen);
                }

                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            } catch (\Exception $e) {
                return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
            }
    }

    public function deleteriwayatgolongan($kode_riwayat_golongan) {
        $delete = DB::table('riwayat_golongan')->where('kode_riwayat_golongan', $kode_riwayat_golongan)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    // RIWAYAT JABATAN
    public function riwayatjabatan(){
        $riwayatjabatan= DB::table('riwayat_jabatan')
        ->orderBy('kode_riwayat_jabatan', 'asc')->get();

        return view('asn.riwayatjabatan', compact('riwayatjabatan'));
    }

    public function storeriwayatjabatan(Request $request)
    {
        $kode_riwayat_jabatan  = $request->kode_riwayat_jabatan;
        $nip                   = $request->nip;
        $kode_jenis_mutasi     = $request->kode_jenis_mutasi;
        $kode_skpd             = $request->kode_skpd;
        $kode_unitkerja        = $request->kode_unitkerja;
        $kode_jabatan          = $request->kode_jabatan;
        $kode_jenis_jabatan    = $request->kode_jenis_jabatan;
        $tmt_pelantikan        = $request->tmt_pelantikan;
        $tgl_pelantikan        = $request->tgl_pelantikan;
        $no_sk_pelantikan      = $request->no_sk_pelantikan;
        $file_dokumen          = $request->file_dokumen;
        $request->validate([
            'file_dokumen' => 'required|image|mimes:png,jpg,jpeg|max:500',
        ]);

        //Membuat Kode Otomatis
        $lastriwayatjabatan = DB::table('riwayat_jabatan')
        ->orderBy('kode_riwayat_jabatan', 'desc')
        ->first();

        $lastkoderiwayatjabatan = $lastriwayatjabatan ==! null ? $lastriwayatjabatan->kode_riwayat_jabatan : "";
        $format = "RJ";
        $kode_riwayat_jabatan = buatkode($lastkoderiwayatjabatan,$format,4);
        //Batas Kode Otomatis

        if ($request->hasFile('file_dokumen')) {
            $file_dokumen = $kode_riwayat_jabatan."_".$nip.".".$request->file('file_dokumen')->getClientOriginalExtension();
        } else {
            $file_dokumen = null;
        }

        try {
            $data = [
                'kode_riwayat_jabatan'  => $kode_riwayat_jabatan,
                'nip'                   => $nip,
                'kode_jenis_mutasi'     => $kode_jenis_mutasi,
                'kode_skpd'             => $kode_skpd,
                'kode_unitkerja'        => $kode_unitkerja,
                'kode_jabatan'          => $kode_jabatan,
                'kode_jenis_jabatan'    => $kode_jenis_jabatan,
                'tmt_pelantikan'        => $tmt_pelantikan,
                'tgl_pelantikan'        => $tgl_pelantikan,
                'no_sk_pelantikan'      => $no_sk_pelantikan,
                'file_dokumen'          => $file_dokumen,
            ];

            $simpan = DB::table('riwayat_jabatan')->insert($data);
            if($simpan){
                if($request->hasFile('file_dokumen')){
                    $folderPath = "public/uploads/riwayatjabatan/";
                    $request->file('file_dokumen')->storeAs($folderPath, $file_dokumen);
                }
                return redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function editriwayatjabatan(Request $request){
        $nip = $request->nip;
        $kode_riwayat_jabatan = $request->kode_riwayat_jabatan;
        $golongan = DB::table('golongan')->get();
        $asn = DB::table('asn')->where('nip', $nip)->first();

        $riwayatgolongan = DB::table('riwayat_jabatan')
        ->whereRaw('nip', $nip)
        ->where('kode_riwayat_jabatan', $kode_riwayat_jabatan)
        ->first();

        return view('asn.editkepangkatan', compact('asn','riwayatgolongan','golongan'));
    }

    public function updateriwayatjabatan($kode_riwayat_jabatan, Request $request){
        $nip                = $request->nip;
        $kode_golongan      = $request->kode_golongan;
        $nomor_sk_golongan  = $request->nomor_sk_golongan;
        $tmt_golongan       = $request->tmt_golongan;
        $tgl_golongan       = $request->tgl_golongan;

        //Simpan File SID
        if ($request->hasFile('file_dokumen')) {
            $file_dokumen = $kode_riwayat_jabatan."_".$nip . "." . $request->file('file_dokumen')->getClientOriginalExtension();
        } else {
            $file_dokumen = null;
        }

        $data = [
            'nip'               => $nip,
            'kode_golongan'     => $kode_golongan,
            'nomor_sk_golongan' => $nomor_sk_golongan,
            'tmt_golongan'      => $tmt_golongan,
            'tgl_golongan'      => $tgl_golongan,
            'file_dokumen'      => $file_dokumen
            ];

            try {
                DB::table('riwayat_jabatan')
                    ->where('kode_riwayat_jabatan', $kode_riwayat_jabatan)
                    ->update($data);
                if ($request->hasFile('file_dokumen')) {
                    $file_dokumen = $kode_riwayat_jabatan."_".$nip . "." . $request->file('file_dokumen')->getClientOriginalExtension();
                    $folderPath = "public/uploads/riwayatgolongan/";
                    $request->file('file_dokumen')->storeAs($folderPath, $file_dokumen);
                }

                return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            } catch (\Exception $e) {
                return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
            }
    }

    public function deleteriwayatjabatan($kode_riwayat_jabatan) {
        $delete = DB::table('riwayat_jabatan')->where('kode_riwayat_jabatan', $kode_riwayat_jabatan)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
    // BATAS RIWAYAT JABATAN



}
