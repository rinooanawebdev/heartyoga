<?php
// authentication check: this page is private
require('shared/auth.php');

$title = 'Create Profile';
require('shared/header.php');
?>
    <main>
        <h1>Create Profile</h1>
        <form action="save-profile.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <label for="photo">Profile Image:</label>
                <input type="file" name="photo" accept=".png,.jpg" />
            </fieldset>
            <fieldset>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" required><br><br>
            </fieldset>
            <fieldset>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" required><br><br>
            </fieldset>
            <fieldset>
                <label for="bio">Bio:</label>
                <textarea name="bio" id="body"  maxlength="4000"></textarea>
            </fieldset>
            
            <button class="btnOffset">Post</button>
        </form>
    </main>
<?php require('shared/footer.php'); ?>