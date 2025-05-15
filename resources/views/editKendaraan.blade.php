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
                            <input type="hidden" name="idUpdateData" id="idUpdateData" value="{{$editKendaraan->dataID}}">
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
                                <button type="submit" class="btn btn-success btn-sm" id="btnEditDataKendaraan">Simpan</button>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            @if($editKendaraan->fotoKendaraan <> "")
                            <div class="col-md-4">
                                <img src="{{asset('public/image/upload')}}/{{$editKendaraan->barcode}}/{{$editKendaraan->fotoKendaraan}}" alt="" srcset="" width="150">
                                <hr>
                                <button class="btn btn-danger btn-sm" id="deleteKendaraan" data-id="{{$editKendaraan->dataID}}">Hapus Kendaraan</button>
                            </div>
                            @else
                            <div class="col-md-4">
                                <p class="bg-danger p-2"><b>Tidak Ada Gambar Yang Di Masukkan</b></p>
                                <form class="form" enctype="multipart/form-data" id="formUploadKendaraan">
                                    <input type="hidden" name="idDataUpload1" id="idDataUpload1" value="{{$editKendaraan->dataID}}">
                                    <div class="form-group">
                                        <label for="updateFotoKendaraan">Upload Kendaraan</label>
                                        <input type="file" class="custom-file-input" id="updateFotoKendaraan" name="updateFotoKendaraan">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="uploadKendaraan" class="btn btn-md btn-success">Upload</button>
                                    </div>
                                </form>
                            </div>
                            @endif

                            @if($editKendaraan->fotoPemilik <> "")
                                <div class="col-md-4">
                                    <img src="{{asset('public/image/upload')}}/{{$editKendaraan->barcode}}/{{$editKendaraan->fotoPemilik}}" alt="" srcset="" width="150"> 
                                    <hr>
                                    <button class="btn btn-danger btn-sm" id="deletePemilik" data-id="{{$editKendaraan->dataID}}">Hapus Foto Pemilik</button>
                                </div>
                            @else
                            <div class="col-md-4">
                                <p class="bg-danger p-2 text-light"><b>Tidak Ada Gambar Yang Di Masukkan</b></p>
                                <form class="form-horizontal" enctype="multipart/form-data" id="formUploadPemilik">
                                    <input type="hidden" name="idDataUpload2" id="idDataUpload2" value="{{$editKendaraan->dataID}}">
                                    <div class="form-group">
                                        <label for="updateFotoPemilik">Upload Pemilik Kendaraan</label>
                                        <input type="file" class="custom-file-input" id="updateFotoPemilik" name="updateFotoPemilik">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="uploadPemilik" class="btn btn-md btn-success">Upload</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
        $('#deleteKendaraan').on('click', function (e) {
            e.preventDefault();
            let dataID = $(this).attr('data-id');
            $.ajax({
                type : 'get',
                url : "{{route('listKendaraan')}}/deleteKendaraan/"+dataID,
                success : function(response){                
                    window.location.reload();
                }
            });
        });

        $('#deletePemilik').on('click', function (e) {
            e.preventDefault();
            let dataID = $(this).attr('data-id');
            $.ajax({
                type : 'get',
                url : "{{route('listKendaraan')}}/deletePemilik/"+dataID,
                success : function(response){                
                    window.location.reload();
                }
            });
        });
        $("form#formUploadKendaraan").submit(function(event){
            event.preventDefault();
            $("#btnEditDataKendaraan").fadeOut("slow");
             $.ajax({
                url: "{{route('listKendaraan')}}/uploadKendaraan",
                type: 'POST',
                data: new FormData(this),
                async: true,
                cache: true,
                contentType: false,
                processData: false,
                success: function (data) {                    
                    window.location.reload();                    
                }
            });
            return false;
        });        
        $("form#formUploadUpload").submit(function(event){
            event.preventDefault();
            $("#btnEditDataKendaraan").fadeOut("slow");
             $.ajax({
                url: "{{route('listKendaraan')}}/uploadPemilik",
                type: 'POST',
                data: new FormData(this),
                async: true,
                cache: true,
                contentType: false,
                processData: false,
                success: function (data) {                    
                    window.location.reload();                    
                }
            });
            return false;
        });      
        
        $("form#formEditKendaraan").submit(function(event){
            event.preventDefault();
            $("#btnEditDataKendaraan").fadeOut("slow");
             $.ajax({
                url: "{{route('regKendaraan')}}/postEditDataKendaraan",
                type: 'POST',
                data: new FormData(this),
                async: true,
                cache: true,
                contentType: false,
                processData: false,
                success: function (data) {                    
                    window.location.reload();                    
                }
            });
            return false;
        });
    });
</script>
@endsection