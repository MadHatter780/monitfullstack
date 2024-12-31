<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputLogin extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,$placeholder,$type;
    public function __construct($name,$placeholder,$type)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-login');
    }
}
