<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])) {
    header("Location:../../login.php");
    exit();
}else{
	include("../../includes/DbConn.php");
}


//default lang set to EN
$lang;
if (isset($_GET["lang"])) {
    $lang=$_GET["lang"];
    if ($_GET["lang"] == "SI") {
        include("../../lang/lang_mainMenu.SI.php");
    } else if ($_GET["lang"] == "EN") {
        include("../../lang/lang_mainMenu.EN.php");
    } else {
        include("../../lang/lang_mainMenu.EN.php");
    }
} else {
    include("../../lang/lang_mainMenu.EN.php");
    $lang="EN";
}

?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/home.css" />
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
                <a href="../index.php"><img src="../../imagers/logo-white.png" style="width: 70%;height: auto;" alt="" srcset="" /></a>
            </div>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainMenuBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainMenuBar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="../../index.php" style="color:white" class="nav-link"><?php echo $langMainMenu["Home"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index.php#help" style="color:white" class="nav-link"><?php echo $langMainMenu["Help"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index.php#help" style="color:white" class="nav-link"><?php echo $langMainMenu["orders"] ?></a>
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
                        <a href="./login.php" style="color:white" class="nav-link"><?php echo $langMainMenu["logOut"] ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section style=" height: calc(100% - 60px)" class="m-0 p-0 d-flex justify-content-center align-items-center">
        <div class="card">
		<div class="card-header">
			<p class="lead mb-0" style="font-weight:500;">Account Settings</p>
		</div>
		<?php
			$query="select * from buyer where tpNo=".$_SESSION["buyerTP"];
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				$fname=$row['fname'];
				$lname=$row["lname"];
				$tpNo=$row['tpNo'];
				$address=$row['address'];
				$email=$row['email'];
			}
		?>
			<div class="card-body">
					<form action="../includes/accountSettings.php" method="post">
						<div class="row">
							<div class="col-6 form-group">
								<Label for="fname">First Name</Label>
								<input class="form-control" type="text" name="fname" id="fname" value=<?php echo $fname ?>>
							</div>
							<div class="col-6 form-group">
								<Label for="lname">Last Name</Label>
								<input class="form-control" type="text" name="lname" id="lname" value=<?php echo $lname ?>>
							</div>
						</div>
						<div class="row">
							<div class="col-12 d-flex align-items-center mb-2">
								<div class="custom-control custom-radio  custom-control-inline">
									<input type="radio" value="male" checked id="customRadio1" name="gender" class="custom-control-input">
									<label class="custom-control-label" for="customRadio1">Male</label>
								  </div>
								  <div class="custom-control custom-radio  custom-control-inline">
									<input type="radio" id="customRadio2" name="gender" value="female" class="custom-control-input">
									<label class="custom-control-label" for="customRadio2">Female</label>
								  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 form-group">
								<Label for="address">Address</Label>
								<input class="form-control" type="text" name="address" id="address" value=<?php echo $address ?>>
							</div>
						</div>
						<div class="row">
							<div class="col-12 form-group">
								<Label for="fname">E-mail</Label>
								<input class="form-control" type="text" name="email" value=<?php echo $email ?> id="email">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12 form-group d-flex justify-content-center">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
			</div>
        </div>
    </section>

    <script src="../../js/jquery-3.4.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>