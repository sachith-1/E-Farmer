<?php
session_start();
unset($_SESSION['nic']);
unset($_SESSION["type"]);
session_destroy();
header("Location:login.php");
