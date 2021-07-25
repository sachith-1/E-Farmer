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

<?php

$farmerID=$_GET["farmerID"];
$cropPriceID=$_GET["cropPriceID"];
$fname;
$lname;
$address;
$teleNo;
$cName;
$maxWeight;
$pricePerKg;
$cID;

$query="select fname,lname,address,telNo from farmer where fid=?";
$stmt=mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$query)){
    mysqli_stmt_bind_param($stmt,"i",$farmerID);
    if(mysqli_stmt_execute($stmt)){
        $result1=mysqli_stmt_get_result($stmt);
        while($row1=mysqli_fetch_assoc($result1)){            
            $fname=$row1["fname"];
            $lname=$row1["lname"];
            $address=$row1["address"];
            $teleNo=$row1["telNo"];
            
        }
    }
    else{
        header("Location:./searchFoods.php");
        exit();
    }
}else{
    header("Location:./searchFoods.php");
    exit();
}
$query="select weight,price,cID from farmercropprice where fpID=?";
$stmt=mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$query)){
    mysqli_stmt_bind_param($stmt,"i",$cropPriceID);
    if(mysqli_stmt_execute($stmt)){
        $result2=mysqli_stmt_get_result($stmt);
        while($row2=mysqli_fetch_assoc($result2)){
            $pricePerKg=$row2["price"];
            $maxWeight=$row2["weight"];
            $cID=$row2["cID"];
           }
    }
    else{
        header("Location:./searchFoods.php");
        exit();
    }
}else{
    header("Location:./searchFoods.php");
    exit();
}
$query="select cname from crop where cID=".$cID;
$result=mysqli_query($conn,$query);
while($row3=mysqli_fetch_assoc($result)){
    $GLOBALS["cName"]=$row3["cname"];
}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/home.css" />

</head>

<body class="h-100" style="background-color: transparent; margin: 0px; padding: 0px;overflow-x: hidden;">
    <div class="row mx-1 d-flex justify-content-center align-items-center h-100">
        <div class="card border-info col-12 col-md-10 col-lg-8">
            <div class="card-body">
                <div class="card-text" style="
                    font-size: 12px;
                    color: #11c278;
                    font-weight: 600;
                    margin-bottom: 4px;
                  ">
                    VEGETABLE ORDER
                </div>
                <h4 class="card-title text-center">
                    <?php echo $GLOBALS["cName"] ?>
                </h4>
                <div class="row d-flex justify-content-md-between">
                    <div class="col-12 col-md-10 col-lg-6 card mb-3 mb-md-4">
                        <div class="card-body">
                            <div class="cart-text text-center mb-3" style="font-size: 12px;
                    color: #11c278;
                    font-weight: 600;
                    margin-bottom: 4px;">
                                👨‍🌾 FARMER DETAILS
                            </div>
                            <div class="card-text">
                                Name : <?php echo $fname.' '.$lname ?>
                            </div>
                            <div class="card-text">Address : <?php echo $address ?></div>
                            <div class="card-text">Telephone No : <?php echo $teleNo ?></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-5 card mb-3 mb-md-4">
                        <div class="card-body">
                            <div class="cart-text text-center mb-3" style="font-size: 12px;
                    color: #11c278;
                    font-weight: 600;
                    margin-bottom: 4px;">
                                CROP DETAILS
                            </div>
                            <div class="card-text">
                                Crop : <?php echo $cName ?>
                            </div>
                            <div class="card-text">Max Weight : <?php echo $maxWeight." " ?> kg</div>
                            <div class="card-text">Price per Kg : Rs.<?php echo $pricePerKg ?></div>
                        </div>
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
                                PRICE PER KG
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                KG
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="row border-bottom border-success mb-3 mb-md-4">
                        <div class="col-6">
                            <h6 class="card-title"><?php echo $cName ?></h6>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <p class="col-6 card-title d-flex justify-content-center pt-2">
                                    Rs.<?php echo $pricePerKg ?>
                                </p>
                                <h6 class="col-6 d-flex justify-content-center">
                                    <input type="number" max=<?php echo $maxWeight ?> min="1" id="vegWeight" oninput="calTotal()" placeholder="10" class="form-control text-center font-weight-bold" name="vegWeight" id="">
                                    <input type="hidden"  id="pricePerKG" name="pricePerKg" value=<?php echo '"'.$pricePerKg.'"' ?>>
                                    <p hidden id="lang"><?php echo $lang ?></p>
                                    <p hidden id="maxWeight"><?php echo $maxWeight ?></p>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mb-md-4">
                        <div class="col-6">
                            <h6 class="card-title">
                                Total
                            </h6>
                        </div>
                        <div class="col-6 pb-2">    
                            <div class="row mb-2 mb-md-3">
                                <div class="col-4 col-md-6"></div>
                                <div class="col-8 col-md-6 d-flex justify-content-end">
                                    <input disabled type="text" name="total" id="total" placeholder="Rs.10000.00" class="form-control text-center font-weight-bold">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-6"></div>
                                <div class="col-8 col-md-6 d-flex justify-content-end">
                                    <input type="submit" value="Order Now" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
        function calTotal(){
            var pricePerKG=$("#pricePerKG");
            var vegWeight=$("#vegWeight");
            var total=$("#total");
            var lang=$("#lang");
            var maxWeight=$("#maxWeight").text()*1;

            var t=pricePerKG.val()*vegWeight.val();
            if(t>0 && maxWeight>=vegWeight.val()*1 ){
                total.val("Rs."+t);
            }else{
                total.val(lang.text() === "SI"?"අගය වැරදි":"INVALID VALUE");
            }      

        }
    </script>

</body>

</html>