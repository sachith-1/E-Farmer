<?php
if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}

if ($_SESSION["type"] == "Admin") {

    include("../../includes/dbConn.php");

    if (isset($_POST["repID"])) {
        $query = "delete from rep where rID=?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $_POST["repID"]);
            if (mysqli_stmt_execute($stmt)) {
                header("Location:../webPages/removeRep.php?alert=success");
            } else {
                header("Location:../webPages/removeRep.php?alert=execute");
            }
        } else {
            header("Location:../webPages/removeRep.php?alert=sql");
        }
    } else {
        header("Location:../webPages/removeRep.php?alert=fields");
    }
} else {
    header("Location:../Dashboard.php");
    exit();
}
