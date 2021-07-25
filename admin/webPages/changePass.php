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
                        <li class="breadcrumb-item active">Chnage Password</li>
                    </ol>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET["alert"])) {
            if ($_GET["alert"] == "execute" || $_GET["alert"] == "sql" || $_GET["alert"] == "fields" || $_GET["alert"] == "ncPass" || $_GET["alert"] == "pass") {
                echo ('<div class="alert alert-warning alert-dismissible fade show" role="alert">');
                if ($_GET["alert"] == "fields") {
                    echo ('<strong>Unsuccess</strong> All the Fields are required.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                } elseif ($_GET["alert"] == "pass") {
                    echo ('<strong>Unsuccess</strong> Given password not matched.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                } elseif ($_GET["alert"] == "ncPass") {
                    echo ('<strong>Unsuccess</strong> New & Confirm Password not matched.
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
                    <strong>Success !</strong> Your password changed.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            ');
            }
        }

        ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container text-center">
                    <h2 style="color: rgb(64, 187, 64);">Change Password</h2>
                </div>
                <br>
                <form method="POST" action="../includes/changePassBack.php">
                    <div class="row mx-5 px-5 mb-3">
                        <div class="col-sm-6 d-flex justify-content-center mt-1">
                            <label for="oldPass">Old Password</label>
                        </div>
                        <div class="col-sm-6 pr-5">
                            <input type="password" class="form-control" name="oldPass" id="oldPass">
                        </div>
                    </div>
                    <div class="row mx-5 px-5 mb-3">
                        <div class="col-sm-6 d-flex justify-content-center mt-1">
                            <label for="newPass">New Password</label>
                        </div>
                        <div class="col-sm-6 pr-5">
                            <input type="password" class="form-control" name="newPass" id="newPass">
                        </div>
                    </div>
                    <div class="row mx-5 px-5 mb-3">
                        <div class="col-sm-6 d-flex justify-content-center mt-1">
                            <label for="newCPass">Confirm New Password</label>
                        </div>
                        <div class="col-sm-6 pr-5">
                            <input type="password" class="form-control" name="newCPass" id="newCPass">
                        </div>
                    </div>
                    <div class="row d-flex mt-3 justify-content-center">
                        <button type="submit" class="btn" style="background-color: #00cc83;border-color: #00cc83; color:white;">Change Password</button>
                    </div>
                </form>
                <br>
            </div>
        </section>
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