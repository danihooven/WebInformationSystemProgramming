<?php
function safeParam($key, $default) {
  $val = "";
  if (isset($_REQUEST[$key])) {
    $val = htmlentities(stripslashes(trim($_REQUEST[$key])));
  }
  if ($val == "") {
    $val = $default;
  }
  return $val;
}
?>