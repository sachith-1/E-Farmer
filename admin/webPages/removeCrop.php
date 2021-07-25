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
                        <li class="breadcrumb-item active">Price Index</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container text-center">
                    <h2 style="color: rgb(64, 187, 64);">Remove Crop</h2>
                </div>
                <br>
                <form method="GET" action="../includes/removeCropBack.php">
                    <div class="row mx-5 px-5">
                        <div class="col-sm-6 d-flex justify-content-center mt-1">
                            <label for="cropID">Crop ID</label>
                        </div>
                        <div class="col-sm-6 pr-5">
                            <input type="text" class="form-control" name="cropID" id="cropID">
                        </div>
                    </div>
                    <div class="row d-flex mt-3 justify-content-center">
                        <button type="submit" class="btn" style="background-color: #00cc83;border-color: #00cc83; color:white;">Remove Crop</button>
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