@extends('layout.main')
<div class="my-2 mx-4 flex place-content-between">
    <div class="text-green-500 font-bold text-sm">PARK ONLINE</div>
    <div class="text-white font-bold text-sm">{{$name}}</div>
</div>
<div>
    <div><img src="parking.jpg" alt=""></div>
</div>
<div class=" h-[100vh] box-border items-center flex justify-center">
    <div class="border-solid border-2 border-green-500 mx-4 w-[100vh] rounded-md">
        <div class="text-center text-white text-[40px] font-bold mb-12 mt-12">MENU</div>
        <div class="mb-16">
            <div class="flex justify-center "><a href="profile" class="border-solid border-2 border-green-500 my-1 text-white font-bold text-lg text-center py-2 w-[90%] rounded-md hover:text-green-500 hover:bg-white hover:border-white">Profile</a></div>
            <div class="flex justify-center "><a href="checkin" class="border-solid border-2 border-green-500 my-1 text-white font-bold text-lg text-center py-2 w-[90%] rounded-md hover:text-green-500 hover:bg-white hover:border-white">Menitip</a></div>
            <div class="flex justify-center "><a href="status" class="border-solid border-2 border-green-500 my-1 text-white font-bold text-lg text-center py-2 w-[90%] rounded-md hover:text-green-500 hover:bg-white hover:border-white">Status</a></div>
            <div class="flex justify-center "><a href="logout" class="border-solid border-2 border-red-500 my-1 text-white font-bold text-lg text-center py-2 w-[90%] rounded-md hover:text-red-500 hover:bg-white hover:border-white">Keluar</a></div>
        </div>
    </div>
</div>

