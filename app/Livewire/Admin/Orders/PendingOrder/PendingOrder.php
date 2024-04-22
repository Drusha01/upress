<?php

namespace App\Livewire\Admin\Orders\PendingOrder;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination; 

class PendingOrder extends Component
{
    use WithPagination;
    public $order_details = [
        'order_id'=> NULL,
        'customer_order'=> [],
        'order_items'=> [],
        'error'=> NULL,
    ];
    public $user_id;
    public function mount(Request $request){
        $session = $request->session()->all();
        $this->user_id = $session['id'];
    }
    public function render()
    {
        $order_status = DB::table('order_status')
            ->where('name','=','Pending')
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
            ->where('o.status','=',$order_status->id)
            ->join('order_status as os','os.id','o.status')
            ->join('users as u','u.id','o.order_by')
            ->orderBy('o.date_created')
            ->paginate(10);
        return view('livewire.admin.orders.pending-order.pending-order',[
            'customer_order'=>$customer_order,
        ])
        ->layout('components.layouts.admin');
    }
    public function view_order($id,$modal_id){
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
                "u.college_id",
                "c.name as college_name",
                "u.department_id",
                "d.name as department_name",
                "u.is_active",
                "u.date_created",
                "u.date_updated",
            )
            ->join('order_status as os','os.id','o.status')
            ->join('users as u','u.id','o.order_by')
            ->join('colleges as c','u.college_id','c.id')
            ->join('departments as d','u.department_id','d.id')
            ->where('o.id','=',$id)
            ->first();
        $order_items = DB::table('order_items as oi')
            ->select(
                'product_stock_id',
                DB::raw('SUM(oi.quantity) as quantity'),
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
            ->join('product_stocks as ps','ps.id','oi.product_stock_id')
            ->join('products as p','p.id','ps.product_id')
            ->join('product_sizes as psz','psz.id','ps.product_size_id')
            ->join('product_colors as pc','pc.id','ps.product_color_id')
            ->where('order_id','=',$customer_order->id)
            ->groupby('product_stock_id')
            ->get()
            ->toArray();
        $this->order_details = [
            'order_id'=> $id,
            'customer_order'=> $customer_order,
            'order_items'=> $order_items,
        ];
        $this->dispatch('openModal',$modal_id);
    }
    public function save_decline_order($id,$modal_id){
        $order_status = DB::table('order_status')
            ->where('name','=','Declined')
            ->first();
        if(DB::table('orders')
            ->where('id','=',$id)
            ->update([
                'status'=>$order_status->id
            ])){
            $this->dispatch('closeModal',$modal_id);
        }
    }
    public function save_confirm_order($id,$modal_id){
        $order_status = DB::table('order_status')
            ->where('name','=','Confirmed')
            ->first();
        $order_items = DB::table('order_items as oi')
            ->select(
                'product_stock_id',
                DB::raw('SUM(oi.quantity) as quantity'),
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
            ->join('product_stocks as ps','ps.id','oi.product_stock_id')
            ->join('products as p','p.id','ps.product_id')
            ->join('product_sizes as psz','psz.id','ps.product_size_id')
            ->join('product_colors as pc','pc.id','ps.product_color_id')
            ->where('order_id','=',$id)
            ->groupby('product_stock_id')
            ->get()
            ->toArray();
        if(DB::table('orders')
            ->where('id','=',$id)
            ->update([
                'status'=>$order_status->id
            ])){

            // check if we have stock
            foreach($order_items as $key => $value){
                $current_stock = DB::table('product_stocks as ps')
                ->where('ps.id','=',$value->product_stock_id)
                ->first();
                if($value->quantity > $current_stock->quantity){
                    $this->order_details['error'] = "Product ".$value->product_name.' has only '.$current_stock->quantity.' it is not adequate for the order';
                    return;
                }
            }
            // stock out
            foreach($order_items as $key => $value){
                $current_stock = DB::table('product_stocks as ps')
                ->where('ps.id','=',$value->product_stock_id)
                ->first();
                if($current_stock ){
                    DB::table('product_stocks as ps')
                    ->where('ps.id','=',$value->product_stock_id)
                    ->update([
                        'quantity'=>$current_stock->quantity - $value->quantity
                    ]);
                }
                DB::table('stockin_stockout_records')
                ->insert([
                    'product_stock_id' => $value->product_stock_id,
                    'stock_type_id' => 2,
                    'stock_by' => $this->user_id,
                    'quantity' => $value->quantity,
                ]);
            }
          
            $this->dispatch('closeModal',$modal_id);
        }
    }
}
