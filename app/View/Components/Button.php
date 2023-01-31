<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $color;
    public $type;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $color = 'success', $type = 'button')
    {
        $this->label = $label;
        $this->color = $color;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}