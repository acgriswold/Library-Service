<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
/*book retrieval*/

$sql = "Select books.title, books.author, books.publisher, books.year_published, books.isbn from rental, books where rental.book_id = books.book_id and customer_id='".$_SESSION['id']."';";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$title = ($row["title"]);
    $author = ($row["author"]);
    $publisher = ($row["publisher"]);
    $year_published = ($row["year_published"]);
    $isbn = ($row["isbn"]);

    echo "<div class='field'>
            <div class='book-details'>$title/$author/$publisher/$year_published/$isbn</div>
            <div class='return' style='display: inline-block'><a>return book?</a></div>
          </div>";
	}
}

?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
