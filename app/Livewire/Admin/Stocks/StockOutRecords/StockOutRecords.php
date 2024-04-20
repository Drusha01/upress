<?php

namespace App\Livewire\Admin\Stocks\StockOutRecords;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class StockOutRecords extends Component
{
    public function render()
    {
        return view('livewire.admin.stocks.stock-out-records.stock-out-records')
        ->layout('components.layouts.admin');
    }
}
