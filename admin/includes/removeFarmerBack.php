<?php
if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}



include("../../includes/dbConn.php");

if (isset($_POST["farmerID"])) {
    $query = "delete from farmer where fid=?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $_POST["farmerID"]);
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../webPages/removeFarmer.php?alert=success");
        } else {
            header("Location:../webPages/removeFarmer.php?alert=execute");
        }
    } else {
        header("Location:../webPages/removeFarmer.php?alert=sql");
    }
} else {
    header("Location:../webPages/removeFarmer.php?alert=fields");
}
