<?php
if (empty($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["type"]) || empty($_SESSION["type"])) {
    header("Location:../login.php");
    exit();
} else {
    include("../../includes/dbConn.php");
    if (isset($_POST["newPass"], $_POST["oldPass"], $_POST["newCPass"])) {
        if ($_POST["newPass"] == $_POST["newCPass"]) {
            $query = null;
            if ($_SESSION["type"] == "Admin") {
                $query = "select password from admin where nic='" . $_SESSION["nic"] . "'";
            } else if ($_SESSION["type"] == "Representative") {
                $query = "select password from rep where nic=?";
            }
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["password"] == $_POST["oldPass"]) {
                    $query = "";
                    if ($_SESSION["type"] == "Admin") {
                        $query = "update admin set password=? where nic=?";
                    } else if ($_SESSION["type"] == "Representative") {
                        $query = "update rep set password=? where nic=?";
                    }
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $query)) {
                        mysqli_stmt_bind_param($stmt, "ss", $_POST["newPass"], $_SESSION["nic"]);
                        if (mysqli_stmt_execute($stmt)) {
                            header("Location:../webPages/changePass.php?alert=success");
                        } else {
                            header("Location:../webPages/changePass.php?alert=execute");
                        }
                    } else {
                        header("Location:../webPages/changePass.php?alert=sql");
                    }
                } else {
                    header("Location:../webPages/changePass.php?alert=pass");
                }
            }
        } else {
            header("Location:../webPages/changePass.php?alert=ncPass");
        }
    } else {
        header("Location:../webPages/changePass.php?alert=fields");
    }
}
