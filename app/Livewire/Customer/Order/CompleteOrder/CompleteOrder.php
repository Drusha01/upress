<?php

namespace App\Livewire\Customer\Order\CompleteOrder;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class CompleteOrder extends Component
{
    use WithPagination;
    public function render(Request $request){
        $data = $request->session()->all();
        $order_status = DB::table('order_status as os')
            ->where('name','=','Completed')
            ->first();
        $customer_order = DB::table('orders as o')
        ->select(
            'o.id as id',
            'os.name as order_status',
            'o.total_price',
            'o.date_created as date_created',
            "u.first_name",
            "u.middle_name",
            "u.last_name",
            "u.email" ,
        )
        ->where('order_by','=',$data['id'])
        ->where('status','=',$order_status->id)
        ->join('order_status as os','os.id','o.status')
        ->join('users as u','u.id','o.order_by')
        ->orderBy('o.date_created')
        ->paginate(10);
        return view('livewire.customer.order.complete-order.complete-order',[
            'customer_order'=>$customer_order
        ])
        ->layout('components.layouts.customer');
    }
}
