<!-- header -->
<?php
$title = 'Login';
require 'shared/header.php';
?>
<main>
<div class="container">
    <h1>Login</h1>
    <?php
    if (!empty($_GET['valid'])) {
        echo '<h5 class="error">Invalid Login</h5>';
    }
    else {
        echo '<h5>Please enter your credentials.</h5>';
    }
    ?>
    <form method="post" action="validate.php">
        <!-- <fieldset> -->
            <label for="username">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" /><br>
        <!-- </fieldset>
        <fieldset> -->
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        <!-- </fieldset> -->
        <div class="button">
            <button class="btnOffset">Log in</button>
        </div>
    </form>
    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    <p>Login as a staff? <a href="stafflogin.php">Log in</a>.</p>
</div>
</main>
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
      main{
        width:80%;
        margin:0 auto;
       
    }
    .container{
        margin:10% auto;
        padding:5% 3%;
        text-align:center;
        width:90%;
        border-radius:5%;
        border-left: 1px solid pink;
        border-right: 1px solid orange;
        border-top: 1px solid pink;
        border-bottom: 1px solid orange;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }
    form{
        width:40%;
        margin:0 auto;
        text-align:left;
    }
    a{
        color:#f56500;
        text-decoration:none;
    }
   .button{
    text-align:center;
   }
   fieldset{
    margin-bottom:30px;
    border: px solid rgb(33, 150, 243);
    border-radius:5%;
   }
   input{
    height:30px;
    width:80%;;
    margin-bottom:5%;
    border-left: 1.5px solid pink;
    border-right: 1.5px solid orange;
    border-top: 1.5px solid pink;
    border-bottom: 1.5px solid orange;
    background: #fff;
   }
    /* footer */
footer{
    background: #333;
    padding:0;
    bottom:0;
}
.footer05 {
    color: #fff;
    text-align:left;
    padding: 30px;
    margin:0 auto;
   }
   .footer05 li {
    
    padding-bottom:5%;
}
   .footer05 a {
    font-size:1.1rem;
    color: #fff;
    
    text-decoration: none;
   }
   .footer05 li a:hover {
    text-decoration: underline;
   }
   .footer05 .wrap {
    width: 1000px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
   }
   .footer05 .wrap h3 {
    margin: 0 0 10px 0;
    padding: 0;
    border-bottom: 1px #c4c4c4 solid;
   }
   .footer05 .wrap p {
    margin: 0;
    padding: 0 0 20px 0;
   }
   .footer05 .wrap .box {
    width: 22%;
   }
   .footer05 .wrap .box ul {
    margin: 0;
    padding: 0 0 20px 0;
    list-style: none;
   }
   .footer05 .wrap .copyright {
    width: 100%;
    padding: 20px 0 0 0;
   }
   .size{
    margin-right:20px;
   }
   @media(max-width: 768px){
    form{
        width:80%;
        margin:0 auto;
        text-align:left;
    }
    input{
    height:30px;
    width:90%;
    margin-bottom:5%;
    border-left: 1px solid pink;
    border-right: 1px solid orange;
    border-top: 1px solid pink;
    border-bottom: 1px solid orange;
    background: #fff;
   }
}
   @media only screen and (max-width: 599px) {
    
   .footer05 .wrap {
    width: 100%;
    padding: 0 20px;
    box-sizing: border-box;
   }
   .footer05 .wrap h3 {
    border: none;
   }
   .footer05 .wrap .box {
    width: 100%;
   }
   .footer05 .wrap .box ul {
    border-top: 1px #c4c4c4 solid;
   }
   .footer05 .wrap .box ul li a {
    display: block;
    padding: 5px 15px;
    border-bottom: 1px #c4c4c4 solid;
   }
   
   }
</style>
<!-- footer -->
<?php require('shared/footer.php');



