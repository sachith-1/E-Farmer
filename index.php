<?php
//default lang set to EN
if (isset($_GET["lang"])) {
  if ($_GET["lang"] == "SI") {
    include("./lang/lang_index.SI.php");
  } else if ($_GET["lang"] == "EN") {
    include("./lang/lang_index.EN.php");
  } else {
    include("./lang/lang_index.EN.php");
  }
} else {
  include("./lang/lang_index.EN.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/home.css" />

  <title>E-Farmer</title>
</head>

<body data-spy="scroll" data-target="#navbarmenu" data-offset="0">
  <div class="container-fluid">
    <div id="navbarmenu" class="navbar navbar-expand-lg navbar-light fixed-top mr-4 ml-4 pl-4 pr-4 border-bottom border-success" style="background: rgba(255, 255, 255, 0.904);">
      <div class="navbar-brand mr-0">
        <a href="./index.php"><img src="imagers/logo.png" style="width: 70%;height: auto;" alt="" srcset="" /></a>
      </div>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainMenuBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainMenuBar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#heroContainer" class="nav-link"><?php echo $langMainMenu["Home"] ?></a>
          </li>
          <li class="nav-item">
            <a href="#help" class="nav-link"><?php echo $langMainMenu["Help"] ?></a>
          </li>
          <li class="nav-item">
            <a href="#services" class="nav-link"><?php echo $langMainMenu["Services"] ?></a>
          </li>
          <li class="nav-item">
            <a href="#footer" class="nav-link"><?php echo $langMainMenu["ContactUs"] ?></a>
          </li>
          <?php
          if (isset($_GET["lang"]) && $_GET["lang"] != "EN") {
            echo '<li class="nav-item">
              <a href="./index.php?lang=EN" class="nav-link">English</a>
            </li>';
          } else {
            echo '<li class="nav-item">
              <a href="./index.php?lang=SI" class="nav-link">සිංහල</a>
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
            <a href="./login.php" class="nav-link"> <?php echo $langMainMenu["Login"] ?></a>
          </li>
        </ul>
      </div>
    </div>
    <?php
    if (isset($_GET['reg'])) {
      if ($_GET['reg'] == "success") {
        echo '<div class="pt-4">
        <div id="alert" class="mt-5 alert alert-success alert-dismissible" role="alert">
        <center>' . $langAlert["regSuccess"] . '<center>
        </div>
        </div>';
      }
    }
    ?>
    <div class="mt-5 pt-4 pl-5 row" id="heroContainer">
      <div class="pt-4 col-lg-5 col-12 order-1 order-lg-0 text-center text-lg-left">
        <h1 class="display-4 ">
          <?php echo $lang["header"] ?>
        </h1>
        <br />
        <p class="lead">
          <?php echo $lang["discription"] ?>
        </p>
        <br />
        <button class="btn btn-lg pr-5 pl-5" style="background-color: #00cc83;border-color: #00cc83; color:white;">
          <?php echo $langMainMenu["SignBuyer"] ?>
        </button>
      </div>
      <div class="col-lg-7 col-12 p-3 order-0 order-lg-1">
        <div class="d-flex justify-content-center">
          <img class="img-fluid" src="imagers/vegiBucket.png" alt="" srcset="" />
        </div>
        <div class="d-flex justify-content-center">
          <!-- Facebook -->
          <a class="mx-2">
            <i class="fa fa-facebook-square fa-2x" style="color: #00cc83;cursor: pointer;" aria-hidden="true"></i>

            </i>
          </a>
          <!-- Twitter -->
          <a class="mx-2">
            <i class="fa fa-twitter-square fa-2x" style="color: #00cc83;cursor: pointer;" aria-hidden="true"></i>

            </i>
          </a>
          <!--Linkedin -->
          <a class="mx-2">
            <i class="fa fa-linkedin-square fa-2x" style="color: #00cc83;cursor: pointer;" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
    <section id="features">
      <div class="row mt-5">
        <div class="col text-center">
          <h2 class="text-center" style="font-weight: 400;"><?php echo $lang["cardsTitle"] ?></h2>
          <hr style="width: 50px;border-top: 2px solid #00cc83;" />
        </div>
      </div>
      <div class="row mb-md-3">
        <div class="col-sm-12 col-md-4">
          <div class="card border-0">
            <img src="imagers/farmer.png" alt="" srcset="" class="card-img-top  mx-auto d-block mt-2" style="width: 20%;height: auto;" />
            <div class="card-body text-center ml-lg-auto ml-sm-3 mr-lg-auto mr-sm-3">
              <h4 class="card-title"><?php echo $lang["farmerCardTitle"] ?></h4>
              <p class="lead card-text">
                <?php echo $lang["farmerCardText"] ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="card border-0">
            <img src="imagers/recycling-bin.png" alt="" srcset="" class="card-img-top mx-auto d-block mt-2" style="width: 20%;height: auto;" />
            <div class="card-body text-center">
              <h4 class="card-title"> <?php echo $lang["foodCardTitle"] ?></h4>
              <p class="lead card-text">
                <?php echo $lang["foodCardText"] ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="card border-0">
            <img src="imagers/price-label.png" alt="" srcset="" class="card-img-top mx-auto d-block mt-2" style="width: 20%;height: auto;" />
            <div class="card-body text-center">
              <h4 class="card-title"><?php echo $lang["priceCardTitle"] ?></h4>
              <p class="lead card-text">
                <?php echo $lang["priceCardText"] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <section id="help">
    <div class="jumbotron jumbotron-fluid" style="background-color: #81818163;color: rgb(255, 255, 255);background-image: url(imagers/c6.jpg);background-repeat: no-repeat;">
      <div class="container">
        <h2 class="display-4 text-center text-lg-left"><?php echo $lang["needHelp"] ?></h2>
        <div class="row">
          <div class="col-lg-10 col-12">
            <p class="lead text-center text-lg-left font-italic font-weight-normal">
              <?php echo $lang["helpParagraph"] ?>
            </p>
          </div>
          <div class="col-12 col-lg-2 text-center">
            <a type="button" class="btn btn-lg " style="background-color: #12c284;color: white;border-color: #12c284;" href="#footer"><?php echo $langMainMenu["ContactUs"] ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="services" class="container">
    <div class="row">
      <div class="col-12 col-md-6 order-1 order-md-0">
        <img class="img-fluid" style="width: 70%;height: auto;" src="imagers/sms.png" alt="" />
      </div>
      <div class="col-12 col-md-6 d-flex align-items-center oder-0 order-md-1 text-justify text-md-left">
        <div>
          <h3><?php echo $lang["smsTitle"] ?></h3>
          <hr style="width: 100%;border-top: 2px solid #00cc83;" />
          <br />
          <p class="lead">
            <?php echo $lang["smsText"] ?>
          </p>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 col-md-6 d-flex align-items-center text-justify text-md-right">
        <div>
          <h3><?php echo $lang["webTitle"] ?></h3>
          <hr style="width: 100%;border-top: 2px solid #00cc83;" />
          <br />
          <p class="lead">
            <?php echo $lang["webText"] ?>
          </p>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="imagers/webinterface.png" alt="" />
      </div>
    </div>
    <hr />
  </section>
  <div class="container-fluid text-center">
    <br />
    <h3 class="mt-2"><?php echo $lang["readyToOder"] ?></h3>
    <button type="button" class="btn btn-lg mt-4" style="background-color: #00cc83;color: white;">
      <?php echo $lang["readyToOderBTN"] ?>
    </button>
  </div>
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
          <br>
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
  <script>
    $(document).ready(function() {
      setTimeout(function() {
        $("#alert").fadeOut();
      }, 4000)
    });
    window.addEventListener("scroll", function() {
      if (document.documentElement.scrollTop == 0) {
        document.getElementById("navbarmenu").classList.remove("shadow");
      }
      if (document.documentElement.scrollTop !== 0) {
        document.getElementById("navbarmenu").classList.add("shadow");
      }
    });
  </script>
</body>

</html>