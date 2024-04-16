<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kinerja;
use Illuminate\Support\Facades\Redirect;

class KinerjaController extends Controller
{
    public function index(){
        $query = Kinerja::query();
        $query->select('*');
        if (!empty($periode)) {
            $query->where('periode','like','%'.$request->periode.'%');
        }
        $kinerjamingguan = DB::table('kinerja_mingguan')->get();

        return view('kinerjamingguan.index', compact('kinerjamingguan'));
    }




}
