<?php
    include "../Controllers/reportController.php";
    include "../Controllers/inputController.php";

    if(isset($_POST["search"])){
        $keyword = $_POST["keyword"];

        $data_limit = mysqli_query($conn, "SELECT * FROM sellactivity WHERE 
        CustomerName like '%$keyword%' OR
        CustomerSubName like '%$keyword%' OR
        Region like '%$keyword%' OR
        ProductName like '%$keyword%' OR
        StatusProgress like '%$keyword%'
        
        ORDER BY CreatedDate DESC 
        ");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->

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
        <div class="row justify-content-center pb-3">
            <div class="col-md-6">
            <div class="card shadow bg-body-tertiary" style="width: 40rem; padding: 3rem; background-color:#170560">
                <div class="row">
                    <div class="col-md">
                        <div class="row">
                            <h4 style="color: white;">TOTAL AMOUNT</h4>
                        </div>
                        <div class="row">
                            <strong>
                                <?php while($amount = mysqli_fetch_assoc($qry_amount)) :?>
                                <h1 style="color:gold;"><?= "Rp.".number_format($amount["jml"]); ?></h1>
                                <?php endwhile; ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card shadow bg-body-tertiary" style="width: 40rem; padding: 3rem; background-color:#170560">
                <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <h4 style="color: white;">TOTAL TRANSAKSI</h4>
                            </div>
                            <div class="row">
                                <strong>
                                    <?php while($transc = mysqli_fetch_assoc($qry_transc)) :?>
                                    <h1 style="color:gold;"><?= $transc["jml"]; ?></h1>
                                    <?php endwhile; ?>
                                </strong>
                            </div>
                        </div>
                </div>
            </div>
            </div>


        </div>
        <div class="row justify-content-center">
            <div class="card shadow bg-body-tertiary" style="width: 90rem; padding: 3rem">
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Report Transaksi</h1>
                                </div>
                            </div>
                            <br>
                            <br>
                            <form action="" method="POST">
                                <div class="row p-3" style="background-color:gainsboro;">
                                    <!-- <div class="col-md-4">
                                        <label>Region :</label>
                                        <div class="dropdown">
                                        <select name="region" class="form-select" aria-label="Default select example">
                                            <option selected>-- Select Region --</option>
                                                    <?php while($dt_ListReg = mysqli_fetch_assoc($qry_ListReg)) : ?>
                                            <option value=<?= $dt_ListReg["Value"] ?>><?= $dt_ListReg["Name"]; ?></option>
                                                    <?php endwhile; ?>
                                        </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <input autofocus placeholder="Search data" type="text" name="keyword" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" name="search" class="btn btn-md btn-primary">
                                        <i class='bx bx-search-alt-2 nav_logo-icon' style="color: white;"></i>
                                            Search
                                        </button>
                                    </div>
                                    <!-- <div class="col-md-3">
                                    <label>Tahun :</label>
                                        <div class="dropdown">
                                            <select name="year" class="form-select" aria-label="Default select example">
                                                <option selected>-- select year --</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md">
                                        <br>
                                        <button type="submit" name="search" class="btn btn-md btn-primary">
                                        <i class='bx bx-search-alt-2 nav_logo-icon' style="color: white;"></i>
                                            Search
                                        </button>
                                    </div> -->
                                </div>
                            </form>
                            <br><br>
                            <div class="row">
                                <div class="col-md">
                                    <table class="table table-striped">
                                        <thead style="font-weight:bold;">  
                                            <td>Task Id</td>
                                            <td>Customer Name</td>
                                            <td>Region</td>
                                            <td class="text-center">Product Name</td>
                                            <td>Status Progress</td>
                                            <td>PO Date</td>
                                            <td>Monthly Price</td>
                                            <td></td>
                                        </thead>
                                        <tbody>
                                        <!-- <?php ?> -->
                                        <?php while($listReport = mysqli_fetch_assoc($data_limit)) :?>
                                        <tr>
                                            <td>
                                                <a href="detailReport.php?TaskID=<?= $listReport["Task_ID"]; ?>"><?= $listReport["Task_ID"]; ?></a>
                                            </td>
                                            <td><?= $listReport["CustomerName"]; ?></td>
                                            <td><?= $listReport["Region"]; ?></td>
                                            <td><?= $listReport["ProductName"]; ?></td>
                                            <td><?= $listReport["StatusProgress"]; ?></td>
                                            <td><?= $listReport["PODate"]; ?></td>
                                            <td><?= $listReport["MonthlyPrice"]; ?></td>
                                            <!-- <td>
                                                <a href="detailReport.php?TaskID=<?= $listReport["Task_ID"]; ?>">detail</a>
                                            </td> -->
                                            <!-- <td><button type="submit" name="submit" class="btn btn-primary btn-sm">DETAIL</button></td> -->
                                        </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                            </li>
                                            <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                                ?> 
                                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                <?php
                                            }
                                            ?>				
                                            <li class="page-item">
                                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>
