<?php
if (!isset($_GET['cropID']) || empty($_GET['cropID'])) {
    header("Location: ../webPages/removeCrop.php");
} else {
    include("../../includes/dbConn.php");

    $cropID = mysqli_real_escape_string($conn, $_GET['cropID']);
    $query = "delete from crop where cID=" . $cropID;
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Crop Removed Successfuly');
            window.location='../webPages/removeCrop.php';
        </script>";
    } else {
        echo "<script>
        alert('Something happen while executing.Please try again.');
        window.location='../webPages/removeCrop.php';
        </script>";
    }
}
