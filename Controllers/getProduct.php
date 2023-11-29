<?php
    include "connection.php";

    $region = $_GET["region"];
    $listProduct = mysqli_query($conn, "SELECT Name FROM MasterProduct WHERE Regional = (SELECT Name FROM lookup WHERE Type = 'Region' AND Value = '$region')");
    
    echo "<option>select product</option>";
    while($row = mysqli_fetch_array($listProduct)){
        echo "<option value=\"".$row["Name"]."\">".$row["Name"]."</option>\n";
    }
?>