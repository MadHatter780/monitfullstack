<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class title extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,$logo,$color;
    public function __construct($name,$logo,$color)
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->color = $color;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title');
    }
}
