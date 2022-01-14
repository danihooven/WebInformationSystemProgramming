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
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-2">
          <p>This program will calculate your body mass index and indicate what your range is.</p>
          <form action="bmi.php" method="get">
            <div class="form-group">
              <label for="height">Height (inches)</label>
              <input type="number" min="1" id="height" name="height" class="form-control" placeholder="Enter height" />
            </div>
            <div class="form-group">
              <label for="height">Weight (pounds)</label>
              <input type="number" min="1" id="weight" name="weight" class="form-control" placeholder="Enter weight" />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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