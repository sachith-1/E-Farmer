<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])) {
    header("Location:../login.php");
    exit();
}

//default lang set to EN
$lang;
if (isset($_GET["lang"])) {
    $lang=$_GET["lang"];
    if ($_GET["lang"] == "SI"){
        include("../lang/lang_mainMenu.SI.php");
    } else if ($_GET["lang"] == "EN") {
        include("../lang/lang_mainMenu.EN.php");
    } else {
        include("../lang/lang_mainMenu.EN.php");
    }
} else {
    include("../lang/lang_mainMenu.EN.php");
    $lang="EN";
}

?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/home.css" />
    <style>
        .nav-link:hover {
            color: #cbffed;
        }

        .main-body {
            background-image: linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%);
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body style="height: 100%;" class="main-body">
    <div class="container-fluid" style="height: 60px;">
        <div id="navbarmenu" class="navbar navbar-expand-lg navbar-light fixed-top px-3 border-bottom border-success" style="background: #00CC83;">
            <div class="navbar-brand mr-0">
                <a href="../index.php"><img src="../imagers/logo-white.png" style="width: 70%;height: auto;" alt="" srcset="" /></a>
            </div>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainMenuBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenuBar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="./index.php" style="color:white" class="nav-link"><?php echo $langMainMenu["Home"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php#help" style="color:white" class="nav-link"><?php echo $langMainMenu["Help"] ?></a>
                    </li>
                    <?php
                    if (isset($_GET["lang"]) && $_GET["lang"] != "EN") {
                        echo '<li class="nav-item">
                                    <a href="./index.php?lang=EN"style="color:white" class="nav-link">English</a>
                               </li>';
                    } else {
                        echo '<li class="nav-item">
                                    <a href="./index.php?lang=SI" style="color:white" class="nav-link">සිංහල</a>
                              </li>';
                    }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="./webPages/myAccount.php" id="btnFindFarmer" class="nav-link" style="color:white">
                            <i class="fa fa-user-circle"></i>
                            <?php echo $langMainMenu["account"] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./logout.php" style="color:white" class="nav-link"><?php echo $langMainMenu["logOut"] ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section style=" height: calc(100% - 60px)" class="m-0 p-0">
        <?php
        $iframeLink="./webPages/searchFoods.php?lang=".$lang;
        ?>
        <iframe src=<?php echo $iframeLink ?> frameborder="0" style="width: 100%;height:100%;"></iframe>
    </section>
    <script src="../js/jquery-3.4.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>