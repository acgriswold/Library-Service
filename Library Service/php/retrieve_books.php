<?php session_start(); ?>
<?php
/*Connecting to Database*/
 $db = mysqli_connect('localhost','root','','library')
 or die('Error connecting to MySQL server.');
?>
<?php
/*book retrieval*/
if(isset($_SESSION['id']) || isset($_SESSION['emp_id'])){
  $sql = "Select books.book_id, books.title, books.first_name, books.last_name, books.publisher, books.year_published, books.isbn from rented, books where rented.book_id = books.book_id and rented.user_id='".$_SESSION['id']."';";
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
                <div value='$id' class='return' style='display: inline-block'>return book?</div>
              </div>";
  	}
    echo "<script>
            $('.return').click(function() {
              book_id = $(this).attr('value');
              $('#message').load('php/return_book.php', {'book_id': book_id});

              $(this).parent().slideUp();
            });
          </script>";
  }
}
?>
<?php mysqli_close($db) /*Closing Connection to Database*/?>
