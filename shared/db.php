

<?php 
// $db =  new PDO('mysql:host=172.31.22.43;dbname=u413796822_yoga', 'u413796822_yoga', 'Matukawa4912-5');
$dbServername =  "localhost";
$dbUsername =  "loot";
$dbPassword =  "Matukawa4912-5";
$dbName =  "YOGA";

$db = mysql_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(!$db)
die("can't connect".mysql_connect_error());
else
echo'connected';
?>