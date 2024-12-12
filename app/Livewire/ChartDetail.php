<?php

namespace App\Livewire;

use App\Models\Power;
use App\Models\Logger;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class ChartDetail extends Component
{
    public $chartData,
        $powerData = [],
        $powerValue = [],
        $powerLabel = [],
        $chartData2 = [],
        $currentData = [],
        $currentValue = [],
        $currentLabel = [],
        $chartData3 = [],
        $voltageData = [],
        $voltageValue = [],
        $voltageLabel = [],
        $arr = [],
         $timeFilter = "";

         public function datas($name, $time)
         {
             $times = $time;
             if ($times == "today") {
                 $awal = Carbon::today('Asia/Jakarta');
                 $akhir = Carbon::now('Asia/Jakarta');  // End of today
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'HH24')) *, TO_CHAR(created_at, 'HH24') as waktu";
                 $ocar = "TO_CHAR(created_at, 'HH24')";
             }
             if ($times == "month") {
                 $awal = Carbon::now()->startOfMonth();  // Start of the current month
                 $akhir = Carbon::now('Asia/Jakarta');  // End of today
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'MM')) *, TO_CHAR(created_at, 'MM') as waktu";
                 $ocar = "TO_CHAR(created_at, 'MM')";
             }
             if ($times == "week") {
                 $awal = Carbon::now()->startOfWeek();  // Start of the current week
                 $akhir = Carbon::now()->endOfWeek();   // End of the current week
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'IW')) *, TO_CHAR(created_at, 'IW') as waktu";  // 'IW' for international week
                 $ocar = "TO_CHAR(created_at, 'IW')";
             }
             if ($times == "yesterday") {
                $awal = Carbon::now('Asia/Jakarta')->subDays(7)->startOfDay();  // Set to the start of the day            // End is today
                $akhir = Carbon::now('Asia/Jakarta');// End of yesterday
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'DD')) *, TO_CHAR(created_at, 'DD') as waktu";
                 $ocar = "TO_CHAR(created_at, 'DD')";
             }

             $voltage = Power::selectRaw('DISTINCT ON (name) *')
                 ->where('parent', $name)
                 ->whereBetween('created_at', [$awal, $akhir])
                 ->orderBy('name')
                 ->orderBy('created_at', 'desc')
                 ->get();

             $time = DB::table('power')
                 ->selectRaw($dis)
                 ->whereBetween('created_at', [$awal, $akhir])
                 ->orderByRaw($ocar)  // Order by the time column
                 ->orderBy('created_at', 'desc')  // Order by the most recent data
                 ->get();

             return [$time, $voltage];
         }

         public function subData($subname, $time)
         {
             $times = $time;
             if ($times == "today") {
                 $awal = Carbon::today('Asia/Jakarta');
                 $akhir = Carbon::now('Asia/Jakarta');
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'HH24')) *, TO_CHAR(created_at, 'HH24') as waktu";
                 $ocar = "TO_CHAR(created_at, 'HH24')";
             }
             if ($times == "month") {
                 $awal = Carbon::now()->startOfMonth();  // Start of the current month
                 $akhir = Carbon::now('Asia/Jakarta');  // End of today
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'MM')) *, TO_CHAR(created_at, 'MM') as waktu";
                 $ocar = "TO_CHAR(created_at, 'MM')";
             }
             if ($times == "week") {
                 $awal = Carbon::now()->startOfWeek();  // Start of the current week
                 $akhir = Carbon::now()->endOfWeek();   // End of the current week
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'IW')) *, TO_CHAR(created_at, 'IW') as waktu";
                 $ocar = "TO_CHAR(created_at, 'IW')";
             }
             if ($times == "yesterday") {
                $awal = Carbon::now('Asia/Jakarta')->subDays(7)->startOfDay();  // Set to the start of the day            // End is today
                $akhir = Carbon::now('Asia/Jakarta'); // End of yesterday
                 $dis = "DISTINCT ON (TO_CHAR(created_at, 'DD')) *, TO_CHAR(created_at, 'DD') as waktu";
                 $ocar = "TO_CHAR(created_at, 'DD')";
             }

             $dataValue = DB::table('power')
                 ->selectRaw($dis)
                 ->whereBetween('created_at', [$awal, $akhir])
                 ->where('name', $subname)
                 ->orderByRaw($ocar)  // Order by the time column
                 ->orderBy('created_at', 'desc')  // Order by the most recent data
                 ->get();

             return $dataValue;
         }


    public function power($time)
    {
        $times = $time;
        $dats = $this->datas('Power',$times);
        $time = $dats[0];
        $power = $dats[1];

        foreach ($time as $data) {
            array_push($this->powerLabel, $data->waktu);
        }


        foreach ($power as $data) {
            $dataValue = $this->subData($data->name,$times);
            foreach ($dataValue as $value) {
                array_push($this->powerValue, $value->value);
            }

            array_push($this->powerData, [
                'name' => "Power $data->name",
                'data' => $this->powerValue,
            ]);
            $this->powerValue = [];
        }

        $this->chartData = [
            'categories' => $this->powerLabel,
            'series' => $this->powerData,
        ];
    }
    public function current($time)
    {
        $times = $time;
        $dats = $this->datas('Current',$time);
        $time = $dats[0];
        $current = $dats[1];

        foreach ($time as $data) {
            array_push($this->currentLabel, $data->waktu);
        }

        foreach ($current as $data) {
            $dataValue = $this->subData($data->name,$times);
            foreach ($dataValue as $value) {
                array_push($this->currentValue, $value->value);
            }
            array_push($this->currentData, [
                'name' => "Current $data->name",
                'data' => $this->currentValue,
            ]);
            $this->currentValue = [];
        }
        $this->chartData2 = [
            'categories' => $this->currentLabel,
            'series' => $this->currentData,
        ];
    }

    public function voltage($time)
    {
        $times = $time;
        $dats = $this->datas('Voltage',$time);
        $time = $dats[0];
        $voltage = $dats[1];

        foreach ($time as $data) {
            array_push($this->voltageLabel, $data->waktu);
        }

        foreach ($voltage as $data) {
            $dataValue = $this->subData($data->name,$times);
            foreach ($dataValue as $value) {
                array_push($this->voltageValue, $value->value);
            }
            array_push($this->voltageData, [
                'name' => "voltage $data->name",
                'data' => $this->voltageValue,
            ]);
            $this->voltageValue = [];
        }
        $this->chartData3 = [
            'categories' => $this->voltageLabel,
            'series' => $this->voltageData,
        ];
    }

    public function mount()
    {
        $this->power("today");
        $this->current("today");
        $this->voltage("today");
    }

    public function updateData()
    {
    }
    public function updatedTimeFilter($value)
    {
        // Reset the chart data arrays
        $this->chartData = [];
        $this->powerData = [];
        $this->powerValue = [];
        $this->powerLabel = [];
        $this->chartData2 = [];
        $this->currentData = [];
        $this->currentValue = [];
        $this->currentLabel = [];
        $this->chartData3 = [];
        $this->voltageData = [];
        $this->voltageValue = [];
        $this->voltageLabel = [];

        // Update the chart data based on the selected time filter
        if ($value == 'today') {
            $this->power("today");
            $this->current("today");
            $this->voltage("today");
            $this->dispatch('chartDataUpdated', [
                $this->chartData,$this->chartData2,$this->chartData3
            ]);

        } elseif ($value == 'month') {
            $this->power("month");
            $this->current("month");
            $this->voltage("month");
            $this->dispatch('chartDataUpdated', [
                $this->chartData,$this->chartData2,$this->chartData3
            ]);        } elseif ($value == 'week') {
            $this->power("week");
            $this->current("week");
            $this->voltage("week");
            $this->dispatch('chartDataUpdated', [
                $this->chartData,$this->chartData2,$this->chartData3
            ]);

        }
        elseif ($value == 'yesterday') {
            $this->power("yesterday");
            $this->current("yesterday");
            $this->voltage("yesterday");
            $this->dispatch('chartDataUpdated', [
                $this->chartData,$this->chartData2,$this->chartData3
            ]);
        }
    }


    public function render()
    {

        if(!empty($this->timeFilter)){
            $this->dispatch('chartUpdated',
        );
        }
        return view('livewire.chart-detail');
    }
}
