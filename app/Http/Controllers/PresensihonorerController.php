<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajuanizin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\honorer;
use PhpParser\Node\Stmt\While_;

class PresensihonorerController extends Controller
{

    public function gethari($hari)
    {
        // $hari = date("D");

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            Default:
                $hari_ini = "Tidak di Ketahui";
                break;
        }

        return $hari_ini;
    }

    public function create()
    {
        $nik        = Auth::guard('honorer')->user()->nik;
        $hariini    = date("Y-m-d");
        $jamsekarang = date("H:i");
        $tgl_sebelumnya = date('Y-m-d', strtotime("-1 days", strtotime($hariini)));
        $cekpresensihonorer_sebelumnya = DB::table('presensihonorer')
            ->join('jam_kerja_honorer','presensihonorer.kode_jam_kerja_honorer','=','jam_kerja_honorer.kode_jam_kerja_honorer')
            ->where('tgl_presensi', $tgl_sebelumnya)
            ->where('nik', $nik)
            ->first();

        $ceklintashari_presensihonorer = $cekpresensihonorer_sebelumnya != null ? $cekpresensihonorer_sebelumnya->lintashari : 0;

        if ($ceklintashari_presensihonorer == 1) {
            if ($jamsekarang < "07:00") {
            $hariini = $tgl_sebelumnya;
            }
        }
        $namahari   = $this->gethari(date('D',strtotime($hariini)));

        $kode_skpd      = Auth::guard('honorer')->user()->kode_skpd;
        $cek            = DB::table('presensihonorer')->where('tgl_presensi', $hariini)->where('nik', $nik)->count();
        $kode_unitkerja = Auth::guard('honorer')->user()->kode_unitkerja;
        $kode_jabatan   = Auth::guard('honorer')->user()->kode_jabatan;
        $lok_kantor     = DB::table('skpd')->where('kode_skpd',$kode_skpd)->first();
        $jamkerjahonorer       = DB::table('konfigurasi_jamkerja_honorer')
            ->join('jam_kerja_honorer', 'konfigurasi_jamkerja_honorer.kode_jam_kerja_honorer', '=', 'jam_kerja_honorer.kode_jam_kerja_honorer')
            ->where('nik', $nik)->where('hari',$namahari)->first();

            if ($jamkerjahonorer == null) {
                $jamkerjahonorer   = DB::table('konfigurasi_jk_skpd_detail_honorer')
                    ->join('konfigurasi_jk_skpd','konfigurasi_jk_skpd_detail_honorer.kode_jk_skpd', '=', 'konfigurasi_jk_skpd.kode_jk_skpd' )
                    ->join('jam_kerja_honorer', 'konfigurasi_jk_skpd_detail_honorer.kode_jam_kerja_honorer', '=', 'jam_kerja_honorer.kode_jam_kerja_honorer')
                    ->where('kode_skpd', $kode_skpd)
                    ->where('kode_unitkerja',$kode_unitkerja)
                    ->where('hari',$namahari)->first();
            }
        if ($jamkerjahonorer == null) {
            return view('presensi.notifjadwalhonorer');
        } else {
            return view('presensihonorer.create', compact('cek','lok_kantor', 'jamkerjahonorer','hariini'));
        }
    }

    public function store(Request $request)
    {
        $nik = Auth::guard('honorer')->user()->nik;
        $hariini    = date("Y-m-d");
        $jamsekarang = date("H:i");
        $tgl_sebelumnya = date('Y-m-d', strtotime("-1 days", strtotime($hariini)));
        $cekpresensihonorer_sebelumnya = DB::table('presensihonorer')
            ->join('jam_kerja','presensihonorer.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
            ->where('tgl_presensihonorer', $tgl_sebelumnya)
            ->where('nik', $nik)
            ->first();

        $ceklintashari_presensihonorer = $cekpresensihonorer_sebelumnya != null ? $cekpresensihonorer_sebelumnya->lintashari : 0;

        $kode_skpd  = Auth::guard('honorer')->user()->kode_skpd;
        $kode_unitkerja  = Auth::guard('honorer')->user()->kode_unitkerja;
        $tgl_presensihonorer = $ceklintashari_presensihonorer == 1 && $jamsekarang < "07:00" ? $tgl_sebelumnya : date("Y-m-d");
        $jam = date("H:i:s");
        // script Lokasi Kantor
        $lok_kantor  = DB::table('skpd')->where('kode_skpd',$kode_skpd)->first();
        $lok = explode(",",$lok_kantor->lokasi_kantor);
        $latitudekantor = $lok[0];
        $longitudkantor = $lok[1];

        // script Lokasi user
        $lokasi         = $request->lokasi;
        $lokasiuser     = explode(",", $lokasi);
        $latitudeuser   = $lokasiuser[0];
        $longituduser   = $lokasiuser[1];

        $jarak          = $this->distance($latitudekantor,$longitudkantor,$latitudeuser,$longituduser);
        $radius         = round($jarak["meters"]);

        // $namahari = $this->gethari();
        $namahari   = $this->gethari(date('D',strtotime($tgl_presensihonorer)));
        $jamkerja   = DB::table('konfigurasi_jamkerja')
            ->join('jam_kerja', 'konfigurasi_jamkerja.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nik', $nik)->where('hari',$namahari)->first();

            if ($jamkerja == null) {
                $jamkerja   = DB::table('konfigurasi_jk_skpd_detail')
                    ->join('konfigurasi_jk_skpd','konfigurasi_jk_skpd_detail.kode_jk_skpd', '=', 'konfigurasi_jk_skpd.kode_jk_skpd' )
                    ->join('jam_kerja', 'konfigurasi_jk_skpd_detail.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
                    ->where('kode_skpd', $kode_skpd)
                    ->where('kode_unitkerja',$kode_unitkerja)
                    ->where('hari',$namahari)->first();
            }

        $presensihonorer = DB::table('presensihonorer')->where('tgl_presensihonorer', $tgl_presensihonorer)->where('nik', $nik);
        $cek = $presensihonorer->count();
        $datapresensihonorer = $presensihonorer->first();
        if($cek > 0){
            $ket = "out";
        } else {
            $ket = "in";
        }

        // script gambar foto
        $image = $request->image;
        $folderPath= "public/uploads/absensi/";
        $formatName = $nik . "-" . $tgl_presensihonorer . "-" . $ket;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;

        $tgl_pulang = $jamkerja->lintashari == 1 ? date('Y-m-d',strtotime("+ 1 days",strtotime($tgl_presensihonorer))) : $tgl_presensihonorer;
        $jam_pulang = $hariini . " " . $jam;
        // dd($jam_pulang);
        $jamkerja_pulang = $tgl_pulang ." ". $jamkerja->jam_pulang;
        $datahonorer = DB::table('honorer')->where('nik', $nik)->first();
        $no_hp = $datahonorer->nomor_hp; 
        if ($radius > $lok_kantor->radius) {
            echo "error|Maaf Anda Berada Di Luar Radius, Jarak Anda ". $radius ." Meter dari kantor|radius";
        } else {
            if($cek > 0) {
                if ($jam_pulang < $jamkerja_pulang) {
                    echo "error|Maaf Belum Waktunya Absen Pulang |out";
                } else if (!empty($datapresensihonorer->jam_out)) {
                    echo "error|Anda Sudah Melakukan Absen Pulang! |out";
                } else {
                    $data_pulang = [
                        'jam_out'     => $jam,
                        'foto_out'    => $fileName,
                        'lokasi_out'  => $lokasi
                    ];
                    $update = DB::table('presensihonorer')->where('tgl_presensihonorer', $tgl_presensihonorer)->where('nik', $nik)->update($data_pulang);
                    if ($update) {
                        echo "success|Terimakasih Hati hati Di Jalan|out";
                        Storage::put($file, $image_base64);
                    } else {
                        echo "error|Maaf Gagal Absen Silahkan Hubungi Admin|out";
                    }
                }

            } else {
                if($jam<$jamkerja->awal_jam_masuk) {
                    echo "error|Maaf Belum Waktunya Melakukan Absen|in";
                } else if ($jam>$jamkerja->akhir_jam_masuk) {
                    echo "error|Maaf Batas Absensi Sudah Berakhir|out";
                } else {
                    $data_masuk = [
                        'nik'               => $nik,
                        'tgl_presensihonorer'      => $tgl_presensihonorer,
                        'jam_in'            => $jam,
                        'foto_in'           => $fileName,
                        'lokasi_in'         => $lokasi,
                        'kode_jam_kerja'    => $jamkerja->kode_jam_kerja,
                        'status'            => 'H'
                    ];
                    $simpan = DB::table('presensihonorer')->insert($data_masuk);
                    if ($simpan) {
                        echo "success|Terimakasih, Selamat Bekerja|in";
                        Storage::put($file, $image_base64);
                    } else {
                        echo "error|Maaf Gagal Absen Silahkan Hubungi Admin|out";
                    }
                }

            }
        }
    }

    //Menghitung Jarak
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }


    public function editprofile()
    {
        $nik = Auth::guard('honorer')->user()->nik;
        $honorer = DB::table('honorer')->where('nik', $nik)
        ->join('skpd','honorer.kode_skpd','=','skpd.kode_skpd')
        ->join('jabatan','honorer.kode_jabatan','=','jabatan.kode_jabatan')
        ->first();

        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $jabatan = DB::table('jabatan')->get();
        
        return view('presensihonorer.editprofile',compact('honorer','skpd','unitkerja','jabatan'));
    }

    public function updateprofile(Request $request)
    {
        $nik = Auth::guard('honorer')->user()->nik;
        $nama_lengkap = $request->nama_lengkap;
        $nomor_hp = $request->nomor_hp;
        $jabatan = $request->jabatan;
        $photo = $request->photo;
        $password = Hash::make($request->password);
        $honorer = DB::table('honorer')->where('nik', $nik)->first();
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg|max:200',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $nik.".".$request->file('photo')->getClientOriginalExtension();
        } else {
            $photo = $honorer->photo;
        }
        if (empty($request->password)) {
            $data = [
                'nama_lengkap'  => $nama_lengkap,
                'photo'         => $photo,
                'nomor_hp'         => $nomor_hp

            ];
        } else {
            $data = [
                'nama_lengkap'  => $nama_lengkap,
                'nomor_hp'         => $nomor_hp,
                'photo'          => $photo,
                'password'      => $password
            ];
        }
        $update = DB::table('honorer')->where('nik', $nik)->update($data);
        if($update){
            if($request->hasFile('photo')){
                $folderPath = "public/uploads/honorer/";
                $request->file('photo')->storeAs($folderPath, $photo);
            }
            return Redirect::back()->with(  ['success' => 'Data Berhasil di Update']);
        } else {
            return Redirect::back()->with(['error' => 'Data Gagal di Update']);
        }

    }

    public function histori()
    {
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        return view('presensihonorer.histori',compact('namabulan'));
    }

    public function gethistori(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $nik = Auth::guard('honorer')->user()->nik;

        $histori = DB::table('presensihonorer')
        ->select('presensihonorer.*','keterangan','jam_kerja.*','file_dokumen','nama_cuti')
        ->leftJoin('jam_kerja','presensihonorer.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensihonorer.kode_izin','=','pengajuan_izin.kode_izin')
        ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
        ->where('presensihonorer.nik', $nik)
        ->whereRaw('MONTH(tgl_presensihonorer)="'.$bulan.'" ')
        ->whereRaw('YEAR(tgl_presensihonorer)="'.$tahun.'"')
        ->orderBy('tgl_presensihonorer')
        ->get();

        // $histori = DB::table('presensihonorer')
        // ->leftJoin('jam_kerja','presensihonorer.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        // ->whereRaw('MONTH(tgl_presensihonorer)="'.$bulan.'" ')
        // ->whereRaw('YEAR(tgl_presensihonorer)="'.$tahun.'"')
        // ->where('nik', $nik)
        // ->orderBy('tgl_presensihonorer')
        // ->get();

        return view('presensihonorer.gethistori', compact('histori'));
    }

    public function izin(Request $request)
    {
        $nik        = Auth::guard('honorer')->user()->nik;

        if (!empty($request->bulan) && !empty($request->tahun)) {
            $dataizin = DB::table('pengajuan_izin')
                    ->leftJoin('master_tugasluar','pengajuan_izin.kode_tugasluar','=','master_tugasluar.kode_tugasluar')
                    ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
                    ->orderBy('tgl_izin_dari', 'desc')
                    ->where('nik',$nik)
                    ->whereRaw('MONTH(tgl_izin_dari)="' .$request->bulan. '"')
                    ->whereRaw('YEAR(tgl_izin_dari)="' .$request->tahun. '"')
                    ->get();
        } else {
            $dataizin = DB::table('pengajuan_izin')
            ->leftJoin('master_tugasluar','pengajuan_izin.kode_tugasluar','=','master_tugasluar.kode_tugasluar')
            ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
            ->where('nik',$nik)
            ->orderBy('tgl_izin_dari', 'desc')
            ->limit(5)->orderBy('tgl_izin_dari','desc')
            ->get();
        }

        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];

         return view('presensihonorer.izin', compact('dataizin','namabulan'));
    }

    public function buatizin()
    {

         return view('presensihonorer.buatizin');
    }

    public function storeizin(Request $request)
    {
        $nik        = Auth::guard('honorer')->user()->nik;
        $tgl_izin_dari   = $request->tgl_izin_dari;
        $status     = $request->status;
        $keterangan = $request->keterangan;

        $data = [
            'nik'           => $nik,
            'tgl_izin_dari' => $tgl_izin_dari,
            'status'        => $status,
            'keterangan'    => $keterangan,
            ];

        $simpan = DB::table('pengajuan_izin')->insert($data);

        if ($simpan) {
            return redirect('presensihonorer/izin')->with(['success'=>'Data Berhasil Disimpan']);
        } else {
            return redirect('presensihonorer/izin')->with(['error'=>'Data Gagal Disimpan']);
        }
    }

    public function monitoring()
    {
        return view('presensihonorer.monitoring');
    }

    public function getpresensihonorer(Request $request)
    {
        $tanggal = $request->tanggal;
        $presensihonorer = DB::table('presensihonorer')
        ->select('presensihonorer.*','nama_lengkap','nama_jabatan','nama_skpd','jam_masuk','nama_jam_kerja','jam_masuk','jam_pulang','keterangan')
        ->leftJoin('jam_kerja','presensihonorer.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensihonorer.kode_izin', '=', 'pengajuan_izin.kode_izin')
        ->join('honorer','presensihonorer.nik','=','honorer.nik')
        ->join('jabatan','honorer.kode_jabatan','=','jabatan.kode_jabatan')
        ->join('skpd','honorer.kode_skpd','=','skpd.kode_skpd')
        ->where('tgl_presensihonorer', $tanggal)
        ->get();

        return view('presensihonorer.getpresensihonorer',compact('presensihonorer'));
    }

    public function tampilkanpeta(Request $request)
    {
        $id = $request->id;
        $presensihonorer = DB::table('presensihonorer')->where('id', $id)
        ->join('honorer','presensihonorer.nik', '=', 'honorer.nik')
        ->first();

        return view('presensihonorer.showmap',compact('presensihonorer'));
    }


    public function laporan()
    {
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $honorer = DB::table('honorer')->orderBy('nama_lengkap')->get();
        return view('presensihonorer.laporan',compact('namabulan','honorer'));
    }

    public function cetaklaporan(Request $request)
    {
        // $nik = Auth::guard('honorer')->user()->nik;
        $nik = $request->nik;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $honorer = DB::table('honorer')->where('nik', $nik)
        ->join('skpd','honorer.kode_skpd','=','skpd.kode_skpd')
        ->join('jabatan','honorer.kode_jabatan','=','jabatan.kode_jabatan')
        ->first();

        $presensihonorer = DB::table('presensihonorer')
        ->select('presensihonorer.*','keterangan','jam_kerja.*')
        ->leftJoin('jam_kerja','presensihonorer.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensihonorer.kode_izin', '=', 'pengajuan_izin.kode_izin')
        ->where('presensihonorer.nik', $nik)
        ->whereRaw('MONTH(tgl_presensihonorer)="'.$bulan.'"')
        ->whereRaw('YEAR(tgl_presensihonorer)="'.$tahun.'"')
        ->orderBy('tgl_presensihonorer')
        ->get();

        if (isset($_POST['exportexcel'])) {
            $time = date("d-M-Y H:i:s");
            //Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");
            //
            header("Content-Disposition: attachment; filename=Rekap presensihonorer honorer $time.xls");
            }
        return view('presensihonorer.cetaklaporan', compact('bulan','tahun','namabulan','honorer','presensihonorer'));
    }

    public function rekap()
    {
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $skpd = DB::table('skpd')->orderBy('kode_skpd')->get();
        return view('presensihonorer.rekap',compact('namabulan','skpd'));
    }

    public function cetakrekap(Request $request)
    {
        // $bulan      = date("m");
        $bulan      = $request->bulan;
        $tahun      = $request->tahun;
        $dari       = $tahun."-".$bulan."-01";
        $sampai     = date("Y-m-t", strtotime($dari));
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        // $skpd = DB::table('skpd')->where('kode_skpd', $kode_skpd)
        // ->get();
        // dd($bulan);

        // dd("Dari :" .$dari. "   Sampai :".$sampai);
        $select_date = "";
        $field_date = "";
        $i = 1;
        While (strtotime($dari) <= strtotime($sampai)) {
            $rangetanggal[] = $dari;

            $select_date .= "MAX(IF(tgl_presensihonorer = '$dari',
            CONCAT(
            IFNULL(jam_in,'NA'),'|',
            IFNULL(jam_out,'NA'),'|',
            IFNULL(presensihonorer.status,'NA'),'|',
            IFNULL(nama_jam_kerja,'NA'),'|',
            IFNULL(jam_masuk,'NA'),'|',
            IFNULL(jam_pulang,'NA'),'|',
            IFNULL(presensihonorer.kode_izin,'NA'),'|',
            IFNULL(keterangan,'NA'),'|'
            ),NULL)) as tgl_".$i.",";

            $field_date .= "tgl_".$i.",";
            $i++;
            $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
        }
        // dd($select_date);

        $jmlhari = count($rangetanggal);
        $lastrange = $jmlhari-1;
        $sampai = $rangetanggal[$lastrange];
        if ($jmlhari == 30) {
            array_push($rangetanggal, NULL);
        }else if ($jmlhari == 29){
            array_push($rangetanggal, NULL, NULL);
        } else if ($jmlhari == 28){
            array_push($rangetanggal, NULL, NULL, NULL);
        }

        $query = honorer::query();
        $query->selectRaw(
            "$field_date honorer.nik, nama_lengkap, kode_jabatan"
        );
        $query->leftJoin(
        DB::raw("(
            SELECT 
            $select_date
            presensihonorer.nik
            FROM presensihonorer
            LEFT JOIN jam_kerja ON presensihonorer.kode_jam_kerja = jam_kerja.kode_jam_kerja
            LEFT JOIN pengajuan_izin ON presensihonorer.kode_izin = pengajuan_izin.kode_izin
            WHERE tgl_presensihonorer BETWEEN '$rangetanggal[0]' AND '$sampai'
            GROUP BY nik

            )presensihonorer"),
            function($join) {
                $join->on('honorer.nik', '=', 'presensihonorer.nik');
            }
        );


        $query->orderBy('nama_lengkap');
        $rekap = $query->get();
        // dd($rekap);
        if (isset($_POST['exportexcel'])) {
            $time = date("d-M-Y H:i:s");
            //Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");
            //
            header("Content-Disposition: attachment; filename=Rekap presensihonorer honorer $time.xls");
            }

        return view('presensihonorer.cetakrekap',compact('bulan','tahun','namabulan','rekap','rangetanggal','jmlhari'));

    }

    public function izinsakit(Request $request)
    {
       $query = Pengajuanizin::query();
       $query->select('kode_izin','tgl_izin_dari','tgl_izin_sampai','pengajuan_izin.nik','nama_lengkap','nama_jabatan','status','status_approved','keterangan');
       $query->join('honorer','pengajuan_izin.nik','=','honorer.nik');
       $query->join('jabatan','honorer.kode_jabatan','=','jabatan.kode_jabatan');
       if(!empty($request->dari) && !empty($request->sampai)){
        $query->whereBetween('tgl_izin_dari',[$request->dari,$request->sampai]);
       }
    //    dd($query);
       if(!empty($request->nik)){
        $query->where('pengajuan_izin.nik',$request->nik);
       }

       if(!empty($request->nama_lengkap)){
        $query->where('nama_lengkap','like', '%'. $request->nama_lengkap.'%');
       }

       if($request->status_approved === '0' || $request->status_approved === '1' || $request->status_approved === '2'){
        $query->where('status_approved', $request->status_approved);
       }

       $query->orderBy('tgl_izin_dari', 'desc');
       $izinsakit = $query->paginate(10);
       $izinsakit->appends($request->all());
       return view('presensihonorer.izinsakit',compact('izinsakit'));
    }

    public function approveizinskit(Request $request)
    {
        $status_approved    = $request->status_approved;
        $kode_izin          = $request->kode_izin_form;
        $dataizin           = DB::table('pengajuan_izin')->where('kode_izin', $kode_izin)->first();
        $nik                = $dataizin->nik;
        $tgl_dari           = $dataizin->tgl_izin_dari;
        $tgl_sampai         = $dataizin->tgl_izin_sampai;
        $status             = $dataizin->status;
        DB::beginTransaction();
        try {
            if($status_approved == 1) {
            while (strtotime($tgl_dari) <= strtotime($tgl_sampai)) {

                DB::table('presensihonorer')->insert([
                    'nik'           => $nik,
                    'tgl_presensihonorer'  => $tgl_dari,
                    'status'        => $status,
                    'kode_izin'     => $kode_izin
                    ]);
                    $tgl_dari = date("Y-m-d", strtotime("+1 days", strtotime($tgl_dari)));
                }
            }

            DB::table('pengajuan_izin')
                ->where('kode_izin',$kode_izin)
                ->update(['status_approved' => $status_approved]);

            DB::commit();
            return Redirect::back()->with(['success' => 'Data Berhasil Diproses']);
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with(['warning' => 'Data Gagal Diproses']);
        }
    }


    public function batalkanizinsakit($kode_izin)
    {

        DB::beginTransaction();
        try {
            DB::table('pengajuan_izin')->where('kode_izin',$kode_izin)->update([
                'status_approved' => 0 ]);
                DB::table('presensihonorer')->where('kode_izin', $kode_izin)->delete();
                DB::commit();
                return Redirect::back()->with(['success'=>'Data Berhasil Dibatalkan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with(['error'=>'Data Gagal Dibatalkan']);
        }

        $update = DB::table('pengajuan_izin')->where('kode_izin',$kode_izin)->update([
            'status_approved' => 0
        ]);
        if ($update) {
            return Redirect::back()->with(['success'=>'Data Berhasil Batalkan']);
        } else {
            return Redirect::back()->with(['error'=>'Data Gagal Batalkan']);
        }
    }

    public function showact($kode_izin)
    {
        $dataizin = DB::table('pengajuan_izin')
            ->where('kode_izin', $kode_izin)
            ->first();

        return view('presensihonorer.showact',compact('dataizin'));
    }

    public function deleteizin($kode_izin)
    {
        $cekdataizin = DB::table('pengajuan_izin')->where('kode_izin', $kode_izin)->first();
        $file_dokumen = $cekdataizin->file_dokumen;

        // dd($file_dokumen);
        try {
            DB::table('pengajuan_izin')->where('kode_izin',$kode_izin)->delete();
            if ($file_dokumen !== null){

                Storage::delete('/public/uploads/fileizin/'.$file_dokumen);
            }

            return redirect('/presensihonorer/izin')->with(['success'=>'Data Berhasil Dihapus']);
        } catch (\Exception $e) {
            return redirect('/presensihonorer/izin')->with(['error'=>'Data Gagal Dihapus']);
        }
    }




}
