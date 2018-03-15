<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
if(isset($_SESSION['emp_id'])){
  $sql = "DELETE FROM books where title='".$_REQUEST['title']."'AND
    							first_name='".$_REQUEST['author']."'AND
    							publisher='".$_REQUEST['publisher']."'AND
    							year_published='".$_REQUEST['publication_year']."'AND
    							isbn='".$_REQUEST['isbn']."';";

  $result = mysqli_query($db, $sql);
}
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../management.html")?>
