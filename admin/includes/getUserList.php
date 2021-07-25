<?php
if(empty($_SESSION)){
    session_start();
}
if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}else{
    include("../../includes/dbConn.php");
}
if($_POST["userType"]=="farmer"){
    $query="select fid,fname from farmer";
}else{
    $query="select bid,fname from buyer";
}

$result=mysqli_query($conn,$query);

$array_fid= array();
$array_fname=array();

while($row=mysqli_fetch_assoc($result)){
    array_push($array_fid,$_POST['userType'] =="farmer" ? $row["fid"] : $row["bid"]);
    array_push($array_fname,$row["fname"]);
}
$main_array=array($array_fid,$array_fname);
echo(json_encode($main_array));