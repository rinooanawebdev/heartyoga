<?php
$title = 'Posts'; // set page title 
require('shared/header.php');
?>
    <main>
        <h1>Posts</h1>
        <?php        
        if (!empty($_SESSION['user'])) {
            echo '<div class="addpostlogo">
                <a href="create-posts.php" class="addpostlogo">
                <img src="image/addpost.png" alt="Add" width="30px" height="30px">Add a New Post
                </a>
                </div>
                ';
        }        
            // connect to db
            require('shared/db.php');

            // set up the SQL SELECT command
            $sql = "SELECT * FROM yogaposts ORDER BY dateCreated DESC";

            // if there is a user param in the url, use it as a filter
            if (!empty($_GET['user'])) {
                $sql = "SELECT * FROM yogaposts WHERE user = :user 
                     ORDER BY dateCreated DESC";
            }

            // execute the select query
            $cmd = $db->prepare($sql);

            // bind the user param if viewing 1 user's posts only
            if (!empty($_GET['user'])) {
                $cmd->bindParam(':user', $_GET['user'], PDO::PARAM_STR, 50);
            }

            $cmd->execute();

            // store the query results in an array. use fetchAll for multiple records, fetch for 1.
            $yogaposts = $cmd->fetchAll();

            

            // display post data in a loop. $yogaposts = all data, $yogapost = the current item in the loop
            foreach ($yogaposts as $yogapost) {
                echo '<article>
                <h2>
                    <a href="posts.php?user=' . $yogapost['user'] . '">' . $yogapost['user'] . '</a></h2>
                <p>' . $yogapost['dateCreated'] . '</p>
                <p>' . $yogapost['body'] . '</p>';

                if (!empty($yogapost['photo'])) {
                    echo '<div><img src="img/' . $yogapost['photo'] . '" alt="Post Photo" /></div>';
                }

                // access check. 1 - is user logged in?  2. does user own this post?
                if (!empty($_SESSION['user'])) {
                    if ($yogapost['user'] == $_SESSION['user']) {
                        echo '<a href="edit-post.php?postId=' . $yogapost['postId'] . '">Edit</a>
                        <a onclick="return confirmDelete();"
                        href="delete-post.php?postId=' . $yogapost['postId'] .'
                        ">Delete</a>';
                    }
                }                 
                    
                echo '</article>';

                /*echo '<tr>
                <td>' . $post['body'] . '</td>
                <td>' . $post['user']. '</td>
                <td>' . $post['dateCreated']. '</td>
            </tr>';*/
            }

            // close table
            //echo '</table>';

            // disconnect
            $db = null;
        /*}
        catch (Exception $error) {
            header('location:error.php');
            exit();
        }*/
        ?>
    </main>
<?php require('shared/footer.php'); ?>