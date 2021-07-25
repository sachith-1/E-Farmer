<?php
if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}



include("../../includes/dbConn.php");

if (isset($_POST["fname"], $_POST["lname"], $_POST["nic"], $_POST["tpNo"], $_POST["address"])) {
    $query = null;
    if ($_SESSION["type"] == "Admin") {
        $query = "UPDATE admin SET fname=?,lname=?address=?,nic=?,tpNo=? where NI";
    }

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "sssiss", $_POST["fname"], $_POST["lname"], $_POST["nic"], $_POST["tpNo"], $_POST["address"], $pass);
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../webPages/addRep.php?alert=success");
        } else {
            header("Location:../webPages/addRep.php?alert=execute");
        }
    } else {
        header("Location:../webPages/addRep.php?alert=sql");
    }
} else {
    header("Location:../webPages/addRep.php?alert=fields");
}
