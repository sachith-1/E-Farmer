<?php
if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}



include("../../includes/dbConn.php");

if (isset($_POST["buyerID"])) {
    $query = "delete from buyer where bID=?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $_POST["buyerID"]);
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../webPages/removeBuyer.php?alert=success");
        } else {
            header("Location:../webPages/removeBuyer.php?alert=execute");
        }
    } else {
        header("Location:../webPages/removeBuyer.php?alert=sql");
    }
} else {
    header("Location:../webPages/removeBuyer.php?alert=fields");
}
