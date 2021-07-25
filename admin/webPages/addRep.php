<?php
include("./mainMenu.php");
if ($_SESSION["type"] != "Admin") {
    header("Location:../Dashboard.php");
    exit();
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Dashboard.php">Dashbaord</a></li>
                        <li class="breadcrumb-item active">Add Represantative</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <?php
    if (isset($_GET["alert"])) {
        if ($_GET["alert"] == "execute" || $_GET["alert"] == "sql" || $_GET["alert"] == "fields") {
            echo ('<div class="alert alert-warning alert-dismissible fade show" role="alert">');
            if ($_GET["alert"] == "fields") {
                echo ('<strong>Unsuccess</strong> All the Fields are required.
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
                    <strong>Success !</strong> represantative added.tell him to login and change the password.
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
                <h2 style="color: rgb(64, 187, 64);">Add represantative</h2>
            </div>
            <br>
            <form method="POST" action="../includes/addRepBack.php">
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="text" class="form-control" name="lname" id="lname">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="nic">NIC</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="text" class="form-control" name="nic" id="nic">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-3">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="tpNo">Telephone No</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="text" class="form-control" name="tpNo" id="tpNo">
                    </div>
                </div>
                <div class="row mx-5 px-5 mb-5">
                    <div class="col-sm-6 d-flex justify-content-center mt-1">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-sm-6 pr-5">
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                </div>

                <div class="row d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn" style="background-color: #00cc83;border-color: #00cc83; color:white;">Add Represantative</button>
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
</body>

</html>