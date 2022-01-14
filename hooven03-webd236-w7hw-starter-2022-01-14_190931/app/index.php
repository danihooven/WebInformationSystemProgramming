<?php
require_once 'include/config.php';
require_once 'include/util.php';
require_once 'tests/tests.php';

include 'include/header.html';

function reduce($arr, $func) {
  $len = count($arr);
  $i = 2;
  
  if ($len == 0){
	  return null;
  } else {
    $value = $func($arr[0],$arr[1]);
  }
  
  for($i; $i<$len; $i++){
    $value = $func($value,$arr[$i]);
  }
  
  return $value;

}

function modeMaker() {
  $seen = array();
  return function($current, $new) use (&$seen) {
    $len = count($seen);
    if (empty($seen)){
      $seen[$current] = 1;
      $seen[$new] = 1;
      return $seen[$current];
    } elseif (array_key_exists($new, $seen)) {
      $seen[$new] += 1;
    } else {
      $seen[$new] = 1;
    }
    
    return array_search(max($seen), $seen);
    // https://stackoverflow.com/questions/6676768/php-get-highest-value-from-array/6676851
    
  };
}

class Car {
  private $fuelGauge;
  private $odometer;
  private $mpg;
  
  function __construct($initialGas, $mpg) {  
    $this->fuelGauge = $initialGas;
    $this->odometer = 0.0;
    $this->mpg = $mpg;
  }
  
  function drive($miles) {
    $oneMileOfGas = round(1/$this->mpg,1);

    while ($this->fuelGauge>=$oneMileOfGas && $miles>0) {
      $this->fuelGauge = round($this->fuelGauge-$oneMileOfGas,1);
      $miles--;
      $this->odometer++;
    } 
    
  }
  
  
  function addGas($gallons) {
    $this->fuelGauge += $gallons;
  }
  
  function readFuelGauge() {
    return $this->fuelGauge;
  }
  
  function readOdometer() {
    return $this->odometer;
  }
  
  public function __toString() {
    return 'Car (gas: ' . $this->readFuelGauge() .
      ', miles: ' . $this->readOdometer() . ')';
  }
}

?>

<div class="row">
  <div class="col-lg-12">
    <?php echo(runAllTests()); ?>
  </div>
</div>
    
<?php
  include 'include/footer.html';
?>

