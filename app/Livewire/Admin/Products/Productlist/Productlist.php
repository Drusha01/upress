<?php

namespace App\Livewire\Admin\Products\Productlist;

use Livewire\Component;

class Productlist extends Component
{
    public function render()
    {
        return view('livewire.admin.products.productlist.productlist')
        ->layout('components.layouts.admin');
    }
}
