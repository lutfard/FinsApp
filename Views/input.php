<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("location: ../Views/");
    }

    include "../Controllers/inputController.php";

    $name = $_SESSION["name"];
    $page = "input";
    $getReg = mysqli_fetch_assoc($qry_ListReg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/inputStyle.css" type="text/css"> -->

    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function success() {
        return confirm("Are you sure you want to submit?");
    }
</script>


<body>
    <header class="header" id="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="aa col-1">
                    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
                </div>
                <div class="bb col-9">

        <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
                </div>
                <div class="cc col-2 align-self-center">
                <div>
            <p>Hi, <strong><?= $name ?></strong></p>
        </div>
                </div>
            </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <?php include "sidebar2.php"; ?>
        </nav>
    </div>

    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="card shadow bg-body-tertiary" style="width: 40rem; padding: 3rem">
                <form action="../Controllers/inputController.php" method="POST" onsubmit="success()">
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col-md text-center">
                                    <h1>Input Data</h1>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                <label>Customer Name :</label>
                                <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <br>
                                <label>Customer Sub Name :</label>
                                <input type="text" name="subname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <label>City :</label>
                                    <input type="text" name="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  
                                </div>
                                <div class="col">
                                    <br/>
                                    <label>Region :</label>
                                    <div class="dropdown">
                                    <select name="region" id="region" class="form-select" aria-label="Default select example">
                                        <option selected>-- Select Region --</option>
                                        <?php while($dt_ListReg = mysqli_fetch_array($qry_ListReg)) : ?>
                                                <option value="<?= $dt_ListReg["Name"] ?>"><?= $dt_ListReg["Name"]; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    </div>                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <label>Latitude :</label>
                                    <input type="text" name="latitude" pattern="[0-9]+" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  
                                </div>
                                <div class="col">
                                <br/>
                                    <label>Longitude :</label>
                                    <input type="text" name="longitude" pattern="[0-9]+" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">                     
                                </div>                                
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <br/>
                                    <label>Services :</label>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  
                                </div>                                
                            </div> -->
                            <div class="row">
                                <div class="col">
                                    <br/>
                                    <label>PO Date :</label>
                                    <input type="date"  class="form-control" id="POdate" name="POdate">
                                </div>
                                <div class="col">
                                <br/>
                                    <label>Activation Date :</label>
                                    <input type="date" class="form-control" id="ActDate" name="ActDate">                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="control-group col-md">
                                    <br/>
                                    <label>Product Name :</label>
                                    <div class="dropdown">
                                    <select name="productname" id="productname" class="form-select" aria-label="Default select example" id="">
                                        <option selected>select product</option>
                                        <?php while($dt_ListProduct = mysqli_fetch_assoc($qry_productRegion)) : ?>
                                                <option value="<?=$dt_ListProduct["Name"] ?>"><?= $dt_ListProduct["Name"]; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    </div>                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <br/>
                                    <label>Segment :</label>
                                    <div class="dropdown">
                                    <select name="segment" class="form-select" aria-label="Default select example">
                                        <option selected>-- Select OSS Status --</option>
                                        <?php while($dt_ListSegment = mysqli_fetch_assoc($qry_ListSegment)) : ?>
                                                <option value=<?= $dt_ListSegment["Name"] ?>><?= $dt_ListSegment["Name"]; ?></option>
                                        <?php endwhile; ?>                         
                                    </select>
                                    </div>       
                                </div>
                                <div class="col-md-4">
                                <br/>
                                    <label>OSS Status :</label>
                                    <div class="dropdown">
                                    <select name="oss_status" class="form-select" aria-label="Default select example">
                                        <option selected>-- Select OSS Status --</option>
                                        <?php while($dt_ListOSS = mysqli_fetch_assoc($qry_ListOSS)) : ?>
                                                <option value=<?= $dt_ListOSS["Name"] ?>><?= $dt_ListOSS["Name"]; ?></option>
                                        <?php endwhile; ?>                          
                                    </select>
                                    </div>                                          
                                </div>
                                <div class="col-md-4">
                                <br/>
                                    <label>Status Progress :</label>
                                    <div class="dropdown">
                                    <select name="status_progress" class="form-select" aria-label="Default select example">
                                        <option selected>-- Select Status --</option>
                                        <?php while($dt_ListStatus = mysqli_fetch_assoc($qry_ListStatus)) : ?>
                                                <option value=<?= $dt_ListStatus["Name"] ?>><?= $dt_ListStatus["Name"]; ?></option>
                                        <?php endwhile; ?>                                      
                                    </select>
                                    </div>                                         
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <br/>
                                    <label>Sales Name :</label>
                                    <input type="text" name="salesname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  
                                </div>                                
                            </div>
                            <div class="row">  
                                <div class="col-md-6">
                                    <br/>
                                    <label>Monthly Price :</label>
                                    <input type="text" name="monthlyprice" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  
                                </div>                              
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md text-center">
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- <script>
    $("#productname").attr("disabled", true);

    $("#region").change(function() { 
        if($(this).data('options') == undefined){
            $(this).data('options',$('#productname option').clone());
        } 
        var id = $(this).val();
        var options = $(this).data('options').filter('[id=' + id + ']');
        $('#productname').html(options);
        $("#productname").attr("disabled", false);
    });


    $("#productname").change(function() { 
        var link = $(this).val();
        alert(link);
    });
</script> -->
</html>