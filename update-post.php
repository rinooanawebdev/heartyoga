<?php
require('shared/auth.php');
$title = 'Update post';
require('shared/header.php');
?>
    <main>
        <?php
        //try {
            // capture the form body input using the $_POST array & store in a var
            $body = $_POST['body'];
            $user = $_SESSION['user']; //$_POST['user'];
            $postId = $_POST['postId']; // hidden input w/PK
            $photo = $_FILES['photo']; // uploaded file if any

            // calculate the date and time with php
            date_default_timezone_set("America/Toronto");
            $dateCreated = date("y-m-d h:i");
          

            // lesson 4 - add validation before saving. Check 1 at a time for descriptive errors.
            $ok = true;  // start with no validation errors

            if (empty($body)) {
                echo '<p class="error">Post body is required.</p>';
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
                $sql = "UPDATE yogaposts SET body = :body, user = :user, 
                dateCreated = :dateCreated, photo = :photo WHERE postId = :postId";

                // map each input to the corresponding db column
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':body', $body, PDO::PARAM_STR, 4000);
                $cmd->bindParam(':user', $user, PDO::PARAM_STR, 100);
                $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);
                $cmd->bindParam(':postId', $postId, PDO::PARAM_INT);
                $cmd->bindParam(':photo', $name, PDO::PARAM_STR, 100);

                // execute the insert
                $cmd->execute();

                // disconnect
                $db = null;

                // show the user a message
                echo '<h1>Post Updated</h1>
                    <p><a href="posts.php">See the updated post</a></p>';
            }
       
        ?>
    </main>
    <?php require('shared/footer.php'); ?>