<?php
    include "connection.php";

    $qry_ListReg = mysqli_query($conn, "SELECT * FROM lookup WHERE Type = 'Region'");
    $qry_ListOSS = mysqli_query($conn, "SELECT * FROM lookup WHERE Type = 'OSS_status'");
    $qry_ListStatus = mysqli_query($conn, "SELECT * FROM lookup WHERE Type = 'StatusProgress'");
    $qry_ListSegment = mysqli_query($conn, "SELECT * FROM lookup WHERE Type = 'Segment'");
    $qry_productRegion = mysqli_query($conn, "SELECT * FROM MasterProduct");


    function IDcheck(){
        include "connection.php";
        do{
            $numb = "FA".(string)rand(111111,999999);
            $qryCheckID = mysqli_query($conn, "SELECT * FROM sellactivity WHERE Task_ID = '$numb'");
            $rowcount = mysqli_num_rows($qryCheckID);

            return $numb;
        }
        while($rowcount > 0);
    }
?>





<?php
    if(isset($_POST["submit"])){
        $taskID = IDcheck();
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

        mysqli_query($conn, "INSERT INTO sellactivity VALUES 
        (
            '$taskID',
            '$name',
            '$subname',
            '$latitude',
            '$longitude',
            '$city',
            '$region',
            '$po_date',
            '$active_date',
            '$product_name',
            '$segment',
            '$oss_status',
            '$status_progress',
            '$sales_name',
            (SELECT CURRENT_TIMESTAMP),
            '$monthly_price'
        )
        ");
        
    echo "<script>";
    echo "alert('I am an alert box!')";
    echo "</script>";

    header("Location: ../Views/report.php");
    }
    
    

?>