<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IzinsakitController extends Controller
{
    public function create()
    {
        return view('sakit.create');
    }

    public function store(Request $request)
    {
        $nip                = Auth::guard('asn')->user()->nip;
        $tgl_izin_dari      = $request->tgl_izin_dari;
        $tgl_izin_sampai    = $request->tgl_izin_sampai;
        $status             = "S";
        $keterangan         = $request->keterangan;

        $bulan = date("m", strtotime($tgl_izin_dari));
        $tahun = date("Y", strtotime($tgl_izin_dari));
        $thn   = substr($tahun,2,2);
        $lastizin = DB::table('pengajuan_izin')
            ->whereRaw('MONTH(tgl_izin_dari)="'.$bulan.'"')
            ->whereRaw('YEAR(tgl_izin_dari)="'.$tahun.'"')
            ->orderBy('kode_izin', 'desc')
            ->first();

        $lastkodeizin = $lastizin !== null ? $lastizin->kode_izin : "";
        $format = "KS" . $bulan . $thn;
        $kode_izin = buatkode($lastkodeizin, $format, 4);


        //Simpan File SID
        if ($request->hasFile('fileizin')) {
            $fileizin = $kode_izin . "." . $request->file('fileizin')->getClientOriginalExtension();
        } else {
            $fileizin = null;
        }


        $data = [
            'kode_izin'       => $kode_izin,
            'nip'             => $nip,
            'tgl_izin_dari'   => $tgl_izin_dari,
            'tgl_izin_sampai' => $tgl_izin_sampai,
            'status'          => $status,
            'keterangan'      => $keterangan,
            'file_dokumen'    => $fileizin
            ];

        $cekpresensi = DB::table('presensi')
        ->whereBetween('tgl_presensi', [$tgl_izin_dari, $tgl_izin_sampai])
        ->where('nip', $nip);
        
        // Cek Pengajuan
        $cekpengajuan = DB::table('pengajuan_izin')
        ->where('nip', $nip)
        ->whereRaw('"' .$tgl_izin_dari . '" BETWEEN tgl_izin_dari AND tgl_izin_sampai');


        $datapresensi = $cekpresensi->get();

        if ($cekpresensi->count() > 0) {
            $blacklistdate = "";
            foreach($datapresensi as $d) {
                $blacklistdate .= date('d-m-Y', strtotime($d->tgl_presensi)) . ",";
            }

            return redirect('presensi/izin')->with(['error'=>'Tidak Dapat Melakukan Pengajuan Izin Pada Tanggal ' . $blacklistdate .' ,Karena Sudah Digunakan/Sudah Melakukan Presensi! Silahkan Cek Tanggal Pengajuan Izin Sakit.']);
        } else if ($cekpengajuan->count() > 0) {
            return redirect('presensi/izin')->with(['error'=>'Tidak Dapat Melakukan Pengajuan Izin Pada Tanggal Tersebut ,Karena Sudah Digunakan/Sudah Melakukan Presensi! Silahkan Cek Tanggal Pengajuan Izin Sakit.']);
        } else {

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

    public function edit($kode_izin)
    {
        $dataizin = DB::table('pengajuan_izin')
            ->where('kode_izin', $kode_izin)
            ->first();
        return view('sakit.edit', compact('dataizin'));
    }

    public function update($kode_izin, Request $request)
    {
        $tgl_izin_dari      = $request->tgl_izin_dari;
        $tgl_izin_sampai    = $request->tgl_izin_sampai;
        $keterangan         = $request->keterangan;

        //Simpan File SID
        if ($request->hasFile('fileizin')) {
            $fileizin = $kode_izin . "." . $request->file('fileizin')->getClientOriginalExtension();
        } else {
            $fileizin = null;
        }

        $data = [
            'tgl_izin_dari'   => $tgl_izin_dari,
            'tgl_izin_sampai' => $tgl_izin_sampai,
            'keterangan'      => $keterangan,
            'file_dokumen'    => $fileizin
            ];

            try {
                DB::table('pengajuan_izin')
                    ->where('kode_izin', $kode_izin)
                    ->update($data);
                if ($request->hasFile('fileizin')) {
                    $fileizin = $kode_izin . "." . $request->file('fileizin')->getClientOriginalExtension();
                    $folderPath = "public/uploads/fileizin/";
                    $request->file('fileizin')->storeAs($folderPath, $fileizin);
                }

                return redirect('presensi/izin')->with(['success'=>'Data Berhasil Diupdate']);
            } catch (\Exception $e) {
                return redirect('presensi/izin')->with(['error'=>'Data Gagal Diupdate']);
            }

    }



}
