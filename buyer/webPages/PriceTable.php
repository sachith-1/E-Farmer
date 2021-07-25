<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])) {
  header("Location:../login.php");
  exit();
}
include("../../includes/dbConn.php");

$lang;
if (isset($_GET["lang"])) {
    $lang=$_GET["lang"];
    if ($_GET["lang"] == "SI") {
      include("../../lang/lang_buyerIndex.SI.php");
    } else if ($_GET["lang"] == "EN") {
      include("../../lang/lang_buyerIndex.EN.php");
    } else {
      include("../../lang/lang_buyerIndex.EN.php");
    }
} else {
    include("../../lang/lang_buyerIndex.EN.php");
    $lang="EN";
}

?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/home.css" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet" />
</head>

<body class="h-100" style="
      background-color: transparent;
      margin: 0px;
      padding: 0px;
      margin-top: 20px;
      font-family: 'Lato', sans-serif;
    ">
  <?php


  if (isset($_POST["cropID"]) && !empty($_POST["cropID"])) {

    $selectedVegID = $_POST["cropID"];
    $today = date("Y-m-d");
    $query = "select fpID,fID,weight,price,date from farmercropprice where cid=? and date=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "is", $selectedVegID, $today);
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);
      $numRows = mysqli_num_rows($result);
      if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $query = "select fname,lname,address,telNo from farmer where fid=" . $row["fID"];
          $result0 = mysqli_query($conn, $query);
          while ($row0 = mysqli_fetch_assoc($result0)) {
            echo '<div class="row d-flex justify-content-center mx-0 mb-3">';
            echo '<div class="col-12 col-md-7 col-lg-8">';
            echo '<div class="card border-success">';
            echo '<div class="card-body py-3 py-md-2">';
            echo '<div class="row">';
            echo '<div class="col-4 d-flex justify-content-center col-md-3 border-right border-success">';
            echo '<img src="../../imagers/farmer.png" style="height: 100px; width: 100px;" alt="" srcset="" />';
            echo '</div>';
            echo '<div class="col-8 col-md-9">';
            echo '<p class="card-text" style="';
            echo 'font-size: 12px;';
            echo 'color: #11c278;';
            echo 'font-weight: 600;';
            echo 'margin-bottom: 4px;';
            echo '">';
            echo $langBuyerIndex["farmer"];
            echo '</p>';
            echo '<h5 class="card-title">' . $row0["fname"] . ' ' . $row0["lname"] . '</h5>';
            echo '<p class="card-text">';
            echo $langBuyerIndex["addresss"].' :' . $row0["address"] . '';
            echo '</p>';
            echo '<p class="card-text">';
            echo $langBuyerIndex["TepehoneNo"].' : ' . $row0["telNo"] . '';
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-footer p-0">';
            echo '<div class="row mx-0" style="background-color: #11c278; color: white;">';
            echo '<div class="col-4 border-right" style="border-color: #71a32a;">';
            echo '<div class="d-flex justify-content-center" style="font-weight: 700; margin: 10px 0px 5px;">';
            echo $row["weight"] . ' Kg';
            echo '</div>';
            echo '<div class="d-flex justify-content-center" style="font-size: 12px; margin-bottom: 15px;">';
            echo $langBuyerIndex["weight"];
            echo '</div>';
            echo '</div>';
            echo '<div class="col-4 border-right">';
            echo '<div class="d-flex justify-content-center" style="font-weight: 700; margin: 10px 0px 5px;">';
            echo $langBuyerIndex["Rs"].'.' . $row["price"];
            echo '</div>';
            echo '<div class="d-flex justify-content-center" style="font-size: 12px; margin-bottom: 15px;">';
            echo $langBuyerIndex["pricePerKg"];
            echo '</div>';
            echo '</div>';
            echo '<div class="col-4 d-flex py-3 justify-content-center">';
            $farmerBill="./orderVegi.php?farmerID=".$row["fID"]."&cropPriceID=".$row["fpID"]."&lang=".$lang;
            echo '<a href="'.$farmerBill.'" class="btn btn-outline-light px-md-4 px-lg-5 px-2">'.$langBuyerIndex["order"].'</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
      } else {
        echo ('
        <div class="alert alert-warning mx-5">
        <h3 class="alert-heading">'.$langBuyerIndex["noFarmer"].'</h3>
        <p>'.$langBuyerIndex["noFarmerMSG"].'</p>
        </div>
        ');
      }
    } else {
      header("Location:../index.php?alert=error");
    }
  } else {
    header("Location:../index.php?alert=notSelected");
  }

  ?>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>