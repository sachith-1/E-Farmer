<?php
require_once "../../vendor/autoload.php";
use Twilio\TwiML\MessagingResponse;
if(isset($_REQUEST["Body"],$_REQUEST["From"])){
    // strip whitespaces
    $data=trim($_REQUEST["Body"]," \t\n\r\0\x0B");
    $telNo=substr($_REQUEST["From"],1,11);
    $response="";
    //$data=substr($userData,38);
    
    // one sms for each crop
    // data=cropId<space>weight<space>price
    $pattern="/^[\d]+\s[\d]+[\.]?[\d]*+\s[\d]+[\.]?[\d]*$/";

    if(preg_match($pattern,$data,$matches)){
        include_once("../../includes/dbConn.php");
        $fid;
        $date=date("Y-m-d");
        $query='select fid from farmer where telNo="'.$telNo.'"';
        $result=mysqli_query($conn,$query);
        $rows=mysqli_num_rows($result);
        if($rows>0){
            while($row=mysqli_fetch_assoc($result)){
                $fid=$row["fid"];
            }
            $dataArray=explode(" ",$data);
            $query="insert into farmercropprice (fID,date,cID,price,weight) values(?,?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$query);
            if(mysqli_stmt_bind_param($stmt,"isidd",$fid,$date,$dataArray[0],$dataArray[2],$dataArray[1])){
                if(mysqli_stmt_execute($stmt)){
                     $response="success your crop price added to the system";
                     mysqli_close($conn);
                }else{
                    $response="something happend while executing please try again";
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
        $response="Please follow the correct pattern.Id<space>Weight<space>Price";
    }

    //send response [sms] back to the farmer
    header("content-type: text/xml");

    $RESPsms = new MessagingResponse();
    //reply
    $RESPsms->message(
        $response
    );

    echo $RESPsms;

}else{
    echo "SOMETHING HAPPENED";
}
?>

