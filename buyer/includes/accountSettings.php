<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <?php 
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        if(!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])){
            header("Location:../../login.php");
            exit();
        }else{
            include("../../includes/DbConn.php");
        }
        
        if(!isset($_POST["fname"],$_POST["lname"],$_POST["gender"],$_POST["address"])){
            echo "<script>
                    alert('All fields required');
                    window.location='../webPages/myAccount.php'
                    </script>";
                exit();
        }else{
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $tpNo=$_SESSION["buyerTP"];
            $gender=$_POST["gender"];
            $address=$_POST["address"];
            $email=isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : "";
            $query = "update buyer set
                    fname='".$fname."',
                    lname='".$lname."',
                    gender='".$gender."',
                    address='".$address."',
                    email='".$email."'
                    where tpNo='".$tpNo."'";
            if (mysqli_query($conn,$query)) {
                echo "<script>
                alert('Success account details updated');
                window.location='../webPages/myAccount.php';
                </script>";
            } else {
                echo "<script>
                alert('Somthing happend while Executing.Please try again.');
                window.location='../webPages/myAccount.php';
                </script>";
            }
        
        
        }
    ?>
    
</body>
</html>
<?php
