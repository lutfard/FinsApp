<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("location: ../Views/");
    }
    $name = $_SESSION["name"];


	include "milestonesBar.php";
	include "milestonesCircle.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <title>Homepage</title>
</head>
<body>
		<?php include "navbar.php"; ?>
		<div class="wrapper d-flex align-items-stretch">
			<?php
				include "sidebar.php";
			?>

        <!-- Page Content  -->
			<div class="container">
				<div class="row">
					<div class="col-7">
						<div id="content" class="p-md-3">
						<div id="chartContainerBar" style="height: 370px; width: 100%;"></div>
							<!-- <a href="../Controllers/logout.php">LOGOUT</a> -->
						</div>
					</div>
					<div class="col">
						<div id="content" class="p-md-3">
						<div id="chartContainerCircle" style="height: 370px; width: 100%;"></div>
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
			
			}
		</script>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




</body>
</html>