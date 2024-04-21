<?php

namespace App\Livewire\Admin\Services\Completedservices;

use Livewire\Component;

class Completedservices extends Component
{
    public function render()
    {
        return view('livewire.admin.services.completedservices.completedservices')
        ->layout('components.layouts.admin');
    }
}
