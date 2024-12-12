<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subNav extends Component
{
    /**
     * Create a new component instance.
     */
    public $nav;
    public function __construct($nav)
    {
        $this->nav = $nav;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sub-nav');
    }
}
