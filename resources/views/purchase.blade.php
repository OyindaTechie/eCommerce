<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Shopping App </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Welcome to Shopping App {{$username->username}} </h2>
  <br>
  <div class="row">
   
    <div class="col-sm">
     <p> <img src= "{{url('/images/hp_laptop.jpg')}}" width= 283px height= 178px/> </p>
     <form action = "/transact" method = "post" class="form-group" style="width:70%; margin-left:15%;" >

        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
         <p>
          <label name="devicename" > {{ $laptopdevices_name->device_name}} </label>
         </p>
         <p>
          <label name = "devicecost" > # {{ $laptopdevices_name->device_cost}} </label>
         </p>
         <p>
            <input type="hidden" name = "username" value = "{{$username->username}}" />  
           </p>

           <p>
           
          <a style = "background-color: rgb(0, 17, 255); padding: 10px;" href = "/buy/{{ $laptopdevices_name->device_name}}/{{ $laptopdevices_name->device_cost}}/{{$username->username}}">Buy </a>
           </p>
        </form>
       
    </div>
    <div class="col-sm">
    <p> <img src= "{{url('/images/iphone8.jpg')}}" width= 283px height= 378px/> </p>
    <form action = "/transact" method = "post" class="form-group" style="width:70%; margin-left:15%;" >

        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
         <p>
          <label name="devicename" > {{$phonedevices_name->device_name }} </label>
         </p>
         <p>
          <label name = "devicecost" > # {{$phonedevices_name->device_cost }} </label>
         </p>
         
         <p>
           
          <a style = "background-color: rgb(0, 17, 255); padding: 10px;" href = "/buy/{{$phonedevices_name->device_name }}/{{$phonedevices_name->device_cost }}/{{$username->username}}">Buy </a>
           </p>
        </form>
   
    
    </div>
    <div class="col-sm">
    <p> <img src= "{{url('/images/laptop_charger.jpg')}}" width= 283px height= 178px/> </p>
    <form action = "/transact" method = "post" class="form-group" style="width:70%; margin-left:15%;" >

        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
         <p>
          <label name="devicename" > {{ $chargerdevices_name->device_name }} </label>
         </p>
         <p>
          <label name = "devicecost" > # {{ $chargerdevices_name->device_cost }} </label>
         </p>

         <p>
           
          <a style = "background-color: rgb(0, 17, 255); padding: 10px;" href = "/buy/{{ $chargerdevices_name->device_name }}/{{ $chargerdevices_name->device_cost }}/{{$username->username}}">Buy </a>
           </p>

        </form>
    
    
    
    </div>
  </div>

</div>

</body>
</html>