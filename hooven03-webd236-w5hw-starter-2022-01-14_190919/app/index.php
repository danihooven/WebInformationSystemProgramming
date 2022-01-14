<?php
require_once 'include/config.php';
require_once 'include/util.php';
require_once 'tests/tests.php';

include 'include/header.html';


function isLetter($ch) {
  $bool = false;
  $lower_a = ord('a');
  $lower_z = ord('z');
  $upper_a = ord('A');
  $upper_z = ord('Z');
  
  if (strlen($ch) == 1){
    $letter = ord($ch);
    
    if ($letter >= $lower_a && $letter <= $lower_z){
      $bool = true;
    } else if ($letter >= $upper_a && $letter <= $upper_z){
      $bool = true;
    }
    
  }
  
  return $bool;
}



function myReverse($str) {
  // insert your code here
  $len = strlen($str);
  $reverse = "";
  
  for ($i = ($len-1); $i >= 0; $i--){
    $reverse .= $str[$i];
  }
  
  return $reverse;
}




function isPalindrome($str) {
  $bool = false;
  $rev = strtolower(myReverse($str));
  $str = strtolower($str);
  $len = strlen($str);
  $newString = "";
  $newRev = "";
  
  for ($i = ($len-1); $i >= 0; $i--){
    if (isLetter($str[$i])){    
      $newString .= $str[$i];
    } 
  }
  
  for ($i = ($len-1); $i >= 0; $i--){
    if (isLetter($rev[$i])){    
      $newRev .= $rev[$i];
    } 
  }
  
  if ($newRev == $newString){
    $bool = true;
  }
  return $bool;
  
}





function countdownFront($str, $num) {
  $newStr = "";
  
  for ($i = $num; $i > 0; $i--){
    $newStr .= substr($str, 0, ($i));
  }
  
  return $newStr;
  
}





function longestRun($str) {
  $count = 1;
  $max = 1;
  $len = strlen($str) - 1;
  
  for ($i = 0; $i < $len; $i++){
    if ($str[$i] == $str[$i+1]){
      $count++;
      if ($count > $max){
        $max = $count;
      }
    } else {
      $count = 1;
    }  
  }

  return $max;
  
}





?>

<div class="row">
  <div class="col-lg-12">
    <?php echo(runAllTests()) ?>
  </div>
</div>
    
<?php
  include 'include/footer.html';
?>