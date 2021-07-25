<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["buyerTP"]) || empty($_SESSION["buyerTP"])) {
  header("Location:../login.php");
  exit();
}
include("../../includes/dbConn.php");

//default lang set to EN
$lang;
$findFarms;
$selectVeg;
if (isset($_GET["lang"])) {
    $lang=$_GET["lang"];
    if ($_GET["lang"] == "SI") {
      $findFarms="ගොවීන් සොයන්න";
      $selectVeg="බෝගය තෝරන්න";
    } else if ($_GET["lang"] == "EN") {
      $findFarms="Find Farmers";
      $selectVeg="Select Vegitable";
    } else {
      $findFarms="Find Farmers";
      $selectVeg="Select Vegitable";
    }
} else {
    $findFarms="Find Farmers";
    $selectVeg="Select Vegitable";
    $lang="EN";
}

?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/home.css" />
  <style>
    .searchForm {
      background-image: url("../../imagers/search-banner.png");
      background-repeat: no-repeat;
      background-position: right bottom;
    }
  </style>
</head>
<?php 
  $formSubmit="./PriceTable.php?lang=".$lang;
?>
<body class="h-100" style="background-color: transparent; margin: 0px; padding: 0px;overflow-x: hidden;">
  <form id="theForm" method="POST" action=<?php echo $formSubmit; ?> class="searchForm" style="height: 100%;">
    <div id="form-slide" class="row d-flex h-100 justify-content-center align-items-center mr-0" style="margin-left: -400%;">
      <div class="col-10 col-md-6 pr-0">
        <input type="hidden" id="cropID" name="cropID">
        <select name="selectVegi" id="selectVegi" class="form-control">
          <option selected disabled value="vegiSelect"><?php echo $selectVeg ?></option>
          <?php

          $query = "select cname,cid from crop";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=" . $row["cid"] . ">" . $row["cname"] . "</option>";
          }
          mysqli_close($conn);
          ?>
        </select>
      </div>
      <div class="col-2 pl-1">
        <input id="btnsubmit" type="submit" value=<?php echo '"'. $findFarms.'"' ?> class="btn px-4" style="
              background-color: #00cc83;
              border-color: #00cc83;
              color: white;
            " />
      </div>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script>
    $(function() {
      $("#form-slide").animate({
          "margin-left": 0,
        },
        700
      );
      $("#btnsubmit").click(function(ev) {
        ev.preventDefault();
        var dropdown = document.getElementById("selectVegi");
        var vegi = dropdown.options[dropdown.selectedIndex].value;
        document.getElementById("cropID").value = vegi;
        if (vegi == "vegiSelect") {
          console.log(vegi);
          alert("Select foods from dropdowm menu");
        } else {
          $("#form-slide").animate({
              "margin-left": "400%",
            },
            700,
            function() {
              document.getElementById("theForm").submit();
            }
          );
        }
      });
    });
  </script>
</body>

</html>