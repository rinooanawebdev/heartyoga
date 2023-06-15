<!-- header -->
<?php
require('shared/auth.php');
$title = 'userprofile';
require 'shared/header.php';
?>

<main>
    <?php 
        
    require('shared/db.php');

            // set up the SQL SELECT command
            $sql = "SELECT * FROM yogausers";

            // if there is a user param in the url, use it as a filter
            if (!empty($_GET['userId'])) {
                $sql = "SELECT * FROM yogausers WHERE userId = :userId";
            }

            // execute the select query
            $cmd = $db->prepare($sql);

            // bind the username param if viewing 1 user's posts only
            if (!empty($_GET['userId'])) {
                $cmd->bindParam(':userId', $_GET['userId'], PDO::PARAM_STR, 50);
            }

            $cmd->execute();

            // store the query results in an array. use fetchAll for multiple records, fetch for 1.
            $yogausers = $cmd->fetchAll();

            

            // display post data in a loop. $posts = all data, $post = the current item in the loop
            foreach ($yogausers as $yogauser) {
                echo '<article>
                <h2>
                    <a href="posts.php?user=' . $yogausr['user'] . '">' . $yogauser['user'] . '</a></h2>
                <p>' . $yogauser['dateCreated'] . '</p>
                <p>' . $yogauser['username'] . '</p>';

                if (!empty($yogauser['photo'])) {
                    echo '<div><img src="img/' . $yogauser['photo'] . '" alt="Post Photo" /></div>';
                }

                // access check. 1 - is user logged in?  2. does user own this post?
                if (!empty($_SESSION['userId'])) {
                    if ($yogause['userId'] == $_SESSION['user']) {
                        echo '<a href="edit-post.php?postId=' . $yogapost['userId'] . '">Edit</a>
                        <a onclick="return confirmDelete();"
                        href="delete-post.php?postId=' . $yogapost['userId'] .'
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

        
        ?>
    
   
</main>
<!-- footer -->
<?php require('shared/footer.php');