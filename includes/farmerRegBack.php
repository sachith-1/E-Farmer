<?php
if (!isset($_POST['fname']) || empty($_POST['fname'])) {
    header("Location: ../index.html");
    exit;
} else {

    include("dbConn.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tpNo = $_POST['tpNo'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $crop_array = $_POST['cropsVals'];
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    echo ($tpNo);


    if ($pass !== $cpass) {
        echo "<script>
        alert('Password and Confirm Password are not matching');
        window.location='../farmerReg.php'
        </script>";
    } else {
        $query = "select telNo from farmer where telNo=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $tpNo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_num_rows($result);
        if ($rows >= 1) {
            echo "<script>
            alert('Farmer exisit from same telephone number');
            window.location='../farmerReg.php'
            </script>";
            exit();
        } else {
            $query = "insert into farmer (fname,lname,address,email,telNo,password,cids,gender) values(?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $address, $email, $tpNo, $pass, $crop_array, $gender);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../index.php?reg=success");
            } else {
                echo "<script>
            alert('Error while Executing . Please try Again');
            window.location='../farmerReg.php'
            </script>";
            }
        }
    }
}
