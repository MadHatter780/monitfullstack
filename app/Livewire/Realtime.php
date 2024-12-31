<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
class Realtime extends Component
{
    #[Title('Power')]

    public function render()
    {
        return view('livewire.realtime');
    }
}
