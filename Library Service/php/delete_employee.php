<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php

$sql = "DELETE FROM employees where title='".$_REQUEST['username']."'AND
								firs_name='".$_REQUEST['password']."'AND
								publisher='".$_REQUEST['firs_name']."'AND
								year_published='".$_REQUEST['last_name']."'AND
								isbn='".$_REQUEST['position']."'";
$result = mysqli_query($db, $sql);



?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../management.html")?>
