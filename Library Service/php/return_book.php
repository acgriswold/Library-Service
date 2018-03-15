<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php

$sql = "delete from rented where book_id = '".$_REQUEST['book_id']."' and user_id = '".$_SESSION['id']."';";
$result = mysqli_query($db, $sql);

//if($result) echo "Returned!";
//else echo "failed";
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
