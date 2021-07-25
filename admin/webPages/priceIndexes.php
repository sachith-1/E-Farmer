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
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="container text-center">
                <h2 style="color: rgb(64, 187, 64);">Price Indexes</h2>
            </div>
            <!-- Fst row -->
            <div class="row">
                <div class="col-12">

                    <!--Items -->
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Crop ID</th>
                                            <th>Crop Name</th>
                                            <th>Price per Kg</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "select crop.cID,crop.cname,priceindex.price,priceindex.date from crop,priceindex where crop.cID=priceindex.cid order by priceindex.date DESC";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo ("<tr class='text-center'>");
                                            echo ("<td>");
                                            echo ($row["cID"]);
                                            echo ("</td>");
                                            echo ("<td>");
                                            echo ($row["cname"]);
                                            echo ("</td>");
                                            echo ("<td>");
                                            echo ($row["price"]);
                                            echo ("</td>");
                                            echo ("<td>");
                                            echo ($row["date"]);
                                            echo ("</td>");
                                            echo ("</tr>");
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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