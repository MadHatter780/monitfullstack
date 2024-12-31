<div>
    <div class="p-4" x-data="mqttHandler()" x-init="init()" x-on:destroy="destroy()">
        <x-title ct="text-white" name="Realtime Dashboard" logo="bi bi-clock"
            color="from-[#7ce7b0] to-[#07e916] from-10%" />
        <div class="flex 2xl:flex-row flex-col 2xl:gap-y-0 gap-y-3 justify-between">
            <div class="flex justify-between">
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
            </div>
            <div class="text-2xl font-mono font-bold text-white tracking-[1px]">
                LVMDP GKB-2 UNIMUS
            </div>
        </div>
        <div class="flex xl:flex-row lg:flex-col md:flex-col md:gap-y-0 gap-y-4 flex-col gap-x-2 mt-4 ">
            <x-card-hytam name="Power R" value="p_a" satuan="Kw" />
            <x-card-hytam name="Power S" value="p_b" satuan="Kw" />
            <x-card-hytam name="Power T" value="p_c" satuan="Kw" />
            <x-card-hytam name="Accumulate Power" value="p_t" satuan="Mwh" />
        </div>
        <div class=" mt-2 ">
            <div class="w-full flex flex-col md:flex-row gap-x-3   ">
                <div
                    class="bg-[#202228] overflow-x-auto scrollbar scrollbar-thumb-orange-700 scrollbar-track-gray-700  flex-col  w-full md:w-3/5 flex pb-10 pt-5 px-2">
                    <div class="text-white px-2  font-semibold font-mono tracking-[0.09em]">
                        Power Increasing Today
                    </div>
                    <div id="lineChart" class="py-2 px-2"></div>
                </div>
                <div class=" md:w-2/5 w-full items-center ">
                    <div class="flex bg-[#202228] flex-col mt-3 py-5">
                        <div class="text-white px-5 py-5 2xl:text-xl text-lg font-semibold font-mono tracking-[0.09em]">
                            Current Monitoring Realtime
                        </div>
                        <div x-init="init()" class="w-full -mt-5  h-full items-center flex" x-ref="chartContainer">
                            <div id="chart" class=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row w-full gap-x-2 gap-y-2 md:gap-y-0 mt-2 ">
                <div class=" w-full flex flex-col gap-y-2 ">
                    <div class=" pb-10 bg-[#202228] flex gap-y-4 flex-col  px-4   rounded-lg">
                        <x-title-card>
                            Voltage (V)
                        </x-title-card>
                        <div class="mb-4 grid grid-cols-1  md:grid-cols-3  gap-4 w-full">
                            <x-card value="v_ab" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage RS"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_bc" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage ST"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />

                            <x-card value="v_ca" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage RT"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_an" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage R"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_bn" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage S"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                            <x-card value="v_cn" color="from-[#f75849] to-[#de4233]" ct="text-white" name="Voltage T"
                                colorText="text-[#de4233]" logo="bi-lightning-fill" satuan="volt" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-[#202228]  pb-10 bg-opacity-70 overflow-x-auto mt-5 flex flex-col gap-4">
                <x-title-card>
                    Table Voltage (Volt)
                </x-title-card>
                <div>
                    <div class="px-4 pt-2 pb-1 text-white">
                        <table class="w-full text-left border-collapse border border-gray-700">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-gray-800">
                                    <th class="px-4 py-2 border border-gray-600">VOL RT</th>
                                    <th class="px-4 py-2 border border-gray-600">VOL ST</th>
                                    <th class="px-4 py-2 border border-gray-600">VOL RT</th>
                                    <th class="px-4 py-2 border border-gray-600">VOL R</th>
                                    <th class="px-4 py-2 border border-gray-600">VOL S</th>
                                    <th class="px-4 py-2 border border-gray-600">VOL T</th>
                                    <th class="px-4 py-2 border border-gray-600">Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(entry, index) in historyVoltage" :key="index">
                                    <tr class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_ab"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_bc"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_ca"></td>

                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_an"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_bn"></td>
                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.v_cn"></td>

                                        <td class="px-4 py-2 border border-gray-600" x-text="entry.time">
                                        </td>

                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2 flex flex-col gap-x-2">
                <div class="bg-[#202228] w-full pb-10 bg-opacity-70 mt-5 flex flex-col gap-4">
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
                                        <th class="px-4 py-2 border border-gray-600">Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(entry, index) in historyCurrent" :key="index">
                                        <tr
                                            class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.c_a"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.c_b"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.c_c"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.time"></td>

                                        </tr>
                                    </template>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-[#202228] w-full pb-10 bg-opacity-70 mt-5 flex flex-col gap-4">
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
                                        <th class="px-4 py-2 border border-gray-600">Power T (wh)</th>
                                        <th class="px-4 py-2 border border-gray-600">Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(entry, index) in historyPower" :key="index">
                                        <tr
                                            class="bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800">
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.p_a"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.p_b"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.p_c"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.p_t"></td>
                                            <td class="px-4 py-2 border border-gray-600" x-text="entry.time"></td>


                                        </tr>
                                    </template>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <script>
            document.addEventListener('livewire:init', () => {

            let data = @json($arrKosong);
            const categories = data.map(data => data.time);
            const datas = data.map(data => data.data);

            console.log(categories);

            function chart(idchart,categories,datas) {

                const generateRandomData = () => {
                    return Array.from({
                        length: 24
                    }, () => Math.floor(Math.random() * 100)); // 10 nilai acak
                };
                const categoriess = categories// Kategori X
                const series = [{
                    name: "Power Increasing (MwH)",
                    data: datas
                }];

                const lineChartElement = document.querySelector(`#${idchart}`);
                const chartInstance = new ApexCharts(lineChartElement, {
                    chart: {
                        type: 'line',
                        height: '100%',
                        width: '100%',
                    },
                    colors: ['#ff5733'],

                    series: series,
                    xaxis: {
                        categories: categoriess,
                        labels: {
                            show: true,
                            style: {
                                colors: 'white',
                                fontSize: '14px',
                            }
                        },
                        title: {
                            text: 'Time',
                            style: {
                                color: 'white',
                                fontSize: '16px',
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            show: true,
                            style: {
                                colors: 'white',
                                fontSize: '14px',
                            }
                        },
                        title: {
                            text: 'Value',
                            style: {
                                color: 'white',
                                fontSize: '16px',
                            }
                        }
                    },
                    legend: {
                        labels: {
                            colors: "#fff",
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        offsetY: -10, // Memindahkan angka ke atas titik
                        style: {
                            colors: ['#000'], // Warna teks angka
                            fontSize: '12px',
                            fontWeight: 'bold',
                            background: {
                                enabled: true,
                                foreColor: '#000', // Warna teks
                                borderRadius: 2,
                                borderWidth: 0, // Menghilangkan border
                                opacity: 1,
                                padding: 4,
                                dropShadow: {
                                    enabled: false,
                                }
                            }
                        }
                    },
                    markers: {
                        size: 6, // Ukuran titik
                        colors: ['#fff'], // Warna isi titik
                        strokeColors: '#fff', // Warna garis luar titik
                        strokeWidth: 2
                    }
                });

                chartInstance.render();
                return chartInstance;
            }


            // Inisialisasi chart dengan data acak
            const chart1 = chart("lineChart",categories,datas);
            // const lol = @json($arrKosong);


            // Tambahkan logika untuk memperbarui data jika diperlukan
            Livewire.on('updateRandomData', () => {
                const newRandomData = Array.from({
                    length: 10
                }, () => Math.floor(Math.random() * 100));
                chart1.updateOptions({
                    series: [{
                        name: "Random Data",
                        data: newRandomData
                    }]
                });
            });
        });
        </script>
    </div>