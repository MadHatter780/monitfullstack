<?php
namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Power;
use App\Models\Logger;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    public $start_date, $end_date,
           $type_data,$dropdown,$dropdowns,$selectedFilter,
           $upDownFilter,$wos, $wosName,$wosSubName,$wosTImestamp;
    public $arraySelected = [];
    use WithPagination;

    public function submitSearch()
    {
        $this->resetPage();
    }

    public function updatedIsChecked($value)
    {
        $this->emit('checkboxToggled', $value);
    }

    public function lol()
    {
        $this->wos = "change";
    }

    public function mount(){
        $this->dropdown =  Power::orderBy("name","desc")->
        distinct()->select("name")->get();

    }

    public function cekArray(){
    }

    public function render()
    {
        $this->dropdown =  Power::distinct()->select("name")
        ->orderBy("name","desc")
        ->get();

        $query = Power::query()->selectRaw('*, ROW_NUMBER() OVER (ORDER BY id ASC) as nomor_urut');

        if($this->dropdowns){
            $query->where("name",$this->dropdowns);
        }elseif($this->dropdowns == ""){
            $los = $query->paginate(20);
        }


        if ($this->start_date) {
            $newStart = Carbon::parse($this->start_date)->startOfDay()->toDateTimeString();
            $query->where('created_at', '>=', $newStart);
        }
        if ($this->end_date) {
            $newEnd = Carbon::parse($this->end_date)->endOfDay()->toDateTimeString();
            $query->where('created_at', '<=', $newEnd);
        }
        $los = $query->paginate(20);
        return view('livewire.history', [
            'los' => $los,
        ]);
    }
}
