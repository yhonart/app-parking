@extends('layouts.app')
@section('content')
<?php
    $no = '1';
?>
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Verifikasi Data</h1>
        </div><!-- /.col -->        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">    
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">                    
                    <div class="card-body table-responsive">   
                        <div class="row">
                            <div class="col-md-12">
                                @if($logData->fotoKendaraan == "" || $logData->fotoPemilik == "")
                                    <b>⚠️ Tidak ada foto pemilik atau kendaraan yang di upload.</b>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-4 text-center">
                                                    <img src="{{asset('public/image/upload')}}/{{$logData->barcode}}/{{$logData->fotoKendaraan}}" alt="" srcset="" width="150"> 
                                                    <p class="bg-primary text-center p-2 text-light">Foto Kendaraan</p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <img src="{{asset('public/image/upload')}}/{{$logData->barcode}}/{{$logData->fotoPemilik}}" alt="" srcset="" width="150"> 
                                                    <p class="bg-primary text-center p-2 text-light">Foto Pemilik</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>                     
                        <dl class="row mb-1">
                            <dt class="col-md-2">Nama</dt>
                            <dd class="col-md-4">{{$logData->namaPemilik}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">Kendaraan</dt>
                            <dd class="col-md-4">{{$logData->manufaktur}} - {{$logData->type}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">No. Polisi</dt>
                            <dd class="col-md-4">{{$logData->nopol}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">No. QR</dt>
                            <dd class="col-md-4">{{$logData->barcode}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">Type. QR</dt>
                            <dd class="col-md-4">{{$logData->kodeKendaraan}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection