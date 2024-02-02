<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="bg-gray-700">
    <input type="hidden" id="qrText" value="{{$qr}}">
    <div class="canvas h-[100vh]">
        <div class="flex items-center justify-center h-[90vh]">
            <div class="h-[300px] w-[300px] bg-gray-500 rounded-md box-border">
                <div class="text-white text-center font-extrabold text-[22px] my-2">QR OTORITATION</div>
                <div class="flex justify-center">
                    <img src="" alt="" id="qrImg" width="220px" class="border-solid border-4 border-gray-400 rounded-md">
                </div>
            </div>                        
        </div>
        <div class="text-white mx-3 text-[15px]">Jangan berikan Code Qr pada siapapun kecuali saat terima Checkin</div>                        
    </div>

    <script>
        var qrText = document.getElementById('qrText');
        var qrImg = document.getElementById('qrImg');
        
        qrImg.src = " https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + qrText.value;
        
    </script>
</body>
</html>