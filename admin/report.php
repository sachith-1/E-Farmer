<?php
session_start();
if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
  header("Location:login.php");
}

include_once("../includes/DbConn.php");
if (mysqli_connect_errno()) {
  echo "mysqli error " . mysqli_connect_errno();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewp rt" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hiruki AutoMart | Month Report</title>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <?php
  $vhsum = 0;
  $psum = 0;
  $query = "SELECT car.PreOderPrice,preoder.qty from preoder inner join car on preoder.carID = car.carID where isPaid = 2 ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {

    $vhsum += $row['PreOderPrice'] * $row['qty'];
  }



  $query = "SELECT part.price,oder.qty from oder inner join part on oder.partID = part.partID where isPaid = 2 ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {

    $psum += $row['price'] * $row['qty'];
  }



  echo "<script>";
  echo "function drawChart() {

							var data = google.visualization.arrayToDataTable([
							  ['Type', 'Income'],
							  ['Vehicle', $vhsum],
							  ['Spare parts', $psum],
							  
							]);

							var options = {
							  title: 'Total Income'
							};

							var chart = new google.visualization.PieChart(document.getElementById('piechart'));

							chart.draw(data, options);
						  }";

  echo "</script>";


  ?>
  <?php
  echo "<script>";
  echo "function drawChart2() {
						var data = google.visualization.arrayToDataTable([
						  ['Slot', 'No of Test Drives'],";

  $query = "SELECT date,sl1,sl2,sl3,sl4,sl5,sl6,sl7 FROM testdrivedates";
  $result = mysqli_query($conn, $query);
  $data = "";
  $counter = mysqli_num_rows($result);
  $i = 1;
  while ($row = mysqli_fetch_assoc($result)) {

    $sl1 = $row['sl1'];
    $sl2 = $row['sl2'];
    $sl3 = $row['sl3'];
    $sl4 = $row['sl4'];
    $sl5 = $row['sl5'];
    $sl6 = $row['sl6'];
    $sl7 = $row['sl7'];
    $total = $sl1 + $sl2 + $sl3 + $sl4 + $sl5 + $sl6 + $sl7;
    $date = $row['date'];
    if ($i == $counter) {
      $data .= "['$date',$total]";
    } else {
      $data .= "['$date',$total],";
    }

    $i += 1;
  }


  echo $data . "  
						]);

						var options = {
						  title: 'Test Drive',
						  curveType: 'function',
						  legend: { position: 'bottom' }
						};

						var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

						chart.draw(data, options);
					  }";


  echo "</script>";




  ?>






</head>

<body>
  <link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css" />
  <div class="container">
    </br>
    <div id="content">
      <h1 class="text-center">Hiruki Auto Mart - Report</h1>
      </br>
      <div class="row">
        <div class="col-sm-6">
          <?php $date = date("Y-m-d");
          echo "Date: " . $date;
          ?>
        </div>
        <div id="editor"></div>
        <div class="col-sm-6"><button onclick="this.style.visibility= 'hidden';window.print();" id="exportButton" class="btn btn-lg btn-danger clearfix float-right"><span class="fa fa-file-pdf-o"></span> Export to PDF</button></div>
      </div>
      <div class="row">
        <div class="col-sm-6" id="piechart" style="width: 900px; height: 500px;"></div>
        <div class="col-sm-6" id="curve_chart" style="width: 900px; height: 500px"></div>
      </div>



      </br>

      <!--CAR ORDERS -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title text-center">
            Available Cars
          </h3>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Car ID</th>
                  <th>Name</th>
                  <th>Brand</th>
                  <th>Color</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $query = "select carID, name ,colour, brand from car";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>" . $row['carID'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['colour'] . "</td>";
                  echo "<td>" . $row['brand'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>


      <!--Car Parts -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title text-center">
            Spare Parts
          </h3>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Part ID</th>
                  <th>Name</th>
                  <th>year</th>
                  <th>Brand</th>
                  <th>Quantity</th>
                  <th>Discription</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $query = "select partID, name ,year,brand,qty,disc from part";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>" . $row['partID'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['year'] . "</td>";
                  echo "<td>" . $row['brand'] . "</td>";
                  echo "<td>" . $row['qty'] . "</td>";
                  echo "<td>" . $row['disc'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!--spare parts Order -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title text-center">
            Paid Spare parts Orders
          </h3>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer Name</th>
                  <th>Part Name</th>
                  <th>Payment</th>
                  <th>Quantity</th>

                </tr>
              </thead>
              <tbody>
                <?php

                //$query = "select oderID,custID,partID,paymentID,qty from oder";
                $query = "SELECT  oderID,customer.fname,part.name,payment.amount,oder.qty from oder inner join customer on
						           oder.custID = customer.custID inner join part on oder.partID = part.partID
                                    inner join payment on oder.paymentID = payment.paymentID where isPaid = 2 ";

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>" . $row['oderID'] . "</td>";
                  echo "<td>" . $row['fname'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['amount'] . "</td>";
                  echo "<td>" . $row['qty'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!--spare parts Order -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title text-center">
            Paid Car pre-Orders
          </h3>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Pre - Order ID</th>
                  <th>Customer Name</th>
                  <th>Part Name</th>
                  <th>Payment</th>
                  <th>Quantity</th>

                </tr>
              </thead>
              <tbody>
                <?php

                //$query = "select oderID,custID,partID,paymentID,qty from oder";
                $query = "SELECT  preoderID,customer.fname,car.name,payment.amount,preoder.qty from preoder inner join customer on
						           preoder.custID = customer.custID inner join car on preoder.carID = car.carID
                                    inner join payment on preoder.paymentID = payment.paymentID where isPaid = 2 ";

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>" . $row['preoderID'] . "</td>";
                  echo "<td>" . $row['fname'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['amount'] . "</td>";
                  echo "<td>" . $row['qty'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>


      </div>

    </div>
  </div>

  </div>

  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);


    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart2);
  </script>

  <script>
    function myFunction() {

      //window.print();
      //this.style.visibility= 'hidden';
    }
  </script>


  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../styles/bootstrap4/popper.js"></script>
  <script src="../styles/bootstrap4/bootstrap.min.js"></script>
  <script src="../plugins/greensock/TweenMax.min.js"></script>
</body>

</html>