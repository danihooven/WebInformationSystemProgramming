<!DOCTYPE html>
<html>
  <head>
    <title><?php echo(htmlentities(CONFIG['applicationName']. " - " . $title)); ?></title>
    <link rel="shortcut icon" href="https://cdn.glitch.com/7635e9c3-2015-4ec8-967a-16ca37cc9e55%2Ffavicon.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="/static/custom.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="/">
        <img src="https://cdn.glitch.com/016bfea2-8732-4215-b81b-ce7f9be7f9c5%2Frocket.svg?v=1585409224951" width="30" height="30" class="d-inline-block align-top" alt="">&nbsp;<?php echo(htmlentities(CONFIG['applicationName'])); ?>
      </a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li> 
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
            <span class="material-icons" style="vertical-align:bottom">build</span> Tools
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="nav-link" href="https://glitch.com/edit/#!/remix/<?php echo(htmlentities(getenv('PROJECT_DOMAIN'))); ?>">Remix</a>
            <a class="nav-link" onclick="post('/reset');" style="cursor:pointer">DB Reset</a>
            <a class="nav-link" href="/phpliteadmin.php" target="_blank" style="cursor:pointer">DB Admin</a>
          </div>
        </li>
      </ul>          
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4"><?php echo(htmlentities(CONFIG['applicationName']. " - " . $title)); ?></h1>
          <p class="lead"><?php echo(htmlentities(CONFIG['leadDescription'])); ?></p>
          <p><em>Author: <?php echo(htmlentities(CONFIG['authorName'])); ?></em></p>
          <hr>
        </div>
      </div>
      
<?php  if (isset($errors)): ?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      Please fix the following errors:
      <ul class="mb-0">
<?php  foreach ($errors as $error): ?>
        <li><?php echo(htmlentities($error)); ?></li>
<?php  endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php  endif;?>
  
<?php  if (isset($_SESSION['flash'])): ?>
<div class="alert alert-success alert-dismissible flash-message" role="alert" id="flash">
  <?php echo(htmlentities($_SESSION['flash'])); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("div.flash-message").fadeTo(1000,1).delay(2000).fadeOut(1000);
  });
</script>
<?php  
   unset($_SESSION['flash']);
   endif;
?>

      

<div class="row">
<div class="col-lg-12">
<div class="card">
  
  <!-- Form Header -->
  <div class="card-header">
    <div class="h3">We're sorry to see you go!</div>
    <div><small>Please fill out the form below so that we can tailor our communcation to meet your needs</small></div>
  </div>

  <!-- Validation -->
  <?php  if (isset($accountErrors)): ?>
    <div class="alert alert-danger mb-0" role="alert">
    Please fix the following errors
      <ul>
      <?php  foreach ($accountErrors as $key => $error): ?>
        <li><?php echo(htmlentities($error)); ?></li>
      <?php  endforeach; ?>
      </ul>
    </div>
  <?php  endif; ?>

  <!-- Form Body -->
  <div class="card-body">
  <form action="/process/contact" method="post">
    
    <!-- Text : EMAIL-->
    <div class="form-row">
      <div class="col">
        <label for="email">My email address</label>
        <input type="email" class="form-control" id="email" name="form[email]" placeholder="My email address" required
               value = " <?php echo(htmlentities(value($form['email']))); ?>">
      </div>
    </div>

    
    <!-- Checkbox : LIST -->
    <div class="form-row mt-4">
      <div class="col">
        <label for="list">I no longer wish to receive the following</label>
        <div class="border p-2 rounded" id="list">
          
          <!-- Announcements -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="announcements" New product announcements
                   value="New product announcements" <?php echo(htmlentities(checked( $form['list'], 'New product announcements'))); ?>>
            <label class="form-check-label" for="announcements">New product announcements</label>
          </div>

          <!-- Updates -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="updates" 
                   value="Product updates" <?php echo(htmlentities(checked($form['list'], 'Product updates'))); ?>>
            <label class="form-check-label" for="updates">Product updates</label>
          </div>

          <!-- Newsletter -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="newsletter" 
                   value="Monthly newsletter" <?php echo(htmlentities(checked($form['list'], 'Monthly newsletter'))); ?>>
            <label class="form-check-label" for="newsletter">Monthly newsletter</label>
          </div>
          
          <!-- Events -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="events" 
                   value="Events" <?php echo(htmlentities(checked($form['list'], 'Events'))); ?>>
            <label class="form-check-label" for="events">Events</label>
          </div>

          <!-- Offers -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="offers" 
                   value="Partner offers" <?php echo(htmlentities(checked($form['list'], 'Partner offers'))); ?>>
            <label class="form-check-label" for="offers">Partner offers</label>
          </div>

        </div>
      </div>
    </div>


  
    <!-- Radio Buttons : REASON  -->
    <div class="form-row mt-4">
      <div class="col">
        <label for="reason">I'm unsubscribing because</label>
        <div class="border p-2 rounded" id="reason">
          
          <!-- Relevant -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="relevant" 
                   value="relevant" <?php echo(htmlentities(checked($form['reason'], 'relevant'))); ?>>
            <label class="form-check-label" for="relevant">Your emails are not relevant to me.</label>
          </div>
          
          <!-- Frequent -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="frequent" 
                   value="frequent" <?php echo(htmlentities(checked($form['reason'], 'frequent'))); ?>>
            <label class="form-check-label" for="frequent">Your emails are too frequent.</label>
          </div>
          
          <!-- Remember -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="remember" 
                   value="remember" <?php echo(htmlentities(checked($form['reason'], 'remember'))); ?>>
            <label class="form-check-label" for="remember">I don't remember signing up for this list.</label>
          </div>
          
          <!-- Other -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="other" 
                   value="other" <?php echo(htmlentities(checked($form['reason'], 'other'))); ?>>
            <label class="form-check-label" for="other">Other</label>
          </div>
          
        </div>
      </div>
    </div>

    
    <!-- Button : SUBMIT / CANCEL   -->
    <div class="form-row mt-4 float-right">
      <div class="btn-toolbar align-middle">

        <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between">
          <span class="material-icons">send</span>&nbsp;Submit</button>

        <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('/index')">
          <span class="material-icons">cancel</span>&nbsp;Cancel</button>

      </div>
    </div>
  
    
  </div> <!-- End Form Body -->
  
</div>
</div>
</div>

    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2020 <a href="https://www.franklin.edu/">Franklin University</a>. Current time is <?php echo(htmlentities(date('Y-m-d H:i:s T'))); ?></span>
      </div>
    </footer>
  </body>
</html> 