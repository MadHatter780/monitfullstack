<div class="w-full p-2">
    <div class="mb-2">

        <x-title name="History Chart" logo="bi bi-clock" color="from-[#7ce7b0] to-[#07e916] from-10% " />
        <x-sub-nav>
            <div>
                <i class="bi bi-clock"></i>
            </div>
            <div class="text-white underline ">
                History Chart
            </div>
            <div>
                / Power
            </div>
        </x-sub-nav>
        <!-- Mengaktifkan Dark Mode secara global -->
        <div class="dark mt-4">

            <!-- Dropdown (select) dengan tema gelap -->
            <select wire:model.live="timeFilter"
                class="bg-gray-800 text-white border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 p-2 rounded-lg w-64">
                <option value="today" class="bg-gray-800 text-white">Today</option>
                <option value="yesterday" class="bg-gray-800 text-white">Yesterday</option>
                <option value="week" class="bg-gray-800 text-white">Week</option>
                <option value="month" class="bg-gray-800 text-white">Month</option>

            </select>


        </div>

    </div>
    {{-- <button wire:click="updateData" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">
        Update Data
    </button> --}}



    <div class="w-full  flex flex-col p-2 gap-y-2">
        <div class="w-full p-2 bg-[#070712] rounded-lg bg-opacity-20">
            <x-title-card>
                Chart Power (kWh)
            </x-title-card>
            <div class="mt-2">
                <div id="lineChart" class="h-96" wire:ignore></div>
            </div>
        </div>
        <div class="w-full p-2 bg-[#070712] rounded-lg bg-opacity-20">
            <x-title-card>
                Chart Current (Ampere)
            </x-title-card>
            <div class="mt-2">
                <div id="lineChart2" class="h-96" wire:ignore></div>
            </div>
        </div>
        <div class="w-full p-2 bg-[#070712] rounded-lg bg-opacity-20">
            <x-title-card>
                Chart Voltage (V)
            </x-title-card>
            <div class="mt-2">
                <div id="lineChart3" class="h-96" wire:ignore></div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('livewire:init', () => {

            function chart(idchart, series, categories) {
    const lineChartElement = document.querySelector(`#${idchart}`);
    const chartInstance = new ApexCharts(lineChartElement, {
        chart: {
            type: 'line',
            height: '100%',
            width: '100%',
        },
        series: series,
        xaxis: {
            categories: categories,
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
        responsive: [{
            breakpoint: 1000,
            options: {
                chart: {
                    width: '100%',
                },
                xaxis: {
                    labels: {
                        rotate: -45,
                    }
                }
            }
        }]
    });

    chartInstance.render();
    return chartInstance;
}

// Inisialisasi chart
const chart1 = chart("lineChart", @json($chartData['series']), @json($chartData['categories']));
const chart2 = chart("lineChart2", @json($chartData2['series']), @json($chartData2['categories']));
const chart3 = chart("lineChart3", @json($chartData3['series']), @json($chartData3['categories']));

// Perbarui chart saat data berubah
Livewire.on('chartDataUpdated', (data) => {
    console.log(data[0][1]);

    // Update semua chart jika diperlukan
    chart1.updateOptions({
        series: data[0][0].series,
        xaxis: {
            categories: data[0][0].categories,
        },
    });

    chart2.updateOptions({
        series: data[0][1].series,
        xaxis: {
            categories: data[0][1].categories,
        },
    });

    chart3.updateOptions({
        series: data[0][2].series,
        xaxis: {
            categories: data[0][2].categories,
        },
    });
});

        });
    </script>
</div>