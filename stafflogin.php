<!-- header -->
<?php
$title = 'Staff Login';
require 'shared/header.php';
?>
<main>
    <h1>Login</h1>
    <?php
    if (!empty($_GET['valid'])) {
        echo '<h5 class="error">Invalid Login</h5>';
    }
    else {
        echo '<h5>Please enter your credentials.</h5>';
    }
    ?>
    <form method="post" action="staffvalidate.php">
        <fieldset>
            <label for="username">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <button class="btnOffset">Log in</button>
    </form>
    
</main>
<!-- footer -->
<?php require('shared/footer.php');