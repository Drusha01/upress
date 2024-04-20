<?php

namespace App\Livewire\Customer\OrderList;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class OrderList extends Component
{
    public function render()
    {
        return view('livewire.customer.order-list.order-list')
        ->layout('components.layouts.customer');
    }
}
