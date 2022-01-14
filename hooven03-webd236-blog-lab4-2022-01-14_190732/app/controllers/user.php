<?php
include_once "include/util.php";
include_once "models/user.php";

function get_login() {
  renderTemplate(
    "views/user_login.php",
    array(
      'title' => 'Log in',
    )
  );
}

function post_login() {
  $form = safeParam($_POST, 'form');
  $email = safeParam($form, 'email');
  $password = safeParam($form, 'password');
  
  $user = findByEmailAndPassword($email, $password);
  if (!$user) {
    $errors = array("Bad username/password combination");
    renderTemplate(
      "views/user_login.php",
      array(
        'title' => 'Log in',
        'form' => $form,
        'errors' => $errors,
      )
    );
  } else {
    $destination = $_SESSION['redirect'] ? $_SESSION['redirect'] : "/index";
    restartSession();
    $_SESSION['user'] = $user;
    flash("Login successful!");
    redirect($destination);
  }
}

function get_logout() {
  restartSession();
  redirectRelative('index');
}

function get_register() {
  renderTemplate(
    "views/user_register.php",
    array(
      'title' => 'Create an account',
      'form' => array(),
      'action' => url('user/register'),
    )
  );
}

function verify_account($form) {
  $errors = array();
  
  if (!$form) {
    $errors[] = "No data submitted";
    return $errors;
  }
  
  $email1 = safeParam($form, 'email1');
  if (!$email1) {
    $errors['email1'] = "An email address must be provided";
  }
  $email2 = safeParam($form, 'email2');
  if ($email1 != $email2) {
    $errors['email2'] = "Email addresses must match";
  }
  $password1 = safeParam($form, 'password1');
  if (!$password1 || strlen($password1) < 8) {
    $errors['password1'] = "Passwords must be at least 8 characters long";
  }
  $password2 = safeParam($form, 'password2');
  if ($password1 != $password2) {
    $errors['password1'] = "Passwords must match";
  }
  $firstName = safeParam($form, 'firstName');
  if (!$firstName) {
    $errors['firstName'] = "A first name must be provided";
  }
  $lastName = safeParam($form, 'lastName');
  if (!$lastName) {
    $errors['lastName'] = "A last name must be provided";
  }
  
  return $errors;
}

function post_register() {
  $form = safeParam($_POST, 'form');
  $errors = verify_account($form);
  if ($errors) {
    renderTemplate(
      "views/user_register.php",
      array(
        'title' => 'Create an account',
        'form' => $form,
        'errors' => $errors,
        'action' => url('user/register'),
      )
    );
  } else {
    $user = addUser($form['email1'], $form['password1'], $form['firstName'], $form['lastName'], $form['bio']);
    restartSession();
    $user = findUserById($user);
    $_SESSION['user'] = $user;
    flash("Welcome to Blog, {$user['firstName']}.");
    redirectRelative("index");
  }
}

function get_edit() {
  ensureLoggedIn();
  $user = $_SESSION['user'];
  renderTemplate(
    "views/user_register.php",
    array(
      'title' => 'Edit your profile',
      'action' => url("user/edit/${user['user_id']}"),
      'form' => array(
        'firstName' => $user['firstName'],
        'lastName'  => $user['lastName'],
        'email1'    => $user['email'],
        'email2'    => $user['email'],
        'password1' => $user['password'],
        'password2' => $user['password'],
        'bio'       => $user['bio'],
        'user_id'   => $user['user_id'],
      )
    )
  );
}

function user_edit($user_id) {
  ensureLoggedIn();
  $user=$_SESSION['user'];
  if ($user_id != $user['user_id']) {
    die("Can't edit somebody else.");
  }
  $form = safeParam($_POST, 'form');
  $errors = verify_account($form);
  if ($errors) {
    renderTemplate(
      "views/user_register.php",
      array(
        'title' => 'Edit your profile',
        'form' => $form,
        'errors' => $errors,
        'action' => url("user/edit/${user['user_id']}"),
      )
    );
  } else {
    updateUser($user['user_id'], $form['email1'], $form['password1'], $form['firstName'], $form['lastName']);
    $_SESSION['user'] = findUserById($user['user_id']);
    flash("Profile updated");
    redirectRelative("index");
  }
}

function post_delete($user_id){
  deleteUser($user_id);
  restartSession();
  redirectRelative('index');
}

?>