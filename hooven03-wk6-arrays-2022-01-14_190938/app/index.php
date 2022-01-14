<?php
require_once 'include/config.php';
require_once 'include/util.php';
require_once 'tests/tests.php';

include 'include/header.html';

function findSpellings($word, $allWords) {
  $result = [];
  
  foreach ($allWords as $key => $value){
    if (soundex($word) == soundex($value)){
      $result[] = $value;
    }
  }
  
  return $result;
}

function removeAllValuesMatching($arr, $value) {
  $result = [];
  // Check that array contains value
     foreach ($arr as $key => $item){    
      if ($item != $value){
        $result[$key] = $item;
      }
     }
  return $result;
}


function removeDuplicates($arr) {
  $result = [];
  $freq = [];
  
  foreach($arr as $key => $value){
      if(isset($freq[$value])){
        $freq[$value] += 1;
      } else {
        $freq[$value] = 1;
      }
    }
  
  foreach ($freq as $key_f => $value_f){
    if($value_f > 1){
      foreach ($arr as $key_a => $value_a){
        if($value_a == $key_f){
          unset($arr[$key_a]);
        }
      }
    }
  }
  
  return $result = $arr;
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