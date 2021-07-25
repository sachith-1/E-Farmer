<?php
include("./dbConn.php");
function userExist(String $table, String $column, String $value)
{
    $query = "select " . $column . " from " . $table . " where " . $column . " = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $value);
    $result = mysqli_stmt_execute($stmt);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return false;
    } else {
        return true;
        mysqli_close($conn);
    }
}
