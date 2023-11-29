<!-- <?php
    session_start();
    $name = $_SESSION["name"];
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Document</title>
</head>
<body>
        <nav class="navbar navbar-light" style="background-color: #021369;">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <form class="d-flex">
                <p style="color: white;">Hi, <strong><?= $name; ?>&ensp;</strong></p>
            <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                <button class="btn btn-danger btn-sm" type="submit" style="height: min-content;">LOGOUT</button>
            </form>
        </div>
        </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>