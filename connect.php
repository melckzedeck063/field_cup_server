<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = "";
$dbname = 'fied_cup';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
if(!$conn) {
   echo('Could not connect: ');
}





?>
