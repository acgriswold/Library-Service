<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php

$sql = "insert into employees(username, password, first_name,last_name) 
values ('".$_REQUEST['username']."', '".$_REQUEST['password']."', 
		'".$_REQUEST['first_name']."', '".$_REQUEST['last_name']."', 
		'".$_REQUEST['position']."');";
$result = mysqli_query($db, $sql);



?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../management.html")?>
