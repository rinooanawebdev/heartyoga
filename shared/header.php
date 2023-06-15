<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!--css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- js -->
    <script src="js/scripts.js" defer></script>
</head>
<body>
<style>

/* hamberger */
#time {
    position: fixed;
    z-index: 999;
    width: 100%;
    height: 100%;
    text-align: center;
    color: #fff;
    background-color: hsla(339,62%,32%,1.00);
}

/* position */
.loaded {
  opacity: 0;
  visibility: hidden;
}
header nav {
    margin: 40px 40px 40px 0;
}
.menu-btn{
  position: fixed;
  top: 20px;
  right: 40px;
  z-index: 2;
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #333;
  color: #fff;
}
.menu{
    
  position: fixed;
  top: 0;
  right: 0;
  z-index: 1;
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color:#fff3e8;
  
}
.menu_item{
  width: 100%;
  height: auto;
  padding: 0.5rem 1em;
  text-align: center;
  color: #000;
  box-sizing: border-box;
  font-size:50px;
}

.menu{
  transform: translateX(100vw);
  transition: all .3s linear;
 
}

.menu.is-active{
  transform: translateX(0);
}
.menua{
	color:#ECECEC;
	text-decoration:none;
   
}

.menua:hover {
    color: #feba61;
}

@media(max-width: 768px){
    .disnav{
        display:none;
    }
    .headerlogo{
        margin-left:0;
    }
}
@media(min-width: 769px){
    .menu-btn{
        display:none;
    }
}
        </style>
<header>
        <!-- humberger menu  -->
		<button type="button" class="menu-btn">
		<i class="fa fa-bars" aria-hidden="true"></i>
		</button>

		<div class="menu">
		<div class="menu_item"><a href="index.php" class="menua">HOME</a></div>
		<div class="menu_item"><a href="class2.php" class="menua">BOOK CLASS</a></div>
		<div class="menu_item"><a href="blog.php" class="menua">BLOG</a></div>
		<div class="menu_item"><a href="blog.php" class="menua">CONTACT</a></div>
		</div>

        <div class="headerlogo">
            <a href="#"><img src="image/yoga-logo-white.png" alt="Logo" width="200px" ></a>
        </div>

        <nav class="disnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="class2.php">Book class</a></li>
                <li><a href="blog.php">Blog</a></li>
                <!-- <li><a href="posts.php">Share your journey</a></li> -->
                <?php

                
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                    
                if (empty($_SESSION['user'])) {
                    echo '<li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>';
                }
                else {
                    echo '<li><a href="#">' . $_SESSION['user'] . '</a></li>
                    <li><a href="logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <script>
	'use strict'

			window.onload = function() {
				var bar = new ProgressBar.Line(time_text, {
				strokeWidth: 0,
				duration: 1000,
				trailWidth: 0,
				// text style
				text: {
					style: {
						position:'absolute',
						left:'50%',
						top:'50%',
						padding:'0',
						margin:'0',
						transform:'translate(-50%,-50%)',
						'font-size':'2rem',
						color:'#fff',
					},
					autoStyleContainer: false 
				},
				step: function(state, bar) {
					bar.setText(Math.round(bar.value() * 100) + ' %'); 
				}
				
				});
					
			bar.ansimate(1.0, function () {
				$("#time").delay(500).fadeOut(800);
			})
			};  
					


						
			document.querySelector('.menu-btn').addEventListener('click', function(){
			document.querySelector('.menu').classList.toggle('is-active');
			});
					
					
	
	</script>
	


       