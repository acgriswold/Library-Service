<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
/*book retrieval*/

$sql = "Select * from books where title LIKE '".$_REQUEST['title']."%' and first_name LIKE '".$_REQUEST['author']."%' and publisher LIKE '".$_REQUEST['publisher']."%' and year_published LIKE '".$_REQUEST['publicationy']."%' and isbn LIKE '".$_REQUEST['isbn']."%';";

$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
    $id = ($row["book_id"]);
		$title = ($row["title"]);
    $first_name = ($row["first_name"]);
  	$last_name = ($row["last_name"]);
    $publisher = ($row["publisher"]);
    $year_published = ($row["year_published"]);
    $isbn = ($row["isbn"]);

    echo "<div class='field'>
            <div class='book-details'>$title/$first_name $last_name/$publisher/$year_published/$isbn</div>
            <div class='rent' value='$id'>Rent Book!</div>
          </div>";
	}
  echo "<script>
          $('.rent').click(function() {
            book_id = $(this).attr('value');
            console.log(book_id);
          });
        </script>";
}


?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
