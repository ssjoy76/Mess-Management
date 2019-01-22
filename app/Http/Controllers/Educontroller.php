<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Educontroller extends Controller
{
    public function fee(){

        $fee = DB::table('fee_monthly')->get();
        foreach($fee as $data){
           
           $query = DB::table('edu_students')   
                    ->select(['fee_tuition'])
                    ->where('class_roll', $data->class_roll)
                    ->first();

            if((isset($query->fee_tuition)) && $query->fee_tuition == ''){
                                
                DB::table('edu_students')->where('class_roll', $data->class_roll)->update(['fee_tuition' => $data->amount]);
				echo $data->class_roll . ' - ' . $data->amount . ' - ' . $query->fee_tuition;
				echo '<br/>';
                
            }

        }
        

    }


}
