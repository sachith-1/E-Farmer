<?php
// testing purpose only 
if(isset($_GET["data"],$_GET["telNo"])){

    // strip whitespaces
    $data=trim($_GET["data"]," \t\n\r\0\x0B");
    $telNo=$_GET["telNo"];
    $response="";
    
    // one sms for each crop
    // data=cropId<space>weight<space>price
    $pattern="/^[\d]+\s[\d]+[\.]?[\d]*+\s[\d]+[\.]?[\d]*$/";

    if(preg_match($pattern,$data,$matches)){
        include_once("../includes/dbConn.php");
        $fid;
        $date=date("Y-m-d");
        $query='select fid from farmer where telNo="'.$telNo.'"';
        $result=mysqli_query($conn,$qeury);
        $rows=mysqli_num_rows($result);
        if($rows>0){
            while($row=mysqli_fetch_assoc($result)){
                $fid=$row["fid"];
            }
            $dataArray=explode(" ",$data);
            $query="insert into farmercropprice (fID,date,cID,price,weight) values(?,?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$qeury);
            if(mysqli_stmt_bind_param($stmt,"isidd",$fid,$date,$dataArray[0],$dataArray[2],$dataArray[1])){
                if(mysqli_stmt_execute($stmt)){
                     $response="success your crop price added to the system";
                     mysqli_close($conn);
                }else{
                    $response=" something happend while executing please try again";
                    mysqli_close($conn);
                }
            }else{
                $response="something happend please try again";
                mysqli_close($conn);
            }
        }else{
            $response="we cant find a farmer from your number if you are new please register.";
            mysqli_close($conn);
        }
    }else{
        $response="Please follow the correct pattern. \n Id<space>Weight<space>Price";
    }

    //send response [sms] back to the farmer
    echo "\n\n".$response."\n\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="get">
    <textarea name="data" placeholder="id<space>weight<space>price" cols="30" rows="4"></textarea>
    <input type="text" name="telNo" id="">
    <input type="submit" value="send">
</form>
</body>
</html>
