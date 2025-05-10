@extends('layouts.app')

@section('content')
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="qr-reader"></div>
                        <div id="scan-result"></div>
                        <div id="alert-container"></div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('home')}}/logScan" class="btn btn-primary btn-sm elevation-2">Log Scan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const html5QrCode = new Html5Qrcode("qr-reader");
    const scanResultDiv = document.getElementById('scan-result');
    const alertContainer = document.getElementById('alert-container');

    function onScanSuccess(decodedText, decodedResult) {
        // Hentikan pemindaian setelah berhasil
        html5QrCode.stop();
        scanResultDiv.innerText = `Data Berhasil Di Scan: ${decodedText}`;

        // Kirim data ke server menggunakan AJAX
        fetch("{{route('home')}}/process/" + decodedText ) 
        .then(response => response.json())
        .then(data => {
            let alertClass = data.success ? 'alert-success' : 'alert-danger';
            let alertMessage = data.message;
            alertContainer.innerHTML = `<div class="alert ${alertClass}">${alertMessage}</div>`;
        })
        window.location.href = "{{route('home')}}/successScan/"+decodedText;
    }

    function onScanFailure(error) {
        // Opsional: Handle kegagalan pemindaian, misalnya menampilkan pesan error.
        // console.warn(`QR code scan failed = ${error}`);
    }

    // Mulai pemindaian dengan kamera belakang (lebih disarankan untuk pemindaian)
    Html5Qrcode.getCameras().then(devices => {
        if (devices && devices.length > 0) {
            const rearCamera = devices.find(device => device.label.toLowerCase().includes('back'));
            const cameraId = rearCamera ? rearCamera.id : devices[0].id; // Gunakan kamera belakang jika tersedia, jika tidak gunakan kamera pertama
            html5QrCode.start(
                cameraId,
                {
                    fps: 10,    // Coba dengan nilai yang berbeda jika perlu
                    qrbox: { width: 250, height: 250 } // Sesuaikan ukuran area pemindaian
                },
                onScanSuccess,
                onScanFailure
            );
        } else {
            console.error("Tidak ada kamera yang terdeteksi.");
            alertContainer.innerHTML = '<div class="alert alert-danger">Tidak ada kamera yang terdeteksi.</div>';
        }
    }).catch(err => {
        console.error("Error saat mengakses kamera:", err);
        alertContainer.innerHTML = '<div class="alert alert-danger">Gagal mengakses kamera. Pastikan izin kamera diberikan.</div>';
    });
</script>
@endsection
