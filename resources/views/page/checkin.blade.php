@extends('layout.main')
<div class="my-2 mx-4 flex place-content-between">
    <div class="text-green-500 font-bold text-sm">PARK ONLINE</div>
    <div class="text-white font-bold text-sm">{{$name}}</div>
</div>

<div>
    <div class="my-2 h-[100vh] box-border flex justify-center items-center">
        <form action="{{url('/shooter/')}}" method="POST">
            @csrf
            @method('post')
            <div class=" h-[360px] bg-[#181818] shadow-xl shadow-[#0F0F0F] p-2 box-border rounded-md">
                <div class="">
                    <label for="input" class="block font-bold text-white text-center text-[35px] mb-1">PLAT</label>
                    <select name="plat" class="border-solid border-2 border-green-500 rounded-md w-[300px] h-12 px-2 bg-black text-white">
                        @foreach ($plat as $item)
                        <option value="{{$item['plat']}}">{{$item['plat']}}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end h-[65%] flex-row-reverse my-3">
                    <button type="submit" class="py-3 px-10 rounded-md text-white border-solid border-2 border-green-500">OKE</button>
                </div>
            </div>
        </form>
    </div>  
</div>