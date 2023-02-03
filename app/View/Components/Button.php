<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $color;
    public $class;
    public $type;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'primary', $class = 'btn-md', $type = 'button')
    {
        $this->color = $color;
        $this->class = $class;
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