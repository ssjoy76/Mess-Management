<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SummeryReportController extends Controller
{
    public $data = [];
 
    function __construct(){
        $this->data['crud_name'] = 'Summery report';
        $this->data['crud_url'] = url('report/summery');
    }

    public function summery(Request $request ){

        $inputdate = (!empty($request->month)) ? date('Y-m', strtotime ($request->month)) : date('Y-m');
        $dt = Carbon::parse($inputdate); 
        //dd($dt);
        $this->data['members'] = DB::table('members')->get()->keyBy('id')->toArray(); // member list
        
        $this->data['meals'] = DB::table('mealcounts') // meal list
                            ->select('memberId', DB::raw('SUM(meal_number) as total_meal'))
                            ->where('created_at',  '>=', $inputdate . '-01')
                            ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                            ->groupBy('memberId')                            
                            ->get()->keyBy('memberId')->toArray();                 

        $this->data['bazars'] = DB::table('bazars') // bazar list
                            ->select('memberId', DB::raw('SUM(amount) as total_bazar'))
                            ->where('created_at',  '>=', $inputdate . '-01')
                            ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                            ->groupBy('memberId')
                            ->get()->keyBy('memberId')->toArray();
        
        $this->data['deposits'] = DB::table('deposits') // deposits list
                            ->select('memberId', DB::raw('SUM(amount) as total_deposit'))
                            ->where('created_at',  '>=', $inputdate . '-01')
                            ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                            ->groupBy('memberId')
                            ->get()->keyBy('memberId')->toArray();
        

        $this->data['total_meals'] = DB::table('mealcounts') // meal list
                                    ->select(DB::raw('SUM(meal_number) as total_meal'))
                                    ->where('created_at',  '>=', $inputdate . '-01')
                                    ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                                    ->first();

                                    

        $this->data['total_bazars'] = DB::table('bazars') // meal list
                                    ->select(DB::raw('SUM(amount) as total_amount'))
                                    ->where('created_at',  '>=', $inputdate . '-01')
                                    ->where('created_at',  '<=', $inputdate . '-' . $dt->daysInMonth)
                                    ->first();

       
        $this->data['meal_rate'] = $this->data['total_bazars']->total_amount / $this->data['total_meals']->total_meal;


        $this->data['dates'] = []; // date list
        
        for($d = 1; $d <= $dt->daysInMonth; $d++){
            $date = $inputdate . '-' . str_pad($d, 2, '0', STR_PAD_LEFT);
            $this->data['dates'][] = $date;
        }

        
        $this->data['costs'] = $this->data['balance'] = [];

        foreach($this->data['members'] as $member){
            $this->data['costs'][$member->id] = (isset($this->data['meals'][$member->id]))
                                                ? floor($this->data['meal_rate'] * $this->data['meals'][$member->id]->total_meal)
                                                : 0;

            $this->data['balance'][$member->id] = 
            
            ((isset($this->data['deposits'][$member->id])) ? $this->data['deposits'][$member->id]->total_deposit : 0)
                                                - $this->data['costs'][$member->id];

        }

        //dd($this->data['balance']);
    
        return view('report.summery', $this->data);        

    }

}
