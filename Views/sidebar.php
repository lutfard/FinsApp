<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    
    <title>Homepage</title>
</head>
<script>
    var a = document.querySelectorAll(".list-unstyled li a");
    for (var i = 0, length = a.length; i < length; i++) {
    a[i].onclick = function() {
        var b = document.querySelector(".list-unstyled li.active");
        if (b) b.classList.remove("active");
        this.parentNode.classList.add('active');
    };
    }
</script>
<body>
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
	                </button>
                </div>
				<div class="p-4">
					<img src="images/logo.png" style="width: 20%;" alt="">
                    <h1><a href="index.html" class="logo">Fins<span>Finance Cashflow Monitoring</span></a></h1>
                    <ul class="list-unstyled mb-5">
                    <li class="li-group active">
                        <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li class="li-group">
                        <a href="#"><span class="fa fa-bar-chart mr-3"></span>Dashboard</a>
                    </li>
                    <li class="li-group">
                    <a href="#"><span class="fa fa-pencil-square-o mr-3"></span>Input</a>
                    </li>
                    <li class="li-group">
                    <a href="#"><span class="fa fa-users mr-3"></span>Customers</a>
                    </li>
                    </ul>
	            </div>
    	    </nav>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

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