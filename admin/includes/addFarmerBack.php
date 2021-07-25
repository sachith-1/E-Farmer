<?php
if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}

if (isset($_POST['fname'], $_POST['lname'], $_POST['tpNo'], $_POST['gender'], $_POST['address'], $_POST['cropsVals'])) {

    include("../../includes/dbConn.php");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tpNo = $_POST['tpNo'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $crop_array = $_POST['cropsVals'];
    $email = isset($_POST['email']) ? $_POST['email'] : "";

    $query = "select telNo from farmer where telNo=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $tpNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_num_rows($result);
    if ($rows >= 1) {
        header("Location:../webPages/addFarmer.php?alert=tpNo");
    } else {
        $query = "insert into farmer (fname,lname,address,email,telNo,cids,gender) values(?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $address, $email, $tpNo, $crop_array, $gender);
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../webPages/addFarmer.php?alert=success");
        } else {
            // header("Location:../webPages/addFarmer.php?alert=sql");
        }
    }
} else {
    header("Location:../webPages/addFarmer.php?erro=fields");
}
