<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="bg-gray-200">
    @if(session('logErr'))
    <div class="absolute w-[100%] flex items-center justify-between bg-red-600 px-4 py-3" role="alert">
        <div class="text-white">
            <p class="font-bold">{{session('logErr')}}</p>
        </div>
    </div>
    @endif
    <div class="flex justify-center items-center h-[100vh] w-[100vw]">
        <div class="bg-white box-border h-[550px] w-[350px] rounded-md justify-center flex pt-4">
            <form action="{{url('/update/'.$client->idClient.'/admin')}}" method="POST" class="w-[100%]">
                @csrf
                @method('PUT')
                <div class="w-[100%] px-5">
                    <div class="text-center font-bold text-[20px] mb-4">EDIT USER</div>
                    <hr>
                    <div class="mb-3 mt-2">
                        <div class="font-bold mb-1">Nama</div>
                        <input type="text" name="nama" value="{{$client->namaClient}}" class="px-2 text-[15px] w-[100%] bg-gray-100 h-[30px] rounded-sm">
                    </div>
                    <div class="mb-3">
                        <div class="font-bold mb-1">No Telp</div>
                        <input type="text" name="noTelp" value="{{$client->notelpClient}}" class="px-2 text-[15px] w-[100%] bg-gray-100 h-[30px] rounded-sm">
                    </div>
                    <div class="mb-3">
                        <div class="font-bold mb-1">Email</div>
                        <input type="text" name="email" value="{{$users->email}}" class="px-2 text-[15px] w-[100%] bg-gray-100 h-[30px] rounded-sm">
                    </div>
                    <div class="mb-3">
                        <div class="font-bold mb-1">Alamat</div>
                        <input type="text" name="alamat" value="{{$client->alamatClient}}" class="px-2 text-[15px] w-[100%] bg-gray-100 h-[30px] rounded-sm">
                    </div>
                    <div class="flex flex-row-reverse pt-[60px]">
                        <button type="submit" class="bg-gray-400 py-2 px-4 rounded-sm font-bold">KIRIM</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>