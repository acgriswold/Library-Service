<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
if(isset($_SESSION['emp_id'])){
  $sql = "DELETE FROM employees where username ='".$_REQUEST['username']."'AND
  								password ='".$_REQUEST['password']."'AND
  								first_name ='".$_REQUEST['first_name']."'AND
  								last_name ='".$_REQUEST['last_name']."'AND
  								position ='".$_REQUEST['position']."'";
  $result = mysqli_query($db, $sql);

}
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../management.html")?>
