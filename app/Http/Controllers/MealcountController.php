<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\MealCount ;
use DB;

class MealcountController extends BaseController
{

    public function config(){
        $this->crud_model = '\App\mealcount'; // model namespace
        $this->crud_url = url('mealcount'); // crud url
        $this->crud_view = 'mealcount'; // blade view directory name
        $this->crud_name = 'Meal Count'; // crud module name
        
        // extra optional data, it will pass to every blade view
        $this->data['copyright'] = 'copyright 2008, developed by sadik';
        $this->data['members'] = DB::table('members')->get()->keyBy('id')->toArray(); 
      
        //dd($this->data['members']);

    }


    public function save(MealCount $request) // mendatory method for store data
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
