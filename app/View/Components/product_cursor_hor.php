<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product_cursor_hor extends Component
{
    public $product;

    public function __construct($product  )
    {
        $product = $this->product;
    }

    public function render()
    {
        return view('components.product_cursor_hor');
    }
}
