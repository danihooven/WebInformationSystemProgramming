<?php
  include_once 'include/config.php';
  include_once 'include/util.php';
  include_once 'include/db.php';
  include_once 'include/Logger.php';

  include 'include/header.html';

  $logger = Logger::instance();
  $logger->debug("Here's a debugging message");
  $logger->debug(array("pi" => 3.14159, "e" => 2.71828, "i" => "SQRT(-1)"));
  $logger->debug(array(2, 3, 5, 7, 11, array("pi" => 3.14159, "e" => 2.71828, "i" => "SQRT(-1)")));
?>

<!-- Employee List -->
<div class="row">
  <div class="col-lg-12">
    <h2>
      Employee List
    </h2>
    <ul>
      <?php 
        $rows = findAllEmployees();
        foreach ($rows as $row):
        echo "<li><a href='view.php?emp_num={$row['EMP_NUM']}'>";
        echo "{$row['EMP_FNAME']} {$row['EMP_LNAME']}";
        echo "</a></li>";
        endforeach; ?>
    </ul>
  </div>
</div>
    
<?php
  include 'include/footer.html';
?>