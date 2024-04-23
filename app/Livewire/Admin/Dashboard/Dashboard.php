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
        'total_amount_revenue'=> 0,
    ];
    public function mount(){
        $year = NULL;
        $no_of_customer = DB::table('users as u')
            ->select(DB::raw('count(*) as no_of_customer'))
            ->join('roles as r','r.id','u.role_id')
            ->where('r.name','=','customer')
            ->first();
        if($no_of_customer->no_of_customer){
            $this->dashboard['no_of_customer'] = $no_of_customer->no_of_customer;
        }
        $no_of_complete_orders = DB::table('orders as o')
            ->select(DB::raw('count(*) as no_of_complete_orders'))
            ->join('order_status as os','os.id','o.status')
            ->where('os.name','=','Completed')
            ->first();
        if($no_of_complete_orders->no_of_complete_orders){
            $this->dashboard['no_of_complete_orders'] = $no_of_complete_orders->no_of_complete_orders;
        }
        $total_product_revenue =  DB::table('orders as o')
            ->select(DB::raw('sum(o.total_price) as total_product_revenue'))
            ->join('order_status as os','os.id','o.status')
            ->where('os.name','=','Completed')
            ->first();
        if($total_product_revenue->total_product_revenue){
            $this->dashboard['total_product_revenue'] = $total_product_revenue->total_product_revenue;
        }
        $total_service_revenue = DB::table('availed_service_items as asi')
            ->select(DB::raw('sum(asi.total_price) as total_service_revenue'))
            ->join('availed_services as avs','avs.id','asi.avail_service_id')
            ->join('service_status as ss','ss.id','avs.service_status_id')
            ->where('ss.name','=','Completed')
            ->first();
        if($total_service_revenue->total_service_revenue){
            $this->dashboard['total_service_revenue'] = $total_service_revenue->total_service_revenue;
        }
        $no_of_products = DB::table('products')
            ->select(DB::raw('count(*) as no_of_products'))
            ->first();
        if($no_of_products->no_of_products){
            $this->dashboard['no_of_products'] = $no_of_products->no_of_products;
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard')
        ->layout('components.layouts.admin');
    }
}
