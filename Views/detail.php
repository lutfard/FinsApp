<?php  
include "../Controllers/connection.php";
include "../Controllers/customersControler.php";

    $code = $_GET["code"];
    $query = "SELECT * FROM sellactivity WHERE CustomerName = (SELECT Customer FROM MasterCustomer WHERE CODE = '$code') ORDER BY PODate DESC";
    $row = mysqli_query($conn, $query);
    $header = mysqli_fetch_assoc($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
            <p>Hi, <strong><?= $_SESSION["name"]; ?></strong></p>
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
                                    <h2>Detail History Transaksi</h2>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <td><strong>Customer Name</strong></td>
                                </div>
                                <div class="col-md">
                                    <td><?= $header["CustomerName"]; ?></td>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <td><strong>City</strong></td>
                                </div>
                                <div class="col-md">
                                    <td><?= $header["City"]; ?></td>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <td><strong>Region</strong></td>
                                </div>
                                <div class="col-md">
                                    <td><?= $header["Region"]; ?></td>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <a href="customers.php"><button class="btn btn-primary btn-sm" type="button">Back to List</button></a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped">
                                        <thead style="font-weight:bold;">                                        
                                            <td>Paket</td>
                                            <td class="text-center">PO Date</td>
                                            <td class="text-center">Monthly Price</td>
                                            <td class="text-center">Status</td>
                                        </thead>
                                        <?php while($result = mysqli_fetch_assoc($row)) :?>
                                        <tr>
                                            <td><?= $result["ProductName"]; ?></td>
                                            <td class="text-center"><?= $result["PODate"]; ?></td>
                                            <td class="text-center"><?= $result["MonthlyPrice"] ?></td>
                                            <td class="text-center"><?= $result["StatusProgress"] ?></td>
                                        </tr>
                                        <!-- <?php var_dump($result); ?> -->
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