<?php
    include 'connection.php';
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'");
    $check = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);

    if ($check > 0) {
        if($username == $data["USERNAME"]) {
            if($password == $data["PASSWORD"]) {
                $_SESSION["login"] = true;
                $_SESSION["name"] = $data["NAME"]; 
                header("location: ../Views/dashboard.php");
                exit;
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Username atau Password salah!");';
                echo 'window.location.href = "../Views/";';
                echo '</script>';   
            }
        } 
        
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("User tidak terdaftar!");';
        echo 'window.location.href = "../Views/";';
        echo '</script>';
    }

     

?>