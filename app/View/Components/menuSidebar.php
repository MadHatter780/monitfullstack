<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class menuSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,$logo;
    public function __construct($name,$logo)
    {
        $this->name = $name;
        $this->logo = $logo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-sidebar');
    }
}
