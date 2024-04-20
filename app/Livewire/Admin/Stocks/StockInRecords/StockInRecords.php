<?php

namespace App\Livewire\Admin\Stocks\StockInRecords;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class StockInRecords extends Component
{
    public function render()
    {
        return view('livewire.admin.stocks.stock-in-records.stock-in-records')
        ->layout('components.layouts.admin');
    }
}
