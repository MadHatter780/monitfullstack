<?php

namespace App\Livewire;

use App\Models\Type;
use App\Models\Power;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;


class PowerRealtime extends Component
{

    public $name;
    public $arrKosong = [];
    public $timesFor,$ready;

    public function mount($name)
    {
        $awal = Carbon::today('Asia/Jakarta')->subDays(6);
        $akhir = Carbon::today('Asia/Jakarta')->subDays(5);

        $dis = "DISTINCT ON (TO_CHAR(created_at, 'HH24')) *, TO_CHAR(created_at, 'HH24') as waktu";
        $ocar = "TO_CHAR(created_at, 'HH24') ASC";

        $subDays = Carbon::now('Asia/Jakarta')->subDays(2);


        $power = DB::table('power')
            ->selectRaw($dis)
            ->where("name", "T")
            ->whereBetween('created_at', [$awal, $akhir])
            ->orderByRaw("TO_CHAR(created_at, 'HH24') ASC")
            ->orderByRaw("TO_CHAR(created_at, 'YYYY-MM-DD') DESC")
            ->orderBy('created_at', 'asc')
            ->get();

        // $last = DB::table('power')
        //             ->orderBy("created_at","asc")
        //             ->where("name", "T")
        //             ->whereBetween('created_at', [$awal, $akhir])
        //             // ->whereRaw("TO_CHAR(created_at, 'HH24') = '24'")
        //             ->first();

        // anggap kemarin 23.00
        $last = DB::table('power')
                ->where("name", "T")
                ->where("created_at",">=",Carbon::today('Asia/Jakarta')->subDays(5))
                ->where("created_at","<=",Carbon::today('Asia/Jakarta')->subDays(3))                // ->whereRaw("TO_CHAR(created_at, 'HH24') = '00'")
                ->first();

        // anggap hari ini jam 00.01
        $first = DB::table('power')
                ->where("name", "T")
                ->where("created_at",">=",Carbon::today('Asia/Jakarta')->subDays(4))
                ->where("created_at","<=",Carbon::today('Asia/Jakarta')->subDays(3))
                // ->whereRaw("TO_CHAR(created_at, 'HH24') = '23'")
                ->first();

        // if($first == null || $last == null){
        //     $truValue = 0;
        // }
        // else{
        //     $truValue = ($first->value - $last->value)/10**6;
        //     $theTrueValue = round($truValue,2);
        //     $newData = [
        //         "time" => 00,
        //         "data" => number_format($theTrueValue, 2)
        //     ];
        //     array_push($this->arrKosong,$newData);


        // }


        // dd([$awal,$akhir,$last,$first,$theTrueValue]);


        // if($last == null){
        //     $last = 0;
        //     dd($last);
        // }

         for ($i=0; $i <= 24 ; $i++) {
            foreach ($data = $power as $key => $value) {
                if($power->count() == $key+1){
                    break;
                };
                $lastData = $data[$key+1]->value - $data[$key]->value;
                $time = $value->waktu + 1;
                if($i == $time){
                    $newData = [
                        "time" => $time,
                        "data" => number_format($lastData, 2)
                    ];
                    array_push($this->arrKosong,$newData);
                    $this->timesFor = $i;
                    $this->ready = TRUE;
                    break;
                }
                $this->ready = FALSE;
                $this->timesFor = $i;
            }
            $newData = [
                "time" => $this->timesFor,
                "data" => 0
            ];
            if(!$this->ready){
                array_push($this->arrKosong,$newData);
            }
        }
    }
    #[Title('Realtime Power')]  // Mengatur title halaman
    public function render()
    {

        return view('livewire.power-realtime');
    }
}
