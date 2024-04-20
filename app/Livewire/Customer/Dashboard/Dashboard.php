<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $cart = [
        'product_stock_id'=> NULL,
    ];
    public $current_cart = [
        'product_stock_id'=> NULL,
        'product' => NULL,
        'product_colors'=> NULL,
        'product_sizes'=> NULL,
        'product_color'=> NULL,
        'product_size'=> NULL,
        'quantity' => NULL,
    ];
    public $stock = [
        
    ];
    public function render()
    {
        $stocks_data = DB::table('products as p')
        ->select(
            'p.id',
            'p.image as product_image' ,
            'p.code as product_code' ,
            'p.name as product_name' ,
            'p.description as product_description' ,
            'p.price as product_price' ,
            'p.is_active',
        )
        ->rightjoin('product_stocks as ps','p.id','ps.product_id')
        ->groupby('p.id')
        ->paginate(10);
        return view('livewire.customer.dashboard.dashboard',[
            'stocks_data'=>$stocks_data 
        ])
        ->layout('components.layouts.customer');
    }
    public function add_to_cart($id,$modal_id){
        $this->dispatch('openModal',$modal_id);
    }
}
