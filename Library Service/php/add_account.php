<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php

$sql = "insert into users(username, password) values ('".$_REQUEST['username']."', '".$_REQUEST['password']."');";
$result = mysqli_query($db, $sql);



?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../index.html")?>
