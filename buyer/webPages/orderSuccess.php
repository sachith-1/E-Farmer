<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])) {
  header("Location:../../login.php");
  exit();
}
if(!isset($_POST["submit"],$_POST["vegWeight"])){
 header("Location:../index.php");  
 exit();
}

//default lang set to EN
$lang;
if (isset($_POST["lang"])) {
    $lang=$_POST["lang"];
    if ($_POST["lang"] == "SI") {
      include("../../lang/lang_buyerOrderSuccess.SI.php");
    } else if ($_POST["lang"] == "EN") {
      include("../../lang/lang_buyerOrderSuccess.EN.php");
    } else {
      include("../../lang/lang_buyerOrderSuccess.EN.php");
    }
} else {
  include("../../lang/lang_buyerOrderSuccess.EN.php");
    $lang="EN";
}


require_once '../../vendor/autoload.php';
use Twilio\Rest\Client;
include("../../includes/dbConn.php");

$total=$_POST["vegWeight"]*$_POST["pricePerKg"];
$vegWeight=$_POST["vegWeight"];
$cname=$_POST["cname"];
$fname=$_POST["fname"];
$fNUm=$_POST["fNum"];
$pricePerKG=$_POST["pricePerKg"];
$maxWeight=$_POST["maxWeight"];
$pricePerKG=$_POST["pricePerKg"];
$fID=$_POST["fID"];
$cID=$_POST["cID"];
$fpID=$_POST["fpID"];

$query="select bID,fname,tpNo from buyer where tpNo='".$_SESSION["buyerTP"]."'";
$result=mysqli_query($conn,$query);
$orderTime=date("Y-m-d H:i:s");
while($row=mysqli_fetch_assoc($result)){
  $bid=$row["bID"];
  $buyerName=$row["fname"];
  $buyerNum=$row["tpNo"];
  
}

$query='insert into buyerorders (bID,fID,cID,date,weight,price) values('.$bid.','.$fID.','.$cID.',"'.$orderTime.'",'.$vegWeight.','.$total.')';
// echo $query;
if(mysqli_query($conn,$query)){

  $afterWeight=$maxWeight-$vegWeight;
  $query='update farmercropprice set weight ='.$afterWeight.' where fpID='.$fpID;
  if(mysqli_query($conn,$query)){
    //send sms to farmer for buyer request
    $sid    = "ACa5e5f2d7a9bae09b0931f6d8cc786b3c";
    $token  = "dbe35a763cccd3d2349e0d4c237d70d8";
    $twilio = new Client($sid, $token);
    $farmerSMS="Aluth anawumak".PHP_EOL;
    $farmerSMS.="Boogaya - "."'".$cname."'".PHP_EOL;
    $farmerSMS.="pramanaya - ".$vegWeight." Kg".PHP_EOL;
    $farmerSMS.="Welada mahathage name - ".$buyerName.PHP_EOL;
    $farmerSMS.="durakathana ankaya - ".$buyerNum;
    $message = $twilio->messages
                      ->create("+".$fNUm, // to
                              [
                                  "body" => $farmerSMS,
                                  "from" => "+12058758128"
                              ]
                      );
  }else{
    header("../index.php?alert=updateWeightErr");
    exit();
  }
}else{
  header("../index.php?alert=orderInserErr");
  exit();
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
  <style>
    .body {
      background-image: url("../../imagers/search-banner.png");
      background-repeat: no-repeat;
      background-position: right bottom;
    }
  </style>
</head>
<body class="h-100" style="background-color: transparent; margin: 0px; padding: 0px;overflow-x: hidden;">
 
  <div class="d-flex justify-content-center align-items-center h-100">
    <div class="card border-info col-12 col-md-10 col-lg-8">
      <h2 class="card-title text-center" style="color:#11c278;font-weight: 300;">
        <?php echo $langOrderSuccess["title"] ?>
      </h2>
      <div class="card-body">
        <p class="card-text" style="color:#11c278;">
        <?php echo $langOrderSuccess["details"] ?>
        </p>
        <div class="row d-flex justify-content-center">
          <div class="col-6 col-md-6 border-info">
            <p><?php echo $langOrderSuccess["time"] ?><?php echo $orderTime ?></p>
          </div>
          <div class="col-6 col-md-6 border-info">
            <p><?php echo $langOrderSuccess["fname"] ?><?php echo $fname ?></p>
            <p><?php echo $langOrderSuccess["fNUm"] ?><?php echo $fNUm ?></p>
          </div>
        </div>
        <div class="row mb-3 mb-md-4">
          <div class="col-6"></div>
          <div class="col-6" style="font-size: 16px;
          color: #11c278;
          font-weight: 600;
          margin-bottom: 4px;">
              <div class="row border-bottom border-success">
                  <div class="col-6 d-flex justify-content-center">
                  <?php echo $langOrderSuccess["pricePerKG"] ?>
                  </div>
                  <div class="col-6 d-flex justify-content-center">
                      KG
                  </div>
              </div>
          </div>
      </div>
      <div>
          <div class="row border-bottom border-success mb-3 mb-md-4">
              <div class="col-6">
                  <h6 class="card-title"><?php echo $cname ?></h6>
              </div>
              <div class="col-6">
                  <div class="row">
                      <p class="col-6 card-title d-flex justify-content-center pt-2">
                      <?php echo $pricePerKG ?>
                      </p>
                      <h6 class="col-6 d-flex justify-content-center pt-2">
                      <?php echo $vegWeight ?>
                      </h6>
                  </div>
              </div>
          </div>
          <div class="row mb-3 mb-md-4">
              <div class="col-6">
                  <h6 class="card-title">
                  <?php echo $langOrderSuccess["Total"] ?>
                  </h6>
              </div>
              <div class="col-6 pb-2">    
                  <div class="row mb-2 mb-md-3">
                      <div class="col-4 col-md-6"></div>
                      <div class="col-8 col-md-6 d-flex justify-content-end">
                        <p class="col-6 card-title d-flex justify-content-center pt-2">
                        <?php echo $total ?>
                        </p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-4 col-md-6"></div>
                      <div class="col-8 col-md-6 d-flex justify-content-end">
                          <a onclick="toHome()" class="btn btn-success">GO Back</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script>
    $(function() {
      $("#form-slide").animate({
          "margin-left": 0,
        },
        700
      );
      $("#btnsubmit").click(function(ev) {
        ev.preventDefault();
        var dropdown = document.getElementById("selectVegi");
        var vegi = dropdown.options[dropdown.selectedIndex].value;
        document.getElementById("cropID").value = vegi;
        if (vegi == "vegiSelect") {
          console.log(vegi);
          alert("Select foods from dropdowm menu");
        } else {
          $("#form-slide").animate({
              "margin-left": "400%",
            },
            700,
            function() {
              document.getElementById("theForm").submit();
            }
          );
        }
      });
    }); 

    function toHome(){
      top.location="../index.php"
    }
  </script>
</body>

</html>