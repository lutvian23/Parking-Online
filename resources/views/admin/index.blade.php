<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-100">
    
<div class="my-2 mx-4 flex place-content-between">
    <div class=" font-bold text-sm">PARK ONLINE</div>
    <div class=" font-bold text-sm">{{$name}}</div>
</div>
<div>
    <div><img src="parking.jpg" alt=""></div>
</div>
<div class=" h-[100vh] box-border items-center flex justify-center">
    <div class="bg-white border-solid border-2 mx-4 w-[100vh] rounded-md">
        <div class="text-center text-[40px] font-bold mb-12 mt-12">ADMIN</div>
        <div class="mb-16">
            <div class="flex justify-center "><a href="checkin/admin" class="bg-gray-100 border-gray-200 border-solid border-2 my-1 font-bold text-lg text-center py-2 w-[90%] rounded-md hover:bg-gray-300 hover:border-white">Penitipan</a></div>
            <div class="flex justify-center "><a href="/History/admin" class="bg-gray-100 border-gray-200 border-solid border-2 my-1 font-bold text-lg text-center py-2 w-[90%] rounded-md hover:bg-gray-300 hover:border-white">History</a></div>
            <div class="flex justify-center "><a href="user/admin" class="bg-gray-100 border-gray-200 border-solid border-2 my-1 font-bold text-lg text-center py-2 w-[90%] rounded-md hover:bg-gray-300 hover:border-white">User</a></div>
            <div class="flex justify-center "><a href="logout" class="border-solid border-2 border-red-500 my-1 font-bold text-lg text-center py-2 w-[90%] rounded-md hover:text-white hover:bg-red-500 hover:border-white">Keluar</a></div>
        </div>
    </div>
</div>

</body>
</html>