@extends('layouts.app')
@section('content')
<?php
    $no = '1';
?>
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Scan QR </h1>
        </div><!-- /.col -->        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Log Scan Kendaraan</h3>
                    </div>
                    <div class="card-body">
                        <table class=" table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode.Barcode</th>
                                    <th>Pemilik</th>
                                    <th>No.Pol.</th>
                                    <th>Kendaraan</th>
                                    <th>Last Scan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logScan as $ls)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$ls->kodeKendaraan}}.{{$ls->qrData}}</td>
                                        <td>{{$ls->namaPemilik}}</td>
                                        <td>{{$ls->nopol}}</td>
                                        <td>{{$ls->manufaktur}} - {{$ls->type}}</td>
                                        <td>{{$ls->created_date}} - {{$ls->created_time}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection