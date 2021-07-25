<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>signin</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/reg.css">
</head>

<div class="register" style="background-image: url(../imagers/c6.jpg)">
    <div class="row mt-2">
        <div class="col-md-3 register-left mt-5 pt-5">
            <h2>Welcome</h2>
            <h3>E-Farmer</h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="col-md-4"></div>
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Sign In</h3>

                    <div class="row register-form">

                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">

                            <form action="includes/loginback.php" method="post">
                                <div class="form-group">
                                    <select class="form-control mb-4" name="admin">
                                        <option>Admin</option>
                                        <option>Representative</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="NIC *" required name="nic" value="" />
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" required name="password" value="" />
                                </div>
                                <br>
                                <input type="submit" class="btnLogin" style="margin-bottom: 15px;" name="login_btn" value="Login" />

                            </form>
                            <div class="row ">
                                <?php
                                if (isset($_GET['login'])) {
                                    echo " <div 
                                style= 'color: #8d6c09;
                                background-color: #fff3cd;
                                border-color: #ffeeba;
                                padding: 0.75rem 1.25rem;
                                margin-top: 10px;
                                border: 1px solid transparent;
                                border-top-color: transparent;
                                border-right-color: transparent;
                                border-bottom-color: transparent;
                                border-left-color: transparent;
                                border-radius: 0.25rem;
                                margin-left:auto;
                                margin-right:auto;'>
                                ";
                                    if ($_GET['login'] == "unsuccess") {
                                        echo "<center>Incorrect NIC or Password</center>
                                    </div>";
                                    } else if ($_GET['login'] = "err") {
                                        echo "<center>Something went wrong</center>
                                    </div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>