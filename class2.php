<!-- header -->
<?php
$title = 'class';
require 'shared/header.php';
?>

<main class="home">
    <div class="section2">
        <div >
            <h1>Our Classes</h1>
            <h2>Here is what we have prepared for you</h2>
            <p>These are flexible memberships with options for holds. Includes unlimited access to all locations and Live Studio Feeds </p>
            
        </div>
    </div>
</main>



     <section class="section2">
 
			<ul class="slider">
                <li class="example"><img src="image/class4.png" alt="pic" ><p><b>Month to Month</b><br><small>Our most popular pass</small><br>$154/month</p></li>
                <li class="example"><img src="image/class5.png" alt="pic" ><p><b>Annual</b><br><small>Best savings for the regular yogis</small><br>$1540/month</p></li>
                <li class="example"><img src="image/class6.png" alt="pic" ><p><b>3 Month</b><br><small>Save $139<br>$476/month</small></p></li>
                <li class="example"><img src="image/class7.png" alt="pic" ><p><b>1 Month</b><br><small>Regular practitioner</small><br>$154/month</p></li>
                <li class="example"><img src="image/class8.png" alt="pic" ><p><b>Single Class</b><br><small>A single drop-in visit</small><br>$27</p></li>
                <li class="example"><img src="image/class6.png" alt="pic" ><p><b>10 Class Pack</b><br><small>A flexible pass </small><br>$197</p></li>
            </ul>
   
			
			
	 </section>

<style>
header {
    
    background: #ffffff00;
    width: 100%;
    height: 10vh;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    display: flex;
    justify-content: space-between;
    padding-top:20px;
    margin-top:0;
   
}
body{
    background-color:#fff3e8;
}
.section2{
    margin:0 auto;
    width:1000px;
    padding: 0;
    display: flex;
    flex-direction: column;
    /* align-items:center; */
    justify-content:center;
    background-color:#fff3e8;
}
.sectioncon2{
    width:60%;
    text-align:left;
    color:#000;
   
}
header {
     background: #ffffff00;
    width: 100%;
    height: 10vh;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    display: flex;
    justify-content: space-between;
    padding-top:20px;
    margin-top:0;
    color:#fff;
}
.slider {
    width:100%;
    margin:0 auto;
    padding-top:15%;
}

.slider img {
    width:100%;
    height:auto;
}

/*slick*/

.slider .slick-slide {
    margin:0 10px;
}

.example {
  position: relative;
  display:flex;
  width:30%;
  margin-bottom:5%;
  margin-right: 20px;
  box-shadow: 0px 10px 10px -6px rgba(0, 0, 0, 0.3);
  }

.example p {
    
    line-height: 1.5;
    font-size:1.5rem;
    color:#fff;
    position: absolute;
    text-align:left;
    top: 40%;
    left: 40%;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    margin:0;
    padding:0;
  }

.example img {
  width: 100%;
  filter: brightness(50%);
  }

  h5{
    padding-left:10%;
   }
   .slider{
    display:flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-left: -20px;
} 

.menu{
    color:#000000;
}
.disnav ul li a{
color:#000;
    }

@media(max-width: 768px){
.section2{
    width:100%;
    
}
.slider{
    display:block;
   
}
.example{
width:80%;
margin:0 auto;
margin-bottom:5%;
}
}


</style>


</script>
<!-- footer -->
<?php require('shared/footer.php');


