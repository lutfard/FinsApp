<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body id="body-pd">
    
    <!-- <div class="l-navbar" id="nav-bar"> -->
        <!-- <nav class="nav"> -->
            <div> 
                <a href="#" class="nav_logo">
                    <i class='bx bx-coin-stack nav_logo-icon' style="color: goldenrod;"></i>
                    <span class="nav_logo-name"><h2><strong>FINS</strong></h2></span> 
                </a>
                <div class="nav_list"> 
                    <a href="dashboard.php" class="nav_link <?php if($page == "dashboard"){echo "active";} ?>"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> </a> 
                    <a href="report.php" class="nav_link <?php if($page == "report"){echo "active";} ?>"> 
                        <i class='bx bx-list-ol nav_icon'></i> 
                        <span class="nav_name">Report</span> </a> 
                    <a href="input.php" class="nav_link <?php if($page == "input"){echo "active";} ?>"> 
                        <i class='bx bx-edit nav_icon'></i> 
                        <span class="nav_name">Input</span> </a> 
                    <a href="customers.php" class="nav_link <?php if($page == "customers"){echo "active";} ?>"> 
                        <i class='bx bx-group nav_icon'></i> 
                        <span class="nav_name">Customers</span> </a> 
                </div>
            </div>
            <a href="../Controllers/logout.php" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">SignOut</span> 
            </a>
        <!-- </nav> -->
    <!-- </div> -->
    <!--Container Main start-->
    <!-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> -->

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
</script>



</body>
</html>