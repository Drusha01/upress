<?php

namespace App\Livewire\Page\Homepage;

use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.homepage')        
        ->layout('components.layouts.page');
    }
}
