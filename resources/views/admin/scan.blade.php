<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>QR Code Scanner</title>
</head>
<body>
    <h1 class="text-center">QR Code Scanner</h1>
    @if(session('success'))
    <div class="absolute w-[100%] flex items-center justify-between bg-blue-600 px-4 py-3" role="alert">
        <div class="text-white">
            <p class="font-bold">{{session('success')}}</p>
        </div>
    </div>
    @endif
    @if(session('logErr'))
    <div class="absolute w-[100%] flex items-center justify-between bg-red-600 px-4 py-3" role="alert">
        <div class="text-white">
            <p class="font-bold">{{session('logErr')}}</p>
        </div>
    </div>
    @endif

    <div class="bg-red-500 flex justify-center items-center">
        <video id="video" width="100%" height="100%" style="border: 1px solid gray" class="bg-gray-400"></video>
    </div>
    
    <div>
        <form id="qrCodeForm" action=" {{url('plat/checkin')}} " method="POST">
            @csrf
            @method('POST')
            <input type="text" id="qrCodeInput" name="plat">
            <button type="submit">kirim</button>
        </form>
    </div>

    {{-- <script src="https://rawgit.com/cozmo/jsQR/master/dist/jsQR.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const video = document.getElementById("video");

            navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
                .then((stream) => {
                    video.srcObject = stream;
                    video.play();
                    scanQRCode();
                })
                .catch((err) => console.error("Error accessing camera: ", err));

            function scanQRCode() {
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");
                const videoSettings = video.videoWidth ? { width: video.videoWidth, height: video.videoHeight } : { width: 640, height: 480 };

                canvas.width = videoSettings.width;
                canvas.height = videoSettings.height;

                const checkQRCode = () => {
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, canvas.width, canvas.height);

                    if (code) {
                        // QR code terdeteksi, set nilai QR code ke elemen input
                        document.getElementById("qrCodeInput").value = code.data;
                        // Submit form secara otomatis
                        document.getElementById("qrCodeForm").submit();
                    }

                    requestAnimationFrame(checkQRCode);
                };

                checkQRCode();
            }
        });
    </script> --}}
</body>
</html>
