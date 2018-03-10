<?php session_start(); ?>
<?php
  /*Connecting to Database*/
  $db = mysqli_connect('localhost','root','','library')
  or die('Error connecting to MySQL server.');
?>
<?php
 /*for users*/
 if($_SESSION['id'] !== null){
  if(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update users set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass'])){
    $sql = "Update users set username='".$_REQUEST['username']."' password='".$_REQUEST['new-pass']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['name'])){
    $sql = "Update users set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update users set first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username'])){
    $sql = "Update users set username='".$_REQUEST['username']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['new-pass'])){
    $sql = "Update users set password='".$_REQUEST['new-pass']."' where user_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['name'])){
    $sql = "Update users set first_name='".$_REQUEST['name']."' where user_id='".$_SESSION['id']."';";
  }
}
elseif($_SESSION['emp_id'] !== null){
  /*for employees*/
  if(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update employees set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass'])){
    $sql = "Update employees set username='".$_REQUEST['username']."' password='".$_REQUEST['new-pass']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['name'])){
    $sql = "Update employees set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update employees set first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['username'])){
    $sql = "Update employees set username='".$_REQUEST['username']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['new-pass'])){
    $sql = "Update employees set password='".$_REQUEST['new-pass']."' where id='".$_SESSION['emp_id']."';";
  }
  elseif(!empty($_REQUEST['name'])){
    $sql = "Update employees set first_name='".$_REQUEST['name']."' where id='".$_SESSION['emp_id']."';";
  }
}

  $result = mysqli_query($db, $sql);

  echo $result;
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../UserPage.html")?>
