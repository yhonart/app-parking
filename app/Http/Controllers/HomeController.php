<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function processScan ($dataQr){        
        // echo $qrResult;
        DB::table('scanlog')->insert([
            'qrData' => $dataQr,
            'created_date' => now(),
            'created_time' => now()
        ]);
        // try {
        //     // Contoh: Menyimpan hasil scan ke dalam tabel 'scans'

        //     return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
        // } catch (\Exception $e) {
        //     Log::error('Gagal menyimpan data QR code: ' . $e->getMessage());
        //     return response()->json(['success' => false, 'message' => 'Gagal menyimpan data.'], 500);
        // }
    }
}
