<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardHytam extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,$satuan,$value;
    public function __construct($name,$satuan,$value)
    {
        $this->name = $name;
        $this->satuan = $satuan;
        $this->value = $value;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-hytam');
    }
}
