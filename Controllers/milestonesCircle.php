<?php
    // Circle Chart
	include "connection.php";
	include "milestonesBar.php";
	$qryCount = mysqli_query($conn, "SELECT StatusProgress, COUNT(StatusProgress) as cnt from sellactivity GROUP BY StatusProgress");
	
	$sum = 0;
	while($data = mysqli_fetch_assoc($qryCount)){
		$sum += (int)$data["cnt"];
		//var_dump($data);
		//echo $sum;
	};

	//$jml = array_sum($result["cnt"]);

	$dataCircleChart = array( 
		array("label"=>"Dismantle","y"=>$cntDism["Dismantle"] / $sum * 100),
		array("label"=>"Iisolir","y"=>$cntDism["Iisolir"] / $sum * 100),
		array("label"=>"Inquiry","y"=>$cntDism["Inquiry"] / $sum * 100),
		array("label"=>"PO","y"=>$cntDism["PO"] / $sum * 100),
		array("label"=>"Quotation","y"=>$cntDism["Quotation"] / $sum * 100),
		array("label"=>"Sales","y"=>$cntDism["Sales"] / $sum * 100),	 
	);

?>