<?php
    include "connection.php";
    include "../Controllers/connection.php";
    session_start();
    if(!isset($_SESSION["login"])) {
        header("location: ../Views/");
    }
    $page = "customers";
    $name = $_SESSION["name"];
    $qry_listCust = mysqli_query($conn, "SELECT mc.*, sa.Region, COUNT(sa.CustomerName) jml from mastercustomer mc
	join sellactivity sa on mc.Customer = sa.CustomerName group by sa.CustomerName");
    
    //$listCust = mysqli_fetch_assoc($qry_listCust);

    //var_dump($listCust);
?>