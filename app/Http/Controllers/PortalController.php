<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function staffdashboard()
    {
        return view('staff-dashboard');
    }

}
