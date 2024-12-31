<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
class ChartHome extends Component
{
    #[Title('Chart Detail')]  // Mengatur title halaman
    public function render()
    {
        return view('livewire.chart-home');
    }
}
