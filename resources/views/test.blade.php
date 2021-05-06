<html>
<head> 
<title>Test </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>
<h1> We are testing</h1>  

<h2> <button type="button" class="btn btn-secondary">Primary</button>  </h2>
<h2>JavaScript in Body</h2>

<h2>My name is {{$name}} </h2>

<p id="demo">A Paragraph</p>

    <table> 

        <tr> 
            <td> <input type ="text" placeholder="enter reference no" id="refno"/> </td>
            <td> 
                <button type="button" id="myBtn">Send</button> </td>
        </tr>
    </table>




<script>

    
    $(document).ready(() => {
        // Get value on button click and show alert
        $("#myBtn").click(() => {
            var str = $("#refno").val();
             //this.strr = $("#refno").val();
           // alert(str);
            this.GetRequestFunction(str);
           

            
        });
    });

    function GetRequestFunction(str){


        
        //const axios = require('axios');
        //https://api.paystack.co/transaction/verify/7PVGX8MEk85tgeEpVDtD
        axios.get('https://api.paystack.co/transaction/verify/'+str, {
            headers: {
               'Authorization': 'Bearer sk_test_5143dcc230337c8503fac2972c6ca11406029955',
               'Content-Type': 'application/json',
               'Accept': 'application/json'
            }
          })
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          }); 
    }
    



  

 /*const axios = require('axios');

function GetRequestFunction() {
  
  
  this.axios.get('https://api.paystack.co/transaction/verify/7PVGX8MEk85tgeEpVDtD',{
    headers: {
      'Authorization': 'Bearer sk_test_5143dcc230337c8503fac2972c6ca11406029955',
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    }
  })
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

} */
</script>
</body>
</html>