<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/mqtt.js') }}"></script>
</head>

<body class="font-sans w-screen  div n h-screen antialiased relative bg-[#33334f]   dark:text-white/50">
    @livewireStyles
    <div class="flex w-full h-full ">

        @if (!(request()->is("/")))
        <x-sidebar />
        @endif

        <div class="w-full overflow-y-auto">
            @if (!(request()->is("/")))
            <div
                class="w-full z-0 px-4 py-2 top-0 bg-[#33334f]  sticky items-center flex justify-end border-opacity-55 border-b border-slate-600">
                <div class="md:hidden flex mr-2">
                    <x-menu-sidebar name="Realtime" logo="bi-clock" />
                    <x-menu-sidebar name="History" logo="bi-bar-chart-line" />
                    <x-menu-sidebar name="Chart" logo="bi-bar-chart-line" />

                </div>

            </div>
            @endif

            <div class="overflow-y-auto w-full h-full -z-20" id="isi">
                {{ $slot }}
            </div>

        </div>
        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>