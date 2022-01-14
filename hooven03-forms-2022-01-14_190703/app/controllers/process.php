<?php
require_once "include/util.php";
// require_once "models/process.php";


function dumpArray($elements) {
  $result = "<ul>\n";
  foreach ($elements as $key => $value) {
      $result .= "<li>$value</li>\n";
  }
  return $result . "</ul>\n";
}


function checkAccount($array) {
  
  $errors = array();

  if (!$array['email']) {
    $errors['email'] = "Email address must be provided.";
  }
  if (!$array['list']) {
    $errors['list'] = "You must select at least one list.";
  }
  if (!$array['reason']) {
    $errors['reason'] = "You must select a reason for unsubscribing";
  }
  
  return $errors;
}


function post_contact() {
  $errors = checkAccount($_POST['form']);
  if ($errors) {
    renderTemplate(
      "views/index.php",
      array(
        'title' => 'Home',
        'accountErrors' => $errors,
        'form' => $_POST['form'],
      )
    );
  } else {
    renderTemplate(
      "views/process.php",
      array(
        'title' => 'Goodbye',
        'variables' => $_POST['form']
      )
    );
  }
}