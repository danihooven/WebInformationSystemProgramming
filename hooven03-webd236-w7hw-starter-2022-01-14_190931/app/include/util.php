<?php
  
function safeParam($arr, $index, $default="") {
  if ($arr && isset($arr[$index])) {
    if (is_string($arr[$index])) {
      return trim($arr[$index]);
    } else {
      return $arr[$index];
    }
  }
  return $default;
}

function debug($something) {
  echo "<pre><code>\n";
  print_r($something);
  echo "</code></pre>\n";
}

function redirect($url) {
  header("Location: $url");
  exit();
}


?>