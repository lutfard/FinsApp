<?php
  session_start();
  // if(!isset($_SESSION["login"])) {
  //   echo ("<script>document.getElementById('alert').style.display = 'block'</script>");
  // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/Login.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>
<body style="background-color: #170560;">
    <div class="container" id="box">
      <form action="../Controllers/login.php" method="POST">
            <div class="mb-4">
              <div class="col text-center">
              <!-- <i class='bx bx-coin-stack nav_logo-icon' style="color: goldenrod;"></i> -->
              <span class="nav_logo-name"><h2><strong>FINS APP</strong></h2></span>
              </div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="username" placeholder="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <!-- <span id="alert" style="color: red; visibility: hidden;">Username atau password salah!</span> -->
            <?php
              if(isset($error)): ?>
                <p>username atau password salah!</p>
            <?php endif; ?>
        </br><button type="submit" name="login" class="btn btn-primary">LOGIN</button>
        </br><a href="#">Forgot Password</a>
      </form>
    </div>
</body>
</html>