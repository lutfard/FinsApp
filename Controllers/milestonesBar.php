<?php
    // Bar Chart
	include "connection.php";
	$qryCountDism = mysqli_query($conn, 
	"SELECT 
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'dismantle' group by StatusProgress) as Dismantle,
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'inquiry' group by StatusProgress) as Inquiry,
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'Iisolir' group by StatusProgress) as Iisolir,
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'PO' group by StatusProgress) as PO,
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'quotation' group by StatusProgress) as Quotation,
		(SELECT COUNT(StatusProgress) from sellactivity where StatusProgress = 'sales' group by StatusProgress) as Sales	
	FROM
		sellactivity
	GROUP BY dismantle, Inquiry, Iisolir, PO, Quotation, Sales");

	$cntDism = mysqli_fetch_assoc($qryCountDism);
	$dataBarChart = array(
		array("label"=> "Dismantle", "y"=> $cntDism["Dismantle"]),
		array("label"=> "Iisolir", "y"=> $cntDism["Iisolir"]),
		array("label"=> "Inquiry", "y"=> $cntDism["Inquiry"]),
		array("label"=> "PO", "y"=> $cntDism["PO"]),
		array("label"=> "Quotation", "y"=> $cntDism["Quotation"]),
		array("label"=> "Sales", "y"=> $cntDism["Sales"]),
	);

?>