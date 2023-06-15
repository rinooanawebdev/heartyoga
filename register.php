<?php
$title = 'Register';
require('shared/header.php');
?>
<main>
<div class="container">
        <h1>User Registration</h1>
            <h5>Passwords must be a minimum of 8 characters,
                including 1 digit, 1 upper-case letter, and 1 lower-case letter.
            </h5>
            <form method="post" action="save-registration.php">
                <!-- <fieldset> -->
                    <label for="username">Username: *</label>
                    <input name="username" id="username" required type="email" placeholder="email@email.com" /><br>
                <!-- </fieldset>
                <fieldset> -->
                    <label for="password">Password: *</label>
                    <input type="password" name="password" id="password" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder=""/>
                    <img id="imgShowHide" src="image/openeye.png" alt="Show/Hide"
                        onclick="showHide();" /><br>
                <!-- </fieldset>
                <fieldset> -->
                    <label for="confirm">Confirm Password: *</label>
                    <input type="password" name="confirm" id="confirm" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        onkeyup="return comparePasswords();" />
                    <span id="pwMsg" class="error"></span>
                <!-- </fieldset> -->
                <div class="button">        
                    <button class="btnOffset" onclick="return comparePasswords();">Register</button>
                </div>
            </form>
            <p>Already have an account?<a href="login.php">Login here</a></p>
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
    width:300px;
    margin-bottom:5%;
    border-left: 1.5px solid pink;
    border-right: 1.5px solid orange;
    border-top: 1.5px solid pink;
    border-bottom: 1.5px solid orange;
    background: #fff;
   }
   @media(max-width: 768px){
    form{
        width:80%;
        margin:0 auto;
        text-align:left;
    }
    input{
    height:30px;
    width:80%;
    margin-bottom:5%;
    border-left: 1px solid pink;
    border-right: 1px solid orange;
    border-top: 1px solid pink;
    border-bottom: 1px solid orange;
    background: #fff;
   }
}
</style>
<?php require('shared/footer.php'); ?>