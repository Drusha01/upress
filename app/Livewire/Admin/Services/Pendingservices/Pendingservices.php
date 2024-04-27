<?php

namespace App\Livewire\Admin\Services\Pendingservices;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Pendingservices extends Component
{
    use WithPagination;
    public function mount(Request $request){
        $data = $request->session()->all();
    }
    public $error;
    public $service_availed = [
        'image_proof'=>NULL,
        'availed_services'=>[],
        'availed_service_items'=> []
    ];
    public function render()
    {
        $service_status = DB::table('service_status')
        ->where('name','=','Pending')
        ->first();
    $availed_services = DB::table('availed_services as avs')
        ->select(
            'avs.id',
            "u.first_name",
            "u.middle_name",
            "u.last_name",
            "u.email" ,
            "ss.name as service_status"
        )
        ->join('service_status as ss','ss.id','avs.service_status_id')
        ->join('users as u','u.id','avs.customer_id')
        ->where('service_status_id','=',$service_status->id)
        ->orderBy('avs.date_created','desc')
        ->paginate(10);
        return view('livewire.admin.services.pendingservices.pendingservices',[
            'availed_services'=>$availed_services
        ])
        ->layout('components.layouts.admin');
    }
    public function view_availed_service($id,$modal_id){
        $availed_services = DB::table('availed_services as avs')
        ->select(
            'avs.id',
            "u.first_name",
            "u.middle_name",
            "u.last_name",
            "u.email" ,
            "ss.name as service_status",
            "c.name as college_name",
            "u.department_id",
            "d.name as department_name",
            "u.is_active",
            "avs.image_proof",            
            "avs.date_created",
            "avs.date_updated",
        )
        ->join('service_status as ss','ss.id','avs.service_status_id')
        ->join('users as u','u.id','avs.customer_id')
        ->join('colleges as c','u.college_id','c.id')
        ->join('departments as d','u.department_id','d.id')
        ->where('avs.id','=',$id)
        ->first();
        if(  $availed_services ){
            $availed_service_items = DB::table('availed_service_items as asi')
                ->select(
                    's.id as service_id',
                    's.name as service_name',
                    's.is_active',
                    's.image as service_image',
                    's.description as service_description',
                    "asi.service_id",
                    "asi.quantity",
                    "asi.price_per_unit",
                    "asi.total_price",
                    "asi.remarks",
                )
            ->join('services as s','s.id','asi.service_id')
            ->where('avail_service_id','=',$availed_services->id)
            ->get()
            ->toArray();
            $this->service_availed = [
                'availed_services'=>$availed_services,
                'availed_service_items'=> $availed_service_items
            ];
        }
        $this->dispatch('openModal',$modal_id);
    }
    public function save_approve_availed_service($id,$modal_id){
        $service_status = DB::table('service_status')
        ->where('name','=','Approved')
        ->first();
        $valid =true;
        foreach ($this->service_availed['availed_service_items'] as $key => $value) {
            if( !$value->is_active){
                $this->error = 'Item no.'.($key +1).' Service '.$value->service_name.' is not currently available, kindly decline the service!';
                $valid =false;
                return;
            }
        }
        if( $valid){
            if($service_status){
                if(DB::table('availed_services')
                    ->where('id','=',$id)
                    ->update([
                        'service_status_id'=>$service_status->id
                    ])){
                    $this->dispatch('closeModal',$modal_id);
                }
            }
        }
    }
    public function save_decline_availed_service($id,$modal_id){
        $service_status = DB::table('service_status')
        ->where('name','=','Declined')
        ->first();
        if($service_status){
            if(DB::table('availed_services')
                ->where('id','=',$id)
                ->update([
                    'service_status_id'=>$service_status->id
                ])){
                $this->dispatch('closeModal',$modal_id);
            }
        }
    }
}
