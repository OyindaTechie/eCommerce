<?php

namespace App\Http\Controllers;

use App\transaction;
use App\verify_ticket;
use Illuminate\Http\Request;

class createTransaction extends Controller
{
    //
    public function posttransaction(Request $request){

        // Available alpha caracters
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
$strng = str_shuffle($pin);


     $posttransact = new transaction();
     
     $posttransact->transaction_id = $strng;
     $posttransact->source = $request->source;
     $posttransact->destination = $request->destination;
     $posttransact->fees = $request->fees;
     $posttransact->amount_paid = $request->amount_paid;
     $posttransact->source = $request->source;
     $posttransact->phone_number = $request->phone_number;
     
     $posttransact->save();
     
     $str = str_shuffle($pin);
     $verify_ticket = new verify_ticket();
     $verify_ticket->ticket_id = $str; //rand(2,50);
     $verify_ticket->transaction_id =   $posttransact->transaction_id;
     $verify_ticket->amount_paid = $posttransact->amount_paid;

     $verify_ticket->save(); 

 
     return response()->json([
         "message" => "transaction record created"
     ], 201);
    }
}
