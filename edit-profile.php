<?php
require('shared/auth.php');

$title = 'Edit Profile';
require('shared/header.php');
?>
    <main>
        <?php 
        try {
            // get the profileId from the url parameter using $_GET
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
            if ($profile['user'] != $_SESSION['user']) {
                header('location:403.php');  // 403 = HTTP Forbidden Error
                exit();
            }
        }
        catch (Exception $error) {
            header('location:error.php');
            exit();
        }
        ?>
        <h1>Post Details</h1>
        <form action="update-profile.php" method="post" enctype="multipart/form-data">
        <?php
            if (!empty($profile['photo'])) {
                echo '<img src="img/' . $profile['photo'] . '" alt="Profile Photo" />';
            }
            ?>
            <fieldset>
                <label for="photo">Photo:</label>
                <input type="file" name="photo" accept=".png,.jpg" />
            </fieldset>
            
        
            <fieldset>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="<?php echo $profile['fname']; ?>"><br><br>
            </fieldset>
            <fieldset>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="<?php echo $profile['lname']; ?>"><br><br>
            </fieldset>
            <fieldset>
                <label for="bio">Bio:</label>
                <textarea name="bio" id="bio" required maxlength="4000" placeholder="<?php echo $profile['bio']; ?>"><?php echo $profile['bio']; ?></textarea>
            </fieldset>
            <fieldset>
                <label>Date Created:</label>
                <?php echo $profile['dateCreated']; ?>
            </fieldset>
            
            <button class="btnOffset">Update</button>
            <input name="profileId" id="profileId" value="<?php echo $profileId; ?>" type="hidden" />
            <input name="currentPhoto" value="<?php echo $profile['photo']; ?>" type="hidden" />
        </form>
    </main>
<?php require('shared/footer.php'); ?>