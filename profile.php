<?php
$title = 'Profile'; // set page title 
require('shared/header.php');
?>
    <main>
        <h1>Profile</h1>
        <?php 
      
            if (!empty($_SESSION['user'])) {
                echo '<a href="userprofile.php">Create Profile</a>';
            }      
            // connect to db
            require('shared/db.php');

            // set up the SQL SELECT command
            $sql = "SELECT * FROM userprofile";

            // if there is a user param in the url, use it as a filter
            if (!empty($_GET['user'])) {
                $sql = "SELECT * FROM userprofile WHERE user = :user";
            }

            
            // execute the select query
            $cmd = $db->prepare($sql);

            // bind the username param if viewing 1 user's posts only
            if (!empty($_GET['user'])) {
                $cmd->bindParam(':user', $_GET['user'], PDO::PARAM_STR, 50);
            }

            $cmd->execute();

            // store the query results in an array. use fetchAll for multiple records, fetch for 1.
            $userprofile = $cmd->fetchAll();

            

            // display post data in a loop. $posts = all data, $post = the current item in the loop
            foreach ($userprofile as $profile) {
                echo '<article>
                <h2>
                    <a href="userprofile.php?user=' . $profile['user'] . '">' . $profile['user'] . '</a></h2>
                <p>' . $profile['dateCreated'] . '</p>
                <p>' . $profile['fname'] . '</p>
                <p>' . $profile['lname'] . '</p>
                <p>' . $profile['bio'] . '</p>';

                if (!empty($profile['photo'])) {
                    echo '<div><img src="img/' . $profile['photo'] . '" alt="Profile Photo" /></div>';
                }

                // access check. 1 - is user logged in?  2. does user own profile else create profile
                if (!empty($_SESSION['user'])) {
                    if ($profile['user'] == $_SESSION['user']) {
                        echo '<a href="edit-profile.php?profileId=' . $profile['profileId'] . '">Edit</a>
                        <a onclick="return confirmDelete();"
                        href="delete-profile.php?profileId=' . $profile['profileId'] .'
                        ">Delete</a>';
                    }
                }
              
                echo '</article>';
         
            }


            $db = null;
       
        ?>
    </main>
<?php require('shared/footer.php'); ?>