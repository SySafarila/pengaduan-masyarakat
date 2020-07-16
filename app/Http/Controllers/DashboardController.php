<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin = 'admin';
        $officer = 'officer';
        $public = 'public';

        if (Auth::user()->level == $admin) {
            return view('pages.dashboard.index');
        }
        if (Auth::user()->level == $officer) {
            return view('pages.dashboard.index');
        }
        if (Auth::user()->level == $public) {
            return view('pages.dashboard.index');
        }
    }
}
