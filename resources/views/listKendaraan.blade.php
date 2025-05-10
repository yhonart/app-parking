@extends('layouts.app')
@section('content')
<?php
    $no = '1';
?>
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> List Registration</h1>
        </div><!-- /.col -->        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="{{route('regKendaraan')}}" class="btn btn-primary btn-sm elevation-2">Registrasi Kendaraan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kendaraan</h3>
                    </div>
                    <div class="card-body table-responsive">                        
                        <table class=" table table-sm table-valign-middle text-xs table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. QR</th>
                                    <th>Kode</th>
                                    <th>No.Pol.</th>
                                    <th>Kendaraan</th>
                                    <th>Nama Pemilik</th>
                                    <th>Foto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listKendaraan as $lk)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$lk->barcode}}</td>                                        
                                        <td>{{$lk->kodeKendaraan}}</td>                                        
                                        <td>{{$lk->nopol}}</td>                                        
                                        <td>{{$lk->manufaktur}} {{$lk->type}}</td>                                        
                                        <td>{{$lk->namaPemilik}}</td>                                        
                                        <td>
                                            <a href="{{route('listKendaraan')}}/view/{{$lk->dataID}}" class="btn btn-sm btn-warning">View</a>
                                        </td>                                        
                                        <td>
                                            <a href="{{route('listKendaraan')}}/edit/{{$lk->dataID}}" class="btn btn-sm btn-light">Edit</a>
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection