<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
$_SESSION['icon'] = "https://robohash.org/doloremcommodiest.bmp?size=50x50&set=set1";

$sql = "Select user_id from users where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."';";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['emp_id'] = null;
        $_SESSION['failed'] = false;
	}
}
else {
    $sql = "Select id from employees where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."';";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['emp_id'] = $row['id'];
            $_SESSION['id'] = null;
            $_SESSION['failed'] = false;
        }
    }
    else {
        $_SESSION['failed'] = true;
    }
}

?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../index.html")?>
