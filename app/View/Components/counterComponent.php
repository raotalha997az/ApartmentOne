<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class counterComponent extends Component
{
    public $counterData;

    /**
     * Create a new component instance.
     *
     * @param array|null $counterData
     */
    public function __construct($counterData = null)
    {
        $this->counterData = $counterData;

        // Uncomment for debugging:
        // dd($counterData);
    }

    /**
     * Get the view or contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.counter-component');
    }
}
