<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class gatePassController extends Controller
{
    public function processScan ($dataQr){        
        // echo $qrResult;
        DB::table('scanlog')->insert([
            'qrData' => $dataQr,
            'created_date' => now(),
            'created_time' => now()
        ]);        
    }

    public function logScan (){
        $logScan = DB::table('view_log_scan_qr')
            ->get();

        return view('logScanQr', compact('logScan'));
    }

    public function successScan($dataQr){
        $logData = DB::table('m_personalia')
            ->where('barcode',$dataQr)
            ->first();

        return view('logDataScan', compact('logData'));
    }
}
