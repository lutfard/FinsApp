<?php
    include "connection.php";

    $qryTopSales = mysqli_query($conn, "SELECT salesperson, COUNT(SalesPerson) jml FROM `sellactivity` GROUP BY SalesPerson ORDER BY jml DESC");
    $qryTopProduct = mysqli_query($conn, "SELECT productname, COUNT(productname) jml FROM `sellactivity` GROUP BY productname ORDER BY jml DESC");
    
    $salesName = array();
    $selling = array();
    while($listTopSales = mysqli_fetch_assoc($qryTopSales)){
        array_push($salesName, $listTopSales["salesperson"]);
        array_push($selling, $listTopSales["jml"]);
    }

    $dataTopSales = array( 
        array("y" => $selling[4],"label" => $salesName[4] ),
        array("y" => $selling[3],"label" => $salesName[3] ),
        array("y" => $selling[2],"label" => $salesName[2] ),
        array("y" => $selling[1],"label" => $salesName[1] ),
        array("y" => $selling[0],"label" => $salesName[0] ),
    );

    $productName = array();
    $buy = array();
    while($listTopProduct = mysqli_fetch_assoc($qryTopProduct)){
        array_push($productName, $listTopProduct["productname"]);
        array_push($buy, $listTopProduct["jml"]);
    }    

    $dataTopProduct = array( 
        array("y" => $buy[4],"label" => $productName[4] ),
        array("y" => $buy[3],"label" => $productName[3] ),
        array("y" => $buy[2],"label" => $productName[2] ),
        array("y" => $buy[1],"label" => $productName[1] ),
        array("y" => $buy[0],"label" => $productName[0] ),
    );
    
    ?>              