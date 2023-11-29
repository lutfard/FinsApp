<?php
	include "../Controllers/dashboardController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
	<link rel="stylesheet" href="css/navbar.css">
    <title>Dashboard</title>
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
    <!-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> -->


<div class="container p-4">
	<div class="row">
		<div class="card shadow bg-body-tertiary" style="width: 90rem; padding: 3rem">
				<!-- <div class="row mb-5">
					<div class="container p-5" style="background-color:whitesmoke;">
						<div class="row p-3" style="background-color:gainsboro;">
                            <div class="col-md-4">
                            <label>Bulan :</label>
                                <div class="dropdown">
                                    <select name="month" class="form-select" aria-label="Default select example">
                                        <option selected>-- Select Month --</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <label>Tahun :</label>
                                <div class="dropdown">
                                    <select name="year" class="form-select" aria-label="Default select example">
                                        <option selected>-- select year --</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <br>
                                <button type="submit" name="search" class="btn btn-md btn-primary">
                                    <i class='bx bx-search-alt-2 nav_logo-icon' style="color: white;"></i>
                                    Search
                                </button>
                            </div>
                        </div>
					</div>
				</div> -->
			<div class="row mb-5">
				<div class="col-md-7">
					<div id="content" class="p-md-3">
					<div id="chartContainerBar" style="height: 370px; width: 100%;"></div>
					</div>
				</div>
				<div class="col-md">
					<div id="content" class="p-md-3">
					<div id="chartContainerCircle" style="height: 370px; width: 100%;"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<div id="content" class="p-md-3">
					<div id="chartTopSales" style="height: 370px; width: 100%;"></div>
					</div>
				<div class="col-md">
					<div id="content" class="p-md-3">
					<div id="chartTopProduct" style="height: 370px; width: 100%;"></div>
					</div>
				</div>
				</div>
			</div>
	</div>
</div>



    <script>
			window.onload = function () {
			
			var chart = new CanvasJS.Chart("chartContainerBar", {
				animationEnabled: true,
				theme: "light2", // "light1", "light2", "dark1", "dark2"
				title: {
					text: "Milestones Chart"
				},
				axisY: {
					title: "Ammount"
				},
				data: [{
					type: "column",
					dataPoints: <?php echo json_encode($dataBarChart, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();

			var chart2 = new CanvasJS.Chart("chartContainerCircle", {
				theme: "light2",
				animationEnabled: true,
				title: {
					text: "Milestones Percentage (%)"
				},
				data: [{
					type: "doughnut",
					indexLabel: "{symbol} - {y}",
					yValueFormatString: "#,##0.0\"%\"",
					showInLegend: true,
					legendText: "{label} : {y}",
					dataPoints: <?php echo json_encode($dataCircleChart, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart2.render();

			var chart3 = new CanvasJS.Chart("chartTopSales", {
				animationEnabled: true,
				title:{
					text: "Top 5 Sales"
				},
				axisY: {
					title: "Total Penjualan",
					includeZero: true,
					// prefix: "$",
					// suffix:  "k"
				},
				data: [{
					type: "bar",
					// yValueFormatString: "$#,##0K",
					indexLabel: "{y}",
					indexLabelPlacement: "inside",
					indexLabelFontWeight: "bolder",
					indexLabelFontColor: "white",
					dataPoints: <?php echo json_encode($dataTopSales, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart3.render();

			var chart4 = new CanvasJS.Chart("chartTopProduct", {
				animationEnabled: true,
				title:{
					text: "Top 5 Product"
				},
				axisY: {
					title: "Total Pelanggan",
					includeZero: true,
					// prefix: "$",
					// suffix:  "k"
				},
				data: [{
					type: "bar",
					// yValueFormatString: "$#,##0K",
					indexLabel: "{y}",
					indexLabelPlacement: "inside",
					indexLabelFontWeight: "bolder",
					indexLabelFontColor: "white",
					dataPoints: <?php echo json_encode($dataTopProduct, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart4.render();
			
			}
	</script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>