<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request as Request;


abstract class BaseController extends Controller
{
    public $data = [];
    public $request = [];
    protected $fillable = [];
    
    protected $crud_model = 'not_defined';
    protected $crud_url = 'not_defined';
    protected $crud_name = 'not_defined';
    protected $crud_view = 'not_defined';

    function __construct(){
        $this->config();

        $this->data['crud_name'] = $this->crud_name;
        $this->data['crud_url'] = $this->crud_url;
    }


    public function config(){

    }    

    protected function fillable(){
        $model = new $this->crud_model;
        return $model->fillable;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['action_name'] = 'List';
        $this->data['rows'] = $this->crud_model::all();
        return view($this->crud_view . '.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = null)
    {
        $this->data['action_name'] = ($id == null) ? 'Create' : 'Edit';

        $this->data['row'] = $this->crud_model::find($id);
        return view ($this->crud_view . '.form',$this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $this->data['action_name'] = 'Details';
        $this->data['row'] = $this->crud_model::find($id);
        return view($this->crud_view . '.detail',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveCrud($request)
    {
       // dd($this->fillable());
        //dd(array_flip($this->fillable()));
        // dd($request->all());
        // dd($request->validated());

        $insert_data = array_intersect_key($request->validated(), array_flip($this->fillable())); 
       // dd(array_flip($this->fillable()));
       //dd($insert_data);

        $save = $this->crud_model::firstOrNew(['id' => $request->id]); //db column name => value
        //dd($request->id);    
        $save->fill($insert_data);
        $save->save();

        return redirect($this->crud_url . '/index');
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

}
