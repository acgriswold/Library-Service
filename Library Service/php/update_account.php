<?php session_start(); ?>
<?php
  /*Connecting to Database*/
  $db = mysqli_connect('localhost','root','','library')
  or die('Error connecting to MySQL server.');
?>
<?php
  if(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update customer set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['new-pass'])){
    $sql = "Update customer set username='".$_REQUEST['username']."' password='".$_REQUEST['new-pass']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['name'])){
    $sql = "Update customer set username='".$_REQUEST['username']."' first_name='".$_REQUEST['name']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['new-pass']) && !empty($_REQUEST['name'])){
    $sql = "Update customer set first_name='".$_REQUEST['name']."' password='".$_REQUEST['new-pass']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['username'])){
    $sql = "Update customer set username='".$_REQUEST['username']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['new-pass'])){
    $sql = "Update customer set password='".$_REQUEST['new-pass']."' where customer_id='".$_SESSION['id']."';";
  }
  elseif(!empty($_REQUEST['name'])){
    $sql = "Update customer set first_name='".$_REQUEST['name']."' where customer_id='".$_SESSION['id']."';";
  }

  echo $sql/'\n';

  $result = mysqli_query($db, $sql);

  echo $result;
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
<?php header("Location: ../UserPage.html")?>
