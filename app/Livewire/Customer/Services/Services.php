<?php

namespace App\Livewire\Customer\Services;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Services extends Component
{
    public function render()
    {
        return view('livewire.customer.services.services')
        ->layout('components.layouts.customer');
    }
}
