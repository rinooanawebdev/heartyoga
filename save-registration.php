<!-- header -->
<?php
$title = 'Save-Register';
require('shared/header.php');
?>
<main>
    
<?php
    // capture user data from form POST
    // $classId = $_POST['classId'];
    // $classdate = $_POST['classdate'];
    // $classtime = $_POST['classtime'];
    // $classtype = $_POST['classtype'];
    // $teacher = $_POST['teacher'];
    // $classroom = $_POST['classtime'];
    // $classdetails = $_POST['classdetails'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    // validation
    $ok = true;

    
    if ($ok == true) {
        // connect
        require('shared/db.php');

        // duplicate check
        $sql = "SELECT * FROM yogausers WHERE username = :username";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $cmd->execute();
        $yogausers = $cmd->fetch();

        // only create a new user if the query for this username returns no data
        if (empty($user)) {
            // set up SQL insert
            $sql = "INSERT INTO yogausers (username, password) VALUES (:username, :password)";

            // set up and fill the parameter values for safety
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);

            // hash the password before binding it to the :password parameter
            $password = password_hash($password, PASSWORD_DEFAULT);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

            // execute the sql command
            $cmd->execute();
            
            // show confirmation
            echo '<p>Your Registration was Successful!</p>
                <P><a href="login.php">Login here</a>.</p>
            ';
            
            
           
        }
        else {
            echo '<p class="error">User already exists.</p>';
        }

        // disconnect
        $db = null;        
    }
        
    ?>
    </main>

<!-- footer -->
<?php require('shared/footer.php'); ?>