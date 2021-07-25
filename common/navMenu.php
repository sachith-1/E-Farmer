<?php

$url = "";

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
} else {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
}

?>

<div class="container-fluid mb-4">
    <div id="navbarmenu" class="navbar navbar-expand-lg navbar-light fixed-top mb-2 mr-4 ml-4 pl-4 pr-4 border-bottom border-success" style="background: rgba(255, 255, 255, 0.904);">
        <div class="navbar-brand mr-0">
            <a href="./index.php"><img src="imagers/logo.png" style="width: 70%;height: auto;" alt="" srcset="" /></a>
        </div>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainMenuBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenuBar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="./index.php#heroContainer" class="nav-link"><?php echo $langMainMenu["Home"] ?></a>
                </li>
                <li class="nav-item">
                    <a href="./index.php#help" class="nav-link"><?php echo $langMainMenu["Help"] ?></a>
                </li>
                <li class="nav-item">
                    <a href="./index.php#services" class="nav-link"><?php echo $langMainMenu["Services"] ?></a>
                </li>
                <li class="nav-item">
                    <a href="./index.php#footer" class="nav-link"><?php echo $langMainMenu["ContactUs"] ?></a>
                </li>
                <?php
                if (isset($_GET["lang"]) && $_GET["lang"] != "EN") {
                    $queryStr = "?lang=EN";
                    echo '<li class="nav-item">
                          <a href=' . $url . $queryStr . ' class="nav-link">English</a>
                          </li>';
                } else {
                    $queryStr = "?lang=SI";
                    echo '<li class="nav-item">
                          <a href=' . $url . $queryStr . ' class="nav-link">සිංහල</a>
                          </li>';
                }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="./farmerReg.php" class="nav-link"><?php echo $langMainMenu["SignFarmer"] ?></a>
                </li>
                <li class="nav-item">
                    <a href="./buyerReg.php" id="btnFindFarmer" class="btn pr-3 pl-3" style="background-color: #00cc83;border-color: #00cc83; color:white">
                        <?php echo $langMainMenu["SignBuyer"] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./login.php" class="nav-link"><?php echo $langMainMenu["Login"] ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>