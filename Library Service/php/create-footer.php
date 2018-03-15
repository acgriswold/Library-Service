<?php //session_start(); ?>
<?php
  if(isset($_SESSION['emp_id'])){
    echo '<div class="footer">
              <div style="position: absolute; bottom:0; background: rgba(244, 247, 250, .85); width: 100%; padding: 10px 25px 10px;">
                <a href="index.html">Home</a>
                <a href="BookRental.html">Book Rental</a>
                <a href="Management.html">Management</a>
                <a href="UserPage.html">User Profile</a>
              </div>
            </div>';
  }
  else if(isset($_SESSION['id'])){
    echo '<div class="footer">
              <div style="position: absolute; bottom:0; background: rgba(244, 247, 250, .85); width: 100%; padding: 10px 25px 10px;">
                <a href="index.html">Home</a>
                <a href="BookRental.html">Book Rental</a>
                <a href="UserPage.html">User Profile</a>
              </div>
            </div>';
  }
  else{
      echo '<div class="footer">
                <div style="position: absolute; bottom:0; background: rgba(244, 247, 250, .85); width: 100%; padding: 10px 25px 10px;">
                  <a href="index.html">Home</a>
                  <a href="BookRental.html">Book Rental</a>
                </div>
              </div>';
    }

?>
