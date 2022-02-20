<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product_card extends Component
{
     public $product;

    public function __construct($product)
    {
        $product = $this->product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product_card');
    }
}
