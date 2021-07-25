<?php

if (!isset($_POST['nic']) || empty($_POST['nic'])) {
    header('Location: ../login.php?login=Invalidusername');
} else {
    include("../../includes/dbConn.php");

    $nic = $_POST['nic'];
    $pass = $_POST['password'];
    $type = $_POST['admin'];
    $query = "";
    if ($type === "Admin") {
        $query .= "select nic from admin where password=? and nic=?";
    } else if ($type === "Representative") {
        $query .= "select nic from rep where password=? and nic=?";
    } else {
        header("Location: ../login.php?login=err");
        exit;
    }
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ss", $pass, $nic);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['nic'] = $nic;
        $_SESSION['type'] = $type;
        header("Location:../Dashboard.php");
    } else {
        header("Location: ../login.php?login=unsuccess");
    }
}
