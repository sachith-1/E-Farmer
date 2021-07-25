<?php
require("../../includes/dbConn.php");
require("../notify/autoload.php");

$today = date("Y-m-d");
$queryPrice = "select priceindex.cID,price,crop.cname from priceIndex,crop where date='" . $today . "' and crop.cID=priceindex.cID";
$resultPrice = mysqli_query($conn, $queryPrice);
$priceArray = array();
while ($row = mysqli_fetch_assoc($resultPrice)) {
    $priceArray[$row["cID"]] = array($row["cname"], $row["price"]);
}

$query = "select cids,fname,telNo from farmer";
$result = mysqli_query($conn, $query);
$farmers = 0;
while ($row = mysqli_fetch_assoc($result)) {

    $cropArray = explode(",", $row["cids"]);
    $msg = $today . " Crop Prices " . PHP_EOL;
    foreach ($cropArray as $cID) {
        $msg .= $priceArray[$cID][0] . " =  Rs." . $priceArray[$cID][1] . PHP_EOL;
    }

    $api_instance = new NotifyLk\Api\SmsApi();
    $user_id = "11740";
    $api_key = "T4P4juDwPVnugOaezDrD";
    $message = $msg;
    $to = $row["telNo"]; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
    $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
    $contact_fname = $row["fname"];
    $contact_lname = "";
    $contact_email = "";
    $contact_address = "";
    $contact_group = 0; // int | A group ID to associate the saving contact with

    try {
        $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group);
        $farmers += 1;
    } catch (Exception $e) {
        //echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
    }
}

$query = "select cIDs,fname,tpNo from buyer";
$result = mysqli_query($conn, $query);
$buyers = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $cropArray = explode(",", $row["cIDs"]);
    $msg = $today . " Crop Prices " . PHP_EOL;
    foreach ($cropArray as $cID) {
        $msg .= $priceArray[$cID][0] . " =  Rs." . $priceArray[$cID][1] . PHP_EOL;
    }

    $api_instance = new NotifyLk\Api\SmsApi();
    $user_id = "11740";
    $api_key = "T4P4juDwPVnugOaezDrD";
    $message = $msg;
    $to = $row["tpNo"]; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
    $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
    $contact_fname = $row["fname"];
    $contact_lname = "";
    $contact_email = "";
    $contact_address = "";
    $contact_group = 0; // int | A group ID to associate the saving contact with

    try {
        $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group);
        $buyers += 1;
    } catch (Exception $e) {
        //echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
    }
}

echo "Success!. SMS send to " . $farmers . " farmers and " . $buyers . " buyers";
