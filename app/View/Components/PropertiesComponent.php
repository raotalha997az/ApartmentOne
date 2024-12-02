<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PropertiesComponent extends Component
{
    /**
     * Create a new component instance.
     */

     public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($value = null)
    {
        $this->value = $value; // Assign the value passed to the component
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.properties-component');
    }
}
