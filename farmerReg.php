<?php
//default lang set to EN
if (isset($_GET["lang"])) {
    if ($_GET["lang"] == "SI") {
        include("./lang/lang_mainMenu.SI.php");
        include("./lang/lang_farmerReg.SI.php");
    } else if ($_GET["lang"] == "EN") {
        include("./lang/lang_mainMenu.EN.php");
        include("./lang/lang_farmerReg.EN.php");
    } else {
        include("./lang/lang_mainMenu.EN.php");
        include("./lang/lang_farmerReg.EN.php");
    }
} else {
    include("./lang/lang_mainMenu.EN.php");
    include("./lang/lang_farmerReg.EN.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Farmer Buyer-Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />

</head>

<body style="background-image: url(imagers/c3.jpg)" style="width: 100%;height: auto;">
    <?php
    include("./common/navMenu.php")
    ?>
    <br /><br /><br />
    <section id="reg">
        <div class=" row d-flex justify-content-center align-content-center">
            <form action="./includes/farmerRegBack.php" name="farmerReg" class=" my-5 py-4 px-4" method="post" style="background-color: rgba(49, 48, 48, 0.308);color: white;border-radius: 7px;">
                <div class="row">
                    <h3 class="mx-auto"><?php echo $langFarmerReg["header"] ?></h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fname"><?php echo $langFarmerReg["fname"] ?>
                                <span style="font-size: large;margin-left: 3px;">*</span></label>
                            <input class="form-control" type="text" name="fname" id="fname" required />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label for="lname"><?php echo $langFarmerReg["lname"] ?><span style="font-size: large;margin-left: 3px;">*</span></label>
                            <input class="form-control" type="text" name="lname" id="lname" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label for="tpNo"><?php echo $langFarmerReg["mNo"] ?>
                                <span style="font-size: large;margin-left: 3px;">*</span></label>
                            <input type="text" name="tpNo" id="tpNo" class=" tpNo form-control" placeholder="ex : 94799999999" required />
                            <p id="phoneAlert" style="color:#ffc7c7;display: none;"> <?php echo $langFarmerReg["phoneAlert"] ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 d-flex justify-content-center mt-2">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="rmale" class="form-check-input" value="male" checked />
                            <label class="form-check-label" for="rmale"><?php echo $langFarmerReg["male"] ?></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="rfemale" class="form-check-input" value="female" />
                            <label class="form-check-label" for="rfemale"><?php echo $langFarmerReg["female"] ?></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="address"><?php echo $langFarmerReg["address"] ?><span style="font-size: large;margin-left: 3px;">*</span></label>
                        <input class="form-control" type="text" name="address" id="address" required />
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-12">
                        <p style="color:white;"><?php echo $langFarmerReg["selectCrop"] ?></p>
                        <div class="ui search multiple selection dropdown w-100" id="multiselect" onclick="appendVal()">
                            <!-- This will receive comma separated value like OH,TX,WY !-->
                            <input name="states" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text">Crops</div>
                            <div class="menu">
                                <?php
                                include_once("./includes/dbConn.php");
                                $query = "select * from crop";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ('<div class="item" data-value=' . $row["cID"] . ' onclick="appendVal()">' . $row["cname"] . '</div>');
                                }
                                ?>
                            </div>
                        </div>
                        <input type="hidden" name="cropsVals" id="cropsVals">
                        <p id="cropsAlert" style="color:#ffc7c7;display: none;"> <?php echo $langFarmerReg["cropAlert"] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="email"><?php echo $langFarmerReg["email"] ?></label>
                        <input type="email" name="email" id="email" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12 form-group">
                        <label for="pass"><?php echo $langFarmerReg["pass"] ?><span style="font-size: large;margin-left: 3px;">*</span></label>
                        <input type="password" name="pass" id="pass" class="form-control" required />
                    </div>
                    <div class="col-sm-6 col-12">
                        <label for="cpass"><?php echo $langFarmerReg["cPass"] ?><span style="font-size: large;margin-left: 3px;">*</span></label>
                        <input type="password" name="cpass" id="cpass" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <small class="ml-4"><?php echo $langFarmerReg["note"] ?></small>
                </div>
                <div class="row d-flex justify-content-center">
                    <button type="submit" id="submit" class=" submit btn px-5" style="background-color: #00cc83;color:white;">
                        <?php echo $langFarmerReg["submit"] ?>
                    </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <script>
        var curVal = $('#multiselect').dropdown();

        function appendVal() {
            var curVal = $('#multiselect').dropdown("get value");
            document.getElementById("cropsVals").value = curVal;
        }

        $('.submit').click(function(event) {
            var data = $('#tpNo').val();
            crops(event);
            phonenumber(data);
        });

        function crops(event) {
            var crops = document.getElementById("cropsVals").value;
            if (crops === "" || crops === null) {
                event.preventDefault();
                document.getElementById("cropsAlert").style.display = "block";
                console.log("invalid");
            } else {
                document.getElementById("cropsAlert").style.display = "none";
            }
        }

        function phonenumber(inputtxt) {
            var phoneno = /^94[1-9]\d{8}$/m;
            if (String(inputtxt).match(phoneno)) {
                document.getElementById("phoneAlert").style.display = "none";
            } else {
                event.preventDefault();
                document.getElementById("phoneAlert").style.display = "block";
            }
        }
    </script>
</body>

</html>