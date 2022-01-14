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
    
    
    <?php  if (isset($postErrors)): ?>
      <div class="alert alert-danger mb-0" role="alert">
      Please fix the following errors:
        <ul>
        <?php  foreach ($postErrors as $key => $error): ?>
          <li><?php echo(htmlentities($error)); ?></li>
        <?php  endforeach; ?>
        </ul>
      </div>
    <?php  endif; ?>

    <form action="/post/<?php echo(htmlentities($action)); ?>/<?php echo(htmlentities(value($post['post_id']))); ?>" method="POST">
      
      <div>
      </div>
      
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="post[title]" placeholder="Enter title" value="<?php echo(htmlentities(value($post['title']))); ?>">
      </div>
      
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="10" name="post[content]" placeholder="Enter content"><?php if (isset($postErrors) OR $action == 'edit'):?><?php echo(htmlentities(value($post['content']))); ?><?php endif;?></textarea>
      </div>
      
      <div class="form-group">
        <label for="tags">Tags</label>
        <input class="form-control" id="tags" name="post[tags]" placeholder="Enter tags" value="<?php echo(htmlentities(value($post['tags']))); ?>">
      </div>
      
      <div class="form-row mt-4 float-left">
        <div class="btn-toolbar align-middle">

          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between">
            <span class="material-icons">send</span>&nbsp;Submit</button>

          <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('/index')">
            <span class="material-icons">cancel</span>&nbsp;Cancel</button>

        </div>
      </div>
  
    </form>
    

    
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
