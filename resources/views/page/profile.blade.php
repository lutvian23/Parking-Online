@extends('layout.main')
<div class="flex justify-center mt-4">
    <div class="text-white font-bold text-[30px]">PROFIL</div>
</div>

<div class="mt-10 mx-4">
    <table class="text-white">
        <tr>
            <td class="pr-7">NAMA</td>
            <td> : {{$user['name']}}</td>
        </tr>
        <tr>
            <td class="pr-7">no Telp</td>
            <td> : {{$user['noTelp']}}</td>
        </tr>
        <tr>
            <td class="pr-7">Alamat</td>
            <td> : {{$user['alamat']}}</td>
        </tr>
    </table>
</div>

<div class="mx-4 my-4">
    <div class="flex flex-row-reverse"><a href="tambah/kendaraan" class="text-white bg-green-500 py-2 px-4 rounded-md font-bold">TAMBAH</a></div>
</div>
<div class="mx-2 box-border">
    <table class="table-auto w-[100%] text-center border-solid border-2 border-green-500 text-white ">
        <tr class="border-solid border-2 border-green-500">
            <th class="border-solid border-2 border-green-500">KENDARAAN</th>
            <th class="border-solid border-2 border-green-500">PLAT</th>
        </tr>
        @foreach ($transport as $value)
        @if ($value['plat'] !== null)
                <tr class="border-solid border-2 border-green-500">
                    <td class="border-solid border-2 border-green-500">{{$value['kendaraan']}}</td>
                    <td class="border-solid border-2 border-green-500">{{$value['plat']}}</td>
                </tr> 
                @endif                
            @endforeach
    </table>
</div>