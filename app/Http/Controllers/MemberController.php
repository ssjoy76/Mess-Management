<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\MemberSoft;
//use DB;

class MemberController extends BaseController
{

    public function config(){
        $this->crud_model = '\App\member'; // model namespace
        $this->crud_url = url('member'); // crud url
        $this->crud_view = 'member'; // blade view directory name
        $this->crud_name = 'Member'; // crud module name
        
        // extra optional data, it will pass to every blade view
        $this->data['copyright'] = 'copyright 2008, developed by sadik';
        // $this->data['members'] = DB::table('members')->get()->keyBy('id')->array(); 
    }


    public function save(MemberSoft $request) // mandatory method for store data
	{
		return $this->saveCrud($request);
    }
    
    public function destroy($id)
    {
        $delete = $this->crud_model::find($id);      
        $delete->delete();
      
        return redirect($this->crud_url . '/index')->with(['flash_message' => 'deleted successfuly!']);
    }


}
