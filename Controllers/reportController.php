<?php
    include "../Controllers/connection.php";

    session_start();
    if(!isset($_SESSION["login"])) {
        header("location: ../Views/");
    }
    $page = "report";
    $name = $_SESSION["name"];
    
    $qry_amount = mysqli_query($conn, "SELECT SUM(MonthlyPrice) jml FROM sellactivity");
    $qry_transc = mysqli_query($conn, "SELECT COUNT(Task_ID) jml FROM sellactivity");

    //pagination
    $batas = 25;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $qry_reportAll = mysqli_query($conn,"SELECT * from sellactivity ORDER BY CreatedDate DESC");
    $jumlah_data = mysqli_num_rows($qry_reportAll);
    $total_halaman = ceil($jumlah_data / $batas);

    $data_limit = mysqli_query($conn,"SELECT * from sellactivity ORDER BY CreatedDate DESC limit $halaman_awal, $batas ");
    $nomor = $halaman_awal+1;
    //end pagination

        $qry = '';
        $qry =  "SELECT Task_ID, CustomerName, Region, ProductName, StatusProgress, PODate, MonthlyPrice FROM sellactivity";
        $qry_report = mysqli_query($conn, $qry);        




    // function formMonth(){
    //     $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 12 months');
    //     $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 0 months');
    //     while($month < $end){
    //         //$selected = (date('F', $month)==date('F'))? ' selected' :'';
    //         echo '<option'.' value="'.date('n', $month).'">'.date('F', $month).'</option>'."\n";
    //         $month = strtotime("+1 month", $month);
    //     }
    //   }
?>