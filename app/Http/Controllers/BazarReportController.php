<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class BazarReportController extends Controller
{
    public $data = [];
 
    function __construct(){
        $this->data['crud_name'] = 'Bazar report';
        $this->data['crud_url'] = url('report/bazar');
    }

    public function bazar(){
        $inputdate = (!empty($request->month)) ? date('Y-m', strtotime ($request->month)) : date('Y-m');
        $dt = Carbon::parse($inputdate); 
        // dd($dt);
        $this->data['members'] = DB::table('members')->get()->keyBy('id')->toArray(); // member list
        $this->data['rows'] = DB::table('bazars') // bazar list
                            ->where('created_at',  '>=', $inputdate . '-01')
                            ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                            ->get()->toArray();
        
        
        //dd($this->data['rows']);
        
        $this->data['dates'] = []; // date list
        
        for($d = 1; $d <= $dt->daysInMonth; $d++){
            $date = $inputdate . '-' . str_pad($d, 2, '0', STR_PAD_LEFT);
            $this->data['dates'][] = $date;
        }

      //  dd($this->data['dates']);

        $this->data['reports'] = []; // main bazar report array
        foreach($this->data['rows'] as $row){
            $formated_date = date('Y-m-d', strtotime($row->created_at));
            $this->data['reports'][$formated_date][$row->memberId][] = $row->amount;
            
            $this->data['reports'][$formated_date]['Total'] = 
                                            (isset($this->data['reports'][$formated_date]['Total']))
                                            ? $this->data['reports'][$formated_date]['Total'] + $row->amount
                                            : $row->amount;

            $this->data['reports']['Total'][$row->memberId] = 
                                            (isset($this->data['reports']['Total'][$row->memberId]))
                                            ? $this->data['reports']['Total'][$row->memberId] + $row->amount
                                            : $row->amount;

        }
       // dd($this->data['reports'][$formated_date][$row->memberId]);
        return view('report.bazar', $this->data);        

    }

}
