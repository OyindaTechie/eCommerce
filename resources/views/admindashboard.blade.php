
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Purchase Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2 class="text-center">View All Your Purchase </h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Username  </th>
        <th>Transaction ID  </th>
        <th>Device Bought </th>
        <th>Count</th>
        <th>Total Cost</th>
        <th>Purchase Date</th>
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($tran as $user)
      <tr>
      <td>{{$user->username}}</td>
      <td>{{$user->id}}</td>
      <td>{{$user->device_bought}}</td>
      <td>{{$user->device_count}}</td>
      <td> #{{$user->device_total_cost}}</td>
       <td>{{$user->purchase_date}}</td>


      </tr>
     @endforeach
    </tbody>
  </table>


<div class="p-5">
    <h5>User Purchase Analytics</h5>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

     var purchased = @php echo $purchasect;  @endphp;
     var returned = @php echo $returnedct;  @endphp;
     var data = google.visualization.arrayToDataTable([
                ['Name', 'Value'],
                ['no purchased' , purchased],
                ['no returned', returned]

              ]);

      var options = {
        title: 'Purchase Details',
        is3D: false,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</div>
</body>
</html>
