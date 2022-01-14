<?php
include_once('include/util.php');

function get_index() {
  renderTemplate(
    "views/sweet.php",
    array(
      'title' => 'My Sweet Form'
    )
  );
}

function post_simple() {
  echo "Hello {$_POST['data']['firstName']}";
}
?>