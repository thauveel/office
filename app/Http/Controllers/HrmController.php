<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmController extends Controller
{
       
    public function index()
    {
        if (auth()->user()->can('access hrm'))
        {
            return view('hrm.dashboard');
        } else
        {
            abort(403);
        }
        
    }
}
