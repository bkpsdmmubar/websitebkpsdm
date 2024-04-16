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
use App\Models\Asn;
use PhpParser\Node\Stmt\While_;

class PresensiController extends Controller
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
        $nip        = Auth::guard('asn')->user()->nip;
        $hariini    = date("Y-m-d");
        $jamsekarang = date("H:i");
        $tgl_sebelumnya = date('Y-m-d', strtotime("-1 days", strtotime($hariini)));
        $cekpresensi_sebelumnya = DB::table('presensi')
            ->join('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
            ->where('tgl_presensi', $tgl_sebelumnya)
            ->where('nip', $nip)
            ->first();

        $ceklintashari_presensi = $cekpresensi_sebelumnya != null ? $cekpresensi_sebelumnya->lintashari : 0;

        if ($ceklintashari_presensi == 1) {
            if ($jamsekarang < "07:00") {
            $hariini = $tgl_sebelumnya;
            }
        }
        $namahari   = $this->gethari(date('D',strtotime($hariini)));

        $kode_skpd      = Auth::guard('asn')->user()->kode_skpd;
        $cek            = DB::table('presensi')->where('tgl_presensi', $hariini)->where('nip', $nip)->count();
        $kode_unitkerja = Auth::guard('asn')->user()->kode_unitkerja;
        $kode_jabatan   = Auth::guard('asn')->user()->kode_jabatan;
        $lok_kantor     = DB::table('skpd')->where('kode_skpd',$kode_skpd)->first();
        $jamkerja       = DB::table('konfigurasi_jamkerja')
            ->join('jam_kerja', 'konfigurasi_jamkerja.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nip', $nip)->where('hari',$namahari)->first();

            if ($jamkerja == null) {
                $jamkerja   = DB::table('konfigurasi_jk_skpd_detail')
                    ->join('konfigurasi_jk_skpd','konfigurasi_jk_skpd_detail.kode_jk_skpd', '=', 'konfigurasi_jk_skpd.kode_jk_skpd' )
                    ->join('jam_kerja', 'konfigurasi_jk_skpd_detail.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
                    ->where('kode_skpd', $kode_skpd)
                    ->where('kode_unitkerja',$kode_unitkerja)
                    ->where('hari',$namahari)->first();
            }
        if ($jamkerja == null) {
            return view('presensi.notifjadwal');
        } else {
            return view('presensi.create', compact('cek','lok_kantor', 'jamkerja','hariini'));
        }
    }

    public function store(Request $request)
    {
        $nip = Auth::guard('asn')->user()->nip;
        $hariini    = date("Y-m-d");
        $jamsekarang = date("H:i");
        $tgl_sebelumnya = date('Y-m-d', strtotime("-1 days", strtotime($hariini)));
        $cekpresensi_sebelumnya = DB::table('presensi')
            ->join('jam_kerja','presensi.kode_jam_kerja','=','jam_kerja.kode_jam_kerja')
            ->where('tgl_presensi', $tgl_sebelumnya)
            ->where('nip', $nip)
            ->first();

        $ceklintashari_presensi = $cekpresensi_sebelumnya != null ? $cekpresensi_sebelumnya->lintashari : 0;

        $kode_skpd  = Auth::guard('asn')->user()->kode_skpd;
        $kode_unitkerja  = Auth::guard('asn')->user()->kode_unitkerja;
        $tgl_presensi = $ceklintashari_presensi == 1 && $jamsekarang < "07:00" ? $tgl_sebelumnya : date("Y-m-d");
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
        $namahari   = $this->gethari(date('D',strtotime($tgl_presensi)));
        $jamkerja   = DB::table('konfigurasi_jamkerja')
            ->join('jam_kerja', 'konfigurasi_jamkerja.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nip', $nip)->where('hari',$namahari)->first();

            if ($jamkerja == null) {
                $jamkerja   = DB::table('konfigurasi_jk_skpd_detail')
                    ->join('konfigurasi_jk_skpd','konfigurasi_jk_skpd_detail.kode_jk_skpd', '=', 'konfigurasi_jk_skpd.kode_jk_skpd' )
                    ->join('jam_kerja', 'konfigurasi_jk_skpd_detail.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
                    ->where('kode_skpd', $kode_skpd)
                    ->where('kode_unitkerja',$kode_unitkerja)
                    ->where('hari',$namahari)->first();
            }

        $presensi = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nip', $nip);
        $cek = $presensi->count();
        $datapresensi = $presensi->first();
        if($cek > 0){
            $ket = "out";
        } else {
            $ket = "in";
        }

        // script gambar foto
        $image = $request->image;
        $folderPath= "public/uploads/absensi/";
        $formatName = $nip . "-" . $tgl_presensi . "-" . $ket;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;

        $tgl_pulang = $jamkerja->lintashari == 1 ? date('Y-m-d',strtotime("+ 1 days",strtotime($tgl_presensi))) : $tgl_presensi;
        $jam_pulang = $hariini . " " . $jam;
        // dd($jam_pulang);
        $jamkerja_pulang = $tgl_pulang ." ". $jamkerja->jam_pulang;
        $dataasn = DB::table('asn')->where('nip', $nip)->first();
        $no_hp = $dataasn->nomor_hp; 
        if ($radius > $lok_kantor->radius) {
            echo "error|Maaf Anda Berada Di Luar Radius, Jarak Anda ". $radius ." Meter dari kantor|radius";
        } else {
            if($cek > 0) {
                if ($jam_pulang < $jamkerja_pulang) {
                    echo "error|Maaf Belum Waktunya Absen Pulang |out";
                } else if (!empty($datapresensi->jam_out)) {
                    echo "error|Anda Sudah Melakukan Absen Pulang! |out";
                } else {
                    $data_pulang = [
                        'jam_out'     => $jam,
                        'foto_out'    => $fileName,
                        'lokasi_out'  => $lokasi
                    ];
                    $update = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nip', $nip)->update($data_pulang);
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
                        'nip'               => $nip,
                        'tgl_presensi'      => $tgl_presensi,
                        'jam_in'            => $jam,
                        'foto_in'           => $fileName,
                        'lokasi_in'         => $lokasi,
                        'kode_jam_kerja'    => $jamkerja->kode_jam_kerja,
                        'status'            => 'H'
                    ];
                    $simpan = DB::table('presensi')->insert($data_masuk);
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
        $nip = Auth::guard('asn')->user()->nip;
        $asn = DB::table('asn')->where('nip', $nip)
        ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
        ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
        ->first();

        $skpd = DB::table('skpd')->get();
        $unitkerja = DB::table('unitkerja')->get();
        $jabatan = DB::table('jabatan')->get();
        
        return view('presensi.editprofile',compact('asn','skpd','unitkerja','jabatan'));
    }

    public function updateprofile(Request $request)
    {
        $nip = Auth::guard('asn')->user()->nip;
        $nama_lengkap = $request->nama_lengkap;
        $nomor_hp = $request->nomor_hp;
        $jabatan = $request->jabatan;
        $photo = $request->photo;
        $password = Hash::make($request->password);
        $asn = DB::table('asn')->where('nip', $nip)->first();
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg|max:200',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $nip.".".$request->file('photo')->getClientOriginalExtension();
        } else {
            $photo = $asn->photo;
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
        $update = DB::table('asn')->where('nip', $nip)->update($data);
        if($update){
            if($request->hasFile('photo')){
                $folderPath = "public/uploads/asn/";
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
        return view('presensi.histori',compact('namabulan'));
    }

    public function gethistori(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $nip = Auth::guard('asn')->user()->nip;

        $histori = DB::table('presensi')
        ->select('presensi.*','keterangan','jam_kerja.*','file_dokumen','nama_cuti')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensi.kode_izin','=','pengajuan_izin.kode_izin')
        ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
        ->where('presensi.nip', $nip)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulan.'" ')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahun.'"')
        ->orderBy('tgl_presensi')
        ->get();

        // $histori = DB::table('presensi')
        // ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        // ->whereRaw('MONTH(tgl_presensi)="'.$bulan.'" ')
        // ->whereRaw('YEAR(tgl_presensi)="'.$tahun.'"')
        // ->where('nip', $nip)
        // ->orderBy('tgl_presensi')
        // ->get();

        return view('presensi.gethistori', compact('histori'));
    }

    public function izin(Request $request)
    {
        $nip        = Auth::guard('asn')->user()->nip;

        if (!empty($request->bulan) && !empty($request->tahun)) {
            $dataizin = DB::table('pengajuan_izin')
                    ->leftJoin('master_tugasluar','pengajuan_izin.kode_tugasluar','=','master_tugasluar.kode_tugasluar')
                    ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
                    ->orderBy('tgl_izin_dari', 'desc')
                    ->where('nip',$nip)
                    ->whereRaw('MONTH(tgl_izin_dari)="' .$request->bulan. '"')
                    ->whereRaw('YEAR(tgl_izin_dari)="' .$request->tahun. '"')
                    ->get();
        } else {
            $dataizin = DB::table('pengajuan_izin')
            ->leftJoin('master_tugasluar','pengajuan_izin.kode_tugasluar','=','master_tugasluar.kode_tugasluar')
            ->leftJoin('master_cuti','pengajuan_izin.kode_cuti','=','master_cuti.kode_cuti')
            ->where('nip',$nip)
            ->orderBy('tgl_izin_dari', 'desc')
            ->limit(5)->orderBy('tgl_izin_dari','desc')
            ->get();
        }

        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];

         return view('presensi.izin', compact('dataizin','namabulan'));
    }

    public function buatizin()
    {

         return view('presensi.buatizin');
    }

    public function storeizin(Request $request)
    {
        $nip        = Auth::guard('asn')->user()->nip;
        $tgl_izin_dari   = $request->tgl_izin_dari;
        $status     = $request->status;
        $keterangan = $request->keterangan;

        $data = [
            'nip'           => $nip,
            'tgl_izin_dari' => $tgl_izin_dari,
            'status'        => $status,
            'keterangan'    => $keterangan,
            ];

        $simpan = DB::table('pengajuan_izin')->insert($data);

        if ($simpan) {
            return redirect('presensi/izin')->with(['success'=>'Data Berhasil Disimpan']);
        } else {
            return redirect('presensi/izin')->with(['error'=>'Data Gagal Disimpan']);
        }
    }

    public function monitoring()
    {
        return view('presensi.monitoring');
    }

    public function getpresensi(Request $request)
    {
        $tanggal = $request->tanggal;
        $presensi = DB::table('presensi')
        ->select('presensi.*','nama_lengkap','nama_jabatan','nama_skpd','jam_masuk','nama_jam_kerja','jam_masuk','jam_pulang','keterangan')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensi.kode_izin', '=', 'pengajuan_izin.kode_izin')
        ->join('asn','presensi.nip','=','asn.nip')
        ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
        ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
        ->where('tgl_presensi', $tanggal)
        ->get();

        return view('presensi.getpresensi',compact('presensi'));
    }

    public function tampilkanpeta(Request $request)
    {
        $id = $request->id;
        $presensi = DB::table('presensi')->where('id', $id)
        ->join('asn','presensi.nip', '=', 'asn.nip')
        ->first();

        return view('presensi.showmap',compact('presensi'));
    }


    public function laporan()
    {
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $asn = DB::table('asn')->orderBy('nama_lengkap')->get();
        return view('presensi.laporan',compact('namabulan','asn'));
    }

    public function cetaklaporan(Request $request)
    {
        // $nip = Auth::guard('asn')->user()->nip;
        $nip = $request->nip;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $asn = DB::table('asn')->where('nip', $nip)
        ->join('skpd','asn.kode_skpd','=','skpd.kode_skpd')
        ->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan')
        ->first();

        $presensi = DB::table('presensi')
        ->select('presensi.*','keterangan','jam_kerja.*')
        ->leftJoin('jam_kerja','presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin','presensi.kode_izin', '=', 'pengajuan_izin.kode_izin')
        ->where('presensi.nip', $nip)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulan.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahun.'"')
        ->orderBy('tgl_presensi')
        ->get();

        if (isset($_POST['exportexcel'])) {
            $time = date("d-M-Y H:i:s");
            //Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");
            //
            header("Content-Disposition: attachment; filename=Rekap Presensi ASN $time.xls");
            }
        return view('presensi.cetaklaporan', compact('bulan','tahun','namabulan','asn','presensi'));
    }

    public function rekap()
    {
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        $skpd = DB::table('skpd')->orderBy('kode_skpd')->get();
        return view('presensi.rekap',compact('namabulan','skpd'));
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

            $select_date .= "MAX(IF(tgl_presensi = '$dari',
            CONCAT(
            IFNULL(jam_in,'NA'),'|',
            IFNULL(jam_out,'NA'),'|',
            IFNULL(presensi.status,'NA'),'|',
            IFNULL(nama_jam_kerja,'NA'),'|',
            IFNULL(jam_masuk,'NA'),'|',
            IFNULL(jam_pulang,'NA'),'|',
            IFNULL(presensi.kode_izin,'NA'),'|',
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

        $query = Asn::query();
        $query->selectRaw(
            "$field_date asn.nip, nama_lengkap, kode_jabatan"
        );
        $query->leftJoin(
        DB::raw("(
            SELECT 
            $select_date
            presensi.nip
            FROM presensi
            LEFT JOIN jam_kerja ON presensi.kode_jam_kerja = jam_kerja.kode_jam_kerja
            LEFT JOIN pengajuan_izin ON presensi.kode_izin = pengajuan_izin.kode_izin
            WHERE tgl_presensi BETWEEN '$rangetanggal[0]' AND '$sampai'
            GROUP BY nip

            )presensi"),
            function($join) {
                $join->on('asn.nip', '=', 'presensi.nip');
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
            header("Content-Disposition: attachment; filename=Rekap Presensi ASN $time.xls");
            }

        return view('presensi.cetakrekap',compact('bulan','tahun','namabulan','rekap','rangetanggal','jmlhari'));

    }

    public function izinsakit(Request $request)
    {
       $query = Pengajuanizin::query();
       $query->select('kode_izin','tgl_izin_dari','tgl_izin_sampai','pengajuan_izin.nip','nama_lengkap','nama_jabatan','status','status_approved','keterangan');
       $query->join('asn','pengajuan_izin.nip','=','asn.nip');
       $query->join('jabatan','asn.kode_jabatan','=','jabatan.kode_jabatan');
       if(!empty($request->dari) && !empty($request->sampai)){
        $query->whereBetween('tgl_izin_dari',[$request->dari,$request->sampai]);
       }
    //    dd($query);
       if(!empty($request->nip)){
        $query->where('pengajuan_izin.nip',$request->nip);
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
       return view('presensi.izinsakit',compact('izinsakit'));
    }

    public function approveizinskit(Request $request)
    {
        $status_approved    = $request->status_approved;
        $kode_izin          = $request->kode_izin_form;
        $dataizin           = DB::table('pengajuan_izin')->where('kode_izin', $kode_izin)->first();
        $nip                = $dataizin->nip;
        $tgl_dari           = $dataizin->tgl_izin_dari;
        $tgl_sampai         = $dataizin->tgl_izin_sampai;
        $status             = $dataizin->status;
        DB::beginTransaction();
        try {
            if($status_approved == 1) {
            while (strtotime($tgl_dari) <= strtotime($tgl_sampai)) {

                DB::table('presensi')->insert([
                    'nip'           => $nip,
                    'tgl_presensi'  => $tgl_dari,
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
                DB::table('presensi')->where('kode_izin', $kode_izin)->delete();
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

        return view('presensi.showact',compact('dataizin'));
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

            return redirect('/presensi/izin')->with(['success'=>'Data Berhasil Dihapus']);
        } catch (\Exception $e) {
            return redirect('/presensi/izin')->with(['error'=>'Data Gagal Dihapus']);
        }
    }




}
