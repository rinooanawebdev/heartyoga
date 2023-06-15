<?php
require('shared/auth.php');
try {
   
    // identify which post to remove. use $_GET to read the url param called "postId"
    $profileId = $_GET['profileId'];

    // connect to db
    require('shared/db.php');

    // access control check: does the current user own this post?
    $sql = "SELECT * FROM userprofile WHERE profileId = :profileId";
    $cmd = $db->prepare($sql);

    // populate the SQL with the selected postId
    $cmd->bindParam(':profileId', $profileId, PDO::PARAM_INT);

    // execute query in the database
    $cmd->execute();
    $post = $cmd->fetch();

    // ownership check
    if ($post['user'] != $_SESSION['user']) {
        $db = null;
        header('location:403.php'); // forbidden
        exit();
    }

    // create SQL delete statement
    $sql = "DELETE FROM userprofile WHERE profileId = :profileId";
    $cmd = $db->prepare($sql);

    // populate the SQL delete with the selected postId
    $cmd->bindParam(':profileId', $profileId, PDO::PARAM_INT);

    // execute delete in the database
    $cmd->execute();

    // disconnect 
    $db = null;

    // redirect to updated feed
    //echo 'Deleted';
    header('location:profile.php');
}
catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>