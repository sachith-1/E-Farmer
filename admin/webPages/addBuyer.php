<?php
include("./mainMenu.php");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Dashboard.php">Dashbaord</a></li>
                        <li class="breadcrumb-item active">Add Buyer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <?php
    if (isset($_GET["alert"])) {
        if ($_GET["alert"] == "execute" || $_GET["alert"] == "sql" || $_GET["alert"] == "fields" || $_GET["alert"] == "tpNo") {
            echo ('<div class="alert alert-warning alert-dismissible fade show" role="alert">');
            if ($_GET["alert"] == "fields") {
                echo ('<strong>Unsuccess</strong> All the Fields are required.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            } else if ($_GET["alert"] == "tpNo") {
                echo ('<strong>Unsuccess</strong> User Exist from same Telephone Number.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ');
            } else {
                echo ('<strong>Unsuccess</strong> Something Happened while executing.Please try again.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
            }
        } else if ($_GET["alert"] == "success") {
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success !</strong> represantative added.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            ');
        }
    }

    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="container text-center">
                <h2 style="color: rgb(64, 187, 64);">Add Buyer</h2>
            </div>
            <br>
            <form method="POST" action="../includes/addBuyerBack.php">
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input required type="text" class="form-control" name="fname" id="fname">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input required type="text" class="form-control" name="lname" id="lname">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="tpNo">Mobile Number</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input required type="text" class="form-control" name="tpNo" id="tpNo" placeholder="Ex : 94765592614">
                        <p id="phoneAlert" style="color:#df7272;display: none;">Please use Correct Format</p>
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="tpNo">Gender</label>
                    </div>
                    <div class="col-sm-6 pr-5 d-flex justify-content-center">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="rmale" class="form-check-input" value="male" checked />
                            <label class="form-check-label" for="rmale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" id="rfemale" class="form-check-input" value="female" />
                            <label class="form-check-label" for="rfemale">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-5">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input required type="text" class="form-control" name="address" id="address">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-5">
                    <div class="col-sm-6 d-flex justify-content-center">
                        <label for="">Select Crop</label>
                    </div>
                    <div class="col-sm-6 pr-5">

                        <div class="ui search multiple selection dropdown w-100" id="multiselect" onclick="appendVal()">
                            <!-- This will receive comma separated value like OH,TX,WY !-->
                            <input name="states" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text">Crops</div>
                            <div class="menu">
                                <?php
                                $query = "select * from crop";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ('<div class="item" data-value=' . $row["cID"] . ' onclick="appendVal()">' . $row["cname"] . '</div>');
                                }
                                ?>
                            </div>
                        </div>
                        <input type="hidden" name="cropsVals" id="cropsVals">
                        <p id="cropsAlert" style="color:#df7272;display: none;">At least select one Crop</p>
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-5">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>

                <div class="row d-flex mt-3 justify-content-center">
                    <button type="submit" id="submit" class="btn submit" style="background-color: #00cc83;border-color: #00cc83; color:white;">Add Represantative</button>
                </div>
            </form>
            <br>
        </div>
</div>
</section>


</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--Push Menu for slideBar-->
<script src="../dist/js/pushmenu.js"></script>
<!--Tree View for sidebar dropdown-->
<script src="../dist/js/treeview.js"></script>
<!--Control SlideBar for header and footer width change with left slidebar-->
<script src="../dist/js/controlslidebar.js"></script>
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