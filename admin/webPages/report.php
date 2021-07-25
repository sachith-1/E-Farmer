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
                <h2 style="color: rgb(64, 187, 64);">Report</h2>
            </div>
            <br>
            <div class="container d-flex justify-content-center">
                <div class="form-group w-50">
                    <label for="type">User Type</label>
                    <select class="form-control" name="type" id="type" >
                        <option selected disabled>Select User Type</option>
                        <option value="farmer">Farmer</option>
                        <option value="buyer">Buyer</option>
                    </select>
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="form-group w-50" id="userList" style="display:none;">
                    <label for="userListselect">User List</label>
                    <select class="form-control" name="farmerID" id="userListselect" >
                    </select>
                </div>
            </div>
            <div class="row mx-3">
                <div class="col-12 card" id="sallingPieCart" style="display:none">
                    <div class="card-body">
                        <div class="col-12  d-flex justify-content-center" id="chart_div"></div>
                        <h3 class="text-center">Oders</h3>
                        <div class="col-12  d-flex justify-content-center" >
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Crop Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Price</th>
                                  </tr>
                                </thead>
                                <tbody id="table_orders"></tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

<script>

    $("#type").change(()=>{
        let userType=document.getElementById("type").value;
        console.log(userType);
        $.ajax({
            url:"../includes/getUserList.php",
            type:"POST",
            dataType:"json",
            data:{
                userType:userType
            },
            success:(responce)=>{
                $("#userListselect").empty();
                let op=document.createElement("option");
                op.setAttribute("selected","");
                op.setAttribute("disabled","");
                op.text="Select User";
                document.getElementById("userListselect").add(op);
                for(i=0;i<responce[0].length;i++){
                    let option=document.createElement("option");
                    option.text=responce[1][i];
                    option.value=responce[0][i];
                    document.getElementById("userListselect").add(option);
                }
                $("#userList").css("display","block");
            },
            error:(responce)=>{
                alert(responce.responseText);
            }
        });
    });

    $("#userListselect").change(()=>{

        let valueID=document.getElementById("userListselect").value;
        let userType=document.getElementById("type").value;
        $.ajax({
            url:"../includes/getFarmerReport.php",
            type:"POST",
            dataType:"json",
            data:{
                id:valueID,
                type:userType
            },
            success:(res)=>{
                // Pie Chart
                console.log(res);
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Crops');
                        data.addColumn('number', 'Weight');
                        data.addRows(res[0]);
                        var options = {'title':userType=="farmer" ? 'Sellings from farmer' : 'Sellings from buyer' ,
                                    'width':700,
                                    'height':600,
                                    titleTextStyle:{
                                        fontSize:19,
                                    }
                                };
            
                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                        $("#sallingPieCart").css("display","block");
                    }
                    // order table
                    let table =document.getElementById("table_orders");
                    for(i=0;i<res[1].length;i++){
                        let tr=document.createElement('tr');
                        for(j=0;j<4;j++){
                            let td=document.createElement("td");
                            td.innerHTML=res[1][i][j];
                            tr.appendChild(td);
                        }
                        table.appendChild(tr);
                    }
                
            },
            error:(res)=>{
                console.log(res.responseText);
                alert(res.responseText);
            }
        });

       

    });



</script>

</body>

</html>