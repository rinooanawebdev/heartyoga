<?php
require('shared/auth.php');

$title = 'Edit Post';
require('shared/header.php');
?>
    <main>
        <?php 
        try {
            // get the postId from the url parameter using $_GET
            $postId = $_GET['postId'];
            if (empty($postId)) {
                header('location:404.php');
                exit();
            }

            // connect - we can re-use for the 2nd query later
            require('shared/db.php');

            // set up & run SQL query to fetch the selected post record.  fetch for 1 record only
            $sql = "SELECT * FROM yogaposts WHERE postId = :postId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':postId', $postId, PDO::PARAM_INT);
            $cmd->execute();
            $post = $cmd->fetch();

            // check query returned a valid post record
            if (empty($post)) {
                header('location:404.php');
                exit();
            }

            // access control check: is logged user the owner of this post?
            if ($post['user'] != $_SESSION['user']) {
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
        <form action="update-post.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <label for="body">Content:</label>
                <textarea name="body" id="body" required maxlength="4000"><?php echo $post['body']; ?></textarea>
            </fieldset>
            <fieldset>
                <label>Date Created:</label>
                <?php echo $post['dateCreated']; ?>
            </fieldset>
            <fieldset>
                <label for="photo">Photo:</label>
                <input type="file" name="photo" accept=".png,.jpg" />
            </fieldset>
            <?php
            if (!empty($post['photo'])) {
                echo '<img src="img/' . $post['photo'] . '" alt="Post Photo" />';
            }
            ?>
            <button class="btnOffset">Update</button>
            <input name="postId" id="postId" value="<?php echo $postId; ?>" type="hidden" />
            <input name="currentPhoto" value="<?php echo $post['photo']; ?>" type="hidden" />
        </form>
    </main>
<?php require('shared/footer.php'); ?>