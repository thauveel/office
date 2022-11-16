<?php

namespace App\Http\Controllers;

use App\Models\hrm\BiometricDevice;
use Illuminate\Http\Request;

class ZktAdmsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cdataRequest(Request $request)
    {
        $device = BiometricDevice::where('serial','=', $request['SN'])->firstOrFail();
        
         if ($device){
            return 'OK';

         }
    }

     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRequest(Request $request)
    {
        $device = BiometricDevice::where('serial','=', $request['SN'])->firstOrFail();
        
         if ($device){
            return 'OK';

         }
    }



}
