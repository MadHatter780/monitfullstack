<?php

namespace App\Livewire;

use App\Models\Power;
use App\Models\Type;
use Livewire\Component;

class PowerRealtime extends Component
{

    public $name;

    public function mount($name)
    {
        $type = Type::where('name',$name)->first();
        // if($type == null){

        // }
    }

    public function render()
    {

        return view('livewire.power-realtime');
    }
}
