<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class regKendaraanController extends Controller
{
    public function regKendaraan (){
        return view('mainRegistrasi');
    }

    public function getNumberQr($kode){
        $countKode = DB::table('m_personalia')
            ->where('kodeKendaraan',$kode)
            ->count();

        if ($countKode == '0') {
            $number = 1;
        }
        else {
            $number = $countKode + 1;
        }
        if ($kode == "IRT") {
            $numberQrCode = $kode."".sprintf("%02d", $number);
        }
        else {
            $numberQrCode = $kode."".sprintf("%03d", $number);
        }
        return response()->json([
            'qrCode' =>$numberQrCode,
        ]); 
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function posRegKendaraan (Request $reqRegis){
        // $reqRegis->validate([
        //     'fotoKendaraan' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
        //     'fotoPemilik' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
        // ]);
        $pemilik = strtoupper($reqRegis->pemilik);
        $nopol = strtoupper($reqRegis->nopol);
        $manufacture = strtoupper($reqRegis->manufaktur);
        $type = strtoupper($reqRegis->type);
        $barcode = strtoupper($reqRegis->barcode);
        $kode = strtoupper($reqRegis->kode);
        $fotoKendaraan = $reqRegis->fotoKendaraan;
        $fotoPemilik = $reqRegis->fotoPemilik;

        if ($fotoKendaraan == "" || $fotoPemilik == "" || $pemilik == "" || $nopol == "" || $manufacture == "" || $type == "" || $barcode == "" || $kode == "") {
            $msg = array('warning' => '! Semua Data Wajib Terisi.'); 
        
        }
        else {
            $getNameKendaraan = $fotoKendaraan->getClientOriginalName();
            $getNamePemilik = $fotoPemilik->getClientOriginalName();
            $dirPublic = public_path() . "/image/upload/";
            $dirImage = $dirPublic . $barcode . "/";
            if (!file_exists($dirImage)) {
                mkdir($dirImage, 0777);
                $fotoKendaraan->move($dirImage, $getNameKendaraan);
                $fotoPemilik->move($dirImage, $getNamePemilik);
            }
            else{
                $fotoKendaraan->move($dirImage, $getNameKendaraan);
                $fotoPemilik->move($dirImage, $getNamePemilik);
            }
            DB::table('m_personalia')
                ->insert([
                    'namaPemilik' => $pemilik,
                    'nopol' => $nopol,
                    'manufaktur' => $manufacture,
                    'type' => $type,
                    'regDate' => now(),
                    'barcode' => $barcode,
                    'kodeKendaraan' => $kode,
                    'fotoKendaraan' => $getNameKendaraan,
                    'fotoPemilik' => $getNamePemilik
                ]);

            $msg = array('success' => '✔ Data Berhasil Tersimpan.');
        }
        return response()->json($msg);
    }

    public function listKendaraan (){
        $listKendaraan = DB::table('m_personalia')
            ->get();

        return view('listKendaraan', compact('listKendaraan'));
    }

    public function view ($id){
        $viewKendaraan = DB::table('m_personalia')
            ->where('dataID',$id)
            ->first();

        return view('viewKendaraan', compact('viewKendaraan'));
    }

    public function edit ($id){
        $editKendaraan = DB::table('m_personalia')
            ->where('dataID',$id)
            ->first();

        return view('editKendaraan', compact('editKendaraan'));
    }

    public function deleteKendaraan($dataID){
        DB::table('m_personalia')
            ->where('dataID',$dataID)
            ->update([
                'fotoKendaraan'=>''
            ]);
    }
    public function deletePemilik($dataID){
        DB::table('m_personalia')
            ->where('dataID',$dataID)
            ->update([
                'fotoPemilik'=>''
            ]);
    }
}
