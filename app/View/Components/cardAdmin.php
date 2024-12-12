<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardAdmin extends Component
{
    /**
     * Create a new component instance.
     */
    public $image,$name;
    public function __construct($image,$name)
    {
        $this->image = $image;
        $this->name = $name;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-admin');
    }
}
