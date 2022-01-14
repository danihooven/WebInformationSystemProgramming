<!DOCTYPE html>
<html>
  <head>
    <title><?php echo(htmlentities($title)); ?></title>
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
          <img src="https://cdn.glitch.com/5b0f8a54-892a-4d86-9d84-94836d1a3a6c%2Fblog.svg?v=1560192184638" width="30" height="30" class="d-inline-block align-top" alt=""> My Blog Engine</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://glitch.com/edit/#!/remix/<?php echo(htmlentities(getenv('PROJECT_DOMAIN'))); ?>">Remix</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="post('/reset');" style="cursor:pointer">Reset DB</a>
          </li>
        </ul>
      
        <ul class="navbar-nav">
        <?php  if (isLoggedIn()): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
              <span class="material-icons" style="vertical-align:bottom">account_circle</span> <?php echo(htmlentities($_SESSION['user']['firstName'])); ?> <?php echo(htmlentities($_SESSION['user']['lastName'])); ?></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/user/edit">Edit profile</a>
              <a class="dropdown-item" href="/user/logout">Logout</a>
            </div>
          </li>
        <?php  else: ?>
          <li class="nav-item">
            <a class="nav-link" onclick="get('/user/login');" style="cursor:pointer">Login</a>
          </li>
        <?php  endif; ?>
        </ul>
      
    </nav>
    
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4"><?php echo(htmlentities($title)); ?></h1>
          <p class="lead">A simple blogging engine.</p>
          <p><em>Author: <a href="https://glitch.com/@hooven03">Dani Hooven</a></em></p>
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


      

<div class="row">
  <div class="col-lg-12">    


<!-- Sub Headers -->
<?php if ($subHead == 'user'):?>

  <div class="card">
    <div class="card-header">
      <div class="row">          
        <div class="col">
            <h5 class="card-title"><strong>
              <?php echo(htmlentities( $posts[0]['firstName'])); ?> <?php echo(htmlentities($posts[0]['lastName'])); ?> - 
              <a href="mailto:<?php echo(htmlentities( $posts[0]['email'] )); ?>"><?php echo(htmlentities( $posts[0]['email'] )); ?></a>
            </strong></h5>
        </div>
      </div>        
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-auto">
          <img src="<?php echo(htmlentities( $posts[0]['picture'] )); ?>" class="img-fluid align-middle" alt="profile picture">
        </div>
        <div class="col">
          <p class="card-text"><?php echo(htmlentities( $posts[0]['bio'] )); ?></p>
      </div>
    </div>
  </div>
  </div>
  </br>

  <?php elseif ($subHead == 'recent'):?>
   <h2>Recent posts</h2>

  <?php elseif ($subHead == 'tag'):?>
   <h2>Posts tagged '<?php echo(htmlentities($posts[0]['tags'])); ?>'.</h2>

<?php endif;?>
  

<!--   Display Posts -->
<?php  foreach ($posts as $post): ?>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
          <h5 class="card-title"><strong><a href="/post/view/<?php echo(htmlentities( $post['post_id'] )); ?>"><?php echo(htmlentities( $post['title'] )); ?></strong></a></h5>
      </div>
      <div class="col text-right">
        <?php echo(htmlentities( time2str( $post['datestamp'] ) )); ?> by 
        <a href="/post/user/<?php echo(htmlentities( $post['user_id'] )); ?>"><?php echo(htmlentities( $post['firstName'])); ?> <?php echo(htmlentities( $post['lastName'])); ?></a>
      </div>      
    </div>

  </div>
  <div class="card-body">
    <?php echo(htmlentities(substr( $post['content'], 0, 500 ))); ?>
    <a href="/post/view/<?php echo(htmlentities( $post['post_id'] )); ?>">see more...</a>
  </div>


  <?php if ($post['tags']):?>
  <div class="card-footer">
    <small>Filed under:
      <?php foreach (split_tags($post['tags']) as $key => $value):?>
      <a href="/post/tag/<?php echo(htmlentities($value)); ?>"><?php echo(htmlentities($value)); ?></a>
      <?php  endforeach; ?>
    </small>
  </div>
  <?php endif;?>

</div>

</br>    
<?php  endforeach; ?>
    

<!-- Add Button -->
<?php if (isLoggedIn()): ?>
  <button type="button" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('/post/add')">
<?php  else: ?>
  <button type="button" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('/user/login')">
<?php  endif; ?>
  <span class="material-icons">add_circle_outline</span>&nbsp;Add a post
  </button>
    
  </div>
</div>
  
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>. Current time is <?php echo(htmlentities(date('Y-m-d H:i:s T'))); ?></span>
      </div>
    </footer>
  </body>
</html> 