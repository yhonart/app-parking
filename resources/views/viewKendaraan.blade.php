@extends('layouts.app')
@section('content')
<?php
    $no = '1';
?>
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            
        </div><!-- /.col -->        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">   
        <div class="row mb-2">
            <div class="col-md-4">
                <a href="{{route('listKendaraan')}}" class="btn btn-sm btn-primary">List Data Kendaraan</a>
            </div>
        </div>     
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">                    
                    <div class="card-body table-responsive">                        
                        <dl class="row mb-1">
                            <dt class="col-md-2">Nama</dt>
                            <dd class="col-md-4">{{$viewKendaraan->namaPemilik}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">Kendaraan</dt>
                            <dd class="col-md-4">{{$viewKendaraan->manufaktur}} - {{$viewKendaraan->type}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">No. Polisi</dt>
                            <dd class="col-md-4">{{$viewKendaraan->nopol}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">No. QR</dt>
                            <dd class="col-md-4">{{$viewKendaraan->barcode}}</dd>
                        </dl>
                        <dl class="row mb-1">
                            <dt class="col-md-2">Type. QR</dt>
                            <dd class="col-md-4">{{$viewKendaraan->kodeKendaraan}}</dd>
                        </dl>
                        <hr>
                        <div class="row justify-content-center">
                            @if($viewKendaraan->fotoKendaraan == "")
                                <div class="col-md-4 text-center">
                                    <b>⚠️ Tidak ada foto kendaraan yang di upload.</b>
                                </div>
                            @else
                                <div class="col-md-4 text-center">
                                    <img src="{{asset('public/image/upload')}}/{{$viewKendaraan->barcode}}/{{$viewKendaraan->fotoKendaraan}}" alt="" srcset="" width="150"> 
                                    <p class="bg-primary text-center p-2 text-light">Foto Kendaraan</p>
                                </div>
                            @endif

                            @if($viewKendaraan->fotoPemilik == "")
                                <div class="col-md-4 text-center">
                                    <b>⚠️ Tidak ada foto kendaraan yang di upload.</b>
                                </div>
                            @else
                                <div class="col-md-4 text-center">
                                    <img src="{{asset('public/image/upload')}}/{{$viewKendaraan->barcode}}/{{$viewKendaraan->fotoPemilik}}" alt="" srcset="" width="150"> 
                                    <p class="bg-primary text-center p-2 text-light">Foto Pemilik</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection