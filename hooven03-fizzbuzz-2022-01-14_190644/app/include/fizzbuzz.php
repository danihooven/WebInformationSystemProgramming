<?php 

function fizzbuzz($start, $stop){
  echo "<ul>";
  for ($i = $start; $i < $stop; ++$i) {
    if ($i % 3 == 0 && $i % 5 == 0) {
      echo " <li>FizzBuzz</li>\n";
    }
    else if ($i % 3 == 0) {
      echo " <li>Fizz</li>\n";
    }
    else if ($i % 5 == 0) {
      echo " <li>Buzz</li>\n";
    }
    else {
      echo "  <li>$i</li>\n";
    }
  }
  echo "</ul>";
}

?>