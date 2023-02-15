<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{
    public $products,  $cateogory;
    public function mount($products, $cateogory)
    {
        $this->products = $products;
        $this->cateogory = $cateogory;
    }

    public function render()
    {
        return view('livewire.frontend.product.index', ['products' => $this->products, 'cateogory' => $this->cateogory]);
    }
}
