<?php

namespace App\Livewire\Admin\Profile\Profile;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.profile.profile.profile')
        ->layout('components.layouts.admin');
    }
}
