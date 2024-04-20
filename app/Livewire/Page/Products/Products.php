<?php

namespace App\Livewire\Page\Products;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Products extends Component
{
    public function render()
    {
        $stocks_data = DB::table('product_stocks as ps')
        ->select(
            'ps.id as id',
            'ps.product_id' ,
            'p.image as product_image' ,
            'p.code as product_code' ,
            'p.name as product_name' ,
            'p.description as product_description' ,
            'product_size_id' ,
            'psz.name as product_size' ,
            'product_color_id' ,
            'pc.name as product_color' ,
            'ps.quantity as product_quantity' ,
            'ps.price as product_price' ,
            'ps.is_active',
        )
        ->join('products as p','p.id','product_id')
        ->join('product_sizes as psz','psz.id','product_size_id')
        ->join('product_colors as pc','pc.id','product_color_id')
        ->paginate(10);
        return view('livewire.page.products.products',[
            'stocks_data'=> $stocks_data
        ])
        ->layout('components.layouts.page');
    }
}
