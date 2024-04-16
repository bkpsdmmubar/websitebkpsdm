<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboardweb.index');
    }

    function admin()
    {
        return view('dashboardweb.index');
    }

    function editor()
    {
        return view('dashboardweb.index');
    }
}
