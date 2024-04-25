<?php

namespace App\Livewire\Admin\Services\Approvedservices;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class Approvedservices extends Component
{
    use WithPagination;
    public $error;
    public function mount(Request $request){
        $data = $request->session()->all();
    }
    public $service_availed = [
        'image_proof'=>NULL,
        'availed_services'=>[],
        'availed_service_items'=> []
    ];
    public function render()
    {
        $service_status = DB::table('service_status')
            ->where('name','=','Approved')
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

        return view('livewire.admin.services.approvedservices.approvedservices',[
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
            "avs.image_proof",   
            "u.is_active",
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
                    'asi.id',
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
    public function save_pending_availed_service($id,$modal_id){
        $service_status = DB::table('service_status')
        ->where('name','=','Pending')
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
    public function update_total_price(){
        foreach ($this->service_availed['availed_service_items'] as $key => $value) {
            $this->service_availed['availed_service_items'][$key]->total_price = ($value->quantity * $value->price_per_unit);
        }
    }
    public function save_rtpi_availed_service($id,$modal_id){
        $service_status = DB::table('service_status')
        ->where('name','=','Ready for Pickup')
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
