<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;
use Livewire\Attributes\Title;

class Setting extends Component
{
    public $dataSetting;
    #[Title('Setting')]

    public function mount(){
        $this->dataSetting = Position::get();
    }

    public function render()
    {
        return view('livewire.setting');
    }
}
