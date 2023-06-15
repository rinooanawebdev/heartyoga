<?php
$title = 'Save class';
require('shared/header.php');
?>

<?php
 // if there is information in the Session class
if(!empty($_SESSION['class'])){
    echo'<table>';
    echo '<tr><th>Time</th><th>Type</th><th>Teacher</th><th>Room</th><th>Detail</th></tr>';
    

    //get information
    foreach($_SESSION['class'] as $classId=>$class){
        $classId=$class['classId'];
        echo '<tr>';
        echo '<td>', $class['classdate'], '</td>';
        echo '<td>', $class['classtime'], '</td>';
        echo '<td>', $class['classtype'], '</td>';
        echo '<td>', $class['teacher'], '</td>';
        echo '<td>', $class['classroom'], '</td>';
        echo '<td>', $class['classdetails'], '</td>';
        echo '<td>', $class['classdetails'], '</td>';
        echo '</tr>';
        
        echo '<td><a onclick="return confirmDelete();"href="delete-booking.php?classId=' . $classId .'">Delete</a></td>';
        echo'</table>';
    
    }else{
        echo '<p>You do not book any class yet</p>';
    }
}
?>





<?php require('shared/footer.php'); ?>