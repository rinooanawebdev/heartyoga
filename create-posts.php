<?php
// authentication check: this page is private
require('shared/auth.php');

$title = 'Create a New Post';
require('shared/header.php');
?>
    <main>
        <h1>Create a New Post</h1>
        <form action="save-post.php" method="post" enctype="multipart/form-data">
        <fieldset>
                <label for="photo">Photo:</label>
                <input type="file" name="photo" accept=".png,.jpg" />
            </fieldset>
            <fieldset>
                <label for="body">Content:</label>
                <textarea name="body" id="body" required maxlength="4000"></textarea>
            </fieldset>
            
            <button class="btnOffset">Post</button>
        </form>
    </main>
<?php require('shared/footer.php'); ?>