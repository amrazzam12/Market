<?php

namespace App\View\Components;

use Illuminate\View\Component;

class addButton extends Component
{


    public $section;
    public $model;

    public function __construct($section,$model)
    {
        $this->section = $section;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-button');
    }
}
