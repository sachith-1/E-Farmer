<?php
if (!isset($_POST["submit"])) {
    header("Location:../index.php");
    exit();
}
include("./dbConn.php");
if (isset($_POST["tpNo"], $_POST["pass"]) && !empty($_POST["tpNo"]) && !empty($_POST["pass"])) {

    $query = "select tpNo from buyer where tpNo=? and password=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ss", $_POST["tpNo"], $_POST["pass"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION["buyerTP"] = $row["tpNo"];
        header("Location:../buyer/index.php");
    } else {
        echo "<script>
        alert('Telephone number or password is not correct');
        window.location='../login.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('Both Fields are required');
        window.location='../login.php';
        </script>";
    exit();
}
