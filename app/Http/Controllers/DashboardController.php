<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini    = date("Y-m-d");
        $bulanini = date("m") * 1;
        $tahunini = date("Y");
        $nip = Auth::guard('asn')->user()->nip;


        $nama_lengkap = Auth::guard('asn')->user()->nama_lengkap;
        $presensihariini = DB::table('presensi')->where('nip', $nip)->where('tgl_presensi', $hariini)->first();
        $historibulanini = DB::table('presensi')
        ->select('presensi.*','keterangan','jam_kerja.*','file_dokumen','nama_cuti')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensi.kode_izin','=','pengajuan_izin.kode_izin')
        ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
        ->where('presensi.nip', $nip)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'" ')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->orderBy('tgl_presensi','desc')
        ->get();

        $rekappresensi = DB::table('presensi')
        ->selectRaw('
        SUM(IF(status="H",1,0)) as jmlhadir,
        SUM(IF(status="I",1,0)) as jmlizin,
        SUM(IF(status="S",1,0)) as jmlsakit,
        SUM(IF(status="C",1,0)) as jmlcuti,
        SUM(IF(status="T",1,0)) as jmltugasluar,
        SUM(IF(jam_in > jam_masuk ,1,0)) as jmltelat,
        SUM(IF(jam_in = "",1,0)) as jmlalpa,
        SUM(IF(jam_masuk > jam_in ,1,0)) as jmltepat
        ')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->where('nip', $nip)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'" ')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->first();
        // dd($rekappresensi);

        $leaderboard = DB::table('presensi')
        ->join('asn', 'presensi.nip', '=', 'asn.nip')
        ->leftJoin('jabatan','asn.kode_jabatan', '=', 'jabatan.kode_jabatan')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->where('tgl_presensi', $hariini)
        ->orderBy('jam_in')
        ->get();

        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];


        // $rekapizin = DB::table('pengajuan_izin')
        // ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
        // ->where('nip', $nip)
        // ->whereRaw('MONTH(tgl_izin_dari)="'.$bulanini.'" ')
        // ->whereRaw('YEAR(tgl_izin_dari)="'.$tahunini.'"')
        // ->where('status_approved', 1)
        // ->first();

        // $jabatan = DB::table('jabatan')
        // ->where('nip', $nip)
        // ->get();

        return view('dashboard.dashboardasn', compact('presensihariini','historibulanini', 'namabulan', 'bulanini', 'tahunini', 'rekappresensi', 'leaderboard'));

    }

    public function dashboardadmin()
    {
        $hariini    = date("Y-m-d");

        $rekappresensi = DB::table('presensi')
        ->selectRaw('
        SUM(IF(status="H",1,0)) as jmlhadir,
        SUM(IF(status="I",1,0)) as jmlizin,
        SUM(IF(status="S",1,0)) as jmlsakit,
        SUM(IF(status="C",1,0)) as jmlcuti,
        SUM(IF(status="T",1,0)) as jmltugasluar,
        SUM(IF(jam_in > jam_masuk ,1,0)) as jmltelat,
        SUM(IF(jam_in = "",1,0)) as jmlalpa,
        SUM(IF(jam_masuk > jam_in ,1,0)) as jmltepat
        ')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->where('tgl_presensi', $hariini)
        ->first();

        $rekapasn = DB::table('asn')
        ->selectRaw('COUNT(nip) as jmlasn')
        ->first();


        return view('dashboard.dashboardadmin', compact('rekappresensi','rekapasn'));
    }

    public function dashboardhonorer()
    {
        $hariini    = date("Y-m-d");
        $bulanini = date("m") * 1;
        $tahunini = date("Y");
        $nik = Auth::guard('honorer')->user()->nik;


        $nama = Auth::guard('honorer')->user()->nama;
        $presensihonorerhariini = DB::table('presensihonorer')->where('nik', $nik)->where('tgl_presensi', $hariini)->first();
        $historihonorerbulanini = DB::table('presensihonorer')
        ->select('presensihonorer.*','keterangan','jam_kerja_honorer.*','file_dokumen','nama_cuti')
        ->leftJoin('jam_kerja_honorer','presensihonorer.kode_jam_kerja_honorer', '=', 'jam_kerja_honorer.kode_jam_kerja_honorer')
        ->leftJoin('pengajuan_izin','presensihonorer.kode_izin','=','pengajuan_izin.kode_izin')
        ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
        ->where('presensihonorer.nik', $nik)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'" ')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->orderBy('tgl_presensi','desc')
        ->get();

        $rekappresensihonorer = DB::table('presensihonorer')
        ->selectRaw('
        SUM(IF(status="H",1,0)) as jmlhadir,
        SUM(IF(status="I",1,0)) as jmlizin,
        SUM(IF(status="S",1,0)) as jmlsakit,
        SUM(IF(status="C",1,0)) as jmlcuti,
        SUM(IF(status="T",1,0)) as jmltugasluar,
        SUM(IF(jam_in > jam_masuk ,1,0)) as jmltelat,
        SUM(IF(jam_in = "",1,0)) as jmlalpa,
        SUM(IF(jam_masuk > jam_in ,1,0)) as jmltepat
        ')
        ->leftJoin('jam_kerja_honorer','presensihonorer.kode_jam_kerja_honorer', '=', 'jam_kerja_honorer.kode_jam_kerja_honorer')
        ->where('nik', $nik)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'" ')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->first();
        // dd($rekappresensihonorer);

        $leaderboard = DB::table('presensihonorer')
        ->join('honorer', 'presensihonorer.nik', '=', 'honorer.nik')
        // ->leftJoin('jabatan','honorer.kode_jabatan', '=', 'jabatan.kode_jabatan')
        ->leftJoin('jam_kerja_honorer','presensihonorer.kode_jam_kerja_honorer', '=', 'jam_kerja_honorer.kode_jam_kerja_honorer')
        ->where('tgl_presensi', $hariini)
        ->orderBy('jam_in')
        ->get();

        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];


        // $rekapizin = DB::table('pengajuan_izin')
        // ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
        // ->where('nik', $nik)
        // ->whereRaw('MONTH(tgl_izin_dari)="'.$bulanini.'" ')
        // ->whereRaw('YEAR(tgl_izin_dari)="'.$tahunini.'"')
        // ->where('status_approved', 1)
        // ->first();

        // $jabatan = DB::table('jabatan')
        // ->where('nik', $nik)
        // ->get();

        // return view('dashboard.dashboardhonorer', compact('presensihonorerhariini','historibulanini', 'namabulan', 'bulanini', 'tahunini', 'rekappresensihonorer', 'leaderboard'));
        return view('dashboard.dashboardhonorer', compact('presensihonorerhariini','rekappresensihonorer','namabulan', 'bulanini', 'tahunini','historihonorerbulanini', 'leaderboard'));

    }
}
