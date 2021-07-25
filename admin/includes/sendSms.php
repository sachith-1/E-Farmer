<?php
require("../../includes/dbConn.php");
// require("../notify/autoload.php");
require("../../vendor/autoload.php");
use Twilio\Rest\Client;

$today = date("Y-m-d");
$queryPrice = "select priceindex.cID,price,crop.cname from priceIndex,crop where date='" . $today . "' and crop.cID=priceindex.cID";
$resultPrice = mysqli_query($conn, $queryPrice);
$priceArray = array();
while ($row = mysqli_fetch_assoc($resultPrice)) {
    $priceArray[$row["cID"]] = array($row["cname"], $row["price"],$row["cID"]);
}

$query = "select cids,fname,telNo from farmer";
$result = mysqli_query($conn, $query);
$farmers = 0;
while ($row = mysqli_fetch_assoc($result)) {

    $cropArray = explode(",", $row["cids"]);
    $msg = PHP_EOL.$today . " Crop Prices " . PHP_EOL;
    $msg.="cropID - name = price".PHP_EOL;
    foreach ($cropArray as $cID) {
        $msg .= $priceArray[$cID][2]." - ".$priceArray[$cID][0] . " =  Rs." . $priceArray[$cID][1] . PHP_EOL;
    }
    $sid    = "ACa5e5f2d7a9bae09b0931f6d8cc786b3c";
    $token  = "dbe35a763cccd3d2349e0d4c237d70d8";
    $twilio = new Client($sid, $token);

    $to = "+".$row["telNo"];
    $msg.="send one message for each crop with your price using below template to +12058758128".PHP_EOL;
    $msg.="cropID<space>weight<space>price";
    try{
        $message = $twilio->messages
                        ->create($to, // to
                                [
                                    "body" => $msg,
                                    "from" => "+12058758128"
                                ]
                        );
                        $farmers+=1;

    }catch(Exception $e){
        echo $e;
    }
}

$query = "select cIDs,fname,tpNo from buyer";
$result = mysqli_query($conn, $query);
$buyers = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $cropArray = explode(",", $row["cIDs"]);
    $msg = PHP_EOL.$today . " Crop Prices " . PHP_EOL;
    $msg.="cropID - name = price".PHP_EOL;
    foreach ($cropArray as $cID) {
        $msg .= $priceArray[$cID][2]." - ".$priceArray[$cID][0] . " =  Rs." . $priceArray[$cID][1] . PHP_EOL;
    }
    $sid    = "ACa5e5f2d7a9bae09b0931f6d8cc786b3c";
    $token  = "dbe35a763cccd3d2349e0d4c237d70d8";
    $twilio = new Client($sid, $token);

    $to = "+".$row["tpNo"];
    try{
        $message = $twilio->messages
                        ->create($to, // to
                                [
                                    "body" => $msg,
                                    "from" => "+12058758128"
                                ]
                        );
                        $buyers+=1;
    }catch(Exception $e){
        echo $e;
    }
}

echo "Success!. SMS send to " . $farmers . " farmers and " . $buyers . " buyers";
