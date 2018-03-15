<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php

$sql = "insert into rented(book_id, user_id) values ('".$_REQUEST['book_id']."', '".$_SESSION['id']."');";
$result = mysqli_query($db, $sql);

?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../index.html")?>
