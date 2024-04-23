<?php

namespace App\Livewire\Customer\Services\ServicesCart;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ServicesCart extends Component
{
    use WithPagination;
    public $user_id;
    public $service_cart_id = NULL;
    public $error = NULL;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->user_id = $data['id'];
    }
    public function render()
    {
        $service_cart = DB::table('services_cart as sc')
            ->select(
                'sc.id',
                's.name as service_name',
                's.is_active',
                's.image as service_image',
                's.description as service_description'
            )
            ->join('services as s','s.id','sc.service_id')
            ->where('customer_id','=',$this->user_id)
            ->get()
            ->toArray();
        return view('livewire.customer.services.services-cart.services-cart',[
            'service_cart'=>$service_cart
        ])
        ->layout('components.layouts.customer');
    }
    public function remove_item_default($id,$modal_id){
        $this->service_cart_id = $id;
        $this->dispatch('openModal',$modal_id);
    }
    public function remove_item(Request $request,$id,$modal_id){
        if(DB::table('services_cart')
        ->where('customer_id','=',$this->user_id)
        ->where('id','=',$id)
        ->delete()){
            $this->dispatch('closeModal',$modal_id);
        }
    }
    public function avail_service(){
        $service_cart = DB::table('services_cart as sc')
        ->select(
            'sc.id',
            's.id as service_id',
            's.name as service_name',
            's.is_active',
            's.image as service_image',
            's.description as service_description'
        )
        ->join('services as s','s.id','sc.service_id')
        ->where('customer_id','=',$this->user_id)
        ->get()
        ->toArray();

        $valid = true;
        foreach ($service_cart as $key => $value) {
            if(!$value->is_active){
                $valid = false;
                $this->error = 'Item no.'.($key +1).' Service '.$value->service_name.' is not currently available, kindly remove it in the list';
                return;
            }
        }
        if( $valid ){
            $service_status = DB::table('service_status')
                ->where('name','=','Pending')
                ->first();
            if(DB::table('availed_services')
            ->insert([
                'customer_id' =>  $this->user_id,
                'service_status_id' =>  $service_status->id,
           ])){
                $availed_service = DB::table('availed_services')
                ->where('customer_id','=',$this->user_id)
                ->orderBy('date_created','desc')
                ->first();
                if($availed_service){
                    foreach ($service_cart as $key => $value) {
                        DB::table('availed_service_items')
                            ->insert([
                                'customer_id' =>$this->user_id,
                                'avail_service_id' =>$availed_service->id,
                                'service_id' =>$value->service_id
                        ]);
                        DB::table('services_cart')
                        ->where('id','=',$value->id)
                        ->delete();
                    }
                }

            }
        }
    }
}
