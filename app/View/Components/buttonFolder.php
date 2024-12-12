<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttonFolder extends Component
{
    /**
     * Create a new component instance.
     */

     public $value,$name;
     public function __construct($value,$name)
    {
        $this->value = $value;
        $this->name = $name;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-folder');
    }
}
