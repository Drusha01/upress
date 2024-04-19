<?php

namespace App\Livewire\Admin\Users\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Admin extends Component
{
    use WithPagination;
    public $user = [
        'id' => NULL,
        'first_name' => NULL,
        'middle_name' => NULL,
        'last_name' => NULL,
        'email' => NULL,
        'contact_no' => NULL,
        'role_id' => NULL,
        'college_id' => NULL,
        'department_id' => NULL,
        'password' => NULL,
        'confirm_password' => NULL,
        'error' => NULL,
    ];
    public function render()
    {
        $roles = DB::table('roles')
            ->where('name','=','admin')
            ->first();

        if(intval($this->user['college_id'])){
            $departments =  DB::table('departments')
            ->where('college_id','=',$this->user['college_id'])
            ->get()
            ->toArray();
        }else{
            $departments = DB::table('departments')
                ->get()
                ->toArray();
        }
        $colleges = DB::table('colleges')
            ->get()
            ->toArray();
        $admin_roles =  DB::table('roles')
            ->where('name','=','admin')
            ->get()
            ->toArray();
        $users_data = [];
        if($roles){
            $this->user['role_id'] = $roles->id;
            $users_data = DB::table('users as u')
                ->select(
                    "u.id",
                    "u.first_name",
                    "u.middle_name",
                    "u.last_name",
                    "u.email" ,
                    "u.image",
                    "u.contact_no",
                    "u.role_id",
                    "u.college_id",
                    "c.name as college_name",
                    "u.department_id",
                    "d.name as department_name",
                    "u.is_active",
                    "u.date_created",
                    "u.date_updated",
                )
                ->join('colleges as c','u.college_id','c.id')
                ->join('departments as d','u.department_id','d.id')
                ->where('role_id','=',$roles->id)
                ->paginate(10);
        }
        return view('livewire.admin.users.admin.admin',[
            'users_data' =>$users_data,
            'departments' =>$departments,
            'colleges' =>$colleges,
            'admin_roles' =>$admin_roles,
            'roles' =>$roles,
            ])
        ->layout('components.layouts.admin');
    }
    public function update_departments(){
        dd('asdfas');
    }
    public function add_user_default($modal_id){
        $this->dispatch('openModal',$modal_id);
    }
    public function add_user($modal_id){
        if(strlen($this->user['first_name'])<= 0){
            $this->user['error'] = "Please Input firstname";
            return;
        }
        if(strlen($this->user['last_name'])<= 0){
            $this->user['error'] = "Please Input lastname";
            return;
        }
        if(strlen($this->user['email'])<= 0){
            $this->user['error'] = "Please Input email";
            return;
        }else{
            if(!filter_var($this->user['email'], FILTER_VALIDATE_EMAIL)){
                $this->user['error'] = "Please Input valid email";
                return;
            }else{
                if(DB::table('users')
                    ->where('email','=',$this->user['email'])
                    ->first()){
                    $this->user['error'] = "Email Exist";
                    return;
                }
            }
        }
        if(strlen($this->user['password'])<= 8){
            $this->user['error'] = "Password must be at least 8";
            return;
        }
        if(strlen($this->user['confirm_password'])<= 8){
            $this->user['error'] = "Password must be at least 8";
            return;
        }
        if($this->user['confirm_password'] != $this->user['password']){
            $this->user['error'] = "Password doesn't match";
            return;
        }
  
        if(!DB::table('colleges')    
            ->where('id','=',$this->user['college_id'])
            ->first()){
            $this->user['error'] = "Please select college";
            return;
        }
        if(!DB::table('departments')    
            ->where('id','=',$this->user['department_id'])
            ->first()){
            $this->user['error'] = "Please select department";
            return;
        }
        if(DB::table('users')
            ->insert([
                'first_name' => $this->user['first_name'],
                'middle_name' => $this->user['middle_name'],
                'last_name' => $this->user['last_name'],
                'email' => $this->user['email'],
                'contact_no' => $this->user['contact_no'],
                'role_id' => $this->user['role_id'],
                'college_id' => $this->user['college_id'],
                'department_id' => $this->user['department_id'],
                'password' => bcrypt($this->user['password']),
        ])){
            $this->dispatch('closeModal',$modal_id);
        }
    }
}
