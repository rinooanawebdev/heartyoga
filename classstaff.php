<?php
$title = 'Class'; // set page title 
require 'shared/header.php';
?>

    <main>
        <h1>Yoga Class</h1>
        <table>
        
        <?php        
            
            // connect to db
            require('shared/db.php');

            $sql = "SELECT * FROM yogaclass";

            
           
            echo '<tr><th><b>Sat<b> <small>April 1, 2023</small></td></tr>';
           foreach($db->query('SELECT * FROM yogaclass WHERE classdate = "2023-04-01" ORDER BY classtime ASC') as $class){
            echo '<tr>';
            echo '<td>', $class['classtime'], '</td>';
            echo '<td>', $class['classtime'], '</td>';
            echo '<td>', $class['classtype'], '</td>';
            echo '<td>', $class['teacher'], '</td>';
            echo '<td>', $class['classroom'], '</td>';
            echo '<td>', $class['classdetails'], '</td>';
            echo '</tr>';
           }

           echo '<tr><th><b>Sun<b> <small>April 2, 2023</small></td></tr>';
           foreach($db->query('SELECT * FROM yogaclass WHERE classdate = "2023-04-02" ORDER BY classtime ASC') as $class){
            echo '<tr>';
            echo '<td>', $class['classtime'], '</td>';
            echo '<td>', $class['classtype'], '</td>';
            echo '<td>', $class['teacher'], '</td>';
            echo '<td>', $class['classroom'], '</td>';
            echo '<td>', $class['classdetails'], '</td>';
            echo '</tr>';
           }

           echo '<tr><th><b>Mon<b> <small>April 3, 2023</small></td></tr>';
           foreach($db->query('SELECT * FROM yogaclass WHERE classdate = "2023-04-03" ORDER BY classtime ASC') as $class){
            echo '<tr>';
            echo '<td>', $class['classtime'], '</td>';
            echo '<td>', $class['classtype'], '</td>';
            echo '<td>', $class['teacher'], '</td>';
            echo '<td>', $class['classroom'], '</td>';
            echo '<td>', $class['classdetails'], '</td>';
            echo '</tr>';
           }

            
        ?>
        </table>
    </main>

    
<!-- footer -->
<?php require('shared/footer.php');