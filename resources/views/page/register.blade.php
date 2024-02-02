@extends('layout/main')

@if(session('logErr'))
<div class="absolute w-[100%] flex items-center justify-between bg-red-600 px-4 py-3" role="alert">
    <div class="text-white">
        <p class="font-bold">{{session('logErr')}}</p>
    </div>
</div>
@endif

<div class=" h-[100%] flex items-center justify-center">
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-[350px]  box-border rounded-md">
        <div class="flex gap-6 justify-center my-3">
            <a href="login" class="no-underline font-bold text-white">SIGN IN</a>
            <div class="font-bold">|</div>
            <a href="register" class="no-underline font-bold text-white">SIGN UP</a>
        </div>
        <h1 class="text-center text-2xl font-bold mt-4 text-white">SIGN IN</h1>
        <div class="flex justify-center my-3">
            <form action="register/save" method="POST">
            @csrf
            <div class="my-2">
            <label for="input" class="block font-bold text-white">Email</label>
            <input name="email" id="email" class="rounded-md w-[300px] h-9 px-2 bg-black text-white outline-green-500" value="{{old('number')}}" type="email" required autofocus autocomplete="off">
            </div>    
            <div class="my-2">
                <label for="input" class="block font-bold text-white">Nama</label>
                <input name="nama" id="nama" class="rounded-md w-[300px] h-9 px-2 bg-black text-white outline-green-500" required autocomplete="off" type="text">
            </div>
            <div class="my-2">
                <label for="input" class="block font-bold text-white">No telp</label>
                <input name="noTelp" id="noTelp" class="rounded-md w-[300px] h-9 px-2 bg-black text-white outline-green-500" required autocomplete="off" type="number">
            </div>
            <div class="my-2">
                <label for="input" class="block font-bold text-white">Alamat</label>
                <input name="alamat" id="alamat" class="rounded-md w-[300px] h-9 px-2 bg-black text-white outline-green-500" required autocomplete="off" type="text">
            </div>
            <div class="my-2">
                <label for="input" class="block font-bold text-white">Password</label>
                <input name="password" id="password" class="rounded-md w-[300px] h-9 px-2 bg-black text-white outline-green-500" required autocomplete="off" type="password">
            </div>
            <div class="mt-7 flex justify-center">
                <button type="submit" class="shadow-md bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 font-bold py-2 px-5 text-white rounded-md">DAFTAR</button>    
            </div>
        </form>
        </div>
    </div>
</div>