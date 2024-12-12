<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     */
    public $color,$colorText,$logo,$name,$satuan,$value,$ct;
    public function __construct($color,$colorText,$satuan,$name,$logo,$value,$ct)
    {
        $this->color = $color;
        $this->colorText = $colorText;
        $this->logo = $logo;
        $this->name = $name;
        $this->satuan = $satuan;
        $this->value = $value;
        $this->ct = $ct;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
