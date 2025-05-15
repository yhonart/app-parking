@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Registrasi Kendaraan </h1>
            </div><!-- /.col -->        
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('listKendaraan')}}" target="_blank" class="btn btn-sm btn-primary">List Kendaraan</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card elevation-5">
                    <div class="card-body">
                        <form id="formAddKendaraan" class="form-horizontal" autocomplete="off">
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">Kode <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="kode" id="kode" class=" form-control form-control-sm">
                                        <option value="0">- Pilih Kode -</option>
                                        <option value="IRT">IRT.</option>
                                        <option value="EMP">EMP.</option>
                                        <option value="CON">CON.</option>
                                        <option value="MTC">MTC.</option>
                                        <option value="OPS">OPS.</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">Nomor Barcode <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class=" form-control form-control-sm" name="barcode" id="barcode" readonly>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">Pemilik <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class=" form-control form-control-sm" name="pemilik" id="pemilik">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">No. Polisi <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class=" form-control form-control-sm" name="nopol" id="nopol">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">Manufaktur <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class=" form-control form-control-sm" name="manufaktur" id="manufaktur">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class="col-md-4 col-form-label">Type Kendaraan <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class=" form-control form-control-sm" name="type" id="type">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="fotoKendaraan" class="col-md-4 col-form-label">Foto Kendaraan <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" class="custom-file-input" id="fotoKendaraan" name="fotoKendaraan">
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-md-4 col-form-label">Foto Pemilik <span class=" text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" class="custom-file-input" id="fotoPemilik" name="fotoPemilik">
                                </div>                                
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" id="btnSubmit">Simpan</button>
                            </div>
                            <div class="form-group row" id="spinnerLoad" style="display: none;">
                                <div class="col-md-12">
                                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                    </div>
                                    <span>Please Wait</span>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="display: none;" id="rowNotif">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold bg-danger p-2 m-2 text-light" id="warningInfo"></h6>
                            </div>
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
        let kode =  document.getElementById('kode'),
            barcode = document.getElementById('barcode');

        kode.addEventListener("change", function(){
            let kodeVal = $(this).find(":selected").val();
            if(kodeVal !== '0' || kodeVal !== undefined){
                fetch("{{route('regKendaraan')}}/getNumberQr/"+kodeVal)
                .then(response => response.json())
                .then(data => {
                    barcode.value = data.qrCode;
                    $("#pemilik").focus().select();
                })
            }
        });
        $("form#formAddKendaraan").submit(function(event){
            event.preventDefault();
            $("#btnSubmit").fadeOut("slow");
            $("#spinnerLoad").fadeIn("slow");
             $.ajax({
                url: "{{route('regKendaraan')}}/posRegKendaraan",
                type: 'POST',
                data: new FormData(this),
                async: true,
                cache: true,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.warning) {
                        alertify
                        .alert(data.warning, function(){
                            alertify.message('OK');
                        }).set({title:"Notif"});
                    }
                    else if (data.success) {
                        alertify
                        .alert(data.success, function(){
                            alertify.message('OK');
                            window.location.reload();
                        }).set({title:"Notif"});
                    }
                    $("#btnSubmit").fadeIn("slow");
                    $("#spinnerLoad").fadeOut("slow");
                }
            });
            return false;
        });
    });
</script>
@endsection