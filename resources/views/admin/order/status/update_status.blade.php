@extends('layouts.backend.admin')

@section('content')
    <section class="pc-container">

        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('layouts.backend.title')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $title }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/status') }}" method="GET">

                                <div class="form-group">
                                    <div id="loadingMessage">Tidak dapat mengakses kamera (Mohon untuk mengaktifkan
                                        pengaturan kamera)</div>
                                    <canvas id="canvas" hidden></canvas>
                                    <div id="output" hidden>
                                        <div id="outputMessage">Qr code tidak terdeteksi, harap perbaiki posisi paket</div>
                                        <div hidden><b>Data:</b> <span id="outputData"></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Resi <span class="text-danger">*</span></label>
                                    <input type="text" name="resi" class="form-control" placeholder="Nomor Resi"
                                        id="outputDatas" required>
                                    <button type="button" class="btn btn-secondary mt-2" onClick="refreshPage()">
                                        <i class="flaticon2-refresh"></i> Refresh
                                    </button>
                                    <button type="submit" class="btn btn-info mt-2 cek">
                                        <i class="flaticon2-search"></i>Cek Resi</button>

                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://jastiphabibi.id/js/app.js" type="text/javascript"></script>
    <script src="https://jastiphabibi.id/js/jsQR.js" type="text/javascript"></script>
    <script>
        function refreshPage() {
            window.location.reload();
        }

        var video = document.createElement("video");
        var canvasElement = document.getElementById("canvas");
        var canvas = canvasElement.getContext("2d");
        var loadingMessage = document.getElementById("loadingMessage");
        var outputContainer = document.getElementById("output");
        var outputMessage = document.getElementById("outputMessage");
        var outputData = document.getElementById("outputData");
        var outputDatas = document.getElementById("outputDatas");

        function drawLine(begin, end, color) {
            canvas.beginPath();
            canvas.moveTo(begin.x, begin.y);
            canvas.lineTo(end.x, end.y);
            canvas.lineWidth = 4;
            canvas.strokeStyle = color;
            canvas.stroke();
        }

        // Use facingMode: environment to attemt to get the front camera on phones
        navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "environment"
            }
        }).then(function(stream) {
            video.srcObject = stream;
            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
            video.play();
            requestAnimationFrame(tick);
        });

        function tick() {
            loadingMessage.innerText = "âŒ› Loading video..."
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                loadingMessage.hidden = true;
                canvasElement.hidden = false;
                outputContainer.hidden = false;

                // canvasElement.height = video.videoHeight;
                // canvasElement.width = video.videoWidth;
                canvasElement.height = 120;
                canvasElement.width = 240;
                canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
                var code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "dontInvert",
                });
                if (code) {
                    drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                    drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                    drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                    drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                    outputMessage.hidden = true;
                    outputData.parentElement.hidden = false;
                    outputData.innerText = code.data;
                    outputDatas.value = code.data;
                } else {
                    outputMessage.hidden = false;
                    outputData.parentElement.hidden = true;
                }
            }
            requestAnimationFrame(tick);
        }
    </script>
@endpush
