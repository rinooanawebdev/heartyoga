<?php
// capture form inputs from $_POST array
$username = $_POST['username'];
$password = $_POST['password'];

// connect
require('shared/db.php');

// check if username exists
$sql = "SELECT * FROM yogastaff WHERE staff = :staff";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $staffname, PDO::PARAM_STR, 50);
$cmd->execute();
$staff = $cmd->fetch();

if (empty($staff)) {
    $db = null;
    header('location:login.php?valid=false');
    exit();
}
else {
    // check if hashed password exists
    if (empty($password)) {
        $db = null;
        header('location:login.php?valid=false');
        exit();
    }
    else {
        // if both credentials found, store the user identity in the $_SESSION object as a var
        // redirect to posts feed
        // *** code dictation lines go here ***
        session_start(); // access the current session automatically created on the web server
        $_SESSION['staff'] = $staff;
        header('location:index.php');
        $db = null;
    }
}
?>