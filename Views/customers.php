<?php
    include "../Controllers/customersControler.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
<script>
    $(document).ready(function(){
        $(document).on('click', '.view_data', function(){
            var code = $(this).attr("id");
            $.ajax({
            url:"detail.php",
            method:"POST",
            data:{code:code},
            success:function(data){
                $('#detail_cust').html(data);
                $('#dataModal').modal('show');
            }
            });
        });        
    });
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
            <div class="card shadow bg-body-tertiary" style="width: 90rem; padding: 3rem">
                <form action="detail.php" method="POST">
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col text-center">
                                    <h2>Data List Customer</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped">
                                        <thead style="font-weight:bold;">                                        
                                            <td>Code</td>
                                            <td>Customer</td>
                                            <td class="text-center">Region</td>
                                            <td class="text-center">Total Pembelian</td>
                                        </thead>
                                        <?php while($listCust = mysqli_fetch_assoc($qry_listCust)) :?>
                                        <tr>
                                            <td><?= $listCust["Code"]; ?></td>
                                            <td>
                                                <a href="detail.php?code=<?= $listCust["Code"]; ?>"><?= $listCust["Customer"]; ?></a>
                                            </td>
                                            <td class="text-center"><?= $listCust["Region"] ?></td>
                                            <td class="text-center"><?= $listCust["jml"] ?></td>
                                            <!-- <td><button type="submit" name="submit" class="btn btn-primary btn-sm">DETAIL</button></td> -->
                                        </tr>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">History Customer</h4>
            </div>
            <div class="modal-body" id="detail_cust">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>