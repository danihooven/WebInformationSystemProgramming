<?php
function safeParam($key, $default) {
  $val = "";
  if (isset($_POST[$key])) {
    $val = htmlentities(trim($_POST[$key]));
  } else if (isset($_GET[$key])) {
    $val = htmlentities(trim($_GET[$key]));
  }
  if ($val == "") {
    $val = $default;
  }
  return $val;
}

function categoryFor($bmi) {
  $result = "";
  if ($bmi < 16) {
    $result = "severely underweight";
  } else if ($bmi <= 18.5) {
    $result = "underweight";
  } else if ($bmi <= 25) {
    $result = "normal";
  } else if ($bmi <= 30) {
    $result = "overweight";
  } else {
    $result = "obese";
  }
  return $result;
}

$height = safeParam('height', 1);
$weight = safeParam('weight', 0);
$bmi = (703 * $weight) / ($height * $height);
$bmiCategory = categoryFor($bmi);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>BMI Calculator</title>
    <link href="style.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-2">
          <h1 class="display-4">PHP BMI Calculator</h1>
          <p class="lead">Calculate your body mass index</p>
          <p><em>Author: <a href="https://www.franklin.edu/about-us/faculty-staff/faculty-profiles/whittakt">Todd Whittaker</a></em></p>
          <hr class="my-4">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-2">
          <h2>Results</h2>
          <p>With a height of <?php echo $height ?>
          inches and a weight of <?php echo $weight ?>
          pounds, your BMI is <?php echo number_format($bmi, 2) ?>
          which is <?php echo $bmiCategory ?>.</p>
          <p><a href="/">Return to BMI Calculator</a></p>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>.</span>
      </div>
    </footer>
  </body>
</html>