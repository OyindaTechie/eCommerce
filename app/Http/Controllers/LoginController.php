<?php

namespace App\Http\Controllers;

use App\Registration;
use App\ticket_fee;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login( Request $request){

      /*  $request -> validate([
            'phone_no' => ['required', 'phone_number']
            ]); */
            
            $username = Registration::where('phone_number',$request->phone_no)->first();

           // $user = User::where('email',$request->email)->first();
		
            
        if(!$username){
            /*throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect']
            ]);*/
            return "user not registered";
            
        }

       // return "login successful";
        $ticket_fee_list = ticket_fee::all();
       // return response($ticket_fee_list, 200);

        return response()->json([
            "message" => "login successful",
            $ticket_fee_list
        ], 201); 
    } 
    


}
