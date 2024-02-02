<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="bg-gray-300">
    <div class="flex justify-center">
        <div class="">
            <form action="{{url('/user/admin/search')}}" method="POST">
                @method("POST")
                @csrf
                <div class="font-bold text-[30px] text-center my-3">Data User</div>
                <div class="flex">
                    <input name="keyword" type="text" class="w-[280px] px-3" value="{{request("keyword")}}">
                    <button type="submit" class="bg-black text-white py-1 px-3">Cari</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="flex justify-center mt-7">
        <div class="bg-white overflow-auto w-[100%] mx-5 py-3 rounded-md text-[13px] h-[500px]">
            <div class="flex justify-center">
                <table class="min-w-full table-auto mx-2">
                    <thead class="">
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>JUMLAH</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($client as $value)
                        <tr class="border-solid border-2 border-gray-100">
                            <td>{{$value['idClient']}}</td>
                            <td>{{$value['namaClient']}}</td>
                            <td>{{$value['jumlah']}}</td>
                            <td>
                                <a href="{{ url('/detail/'.$value['idClient'].'/admin') }}"><button class="bg-gray-300 py-1 px-2 rounded-md mb-1 my-1">DETAIL</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</body>
</html>