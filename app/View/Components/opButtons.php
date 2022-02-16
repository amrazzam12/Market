<?php

namespace App\View\Components;

use Illuminate\View\Component;

class opButtons extends Component
{

    public $section;
    public $model;

    public function __construct($section , $model)
    {
        $this->section = $section;
        $this->model = $model;
    }


    public function render()
    {
        return view('components.op-buttons');
    }
}
