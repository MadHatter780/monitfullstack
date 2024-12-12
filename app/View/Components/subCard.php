<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image,$location,$ref;
    public function __construct($image,$location,$ref)
    {
        $this->image = $image;
        $this->location = $location;
        $this->ref = $ref;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sub-card');
    }
}
