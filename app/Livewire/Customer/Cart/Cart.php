<?php

namespace App\Livewire\Customer\Cart;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Cart extends Component
{
    use WithPagination;
    public $customer_cart = [];
    public $order = [
        'Customer Detail' =>NULL,
        'customer_cart' => NULL,
    ];
    public $product_stock_id = NULL;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->customer_cart = DB::table('customer_cart as cc')
            ->select(
                'product_stock_id',
                DB::raw('SUM(cc.quantity) as quantity'),
                'ps.product_id' ,
                'p.image as product_image' ,
                'p.code as product_code' ,
                'p.price as product_price' ,
                'p.name as product_name' ,
                'ps.product_size_id' ,
                'psz.name as product_size' ,
                'ps.product_color_id' ,
                'pc.name as product_color' ,
                'ps.quantity as product_quantity' ,
                'ps.is_active',
                )
            ->join('product_stocks as ps','ps.id','cc.product_stock_id')
            ->join('products as p','p.id','ps.product_id')
            ->join('product_sizes as psz','psz.id','ps.product_size_id')
            ->join('product_colors as pc','pc.id','ps.product_color_id')
            ->where('cc.customer_id','=',$data['id'])
            ->groupby('product_stock_id')
            ->get()
            ->toArray();
    }
    public function render(Request $request){
        $data = $request->session()->all();
       
        return view('livewire.customer.cart.cart',[
        ])
        ->layout('components.layouts.customer');
    }
    public function update_cart_quantity(Request $request,$id){
        $data = $request->session()->all();
        $quantity = NULL;
        $product_quantity = NULL;
        foreach ($this->customer_cart as $key => $value) {
            if($value->product_stock_id == $id){
                $quantity = $this->customer_cart[$key]->quantity;
                $product_quantity = $this->customer_cart[$key]->product_quantity;
            }
        }
        $cart_quantity = DB::table('customer_cart as cc')
            ->select(DB::raw('SUM(quantity) as quantity'))
            ->where('cc.customer_id','=',$data['id'])
            ->where('cc.product_stock_id','=',$id)
            ->first();
        if($cart_quantity){
            $cart_quantity = $cart_quantity->quantity;
        }
        if($customer_product_cart = DB::table('customer_cart as cc')
        ->select('*')
        ->where('cc.customer_id','=',$data['id'])
        ->where('cc.product_stock_id','=',$id)
        ->get()
        ->toArray()){
            if($quantity && intval($quantity)>0 ){
                if($quantity <= $product_quantity ){
                    $current_val = $cart_quantity - $quantity;
                    if($quantity < $cart_quantity ){
                        foreach ($customer_product_cart as $key => $value) {
                            if( $current_val >= 0){
                                if(($value->quantity - $current_val ) > 0){
                                    DB::table('customer_cart as cc') 
                                        ->where('id','=',$value->id)
                                        ->where('cc.customer_id','=',$data['id'])
                                        ->where('cc.product_stock_id','=',$id)
                                        ->update([
                                            'quantity' => $value->quantity -  $current_val
                                        ]);
                                }else{
                                    DB::table('customer_cart as cc') 
                                    ->where('id','=',$value->id)
                                    ->where('cc.customer_id','=',$data['id'])
                                    ->where('cc.product_stock_id','=',$id)
                                    ->delete();
                                }
                                $current_val -= $value->quantity;
                            }
                        }
                    }else{
                        foreach ($customer_product_cart as $key => $value) {
                            if($quantity <= $product_quantity){
                                if($customer_product_cart){
                                    DB::table('customer_cart as cc') 
                                    ->where('id','=',$customer_product_cart[0]->id)
                                    ->where('cc.customer_id','=',$data['id'])
                                    ->where('cc.product_stock_id','=',$id)
                                    ->update([
                                        'quantity' => $quantity
                                    ]);
                                }
                            }else{
                                //error
                            }
                        }
                    }
                }else{
                    // error
                }
               
            }
        }
    }
    public function remove_item_default($id,$modal_id){
        $this->product_stock_id = $id;
        $this->dispatch('openModal',$modal_id);
    }
    public function remove_item(Request $request,$id,$modal_id){
        $data = $request->session()->all();
        if($customer_product_cart = DB::table('customer_cart as cc')
        ->select('*')
        ->where('cc.customer_id','=',$data['id'])
        ->where('cc.product_stock_id','=',$id)
        ->get()
        ->toArray()){
            foreach ($customer_product_cart as $key => $value) {
                DB::table('customer_cart as cc') 
                ->where('id','=',$value->id)
                ->where('cc.customer_id','=',$data['id'])
                ->where('cc.product_stock_id','=',$id)
                ->delete();
            }
          
        }
        $this->dispatch('closeModal',$modal_id);
        $this->customer_cart = DB::table('customer_cart as cc')
            ->select(
                'product_stock_id',
                DB::raw('SUM(cc.quantity) as quantity'),
                'ps.product_id' ,
                'p.image as product_image' ,
                'p.code as product_code' ,
                'p.price as product_price' ,
                'p.name as product_name' ,
                'ps.product_size_id' ,
                'psz.name as product_size' ,
                'ps.product_color_id' ,
                'pc.name as product_color' ,
                'ps.quantity as product_quantity' ,
                'ps.is_active',
                )
            ->join('product_stocks as ps','ps.id','cc.product_stock_id')
            ->join('products as p','p.id','ps.product_id')
            ->join('product_sizes as psz','psz.id','ps.product_size_id')
            ->join('product_colors as pc','pc.id','ps.product_color_id')
            ->where('cc.customer_id','=',$data['id'])
            ->groupby('product_stock_id')
            ->get()
            ->toArray();
    }
    public function add_order(Request $request,$modal_id){
        $data = $request->session()->all();
        $cart = DB::table('customer_cart as cc')
        ->select(
            'product_stock_id',
            DB::raw('SUM(cc.quantity) as quantity'),
            'ps.product_id' ,
            'p.image as product_image' ,
            'p.code as product_code' ,
            'p.price as product_price' ,
            'p.name as product_name' ,
            'ps.product_size_id' ,
            'psz.name as product_size' ,
            'ps.product_color_id' ,
            'pc.name as product_color' ,
            'ps.quantity as product_quantity' ,
            'ps.is_active',
            )
        ->join('product_stocks as ps','ps.id','cc.product_stock_id')
        ->join('products as p','p.id','ps.product_id')
        ->join('product_sizes as psz','psz.id','ps.product_size_id')
        ->join('product_colors as pc','pc.id','ps.product_color_id')
        ->where('cc.customer_id','=',$data['id'])
        ->groupby('product_stock_id')
        ->get()
        ->toArray();

        // validation
        $order = [
            'order_by' =>$data['id'],
            'valid'=> true,
        ];
        foreach ($cart  as $key => $value) {
            if($value->quantity > $value->product_quantity){
                $order['valid'] = false;
            }   
        }
        if( $order['valid'] ){
            DB::table('orders')
                ->insert([
                    'order_by' =>$order['order_by'],
                ]);
            $current_order = DB::table('orders as o')
                ->where('order_by','=',$order['order_by'])
                ->orderBy('o.id')
                ->first();
            foreach ($cart  as $key => $value) {
                DB::table('order_items')
                    ->insert([
                    'order_id' => $current_order->id,
                    'order_by' => $order['order_by'],
                    'product_stock_id' => $value->product_stock_id,
                    'quantity' => $value->quantity,
                ]);
                DB::table('customer_cart as cc')
                ->where('cc.customer_id','=',$data['id'])
                ->where('cc.product_stock_id','=',$value->product_stock_id)
                ->delete();
            }
            $this->dispatch('closeModal',$modal_id);
        }
    }
}
