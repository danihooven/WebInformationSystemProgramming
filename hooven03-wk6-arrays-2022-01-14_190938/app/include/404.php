<?php
  include '../include/config.php';
  include 'header.html';
?>

  <h1>404 - not found!</h1>
  <p>Sorry, but the URL <?php echo $_SERVER['REQUEST_URI']; ?> was not found on the server.</p>
    
<?php
  include 'footer.html';
?>