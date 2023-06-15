<?php
require('shared/auth.php');
$title = 'Update Profile';
require('shared/header.php');
?>
    <main>
        <?php
        //try {
            // capture the form body input using the $_POST array & store in a var
            $bio = $_POST['bio'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $user = $_SESSION['user']; 
            $profileId = $_POST['profileId']; 
            $photo = $_FILES['photo']; // uploaded file if any

            // calculate the date and time with php
            date_default_timezone_set("America/Toronto");
            $dateCreated = date("y-m-d h:i");
          

            // lesson 4 - add validation before saving. Check 1 at a time for descriptive errors.
            $ok = true;  // start with no validation errors

            if (empty($fname)) {
                echo '<p class="error">First name is required.</p>';
                $ok = false; // error happened - bad data
            }

            if (empty($lname)) {
                echo '<p class="error">Last name is required.</p>';
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
            else {
                // no new photo uploaded, keep current photo name
                $name = $_POST['currentPhoto'];
            }

            // only save to db if $ok has never been changed to false
            if ($ok == true) {
                // connect to the db using the PDO library
                require('shared/db.php');
                /*if ($db) {
                echo 'Connected';
            }
            else {
                echo 'Connection Failed';
            }*/

                // set up an SQL UPDATE.  We MUST HAVE A WHERE CLAUSE
                $sql = "UPDATE userprofile SET bio = :bio, fname = :fname, lname = :lname, user = :user, 
                dateCreated = :dateCreated, photo = :photo WHERE profileId = :profileId";

                // map each input to the corresponding db column
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':bio', $bio, PDO::PARAM_STR, 4000);
                $cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 50);
                $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 50);
                $cmd->bindParam(':user', $user, PDO::PARAM_STR, 100);
                $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);
                $cmd->bindParam(':profileId', $profileId, PDO::PARAM_INT);
                $cmd->bindParam(':photo', $name, PDO::PARAM_STR, 100);

                // execute the insert
                $cmd->execute();

                // disconnect
                $db = null;

                // show the user a message
                echo '<h1>Profile Updated</h1>
                    <p><a href="profile.php">See the updated profile</a></p>';
            }
       
        ?>
    </main>
    <?php require('shared/footer.php'); ?>