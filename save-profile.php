<?php
// auth check
require('shared/auth.php');
$title = 'Save Profile';
require('shared/header.php');
?>

    <main>
        <?php
        try {
            // capture the form body input using the $_POST array & store in a var
            $bio = $_POST['bio'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $user = $_SESSION['user']; 
            $photo = $_FILES['photo'];

            // calculate the date and time with php
            date_default_timezone_set("America/Toronto");
            $dateCreated = date("y-m-d h:i");
            // echo $dateCreated;
           

            // lesson 4 - add validation before saving. Check 1 at a time for descriptive errors.
            $ok = true;  // start with no validation errors

            if (empty($fname)) {
                echo '<p class="error">Profile First Name is required.</p>';
                $ok = false; // error happened - bad data
            }

            if (empty($lname)) {
                echo '<p class="error">Profile Last Name is required.</p>';
                $ok = false; // error happened - bad data
            }

            if (empty($user)) {
                echo '<p class="error">User is required.</p>';
                $ok = false; // error happened - bad data
            }

            // if a photo was uploaded, validate & save it 
            if (!empty($photo['name'])) {
                $tmp_name = $photo['tmp_name'];
                
                // ensure file is jpg or png
                $type = mime_content_type($tmp_name);
                if ($type != 'image/png' && $type != 'image/jpeg') {
                    echo 'Please upload a .png or .jpg';
                    $ok = false;
                }

                // create a unique name and save the photo
                $name = session_id() . '-' . $photo['name'];
                move_uploaded_file($tmp_name, 'img/' . $name);
            }

            // only save to db if $ok has never been changed to false
            if ($ok == true) {
                // connect to the db using the PDO library
                require('shared/db.php');
          

                // set up an SQL INSERT
                $sql = "INSERT INTO userprofile (bio, fname, lname,  user, dateCreated, photo) VALUES 
                (:bio, :fname, :lname, :user, :dateCreated, :photo)";

                // map each input to the corresponding db column
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':bio', $bio, PDO::PARAM_STR, 4000);
                $cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 50);
                $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 50);
                $cmd->bindParam(':user', $user, PDO::PARAM_STR, 100);
                $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);
                $cmd->bindParam(':photo', $name, PDO::PARAM_STR, 100);

                // execute the insert
                $cmd->execute();

                // disconnect
                $db = null;

                // show the user a message
                echo '<h1>Profile saved</h1>';
                echo $dateCreated;
                echo '<p><a href="profile.php">See the updated Profile</a></p>';
            }
        }
        catch (Exception $error) {
            header('location:error.php');
            exit();
        }
        ?>
    </main>

    <?php require('shared/footer.php'); ?>