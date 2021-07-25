<?php

if (empty($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
}


if (!isset($_GET['cropName']) || empty($_GET['cropName'])) {
    header("Location: ../webPages/addCrop.php");
    exit();
} else {
    include("../../includes/dbConn.php");

    $cname = mysqli_real_escape_string($conn, $_GET['cropName']);

    $query = "select cname from crop where cname='" . $cname . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Crop already exist with given name');
            window.location='../webPages/addCrop.php';
        </script>";
    } else {
        $query = "insert into crop (cname) values('" . $cname . "')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
            alert('Crop Added Successfuly');
            window.location='../webPages/addCrop.php';
        </script>";
        }
    }
}
