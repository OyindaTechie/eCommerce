<?php

namespace App\Http\Controllers;

use App\Device;
use App\Registration;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function RegisterForm(){

        return view('Register');
    }
    public function Register(Request $request){

        Registration::create([
            'name' => $request->firstname_lastname,
            'phone' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'username' => $request->username,
            'password' => Hash::make($request->password)

            ]);

            echo "User created successfully.<br/>";
            echo '<a href = "/loginform">Click Here</a> to login and purchase online.';
    }

    public function Login(Request $request){


        $username = Registration::where('username',$request->username)->first();


     if(!$username){

         echo "customer not registered";
         echo '<a href = "/loginform">Click Here</a> to login and purchase online.';

     }

     else if( !Hash::check($request->password,$username->password )){

		echo "password does not match";
        echo '<a href = "/loginform">Click Here</a> to login and purchase online.';

	}

    else{
        $username = Registration::where('username',$request->username)->first();
        $laptopdevices_name = Device::where('device_id', 1)->first();
        $phonedevices_name = Device::where('device_id', 2)->first();
        $chargerdevices_name = Device::where('device_id', 3)->first();

       //return view('purchase', ['devices'=>$devices]);
        return view('purchase',compact('laptopdevices_name',
        'phonedevices_name', 'chargerdevices_name', 'username'
    ));
    }

    }

public function Transaction(Request $request){



 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
$strng = str_shuffle($pin);



    $devicecount = 1;

    $deviceexist = Transaction::where(['device_bought'=>$request->devicename,
    'username'=>$request->username])->first();


    if($deviceexist){



        Transaction::where('id',$deviceexist->id)->update(['device_count'=> ($deviceexist->device_count + 1),
        'device_total_cost' => (($deviceexist->device_count + 1) * $request->devicecost),
        'status' => "bought",
        'purchase_date' => Carbon::now()]);


    }

    else{


    Transaction::create([
         'id' => $strng,
        'username' => $request->username,
        'device_bought' => $request->devicename,
        'device_count'=> $devicecount,
        'device_total_cost' => ($devicecount * $request->devicecost),
        'status' => "bought",
        'purchase_date' => Carbon::now()

        ]);
}



$data['transactdetails'] = Transaction::where('username', $request->username)->get();

$data['purchasecount'] = Transaction::where('username', $request->username)->whereNotNull('device_count')->get();

$data['returnedcount'] = Transaction::where('username', $request->username)->whereNotNull('returned_date')->count();


//$purchasesum = array_sum($purchasecount);

echo "transaction successful, go can back to make more purchase";

foreach($data['purchasecount'] as $purchasecounts){

    $purchase[] = $purchasecounts->device_count;

}

$data['totalpurchase'] = array_sum($purchase);



return view('userdashboard',$data);
// "transaction successful, go back to make more purchase";

}

public function ReturnItem(Request $request){

    $devicereturned = Transaction::where('id', $request->transactid)->first();
    Transaction::where('id', $request->transactid)->update([
    'device_count'=>($devicereturned->device_count - 1),
    'device_total_cost'=>($devicereturned->device_total_cost - (($request->totalcost)/($request->count))),
    'returned_date'=>carbon::now()]);

    echo "successful";
}

}
