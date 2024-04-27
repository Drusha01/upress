<?php

namespace App\Livewire\Admin\Services\ServicesReadyToPickUp;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ServicesReadyToPickUp extends Component
{
    use WithPagination;
    use WithFileUploads;
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
        ->where('name','=','Ready for Pickup')
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
        return view('livewire.admin.services.services-ready-to-pick-up.services-ready-to-pick-up',[
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
                'proof'=>NULL,
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
    public function save_complete_availed_service($id,$modal_id){
        $valid = true;
        $this->error = NULL;
        foreach ($this->service_availed['availed_service_items'] as $key => $value) {
            if(!floatval($value->quantity) || !floatval($value->price_per_unit)){
                if(!floatval($value->quantity)){
                    $this->error = 'Item no.'.($key +1).' please input quantity, it is requred!';
                    $valid =false;
                    return;
                }
                if(!floatval($value->price_per_unit)){
                    $this->error = 'Item no.'.($key +1).' please input price per unit, it is requred!';
                    $valid =false;
                    return;
                }
                return;
            }
        }
        if($valid){
            $service_availed['image_proof'] = NULL;
            if($this->service_availed['image_proof']){
                $service_availed['image_proof'] = self::save_image($this->service_availed['image_proof'],'services/proof','availed_services','image_proof');
                if($service_availed['image_proof'] == 0){
                    return;
                }
            }
            $service_status = DB::table('service_status')
            ->where('name','=','Completed')
            ->first();
            if($service_status){
                if(DB::table('availed_services')
                    ->where('id','=',$id)
                    ->update([
                        'service_status_id'=>$service_status->id,
                        'image_proof'=>$service_availed['image_proof']
                    ])){
                    $this->dispatch('closeModal',$modal_id);
                }
            }
            // update price, p/u, remarks
            foreach ($this->service_availed['availed_service_items'] as $key => $value) {
                DB::table('availed_service_items as asi')
                    ->where('asi.id','=',$value->id)
                    ->update([
                        'quantity' => intval($this->service_availed['availed_service_items'][$key]->quantity),
                        'price_per_unit' =>floatval($this->service_availed['availed_service_items'][$key]->price_per_unit) ,
                        'total_price' => floatval($this->service_availed['availed_service_items'][$key]->quantity) * floatval($this->service_availed['availed_service_items'][$key]->price_per_unit) ,
                        'remarks' => $this->service_availed['availed_service_items'][$key]->remarks,
                ]);
            }
        }
        $this->dispatch('closeModal',$modal_id);
    }
    public function update_total_price(){
        foreach ($this->service_availed['availed_service_items'] as $key => $value) {
            $this->service_availed['availed_service_items'][$key]->total_price = ($value->quantity * $value->price_per_unit);
        }
    }
    public function save_image($image_file,$folder_name,$table_name,$column_name){
        if($image_file && file_exists(storage_path().'/app/livewire-tmp/'.$image_file->getfilename())){
            $file_extension =$image_file->getClientOriginalExtension();
            $tmp_name = 'livewire-tmp/'.$image_file->getfilename();
            $size = Storage::size($tmp_name);
            $mime = Storage::mimeType($tmp_name);
            $max_image_size = 20 * 1024*1024; // 5 mb
            $file_extensions = array('image/jpeg','image/png','image/jpg');
            
            if($size<= $max_image_size){
                $valid_extension = false;
                foreach ($file_extensions as $value) {
                    if($value == $mime){
                        $valid_extension = true;
                        break;
                    }
                }
                if($valid_extension){
                    // move
                    $new_file_name = md5($tmp_name).'.'.$file_extension;
                    while(DB::table($table_name)
                    ->where([$column_name=> $new_file_name])
                    ->first()){
                        $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                    }
                    if(Storage::move($tmp_name, 'public/content/'.$folder_name.'/'.$new_file_name)){
                        return $new_file_name;
                    }
                }else{
                    $this->dispatch('swal:redirect',
                        position         									: 'center',
                        icon              									: 'warning',
                        title             									: 'Invalid image type!',
                        showConfirmButton 									: 'true',
                        timer             									: '1000',
                        link              									: '#'
                    );
                    return 0;
                }
            }else{
                $this->dispatch('swal:redirect',
                    position         									: 'center',
                    icon              									: 'warning',
                    title             									: 'Image is too large!',
                    showConfirmButton 									: 'true',
                    timer             									: '1000',
                    link              									: '#'
                );
                return 0;
            } 
        }
        return 0;
    }
}
