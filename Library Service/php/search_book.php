<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
/*book retrieval*/
if(isset($_SESSION['id']) || isset($_SESSION['emp_id'])){
  $sql = "Select * from books where book_id NOT IN (Select book_id from rented) and title LIKE '".$_REQUEST['title']."%' and first_name LIKE '".$_REQUEST['author']."%' and publisher LIKE '".$_REQUEST['publisher']."%' and year_published LIKE '".$_REQUEST['publicationy']."%' and isbn LIKE '".$_REQUEST['isbn']."%';";

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
              $('#message').load('php/rent_book.php', {'book_id': book_id});

              $(this).parent().slideUp();
            });
          </script>";
  }

  $sql = "Select * from books where book_id IN (Select book_id from rented) and title LIKE '".$_REQUEST['title']."%' and first_name LIKE '".$_REQUEST['author']."%' and publisher LIKE '".$_REQUEST['publisher']."%' and year_published LIKE '".$_REQUEST['publicationy']."%' and isbn LIKE '".$_REQUEST['isbn']."%';";

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
              <div class='rent-grey'>Rent Book!</div>
            </div>";
  	}
  }
}
else {
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
              <div class='rent-grey'>Rent Book!</div>
            </div>";
    }
  }
}

?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
