<div class="relative">

    <div class="p-4 flex flex-col z-10">
        <div class="flex justify-between items-center text-white">
            <x-title name="History Data" logo="bi bi-table" color="from-[#348be1] from-10% to-[#132be4]" />

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg- bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>

        </div>
        <x-sub-nav>
            <div>
                <i class="bi bi-clock"></i>
            </div>
            <div class="text-white  ">
                History /
            </div>
            <div class="underline">
                Schneider
            </div>
        </x-sub-nav>
        <div class="py-2 overflow-y-auto mt-1">
            <div class="bg-[#070712] bg-opacity-20 py-1  rounded-lg" id="lol">
                <div x-data="{ count: 0 }">

                    <x-form-table :dropdown="$dropdown" />

                    <div class="flex text-sm font-mono relative mt-6">
                        <div class="absolute z-0 w-full bg-slate-500 h-[0.050rem] bottom-0"></div>
                        <x-button-folder value=0 name="Table" />
                    </div>


                    <div class="px-4 py-10" :class="count == 0 ? '' : 'hidden'">
                        <!-- Ensure this div has scrolling -->
                        <div class="">
                            <table class="min-w-full bg-slate-600 bg-opacity-30 rounded-lg shadow-lg">
                                <thead>
                                    <tr>
                                        <th
                                            class="py-3 justify-between flex px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    No
                                                </div>
                                                <x-arrow value="wos" :values="$wos" />

                                            </div>
                                        </th>
                                        <th
                                            class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    Name
                                                </div>
                                                <div>

                                                    <x-arrow :value="'wosName'" :values="$wosName" />
                                                </div>
                                            </div>
                                        </th>
                                        <th
                                            class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    Value
                                                </div>
                                                {{-- <div>
                                                    <x-arrow value="subname" />
                                                </div> --}}
                                            </div>
                                        </th>

                                        <th
                                            class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    Timestamp
                                                </div>
                                                {{-- <div>
                                                    <x-arrow value="Timestamp" />
                                                </div> --}}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach ($los as $index => $logger)
                                    <tr class="border-b border-gray-700">
                                        <td class="py-2 px-4">{{ $logger->nomor_urut }}</td>
                                        <td class="py-2 px-4">{{ strtoupper($logger->name) }}</td>
                                        <td class="py-2 px-4">{{ $logger->value }}</td>

                                        <td class="py-2 px-4">{{ $logger->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="  mt-5">
                                {{ $los->links('pagination.hitam') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/mqtt.js') }}"></script>

</div>