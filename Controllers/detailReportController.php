<?php
    include "connection.php";
    session_start();
    // if(!isset($_SESSION["login"])) {
    //     header("location: ../Views/");
    // }

    $taskID = $_GET["TaskID"];
    $qry_detailReport = mysqli_query($conn, "SELECT * FROM sellactivity WHERE Task_ID = '$taskID'");
    $get_data = mysqli_fetch_assoc($qry_detailReport);


    if(isset($_POST["update"])){
        // $taskID = IDcheck();
        $name = $_POST["name"];
        $subname = $_POST["subname"];
        $city = $_POST["city"];
        $region = $_POST["region"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $po_date = date('Y-m-d', strtotime(str_replace("/","-",$_POST["POdate"])));
        $active_date = date('Y-m-d', strtotime(str_replace("/","-",$_POST["ActDate"])));
        $product_name = $_POST["productname"];
        $segment = $_POST["segment"];
        $oss_status = $_POST["oss_status"];
        $status_progress = $_POST["status_progress"];
        $sales_name = $_POST["salesname"];
        $monthly_price = $_POST["monthlyprice"];

        mysqli_query($conn, "UPDATE sellactivity SET 
        
            CustomerName = '$name',
            CustomerSubName = '$subname',
            Latitude = '$latitude',
            Longitude = '$longitude',
            City = '$city',
            Region = '$region',
            PODate = '$po_date',
            ActivationDate = '$active_date',
            ProductName = '$product_name',
            Segment = '$segment',
            OSS_Status = '$oss_status',
            StatusProgress = '$status_progress',
            SalesPerson = '$sales_name',
            CreatedDate = (SELECT CURRENT_TIMESTAMP),
            MonthlyPrice = '$monthly_price'
            
            WHERE Task_ID = '$taskID'
        ");
        
    echo "<script>";
    echo "alert('I am an alert box!')";
    echo "</script>";

    header("Location: ../Views/report.php");
    }

    if(isset($_POST["delete"])){

        mysqli_query($conn, "DELETE FROM sellactivity WHERE Task_ID = '$taskID'");
        
    echo "<script>";
    echo "alert('I am an alert box!')";
    echo "</script>";

    header("Location: ../Views/report.php");
    }
?>