<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["buyerTP"]) && !empty($_SESSION["buyerTP"])) {
    header("Location:./buyer/index.php");
    exit();
}

//default lang set to EN
if (isset($_GET["lang"])) {
    if ($_GET["lang"] == "SI") {
        include("./lang/lang_mainMenu.SI.php");
        include("./lang/lang_buyerLogin.SI.php");
    } else if ($_GET["lang"] == "EN") {
        include("./lang/lang_mainMenu.EN.php");
        include("./lang/lang_buyerLogin.EN.php");
    } else {
        include("./lang/lang_mainMenu.EN.php");
        include("./lang/lang_buyerLogin.EN.php");
    }
} else {
    include("./lang/lang_mainMenu.EN.php");
    include("./lang/lang_buyerLogin.EN.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Login</title>
</head>

<body style="background-image: url(imagers/c1.jpg)" style="width: 100%;height: auto;">
    <?php
    include("./common/navMenu.php")
    ?>
    <br /><br /><br />
    <section id="reg"">
    <div class=" row d-flex justify-content-center align-content-center">
        <form action="./includes/buyerLoginBack.php" class=" my-5 py-4 px-4" method="post" style="background-color: rgba(49, 48, 48, 0.308);color: white;border-radius: 7px;">
            <div class="row mb-4">
                <h3 class="mx-auto"><?php echo $langBuyerLogin["header"] ?></h3>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="form-group">
                        <label for="tpNo"><?php echo $langBuyerLogin["mNo"] ?>
                            <span style="font-size: large;margin-left: 3px;">*</span></label>
                        <input class="form-control" type="text" name="tpNo" id="tpNo" required />
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="form-group">
                        <label for="pass"><?php echo $langBuyerLogin["pass"] ?><span style="font-size: large;margin-left: 3px;">*</span></label>
                        <input class="form-control" type="password" name="pass" id="pass" required />
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <button name="submit" type="submit" class="btn px-5" style="background-color: #00cc83;color:white;"><?php echo $langBuyerLogin["submit"] ?></button>
                </div>
            </div>
        </form>
        </div>
    </section>
    <br />
    <footer id="footer" class="container-fluid" style="background-color: rgb(24, 23, 23);">
        <div class="container mt-5 pt-3" style="color: white;">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img src="imagers/logo.png" alt="logo" srcset="" />
                </div>
                <div class="col-8 ml-auto"></div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <br />
                    <pre style="font-family:Arial, Helvetica, sans-serif;color: white;font-size:medium;"><?php echo $langFooter["ContactUs"] ?></pre>
                    <address>
                        <?php echo $langFooter["address"] ?>
                    </address>
                </div>
                <div class="col-12 col-md-7">
                    <br />
                    <div class="row d-flex  justify-content-end">
                        <a href="http://reco.gov.lk/" class="text-light" target="_blank" rel="noopener noreferrer"><?php echo $langFooter["MRuralE"] ?></a>
                    </div>
                    <div class="row d-flex  justify-content-end">
                        <a href="http://agrimin.gov.lk/" class="text-light" target="_blank" rel="noopener noreferrer"><?php echo $langFooter["MAgri"] ?></a>
                    </div>
                </div>
            </div>
            <hr style="width:100%;border-top: 2px solid #00cc83;" />
            <div class="d-flex justify-content-center" style="color: #7a7a7a;">
                e-farmer Copyrights 2020
            </div>
            <br />
        </div>
    </footer>
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>