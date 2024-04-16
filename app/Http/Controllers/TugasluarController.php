<?php

namespace App\Http\Controllers;

use App\Models\Tugasluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TugasluarController extends Controller
{
    public function index(){
        $query = Tugasluar::query();
        $mastertugasluar = DB::table('master_tugasluar')->orderBy('kode_tugasluar', 'asc')->get();


        return view('mastertugasluar.index', compact('mastertugasluar'));


    }

    public function store(Request $request)
    {
        $kode_tugasluar     = $request->kode_tugasluar;
        $nama_tugasluar     = $request->nama_tugasluar;
        $jml_hari           = $request->jml_hari;

        try {
            $cek = DB::table('master_tugasluar')->where('kode_tugasluar', $kode_tugasluar)->count();
                if($cek>0){
                    return Redirect::back()->with(['warning'=>'Data dengan Kode Tugas Luar '.$kode_tugasluar. ' Sudah Ada']);
                }
            DB::table('master_tugasluar')->insert([
                'kode_tugasluar'     => $kode_tugasluar,
                'nama_tugasluar'     => $nama_tugasluar,
                'jml_hari'           => $jml_hari
            ]);
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }

    }

    public function edit(Request $request){
        $kode_tugasluar = $request->kode_tugasluar;
        $mastertugasluar = DB::table('master_tugasluar')->where('kode_tugasluar', $kode_tugasluar)->first();

        return view('mastertugasluar.edit', compact('mastertugasluar'));
    }

    public function update($kode_tugasluar, Request $request){
        $kode_tugasluar     = $request->kode_tugasluar;
        $nama_tugasluar     = $request->nama_tugasluar;
        $jml_hari      = $request->jml_hari;

        try {
            DB::table('master_tugasluar')->where('kode_tugasluar', $kode_tugasluar)->update([
                'kode_tugasluar'     => $kode_tugasluar,
                'nama_tugasluar'     => $nama_tugasluar,
                'jml_hari'      => $jml_hari
            ]);
            return redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } catch (\Exception $e) {
            return redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_tugasluar) {
        $delete = DB::table('master_tugasluar')->where('kode_tugasluar', $kode_tugasluar)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    //Pengajuan Izin ASN
    public function createtugasluar()
    {
        $mastertugasluar = DB::table('master_tugasluar')->orderBy('kode_tugasluar')->get();
        return view('tugasluar.create', compact('mastertugasluar'));
    }

    public function storetugasluar(Request $request)
    {
        $nip                = Auth::guard('asn')->user()->nip;
        $tgl_izin_dari      = $request->tgl_izin_dari;
        $tgl_izin_sampai    = $request->tgl_izin_sampai;
        $status             = "T";
        $keterangan         = $request->keterangan;
        $kode_tugasluar     = $request->kode_tugasluar;

        $bulan = date("m", strtotime($tgl_izin_dari));
        $tahun = date("Y", strtotime($tgl_izin_dari));
        $thn   = substr($tahun,2,2);
        $lastizin = DB::table('pengajuan_izin')
            ->whereRaw('MONTH(tgl_izin_dari)="'.$bulan.'"')
            ->whereRaw('YEAR(tgl_izin_dari)="'.$tahun.'"')
            ->orderBy('kode_izin', 'desc')
            ->first();

        $lastkodeizin = $lastizin !== null ? $lastizin->kode_izin : "";
        $format = "KT" . $bulan . $thn;
        $kode_izin = buatkode($lastkodeizin, $format, 4);

        //Simpan File SID
        if ($request->hasFile('fileizin')) {
            $fileizin = $kode_izin . "." . $request->file('fileizin')->getClientOriginalExtension();
        } else {
            $fileizin = null;
        }

        //Hitung Jumlah Hari yang Digunakan
        $jmlhari = hitunghari($tgl_izin_dari,$tgl_izin_sampai);

        //Jumlah Maksimal Hari Tugas Luar
        $tugasluar = DB::table('master_tugasluar')->where('kode_tugasluar', $kode_tugasluar)->first();
        $jmlmaxtugasluar = $tugasluar->jml_hari;
        $namatugasluar = $tugasluar->nama_tugasluar;

        $data = [
            'kode_izin'       => $kode_izin,
            'nip'             => $nip,
            'tgl_izin_dari'   => $tgl_izin_dari,
            'tgl_izin_sampai' => $tgl_izin_sampai,
            'status'          => $status,
            'keterangan'      => $keterangan,
            'kode_tugasluar'  => $kode_tugasluar,
            'file_dokumen'    => $fileizin
            ];

        $cekpresensi = DB::table('presensi')
        ->where('nip', $nip)
        ->whereBetween('tgl_presensi', [$tgl_izin_dari, $tgl_izin_sampai]);
        
        // Cek Pengajuan
        $cekpengajuan = DB::table('pengajuan_izin')
        ->whereRaw('"' .$tgl_izin_dari . '" BETWEEN tgl_izin_dari AND tgl_izin_sampai')
        ->where('nip', $nip);

        $datapresensi = $cekpresensi->get();
        
        if ($jmlhari > $jmlmaxtugasluar) {
            return redirect('presensi/izin')->with(['error'=>'Maksimal Jumlah Hari ' . $namatugasluar . ' adalah ' . $jmlmaxtugasluar . ' Hari.']);
        } else if ($cekpresensi->count() > 0) {
            $blacklistdate = "";
            foreach($datapresensi as $d) {
                $blacklistdate .= date('d-m-Y', strtotime($d->tgl_presensi)) . ",";
            }

            return redirect('presensi/izin')->with(['error'=>'Tidak Dapat Melakukan Pengajuan Tugas Luar Pada Tanggal ' . $blacklistdate .' ,Karena Sudah Digunakan/Sudah Melakukan Presensi! Silahkan Cek Tanggal Pengajuan Tugas Luar.']);
        } else if ($cekpengajuan->count() > 0) {
            return redirect('presensi/izin')->with(['error'=>'Tidak Dapat Melakukan Pengajuan Tugas Luar Pada Tanggal Tersebut ,Karena Sudah Digunakan/Sudah Melakukan Presensi! Silahkan Cek Tanggal Pengajuan Tugas Luar.']);
        }else {

            $simpan = DB::table('pengajuan_izin')->insert($data);

            if ($simpan) {
                if ($request->hasFile('fileizin')) {
                    $fileizin = $kode_izin . "." . $request->file('fileizin')->getClientOriginalExtension();
                    $folderPath = "public/uploads/fileizin/";
                    $request->file('fileizin')->storeAs($folderPath, $fileizin);
                }
                return redirect('presensi/izin')->with(['success'=>'Data Berhasil Disimpan']);
            } else {
                return redirect('presensi/izin')->with(['error'=>'Data Gagal Disimpan']);
            }
        }
    }

    public function edittugasluar($kode_izin)
    {
        $dataizin = DB::table('pengajuan_izin')
            ->where('kode_izin', $kode_izin)
            ->first();

        $mastertugasluar = DB::table('master_tugasluar')->orderBy('kode_tugasluar')->get();

        return view('tugasluar.edit', compact('mastertugasluar','dataizin'));
    }

}
