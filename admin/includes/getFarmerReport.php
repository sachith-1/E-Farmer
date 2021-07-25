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

$userType=$_POST["type"];
$userId=$_POST["id"];

if($userType=="farmer"){
    farmerReports($userId,$conn);
}else{
    buyerReports($userId,$conn);
}

function farmerReports($id,$conn){
    $query="select cIds from farmer where fid=".$id;
    $result=mysqli_query($conn,$query);
    $array_piechart=[];
    $array_table=[];
    while($row=mysqli_fetch_assoc($result)){
        $array_cids=explode(',',$row["cIds"]);
        for($i=0;$i<count($array_cids);$i++){
            $query0="select weight from buyerorders where fID=".$id." and cID=".$array_cids[$i];
            $result0=mysqli_query($conn,$query0);
            $sum=0;
            while($row0=mysqli_fetch_assoc($result0)){
                $sum+=$row0["weight"];
            }
            $result1=mysqli_query($conn,"select cname from crop where cID=".$array_cids[$i]);
            $cname="";
            while($row1=mysqli_fetch_assoc($result1)){
                $cname=$row1["cname"];
            }
            array_push($array_piechart,[$cname,$sum]);
            $query2="select weight,date,price,cname from buyerorders join crop on buyerorders.cid=crop.cid where fID=".$id." and buyerorders.cID=".$array_cids[$i];
            $result2=mysqli_query($conn,$query2);
            while($row2=mysqli_fetch_assoc($result2)){
                array_push($array_table,[$row2["cname"],$row2["date"],$row2["weight"],$row2["price"]]);
            }
            
        }
    }
    $array=array($array_piechart,$array_table);
    echo json_encode($array);

}

function buyerReports($id,$conn){
    $query="select cIds from buyer where bID=".$id;
    $result=mysqli_query($conn,$query);
    $array_piechart=[];
    $array_table=[];
    while($row=mysqli_fetch_assoc($result)){
        $array_cids=explode(',',$row["cIds"]);
        for($i=0;$i<count($array_cids);$i++){
            $query0="select weight from buyerorders where bID=".$id." and cID=".$array_cids[$i];
            $result0=mysqli_query($conn,$query0);
            $sum=0;
            while($row0=mysqli_fetch_assoc($result0)){
                $sum+=$row0["weight"];
            }
            $result1=mysqli_query($conn,"select cname from crop where cID=".$array_cids[$i]);
            $cname="";
            while($row1=mysqli_fetch_assoc($result1)){
                $cname=$row1["cname"];
            }
            array_push($array_piechart,[$cname,$sum]);
            $query2="select weight,date,price,cname from buyerorders join crop on buyerorders.cid=crop.cid where bid=".$id." and buyerorders.cID=".$array_cids[$i];
            $result2=mysqli_query($conn,$query2);
            while($row2=mysqli_fetch_assoc($result2)){
                array_push($array_table,[$row2["cname"],$row2["date"],$row2["weight"],$row2["price"]]);
            }
            
        }
    }
    $array=array($array_piechart,$array_table);
    echo json_encode($array);
}