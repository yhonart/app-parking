@extends('layouts.app')
@section('content')
<?php
    $no = '1';
?>
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"></h1>
        </div><!-- /.col -->        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">                    
                    <div class="card-body table-responsive">                        
                        <form id="formEditKendaraan" class="form-horizontal" autocomplete="off">
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">Kode <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="editKodeKendaraan" id="editKodeKendaraan" class="form-control form-control-sm" value="{{$editKendaraan->kodeKendaraan}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">No.QR <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="noQR" id="noQR" class="form-control form-control-sm" value="{{$editKendaraan->barcode}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">Pemilik <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" value="{{$editKendaraan->namaPemilik}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">No.POL <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="nopol" id="nopol" class="form-control form-control-sm" value="{{$editKendaraan->nopol}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">Manufaktur <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="manufaktur" id="manufaktur" class="form-control form-control-sm" value="{{$editKendaraan->manufaktur}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 col-form-label">Type Kendaraan <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="typeKendaraan" id="typeKendaraan" class="form-control form-control-sm" value="{{$editKendaraan->type}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            </div>
                        </form>
                        <hr>
                        @if($editKendaraan->fotoKendaraan <> "" OR $editKendaraan->fotoPemilik <> "")
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('public/image/upload')}}/{{$editKendaraan->barcode}}/{{$editKendaraan->fotoKendaraan}}}}" alt="" srcset="">
                                    <br>
                                    <button class="btn btn-danger btn-sm" id="deleteKendaraan" data-id="{{$dataID}}">Hapus Kendaraan</button>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('public/image/upload')}}/{{$editKendaraan->barcode}}/{{$editKendaraan->fotoPemilik}}}}" alt="" srcset="">
                                    <br>
                                    <button class="btn btn-danger btn-sm" id="deletePemilik" data-id="{{$dataID}}">Hapus Foto Pemilik</button>
                                </div>
                            </div>
                        @else
                            <p class="bg-danger p-2"><b>Tidak Ada Gambar Yang Di Masukkan</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection