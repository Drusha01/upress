<?php

namespace App\Livewire\Components\CustomerHeader;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class CustomerHeader extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        $session = $request->session()->all();
        $header_info = [
            'cart_items' => 0,
            'notification_items'=> 0,
            'pending_order' => 0,
            'service_items' => 0,
            'pending_service' => 0,
        ];
        if(isset($session['id'])){
            $user_info  = DB::table('users as u')
                ->select(
                    "u.id",
                    "u.first_name",
                    "u.middle_name",
                    "u.last_name",
                    "u.email" ,
                    "u.image",
                )
                ->where('id','=',$session['id'])
                ->first();
        }
        $cart_items = DB::table('customer_cart as cc')
            ->select(DB::raw('SUM(quantity) as quantity'))
            ->where('cc.customer_id','=',$session['id'])
            ->first();
        if($cart_items->quantity){
            $header_info['cart_items'] = $cart_items->quantity;
        }

        $order_status = DB::table('order_status as os')
        ->where('name','=','Pending')
        ->first();

        $pending_orders = DB::table('orders as o')
        ->select(
            DB::raw('count(*) as pending_order_count')
        )
        ->where('order_by','=',$session['id'])
        ->where('status','=',$order_status->id)
        ->first();

        if($pending_orders->pending_order_count){
            $header_info['pending_order'] = $pending_orders->pending_order_count;
        }
        return view('livewire.components.customer-header.customer-header',[
            'user_info'=>$user_info,
            'header_info'=>$header_info
        ]);
    }
}
