<?php
if (isset($_GET['ss'])) {
    $pass = password_hash($_GET['pass'], PASSWORD_ARGON2ID);
    echo $pass;
}
?>
<form action="" method="get">
    <input type="text" name="pass" id="">
    <input type="submit" name="ss" value="pass">
</form>