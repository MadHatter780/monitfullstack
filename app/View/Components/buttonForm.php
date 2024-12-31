<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttonForm extends Component
{
    /**
     * Create a new component instance.
     */


    public $type,$name,$color;
    public function __construct($type,$name,$color)
    {
        $this->type = $type;
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-form');
    }
}
