<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="bg-black">
    <div class="bg-gray-500 fixed w-[100%]">
        <div class="text-white font-bold py-1 text-center text-[20px]">STATUS</div>
    </div>
    <div class="bg-gray-500 w-[100%]">
        <div class="text-white font-bold py-1 text-center text-[20px]">.</div>
    </div>
    
    <div class="">
        @foreach ($penitipan as $value)
        <a href="{{url('detail/'.$value['idPenitipan'].'/penitip')}}">
            <div class="bg-gray-700 py-3 ">
                <div class="flex">
                    <div class="mx-4 font-bold text-[17px] text-white">{{$value['status']}}</div>
                    <div class="flex flex-row-reverse w-[100%] px-3 text-gray-500 text-[13px]">{{$value['start']}}</div>
                </div>
                <div class="mx-4 text-[20px] -mt-1 text-white">{{$value['plat']}}</div>
            </div>
            <hr>
        </a>
        @endforeach
    </div>
    
</body>
</html>
