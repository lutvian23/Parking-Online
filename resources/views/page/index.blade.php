@extends('layout.main')

    {{-- HEADER --}}
        <div class="header">
            <div class="container flex justify-center">
                <div class="text-center  w-2/4 font-bold mt-4 mb-2 text-xl text-green-500">ONLINE PARK</div>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="content">
            <div class=" border-box">
                <div class="text-content mb-52 mt-28">
                    <div class="mx-3 font-bold text-[40px] text-green-500">Let`s park 
                        <nav class="text-[50px] -mt-6"> only use QR</nav>
                    </div>
                </div>

                <div class="flex justify-between mx-3 mb-10 font-bold">
                    <div class="text-red-500 list-none">
                        <li class="text-center font-extrabold text-2xl">100</li>
                        Total Park
                    </div>
                    <div class="text-green-500 list-none">
                        <li class="text-center font-extrabold text-2xl">{{$parkNow}}</li>
                        Park Now
                    </div>
                    <div class="text-white list-none">
                        <li class="text-center font-extrabold text-2xl">{{100-$parkNow}}</li>
                        Empty
                    </div>
                </div>

                <div class="flex justify-center">
                    <a href="login"><button class="outline px-14 py-3 font-bold text-green-500 rounded-full text-xl">GO</button></a>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <div class="footer">
            <div id="footer"></div>
        </div>
</body>
</html>