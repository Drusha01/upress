<?php

namespace App\Livewire\Components\AdminHeader;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AdminHeader extends Component
{
    public function render(Request $request)
    {
        $session = $request->session()->all();
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
        return view('livewire.components.admin-header.admin-header',[
            'user_info'=>$user_info
        ]);
    }
}
