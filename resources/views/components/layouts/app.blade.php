<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/bejo.png') }}">
    <style>
        .typewriter p {
            overflow: hidden;
            /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange;
            /* The typwriter cursor */
            white-space: nowrap;
            /* Keeps the content on a single line */
            margin: 0 auto;
            /* Gives that scrolling effect as the typing happens */
            letter-spacing: .15em;
            /* Adjust as needed */
            animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
        }

        /* The typing effect */
        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            30% {
                border-color: orange;
            }
        }
    </style>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/mqtt.js') }}"></script>
    <style>
        .orbit {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            /* Menggunakan berat font lebih tebal */
        }

        #lineChart {
            height: 450px;
            width: 100%;
        }

        /* Media query untuk perangkat dengan ukuran layar lebih kecil dari 1536px (2xl) */
        @media (max-width: 1535px) {
            #lineChart {
                width: 300%;
            }
        }

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </style>
</head>

<body class="font-sans w-screen  div n h-screen antialiased  relative bg-[#363A45]">
    <div x-data="{ showOverlay: false,showOverlay2:false }" x-cloak class="relative w-full h-full">
        <!-- Overlay Background -->
        <div class="bg-black w-full flex justify-center items-center h-full absolute z-40 bg-opacity-40"
            x-show="showOverlay">
            <div class="md:h-[40%] md:w-[40%] w-[90%]  bg-[#202228] flex flex-col  border border-stone-600 rounded-lg">
                <div
                    class="text-white p-3 flex justify-between items-center border-b orbit tracking-[2px] font-semibold">
                    <div class="px-3">
                        Detail User
                    </div>
                    <button @click="showOverlay = !showOverlay" class="text-red-800 orbit font-extrabold mr-2">
                        X
                    </button>
                </div>
                <div class="h-full w-full flex md:flex-row flex-col gap-x-3">
                    <div
                        class="h-full flex md:justify-normal md:mt-0 mt-4 justify-center items-center px-4 md:w-3/4 w-full">
                        <img src="{{ asset('img/user/tenor.gif') }}"
                            class="2xl:w-64 2xl:h-64 h-48 w-48 border-2 border-green-500 rounded-full " alt="">
                    </div>
                    <div class="h-full flex py-7 gap-x-4 w-full ">
                        <div class="md:block hidden">
                            <hr class="border h-full" class="">
                        </div>
                        <div class="text-2xl w-full flex flex-col  text-white tracking-[2px] orbit">
                            <div class="flex flex-col ml-5 md:ml-0 h-full gap-y-4">
                                <div>
                                    Name : Trial
                                </div>
                                <div>
                                    Status : Trial
                                </div>
                            </div>
                            <div class="flex justify-end w-full sm:mt-0 mt-4 ">
                                <div class="mr-8">
                                    <div class="px-4 py-2 border border-red-700 rounded-lg font-semibold text-red-700">
                                        Log Out
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-black w-full flex flex-col   gap-y-4 h-full absolute z-40 bg-opacity-80" x-show="showOverlay2">
            <div class="w-full flex p-4 justify-end">
                <button @click="showOverlay2 = !showOverlay2"
                    class="border-2 rounded-lg border-red-800 py-2 px-4 text-red-800 orbit font-extrabold mr-2">
                    X
                </button>
            </div>
            <div class="h-full flex  flex-col gap-y-4">
                <div class="text-white flex w-full gap-x-3 items-center px-4 mt-40">
                    <div>
                        <x-menu-hp name="Realtime" logo="bi-clock" />
                    </div>
                    <div class="tracking-[1px]">
                        Power Realtime
                    </div>
                </div>
                <div class="text-white flex w-full gap-x-3 items-center px-4">
                    <div>
                        <x-menu-hp name="Chart" logo="bi-bar-chart-line" />

                    </div>
                    <div class="tracking-[1px]">
                        Chart Detail
                    </div>
                </div>
            </div>
        </div>
        @livewireStyles
        <div class="flex w-full h-full">
            @if (!(request()->is("/")))
            <x-sidebar />

            @endif

            <div class="w-full overflow-y-hidden">
                <div class="h-16 border-y flex items-center justify-between border-slate-600">
                    <div class="flex items-center gap-x-1 text-white ml-2">
                        <i class="bi bi-clock"></i>
                        <div class="text-xs 2xl:text-sm">
                            <div class="text-white border-b font-thin flex items-center gap-x-1 ml-2">
                                <div id="clock" class="font-bold"></div>
                            </div>
                            <div class="text-white font-thin flex items-center gap-x-1 ml-2">
                                <div id="day" class="font-bold"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mr-7 flex items-center gap-x-2" id="lol">
                        <img @click="showOverlay = !showOverlay" src="{{ asset('img/user/tenor.gif') }}"
                            class="2xl:w-12 2xl:h-12 w-9 h-9 rounded-full mr-1" alt="">
                        <div
                            class="2xl:text-sm md:hidden block text-2xl font-semibold font-mono text-white text-opacity-70">
                            <i @click="showOverlay2 = !showOverlay2" class="bi bi-list"></i>
                        </div>
                        <div
                            class="2xl:text-sm text-[0.6rem] hidden md:block font-semibold font-mono text-white text-opacity-70">
                            <div class="tracking-[1px] border-b">
                                TRIAL Monitoring
                            </div>
                            <div class="mt-0.5 w-full flex">
                                User
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div
                    class="overflow-y-scroll scrollbar-thin scrollbar-track-slate-700 scrollbar-thumb-orange-600 pb-20 w-full h-full -z-20">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script>
        // Function to format the current time
            function updateClock() {
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = now.toLocaleDateString('en-US', options);
                const formattedTime = now.toLocaleTimeString('en-US');

                // Update the HTML content
                document.getElementById('clock').innerText = `${formattedTime}`;
                document.getElementById('day').innerText = `${formattedDate}`;

            }

            // Call updateClock every second
            setInterval(updateClock, 1000);

            // Initialize clock on page load
            updateClock();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>