<?php include_once("../includes/DbConn.php");
if (mysqli_connect_errno()) {
  echo "mysqli error" . mysqli_connect_errno();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewp rt" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hiruki AutoMart | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!--  style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" data-auto-collapse-size="997" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="Dashboard.php" class="nav-link">Home</a>
        </li>
      </ul>


    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../Dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light">DashBoard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin Name</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class. Dont remove .nov-icon-->

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Cars
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="webPages/addCar.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add new Car</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="webPages/viewCars.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Cars</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                  Spare Parts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add new Spare Part</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Spare Parts</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>
                  Oders
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SpareParts Oders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Car PreOders</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Roles</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Customers
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Customers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Customers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Remove Customer</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Salesmans
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Salesman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Salesman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Remove Salesman</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Online Chat</li>
            <li class="nav-item">
              <a href="https://dashboard.tawk.to" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  DashBoard
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
              <a href="https://dashboard.tawk.to" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Sign Out
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!--Contains page content(right side) -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
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
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-car"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Pre Oders</span>
                  <span class="info-box-number">
                    <?php
                    $query = "SELECT COUNT('oderID') AS val from oder";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo $row['val'];
                    }
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tools"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Oders</span>
                  <span class="info-box-number">
                    <?php
                    $query = "SELECT COUNT('preoderID') AS val from preoder";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo $row['val'];
                    }
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Test-Drive</span>
                  <span class="info-box-number">
                    <?php
                    $query = "SELECT COUNT('tdriveID') AS val from testdrive";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo $row['val'];
                    }
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Customers</span>
                  <span class="info-box-number">
                    <?php
                    $query = "SELECT COUNT('custID') AS val from customer";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo $row['val'];
                    }
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>

          <div class="container text-center">
            <h2 style="color: #007bff;">Cars</h2>
          </div>
          <!-- Fst row -->
          <div class="row">
            <div class="col-md-8">

              <!--CAR ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title text-center">
                    Latest Pre-Oders
                  </h3>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select preoderID,name,preoder.qty,price from preoder,car where preoder.carID=car.carID ORDER BY preoderID DESC LIMIT 5";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $row['preoderID'] . "</td>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['qty'] . "</td>";
                          echo "<td>" . $row['price'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="webPages/sparePartsOders.php">View All Pre-Oders</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">

              <!-- CAR LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title  text-center">Recently Added Cars</h3>
                </div>
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php
                    $query = "select name,disc,img1,price from car order by carID desc limit 4";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<li class="item">';
                      echo '<div class="product-img">';
                      echo '<img src=' . $row['img1'] . ' alt="Product Image" class="img-size-50">';
                      echo '</div>';
                      echo '<div class="product-info">';
                      echo '<p class="product-title">' . $row['name'] . '</p>';
                      echo '<span class="badge badge-info float-right">Rs.' . $row['price'] . '</span></a>';
                      echo '<span class="product-description">';
                      echo $row['disc'];
                      echo '</span>';
                      echo '</div>';
                      echo '</li>';
                      echo '';
                    }
                    ?>
                  </ul>
                </div>
                <div class="card-footer text-center">
                  <a href="webPages/viewCars.php" class="uppercase">View All Cars</a>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <h2 style="color: #007bff;">Spare-Parts</h2>
          </div>
          <!-- Scnd row -->
          <div class="row">
            <div class="col-md-8">
              <!-- SPARE-PARTS ODERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title text-center">Latest Orders</h3>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select oderID,name,oder.qty,price from oder,part where oder.partID=part.partID ORDER BY oderID DESC LIMIT 5";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $row['oderID'] . "</td>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['qty'] . "</td>";
                          echo "<td>" . $row['price'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="webPages/sparePartsOders.php">View All Oders</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <!--  SPARE-PARTS LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-center">Recently Added Spare-Parts</h3>
                </div>
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php
                    $query = "select name,disc,img1,price from part order by partID desc limit 4";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<li class="item">';
                      echo '<div class="product-img">';
                      echo '<img src=' . $row['img1'] . ' alt="Product Image" class="img-size-50">';
                      echo '</div>';
                      echo '<div class="product-info">';
                      echo '<p class="product-title">' . $row['name'] . '</p>';
                      echo '<span class="badge badge-info float-right">Rs.' . $row['price'] . '</span></a>';
                      echo '<span class="product-description">';
                      echo $row['disc'];
                      echo '</span>';
                      echo '</div>';
                      echo '</li>';
                      echo '';
                    }
                    ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="webpages/viewSpareParts.php">View All Spare-Parts</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </div>
    </section>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy;2019 <a href="http://hirukiAutoMart.com">hirukiAutoMart.com</a>.</strong>
      All rights reserved | Group-4 .

    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--Push Menu for slideBar-->
  <script src="dist/js/pushmenu.js"></script>
  <!--Tree View for sidebar dropdown-->
  <script src="dist/js/treeview.js"></script>
  <!--Control SlideBar for header and footet width change with left slidebar-->
  <script src="dist/js/controlslidebar.js"></script>
  <script src="index.js"></script>
</body>

</html>