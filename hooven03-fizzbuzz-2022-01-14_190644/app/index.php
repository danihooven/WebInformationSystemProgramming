<?php
  require_once 'include/config.php';
  require_once 'include/util.php';
  require_once 'include/fizzbuzz.php';
  require_once 'tests/tests.php';

  include 'include/header.html';
?>

<div class="row">
  <div class="col-lg-12">
    <p>The FizzBuzz problem is a classic programming interview problem in which a range of numbers is examined to locate those numbers divisible by 3 and 5.  If the number is divisible by 3, then print "Fizz." If the number is divisible by 5 then print "Buzz." If it is divisible by both, then print "FizzBuzz." Otherwise, just print the number.</p>
  </div>
</div>

<div class="row" >
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="index.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label for="start">Start</label>
                <input type="number" class="form-control" id="start" name="start" placeholder="Enter a number between 1 and 100" required value="<?php echo(safeParam($_REQUEST, 'number', '1')); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="stop">Stop</label>
                <input type="number" class="form-control" id="stop" name="stop" placeholder="Enter a number between 1 and 100" required value="<?php echo(safeParam($_REQUEST, 'number', '100')); ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row mt-4 float-right">
              <div class="btn-toolbar align-middle">
                <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
                <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('index.php')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    
    
      <?php
        $start = safeParam($_REQUEST, 'start', '1');
        $start = max(min($start, 100), 1);
        $stop = safeParam($_REQUEST, 'stop', '100');
        $stop = max(min($stop, 100), 1);
    
    echo "<h3>Fizz Buzz between $start and $stop</h3>";
    
    echo(fizzBuzz($start, $stop));

        
      ?>

  </div>
</div>
    
<?php
  include 'include/footer.html';
?>