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
    <input type="hidden" id="qrText" value="{{$penitip->idPenitipan}}">
    <div class="canvas h-[100vh]">
        <div class="flex items-center justify-center h-[70%]">
            <div class="h-[300px] w-[300px] bg-gray-500 rounded-md box-border shadow-md">
                <div class="text-white text-center font-extrabold text-[22px] my-2">QR OTORITATION</div>
                <div class="flex justify-center">
                    <img src="" alt="" id="qrImg" width="220px" class="border-solid border-4 border-gray-400 rounded-md">
                </div>
            </div>                        
        </div>
        <div class="px-5 text-white bg-slate-500 mx-3 py-2 rounded-md shadow-md">
            <table class="auto w-[100vw]">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td><div>STATUS</div></td>
                    <td><div>: {{$penitip->status}}</div></td>
                </tr>
                <tr>
                    <td><div>START </div></td>
                    <td><div>: {{$penitip->start}}</div></td>
                </tr>
                <tr>
                    <td><div>PLAT </div></td>
                    <td><div>: {{$penitip->plat}}</div></td>
                </tr>
            </table>
        </div>
        <div class="text-white mx-3 mt-3 text-[15px]">Jangan berikan Code Qr pada siapapun</div>                        
    </div>

    <script>
        var qrText = document.getElementById('qrText');
        var qrImg = document.getElementById('qrImg');
        
        qrImg.src = " https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + qrText.value;
        
    </script>
</body>
</html>