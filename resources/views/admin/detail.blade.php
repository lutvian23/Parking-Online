<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="">
    @if(session('success'))
    <div class="absolute w-[100%] flex items-center justify-between bg-blue-600 px-4 py-3" role="alert">
        <div class="text-white">
            <p class="font-bold">{{session('success')}}</p>
        </div>
    </div>
    @endif
    <h1 class="text-center font-bold my-2 text-[20px]">DETAIL</h1>
        <div class="flex flex-row-reverse absolute w-[100%]">
            <form action="" >
                <a href="" class="text-center text-white bg-red-500 py-2 px-3 rounded-md text-[11px] font-bold">HAPUS AKUN</a>
            </form>
        </div>
    <div class="mt-10 mx-4">
        <table class="font-bold">
            <tr>
                <td class="pr-7">NAMA</td>
                <td> : {{$client['namaClient']}}</td>
            </tr>
            <tr>
                <td class="pr-7">ID</td>
                <td> : {{$client['idClient']}}</td>
            </tr>
            <tr>
                <td class="pr-7">no Telp</td>
                <td> : {{$client['notelpClient']}}</td>
            </tr>
            <tr>
                <td class="pr-7">Alamat</td>
                <td> : {{$client['alamatClient']}}</td>
            </tr>
        </table>
    </div>
    
    <div class="mx-4 my-4">
        <a href="{{url('/edit/'.$client['idClient'].'/admin')}}" class="mb-1 text-center bg-gray-200 py-1 px-4 rounded-md font-bold block">EDIT PROFIL</a>
        <a href="{{url('/add/'.$client['idClient'].'/admin')}}" class="text-center bg-gray-200 py-1 px-4 rounded-md font-bold block">TAMBAH</a>
    </div>
    <div class="mx-2 box-border">
        <table class="table-auto w-[100%] text-center border-solid border-2 border-gray-300">
            <tr class="border-solid border-2 border-gray-300">
                <th class="border-solid border-2 border-gray-300">No</th>
                <th class="border-solid border-2 border-gray-300">KENDARAAN</th>
                <th class="border-solid border-2 border-gray-300">PLAT</th>
                <th class="border-solid border-2 border-gray-300">AKSI</th>
            </tr>            
            @foreach($transport as $trs)
            <tr class="border-solid border-2 border-gray-300">
                <td class="border-solid border-2 border-gray-300"></td>
                <td class="border-solid border-2 border-gray-300">{{$trs->jenis}}</td>
                <td class="border-solid border-2 border-gray-300">{{$trs->plat}}</td>
                <td class="border-solid border-2 border-gray-300 py-1">
                    <form action="{{url('delete/transport/admin')}}" method="POST">
                        @csrf
                        <input type="hidden" name="idKendaraan" value="{{$trs->idKendaraan}}">
                        <button type="submit">
                            <img src="/img/trash.svg" alt="" width="20">
                        </button>
                    </form>
                </td>
            </tr> 
            @endforeach
        </table>
    </div>
    
</body>
</html>