<?php

namespace App\Livewire\Admin\Services\Pendingservices;

use Livewire\Component;

class Pendingservices extends Component
{
    public function render()
    {
        return view('livewire.admin.services.pendingservices.pendingservices')
        ->layout('components.layouts.admin');
    }
}
