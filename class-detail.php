<?php


$title = 'Edit Post';
require('shared/header.php');
?>
    <main>
        <?php 
        try {
            // get the postId from the url parameter using $_GET
            $classId = $_GET['classId'];
            if (empty($classId)) {
                header('location:404.php');
                exit();
            }

            // connect - we can re-use for the 2nd query later
            require('shared/db.php');

            // set up & run SQL query to fetch the selected post record.  fetch for 1 record only
            $sql = "SELECT * FROM yogaclass WHERE classId = :classId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':classId', $classId, PDO::PARAM_INT);
            $cmd->execute();
            $class = $cmd->fetch();

            // check query returned a valid post record
            if (empty($class)) {
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


        <h1>Post Details</h1>

        <form action="saveclass.php" method="post">
            
            <p>Date:<?php echo $class['classdate']; ?></p>
            <p>Time:<?php echo $class['classtime']; ?></p>
            <p>Style:<?php echo $class['classtype']; ?></p>
            <p>Teacher:<?php echo $class['teacher']; ?></p>
            <p>Room:<?php echo $class['classroom']; ?></p>
            <p>Detail:<?php echo $class['classdetails']; ?></p>
           
            <input type="hidden" name="classId" value="<?php echo $class['classId']; ?>">
            <input type="hidden" name="classdate" value="<?php echo $class['classdate']; ?>">
            <input type="hidden" name="classtime" value="<?php echo $class['classtime']; ?>">
            <input type="hidden" name="classtype" value="<?php echo $class['classtype']; ?>">
            <input type="hidden" name="teacher" value="<?php echo $class['teacher']; ?>">
            <input type="hidden" name="classroom" value="<?php echo $class['classroom']; ?>">
            <input type="hidden" name="classdetails" value="<?php echo $class['classdetails']; ?>">

        
            <input type="submit" value="Book Class">
          
           
        </form>
           
            
    </main>
<?php require('shared/footer.php'); ?>