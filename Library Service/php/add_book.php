<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
if(isset($_SESSION['emp_id'])){
  $sql = "insert into books(title, first_name, publisher, year_published, isbn)
  values ('".$_REQUEST['title']."', '".$_REQUEST['author']."',
  		'".$_REQUEST['publisher']."', '".$_REQUEST['publication_year']."',
  		'".$_REQUEST['isbn']."');";
  $result = mysqli_query($db, $sql);
}
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../management.html")?>
