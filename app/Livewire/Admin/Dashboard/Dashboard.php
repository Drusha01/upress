<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination; 

class Dashboard extends Component
{
    public $dashboard = [
        'no_of_customer' => 0,
        'no_of_products'=> 0,
        'no_of_complete_orders'=> 0,
        'total_product_revenue' => 0,
        'total_service_revenue'=> 0,
        'product_revenue'=>[],
        'total_amount_revenue'=> 0,
        'current_year'=> NULL,
        'years'=> [],
        'order_status'=> [],
        'avail_service_status'=>[],
    ];
    public function mount(){
        $years = DB::table('orders')
            ->select(DB::raw('YEAR(date_created) as year'))
            ->orderBy(DB::raw('YEAR(date_created)'), 'desc')
            ->get()
            ->toArray();
        
        $current_year = DB::table('orders')
            ->select(DB::raw('YEAR(date_created) as current_year'))
            ->first();
    
        if($years){
            $this->dashboard['years'] = $years;
        }
    
        if($current_year){
            $this->dashboard['current_year'] = $current_year->current_year;
        }
    }
    
    public function render()
    {
        $no_of_customer = DB::table('users as u')
            ->select(DB::raw('count(*) as no_of_customer'))
            ->join('roles as r','r.id','u.role_id')
            ->where('r.name','=','customer')
            ->where(DB::raw('YEAR(u.date_created)'),'=',$this->dashboard['current_year'])
            ->first();
        if($no_of_customer->no_of_customer){
            $this->dashboard['no_of_customer'] = $no_of_customer->no_of_customer;
        }
        $no_of_complete_orders = DB::table('orders as o')
            ->select(DB::raw('count(*) as no_of_complete_orders'))
            ->join('order_status as os','os.id','o.status')
            ->where('os.name','=','Completed')
            ->where(DB::raw('YEAR(o.date_created)'),'=',$this->dashboard['current_year'])
            ->first();
        if($no_of_complete_orders->no_of_complete_orders){
            $this->dashboard['no_of_complete_orders'] = $no_of_complete_orders->no_of_complete_orders;
        }
        $total_product_revenue =  DB::table('orders as o')
            ->select(DB::raw('sum(o.total_price) as total_product_revenue'))
            ->join('order_status as os','os.id','o.status')
            ->where(DB::raw('YEAR(o.date_created)'),'=',$this->dashboard['current_year'])
            ->where('os.name','=','Completed')
            ->first();
        if($total_product_revenue->total_product_revenue){
            $this->dashboard['total_product_revenue'] = $total_product_revenue->total_product_revenue;
        }
        $total_service_revenue = DB::table('availed_service_items as asi')
            ->select(DB::raw('sum(asi.total_price) as total_service_revenue'))
            ->join('availed_services as avs','avs.id','asi.avail_service_id')
            ->join('service_status as ss','ss.id','avs.service_status_id')
            ->where(DB::raw('YEAR(asi.date_created)'),'=',$this->dashboard['current_year'])
            ->where('ss.name','=','Completed')
            ->first();
        if($total_service_revenue->total_service_revenue){
            $this->dashboard['total_service_revenue'] = $total_service_revenue->total_service_revenue;
        }
        $no_of_products = DB::table('products as p')
            ->select(DB::raw('count(*) as no_of_products'))
            ->where(DB::raw('YEAR(p.date_created)'),'=',$this->dashboard['current_year'])
            ->first();
        if($no_of_products->no_of_products){
            $this->dashboard['no_of_products'] = $no_of_products->no_of_products;
        }
        $order_status = DB::table('orders as o')
            ->select(
                DB::raw('count(*) as count'),
                'os.id',
                'os.name')
            ->join('order_status as os','os.id','o.status')
            ->where(DB::raw('YEAR(o.date_updated)'),'=',$this->dashboard['current_year'])
            ->groupBy('os.id')
            ->orderBy(DB::raw('count(*)'),'desc')
            ->get()
            ->toArray();
        if($order_status){
            $this->dashboard['order_status'] = $order_status;
        }
        $avail_service_status = DB::table('availed_services as avs')
            ->select(
                DB::raw('count(*) as count'),
                'ss.id',
                'ss.name'
            )
            ->join('service_status as ss','ss.id','avs.service_status_id')
            ->where(DB::raw('YEAR(avs.date_updated)'),'=',$this->dashboard['current_year'])
            ->groupBy('ss.id')
            ->orderBy(DB::raw('count(*)'),'desc')
            ->get()
            ->toArray();
        if($avail_service_status){
            $this->dashboard['avail_service_status'] = $avail_service_status;
        }
        $product_revenue = DB::table('orders as o')
            ->select(
                DB::raw('MONTHNAME(o.date_updated) as month'),
                DB::raw('sum(total_price) as total')
            )
            ->join('order_status as os','os.id','o.status')
            ->groupBy(DB::raw('MONTHNAME(o.date_updated)'))
            ->orderBy(DB::raw('MONTHNAME(o.date_updated)'),'asc')
            ->where(DB::raw('YEAR(o.date_updated)'),'=',$this->dashboard['current_year']) 
            ->where('os.name','=','Completed')
            ->get()
            ->toArray();
        if($product_revenue){
            $this->dashboard['product_revenue'] = $product_revenue;
        }
        // dd($this->dashboard);
        return view('livewire.admin.dashboard.dashboard')
        ->layout('components.layouts.admin');
    }
}
