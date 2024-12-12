<div>
    <div class="p-4" x-data="mqttHandler()" x-init="init()" x-on:destroy="destroy()">
        <x-title ct="text-white" name="Realtime Dashboard" logo="bi bi-clock"
            color="from-[#7ce7b0] to-[#07e916] from-10%" />
        <x-sub-nav>
            <div>
                <i class="bi bi-clock"></i>
            </div>
            <div>
                Realtime Dashboard /
            </div>
            <div class="text-white underline">
                power
            </div>
        </x-sub-nav>

        <div class="overflow-y-auto mt-2">
            <div class="bg-[#070712] pb-10 bg-opacity-20 flex flex-col gap-4">
                <x-title-card>
                    Power (kWh)
                </x-title-card>
                <div
                    class=" mb-2 bg-opacity-20  px-8 flex md:flex-row md:gap-y-0 gap-y-4 flex-col gap-x-4   rounded-lg">
                    <x-card value="p_a" color="from-[#53f24b] to-[#87ed37]" ct="text-[#178e3b]" name="Power A"
                        colorText="text-[#87ed37]" logo="bi-lightning-fill" satuan="wh" x-text="Power" />
                    <x-card value="p_b" color="from-[#53f24b] to-[#87ed37]" ct="text-[#178e3b]" name="Power B"
                        colorText="text-[#87ed37]" logo="bi-lightning-fill" satuan="wh" x-text="voltage" />
                    <x-card value="p_c" color="from-[#53f24b] to-[#87ed37]" ct="text-[#178e3b]" name="Power C"
                        colorText="text-[#87ed37]" logo="bi-lightning-fill" satuan="wh" x-text="voltage" />
                    <x-card value="p_t" color="from-[#53f24b] to-[#87ed37]" ct="text-[#178e3b]" name="Power T"
                        colorText="text-[#87ed37]" logo="bi-lightning-fill" satuan="kwh" x-text="voltage" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row w-full gap-x-2 gap-y-2 md:gap-y-0 mt-2 ">
                <div class="md:w-3/4 sm:w-full flex flex-col gap-y-2 ">
                    <div class=" pb-10 bg-[#070712] flex gap-y-4 flex-col px-4 bg-opacity-20  rounded-lg">
                        <x-title-card>
                            Voltage (V)
                        </x-title-card>
                        <div class="mb-4 flex flex-col md:flex-row gap-4 w-full">
                            <x-card value="v_ab" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage AB"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_bc" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage BC"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_ca" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage CA"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                        </div>
                        <div class="  flex flex-col md:flex-row gap-4 w-full">
                            <x-card value="v_an" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage AN"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_bn" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage BN"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_cn" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage CN"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                        </div>
                    </div>
                    <div class="bg-[#070712] pb-10 bg-opacity-20 flex flex-col gap-4">
                        <x-title-card>
                            Table Voltage (Volt)
                        </x-title-card>
                        <div>
                            <div class="px-4 pt-2 pb-1 text-white">
                                <table class="w-full text-left border-collapse border border-gray-700">
                                    <thead>
                                        <tr class="bg-gray-700 dark:bg-gray-800">
                                            <th class="px-4 py-2 border border-gray-600">VOL A_B</th>
                                            <th class="px-4 py-2 border border-gray-600">VOL B_C</th>
                                            <th class="px-4 py-2 border border-gray-600">VOL C_A</th>
                                            <th class="px-4 py-2 border border-gray-600">VOL A_N</th>
                                            <th class="px-4 py-2 border border-gray-600">VOL B_N</th>
                                            <th class="px-4 py-2 border border-gray-600">VOL C_N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(entry, index) in historyVoltage" :key="index">
                                            <tr
                                                class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_ab"></td>
                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_bc"></td>
                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_ca"></td>

                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_an"></td>
                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_bn"></td>
                                                <td class="px-4 py-2 border border-gray-600" x-text="entry.v_cn"></td>
                                            </tr>
                                        </template>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="md:w-1/4 sm:w-full gap-y-2 flex flex-col">
                    <div class="   sm:w-full gap-4 px-4  grid bg-[#070712] bg-opacity-20 pb-2 rounded-lg">
                        <x-title-card>
                            Current (A)
                        </x-title-card>
                        <x-card value="c_a" color="from-[rgb(199,104,228)] to-[#a506e4]" ct="text-white"
                            name="Current A" colorText="text-[#a506e4]" logo="bi-lightning-fill" satuan="ampere" />
                        <x-card value="c_b" color="from-[rgb(199,104,228)] to-[#a506e4]" ct="text-white"
                            name="Current B" colorText="text-[#a506e4]" logo="bi-lightning-fill" satuan="ampere" />
                        <x-card value="c_c" color="from-[rgb(199,104,228)] to-[#a506e4]" ct="text-white"
                            name="Current C" colorText="text-[#a506e4]" logo="bi-lightning-fill" satuan="ampere" />
                    </div>

                    <div class="   sm:w-full gap-4 px-2  grid bg-[#070712] bg-opacity-20 pb-2 rounded-lg">
                        <x-title-card>
                            Raspberry
                        </x-title-card>

                        <div class="w-full">
                            <div class="w-full p-4 justify-center flex">
                                <i class="bi text-8xl text-white bi-clipboard-data-fill"></i>
                            </div>
                        </div>
                        <div class="p-2 font-semibold tracking-[1px] text-white">
                            <div class=" ">
                                Device : Rapsberry Pi
                            </div>
                            <div class=" ">
                                Type: 4B
                            </div>
                            <div class=" ">
                                Temperature : <span x-text="temp"></span><span>
                                    &#176;C
                                </span>
                            </div>
                            <div>
                                MAC : <span x-text="mac"></span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div x-data="mqttHandler">
                <!-- Voltage Chart -->
                <div id="voltageChart"></div>

                <!-- Current Chart -->
                <div id="currentChart"></div>

                <!-- Power Chart -->
                <div id="powerChart"></div>
            </div>

            {{-- <div class="bg-[#070712] bg-opacity-20 py-10 rounded-lg">
                <div class="gap-x-10 w-full grid grid-cols-3">


                </div>
            </div> --}}
        </div>

        <div class="w-full mt-2 flex gap-x-2">
            <div class="w-full bg-[#070712] pb-10 bg-opacity-20 flex flex-col gap-4">
                <x-title-card>
                    Table Current (Ampere)
                </x-title-card>
                <div>
                    <div class="px-4 pt-2 pb-1 text-white">
                        <table class="w-full text-left border-collapse border border-gray-700">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-gray-800">
                                    <th class="px-4 py-2 border border-gray-600">CUR A</th>
                                    <th class="px-4 py-2 border border-gray-600">CUR B</th>
                                    <th class="px-4 py-2 border border-gray-600">CUR C</th>

                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(entry, index) in historyCurrent" :key="index">
                                    <tr class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.c_a"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.c_b"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.c_c"></td>

                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="w-full bg-[#070712] pb-10 bg-opacity-20 flex flex-col gap-4">
                <x-title-card>
                    Table Power (kWh)
                </x-title-card>
                <div>
                    <div class="px-4 pt-2 pb-1 text-white">
                        <table class="w-full text-left border-collapse border border-gray-700">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-gray-800">
                                    <th class="px-4 py-2 border border-gray-600">Power A</th>
                                    <th class="px-4 py-2 border border-gray-600">Power B</th>
                                    <th class="px-4 py-2 border border-gray-600">Power C</th>
                                    <th class="px-4 py-2 border border-gray-600">Power T</th>

                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(entry, index) in historyPower" :key="index">
                                    <tr class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.p_a"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.p_b"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.p_c"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.p_t"></td>


                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>