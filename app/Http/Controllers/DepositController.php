<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\depositSoft;
use DB;

class DepositController extends BaseController
{

    public function config(){
        $this->crud_model = '\App\deposit'; // model namespace
        $this->crud_url = url('deposit'); // crud url
        $this->crud_view = 'deposit'; // blade view directory name
        $this->crud_name = 'deposit'; // crud module name
        
        // extra optional data, it will pass to every blade view
        $this->data['copyright'] = 'copyright 2008, developed by sadik';
        $this->data['members'] = DB::table('members')->get()->keyBy('id')->toArray();
        $this->data['deposits'] = DB::table('deposits')->get()->keyBy('id')->toArray();  
      
        //dd($this->data['members']);

    }


    public function save(depositSoft $request) // mendatory method for store data
	{
		return $this->saveCrud($request);
	}

    public function destroy($id)
    {
        $delete = $this->crud_model::find($id);      
        $delete->delete();
      
        return redirect($this->crud_url . '/index')->with(['flash_message' => 'successful delete!']);
    }


}
