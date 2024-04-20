<?php

namespace App\Livewire\Customer\Cart;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.customer.cart.cart')
        ->layout('components.layouts.customer');
    }
}
