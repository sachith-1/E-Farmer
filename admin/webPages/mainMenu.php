<?php

session_start();
if (!isset($_SESSION['type']) || empty($_SESSION['type'])) {
    header("Location:../login.php");
}

include_once("../../includes/DbConn.php");
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

    <title>E-Farmer | Dashboard</title>

    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
                    <a href="../Dashboard.php" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-green elevation-4">
            <a href="../Dashboard.php" class="brand-link">
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
                            echo "<a href='./accountSettings.php' class='d-block'>$fname</a>";
                        }
                        ?>
                        <!-- <a href='webPages/accountSettings.php' class='d-block'>Piyumi</a> -->
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="./priceIndexes.php" class="nav-link">
                                <i class="nav-icon fas fa-tags" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Price Indexes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./report.php" class="nav-link">
                                <i class="nav-icon fas fa-tags" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Reports
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Crops</li>
                        <li class="nav-item">
                            <a href="./addCrop.php" class="nav-link">
                                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Add Crops
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./viewCrop.php" class="nav-link">
                                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    View Crops
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./removeCrop.php" class="nav-link">
                                <i class="nav-icon fas fa-carrot" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Remove Crops
                                </p>
                            </a>
                        </li>
                        <?php
                        if ($_SESSION["type"] == "Admin") {
                            echo '<li class="nav-header">Represantative</li>';
                            echo '<li class="nav-item">';
                            echo '<a href="./addRep.php" class="nav-link">';
                            echo '<i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>';
                            echo '<p>';
                            echo 'Add Represantatives';
                            echo '</p>';
                            echo '</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a href="./viewRep.php" class="nav-link">';
                            echo '<i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>';
                            echo '<p>';
                            echo 'View Represantatives';
                            echo '</p>';
                            echo '</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a href="./removeRep.php" class="nav-link">';
                            echo '<i class="nav-icon fas fa-user-tie" style="color:rgb(11, 221, 123);"></i>';
                            echo '<p>';
                            echo 'Remove Represantatives';
                            echo '</p>';
                            echo '</a>';
                            echo '</li>';
                        } else {
                            echo ("");
                        }
                        ?>

                        <li class="nav-header">Farmers</li>
                        <li class="nav-item">
                            <a href="./addFarmer.php" class="nav-link">
                                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Add Farmers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./viewFarmers.php" class="nav-link">
                                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    View Farmers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./removeFarmer.php" class="nav-link">
                                <i class="nav-icon fas fa-user" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Remove Farmers
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Buyers</li>
                        <li class="nav-item">
                            <a href="./addBuyer.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Add Buyers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./viewBuyer.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    View Buyers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./removeBuyer.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tag" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Remove Buyers
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Account Settings</li>
                        <li class="nav-item">
                            <a href="./accountSettings.php" class="nav-link">
                                <i class="nav-icon fas fa-sliders-h" style="color:rgb(11, 221, 123);"></i>
                                <p>
                                    Account Settings
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./changePass.php" class="nav-link">
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
                            <a href="../logout.php" class="nav-link">
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