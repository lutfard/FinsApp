<?php
        session_start();
        if(!isset($_SESSION["login"])) {
            header("location: ../Views/");
        }
        $name = $_SESSION["name"];
        $page = "dashboard";
    
        include "inputController.php";
        include "milestonesBar.php";
        include "milestonesCircle.php"; 
        include "topRated.php";

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

