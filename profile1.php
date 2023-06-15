<?php
$title = 'Profile';
require('shared/header.php');
?>
    <main>
        <?php 
             
        try {
            // get the postId from the url parameter using $_GET
            $profileId = $_GET['profileId'];
            if (empty($profileId)) {
                header('location:404.php');
                exit();
            }

            // connect - we can re-use for the 2nd query later
            require('shared/db.php');

            // set up & run SQL query to fetch the selected post record.  fetch for 1 record only
            $sql = "SELECT * FROM userprofile WHERE profileId = :profileId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':profileId', $profileId, PDO::PARAM_INT);
            $cmd->execute();
            $profile = $cmd->fetch();

            // check query returned a valid post record
            if (empty($profile)) {
                header('location:404.php');
                exit();
            }

            // access control check: is logged user the owner of this post?
            
        }
        catch (Exception $error) {
            header('location:error.php');
            exit();
        }
        ?>


        <h1>Profile Details</h1>

       
            
            <p>First:<?php echo $profile['fname']; ?></p>
            <p>Last:<?php echo $profile['lname']; ?></p>
            <p>Bio:<?php echo $profile['bio']; ?></p>
            <p>Date:<?php echo $profile['dateCreated']; ?></p>
            
            <?php if (!empty($_SESSION['user'])) {
                    if ($yogaprofile['user'] == $_SESSION['user']) {
                        echo '<a href="edit-profile.php?profileId=' . $yogaprofile['profileId'] . '">Edit</a>
                        <a onclick="return confirmDelete();"
                        href="delete-profile.php?profileId=' . $yogaprofile['profileId'] .'
                        ">Delete</a>';
                    }
                }  
           
           ?>
        
          
           
       
           
            
    </main>
<?php require('shared/footer.php'); ?>