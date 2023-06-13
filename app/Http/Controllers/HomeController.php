<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roleUser = \Auth::user()->roles->pluck('name')[0];
        if ($roleUser == 'admin') {
            return redirect('/back-admin/dashboard');
        } elseif ($roleUser == 'doctor') {
            return redirect('/back-doctor/dashboard');
        } elseif ($roleUser == 'staff') {
            return redirect('/back-staff/dashboard');
        } elseif ($roleUser == 'patient') {
            return redirect('/back-patient/dashboard');
        } else {
            return redirect('/logout');
        }
    }
}
