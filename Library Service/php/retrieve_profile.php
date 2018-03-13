<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
/*user retrieval*/

$sql = "Select * from users where user_id='".$_SESSION['id']."';";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
    $first_name = ($row["first_name"]);
    $last_name = ($row["last_name"]);
    $username = ($row["username"]);

    echo "<div class='details'>
            <div class='field'>Username: $username</div>
            <div class='field'>Name: $first_name $last_name</div>
            <div class='field'>Password:  &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</div>
            <div class='field'>Account Ranking: base-user</div>
          </div>";
	}
}
else {
    $sql = "Select * from employees where id='".$_SESSION['emp_id']."';";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          if(isset($row["first_name"])) $first_name = ($row["first_name"]);
          else $first_name = "";
          if(isset($row["last_name"])) $first_name = ($row["last_name"]);
          else $first_name = "";
          if(isset($row["username"])) $first_name = ($row["username"]);
          else $first_name = "";
          
        echo "<div class='details'>
                <div class='field'>Username: $username</div>
                <div class='field'>Name: $first_name $last_name</div>
                <div class='field'>Password:  &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</div>
                <div class='field'>Account Ranking: base-user</div>
              </div>";
        }
    }
}

?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
