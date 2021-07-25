<?php

session_start();
if (!isset($_SESSION['nic']) || empty($_SESSION['nic'])) {
  header("Location:login.php");
  exit();
}

include_once("../includes/DbConn.php");
if (mysqli_connect_errno()) {
  echo "mysqli error " . mysqli_connect_errno();
}

include_once("../includes/dbConn.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewp rt" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-Farmer | Dashboard</title>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" data-auto-collapse-size="997" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="Dashboard.php" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-light-green elevation-4">

      <a href=" Dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light">DashBoard</span>
      </a>


      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image mt-1">
            <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
          </div>
          <div class="info">
            <!-- Logged User -->

            <?php
            $nic = $_SESSION['nic'];
            $type = $_SESSION['type'];
            $query = null;
            if ($_SESSION['type'] == "Representative") {
              $query = "select fname from rep where NIC='$nic'";
            } else if ($_SESSION['type'] == "Admin") {
              $query = "select fname from admin where NIC='$nic'";
            }
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              $fname = $row['fname'];
              echo "<a href='webPages/accountSettings.php' class='d-block'>$fname</a>";
            }
            ?>
            <!-- <a href='webPages/accountSettings.php' class='d-block'>Piyumi</a> -->
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="./webPages/priceIndexes.php" class="nav-link">
                <i class="nav-icon fas fa-tags" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Price Indexes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/report.php" class="nav-link">
                  <i class="fas fa-file-invoice fa-lg" style="color:rgb(11, 221, 123);margin-right:12px;"></i>
                  <p>
                      Reports
                  </p>
              </a>
            </li>
            <li class="nav-header">Crops</li>
            <li class="nav-item">
              <a href="./webPages/addCrop.php" class="nav-link">
                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Add Crops
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/viewCrop.php" class="nav-link">
                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                <p>
                  View Crops
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/removeCrop.php" class="nav-link">
                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Remove Crops
                </p>
              </a>
            </li>
            <?php
            if ($_SESSION['type'] == "Admin") {
              echo ('
              <li class="nav-header">Represantative</li>
              <li class="nav-item">
                <a href="./webPages/addRep.php" class="nav-link">
                  <i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>
                  <p>
                    Add Represantatives
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./webPages/viewRep.php" class="nav-link">
                  <i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>
                  <p>
                    View Represantatives
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./webPages/removeRep.php" class="nav-link">
                  <i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>
                  <p>
                    Remove Represantatives
                  </p>
                </a>
              </li>
              ');
            }
            ?>

            <li class="nav-header">Farmers</li>
            <li class="nav-item">
              <a href="./webPages/addFarmer.php" class="nav-link">
                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Add Farmers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/viewFarmer.php" class="nav-link">
                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                <p>
                  View Farmers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/removeFarmer.php" class="nav-link">
                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Remove Farmers
                </p>
              </a>
            </li>
            <li class="nav-header">Buyers</li>
            <li class="nav-item">
              <a href="./webPages/addBuyer.php" class="nav-link">
                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Add Buyers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/viewBuyer.php" class="nav-link">
                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                <p>
                  View Buyers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./webPages/removeBuyer.php" class="nav-link">
                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Remove Buyers
                </p>
              </a>
            </li>
            <li class="nav-header">Account Settings</li>
            <li class="nav-item">
              <a href="webPages/accountSettings.php" class="nav-link">
                <i class="nav-icon fas fa-sliders-h" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Account Settings
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="webPages/changePass.php" class="nav-link">
                <i class="nav-icon fas fa-key" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Password Change
                </p>
              </a>
            </li>
            <li class="divider" style="height: 2px;
          margin: 9px 8px;
          overflow: hidden;
          background-color:
          #dbdada;
          border-bottom: 1px solid
          #ffffff;"></li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt" style="color:rgb(11, 221, 123);"></i>
                <p>
                  Sign Out
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="container text-center">
            <h2 style="color: rgb(64, 187, 64);">Send SMS</h2>
          </div>
          <!-- Fst row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8 col-md-10">
                      <p class="lead pl-3">Send Crop Prices to Farmer</p>
                    </div>
                    <div class="col-4 col-md-2">
                      <input type="button" id="smsSend" onclick="sendSMS()" value="Send" class="btn btn-success px-5">
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-6">
                      <div id="spinner" class=" spinner-border text-primary float-right" style="color: rgb(78, 202, 78)!important;display: none!important" role="status">
                        <span class="sr-only">Sending...</span>
                      </div>
                    </div>
                    <div id="sending" class="col-6" style="display: none!important">
                      <p class="lead">Sending...</p>
                    </div>
                    <div id="proDIV" class="col-12 text-center text-success" style="display: none;">
                      <p class="lead" id="progess"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <h2 style="color: rgb(64, 187, 64);">Price Indexes</h2>
          </div>
          <!-- Scnd row -->
          <div class="row">
            <div class="col-12">

              <!--Items -->
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr class="text-center">
                          <th>Crop ID</th>
                          <th>Crop Name</th>
                          <th>Price per Kg</th>
                          <th>Price Date</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select crop.cID,crop.cname,priceindex.price,priceindex.date from crop,priceindex where crop.cID=priceindex.cid order by priceindex.date DESC limit 10";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo ("<tr class='text-center'>");
                          echo ("<td>");
                          echo ($row["cID"]);
                          echo ("</td>");
                          echo ("<td>");
                          echo ($row["cname"]);
                          echo ("</td>");
                          echo ("<td>");
                          echo ($row["price"]);
                          echo ("</td>");
                          echo ("<td>");
                          echo ($row["date"]);
                          echo ("</td>");
                          echo ("</tr>");
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="webPages/priceIndexes.php">View All Price Indexes</a>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container text-center">
            <h2 style="color: rgb(64, 187, 64);">Recently added Representatives</h2>
          </div>
          <!-- Trd row -->
          <div class="row">
            <div class="col-12">
              <!-- SPARE-PARTS ODERS -->
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr class="text-center">
                          <th>rep ID</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>NIC</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select rID,fname,lname,address,nic from rep order by rID limit 10";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr class='text-center'>";
                          echo "<td>" . $row['rID'] . "</td>";
                          echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                          echo "<td>" . $row['address'] . "</td>";
                          echo "<td>" . $row['nic'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="webPages/sparePartsOders.php">View All Represantatives</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>


  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--Push Menu for slideBar-->
  <script src="dist/js/pushmenu.js"></script>
  <!--Tree View for sidebar dropdown-->
  <script src="dist/js/treeview.js"></script>
  <!--Control SlideBar for header and footer width change with left slidebar-->
  <script src="dist/js/controlslidebar.js"></script>
  <script>
    function sendSMS() {
      document.getElementById("smsSend").disabled = true;
      document.getElementById("spinner").style.display = "block";
      document.getElementById("sending").style.display = "block";
      $.ajax({
        url: "includes/sendSms.php",
        method: "POST",
        data: {},
        success: function(responce) {
          $("#progess").html(responce);
          document.getElementById("proDIV").style.display = "block";
          document.getElementById("smsSend").disabled = false;
          document.getElementById("spinner").style.display = "none";
          document.getElementById("sending").style.display = "none";
        },
        error: function() {
          alert('There was some error performing the AJAX call!');
          console.log("blah");
        }
      });
    }
  </script>


</body>

</html>