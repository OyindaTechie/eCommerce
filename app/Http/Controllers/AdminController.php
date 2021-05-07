<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    //
    public function ViewAllPurchases(){

        $tran = Transaction::all();

        foreach($tran as $t){
            $purchasecount[] = $t->device_count;
        }

        foreach($tran as $t){
            $returnedcount[] = $t->returned_date;
        }

        $collection = collect($returnedcount);

        $filtered = $collection->filter(function ($value, $key) {
            return $value != null;
        });

       $returnedct =  $filtered->count();


        $purchasect = array_sum($purchasecount);




        return view('admindashboard',compact('tran', 'purchasect','returnedct'));
    }
}
