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

function flash($message) {
  $_SESSION['flash'] = $message;
}

function restartSession() {
  //remove PHPSESSID from browser
  if ( isset( $_COOKIE[session_name()] ) ) {
    setcookie( session_name(), "", time()-3600, "/" );
  }
  //clear session from globals
  $_SESSION = array();
  //clear session from disk
  session_destroy();
  session_start();
}

function login($user) {
  $_SESSION['user'] = $user;
}

function isLoggedIn() {
  return isset($_SESSION['user']);
}

function ensureLoggedIn() {
  if (!isLoggedIn()) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    redirectRelative("user/login");
    exit();
  }
}

function debug($something) {
  echo "<div class='debug'>\n";
  print_r($something);
  echo "\n</div>\n";
}

function redirect($url) {
  header("Location: $url");
  exit();
}

function redirectRelative($url) {
  redirect(url($url));
}

function url($url) {
  $requestURI = explode('/', $_SERVER['REQUEST_URI']);
  $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

  $dir = array();
  for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
      $dir[] = $requestURI[$i];
    } else {
      break;
    }
  }
  return implode('/', $dir) . '/' . $url;
}

function checked(&$something, $compare) {
  if (isset($something) && (is_array($something) && in_array($compare, $something) || $something == $compare)) {
    return "checked";
  }
  return "";
}

function value(&$something, $default = "") {
  return isset($something) ? $something : $default;
}

function __importTemplate($matches) {
  $fileName = trim($matches[1]);
  if (!file_exists($fileName)) {
    die("Template $fileName doesn't exist.");
  }
  $contents = file_get_contents($fileName);
  $contents = preg_replace_callback('/%%\s*(.*)\s*%%/', '__importTemplate', $contents);
  return $contents;
}

function __resolveRelativeUrls($matches) {
  return url($matches[1]);
}

function __cacheName($view) {
  $cachePath = explode('/', $view);
  $idx = sizeof($cachePath) - 1;
  $cachePath[$idx] = 'cache_' . $cachePath[$idx];
  return implode('/', $cachePath);
}

function renderTemplate($view, $params) {
  $useCache = false;

  if (!file_exists($view)) {
    die("File $view doesn't exist.");
  }
  # do we have a cached version?
  clearstatcache();
  $cacheName = __cacheName($view);
  if ($useCache && file_exists($cacheName) && (filemtime($cacheName) >= filemtime($view))) {
    $contents = file_get_contents($cacheName);
  } else {
    # we need to build the file (doesn't exist or template is newer)
    $contents = __importTemplate(array('unused', $view));

    $contents = preg_replace_callback('/@@\s*(.*)\s*@@/U', '__resolveRelativeUrls', $contents);

    $patterns = array(
      array('src' => '/{{/', 'dst' => '<?php echo('),
      array('src' => '/}}/', 'dst' => '); ?>'),
      array('src' => '/\[\[/', 'dst' => '<?php '),
      array('src' => '/\]\]/', 'dst' => '?>')
    );
    foreach ($patterns as $pattern) {
      $contents = preg_replace($pattern['src'], $pattern['dst'], $contents);
    }
    file_put_contents($cacheName, $contents);
  }
  extract($params);
  ob_start();
  eval("?>" . $contents);
  $result = ob_get_contents();
  ob_end_clean();
  echo $result;
}
?>