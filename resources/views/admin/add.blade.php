<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body>
    @if(session('logErr'))
    <div class="absolute w-[100%] flex items-center justify-between bg-red-600 px-4 py-3" role="alert">
        <div class="text-white">
            <p class="font-bold">{{session('logErr')}}</p>
        </div>
    </div>
    @endif
        <form action="{{url('add/transport/'.$idClient.'/admin')}}" method="POST" class="m-3">
            @csrf
            @method('POST')
            <div class="bg-gray-100 px-2 py-2">
                <div class="text-center font-bold">TAMBAH KENDARAAN</div>
                <div class="mt-4 flex">
                    <div class=" w-[100%]">
                        <div class="font-bold mb-2">Masukan Plat</div>
                        <div><input type="text" name="plat" class="px-2 rounded-md h-[30px] w-[100%] border-solid border-2 border-gray-200" required></div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-[13px] font-bold mb-2">JENIS KENDARAAN</div>
                    <select name="jenis" id="" required class="h-[30px] bg-slate-300 w-[100%]">
                        <option value=""></option>
                        <option value="RODA DUA">RODA DUA</option>
                        <option value="RODA EMPAT">RODA EMPAT</option>
                    </select>
                </div>
                <table class="mt-3">
                    <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td>Apakah dokumen KTP sudah sesuai ?</td>
                            <td class="text-center"><input type="checkbox" required name="ktp"></td>
                        </tr>
                        <tr>
                            <td>Apakah dokumen STNK sudah sesuai ?</td>
                            <td class="text-center"><input type="checkbox" name="stnk" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex mt-10 flex-row-reverse">
                    <div class="">
                        <button type="submit" class="bg-gray-500 px-5 rounded-md font-bold py-2 text-white">KIRIM</button>
                    </div>
                </div>
            </div>
        </form>
    
</body>
</html>