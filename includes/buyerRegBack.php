<?php
if (!isset($_POST['fname']) || empty($_POST['fname'])) {
    // header("Location: ../index.php");
} else {
    include("dbConn.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tpNo = $_POST['tpNo'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $cropsArray = $_POST['cropsVals'];

    if ($pass !== $cpass) {
        echo "<script>
        alert('Password and Confirm Password are not matching');
        window.location='../buyerReg.php';
        </script>";
        exit();
    }
    $query = "select tpNo from buyer where tpNo=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $tpNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_num_rows($result);
    if ($rows >= 1) {
        echo "<script>
            alert('Buyer exisit from same telephone number');
            window.location='../farmerReg.php'
            </script>";
        exit();
    } else {
        $query = "insert into buyer (fname,lname,tpNo,address,email,password,gender,cIDs) values(?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $tpNo, $address, $email, $pass, $gender, $cropsArray);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../index.php?reg=success");
        } else {
            echo "<script>
            alert('Somthing happend while Executing.Please try again.');
            window.location='../buyerReg.php';
            </script>";
        }
    }
}
