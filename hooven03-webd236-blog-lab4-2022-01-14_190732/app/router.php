<?php

function routeUrl() {
  $method = $_SERVER['REQUEST_METHOD'];
  $requestURI = explode('/', $_SERVER['REQUEST_URI']);
  $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

  for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
      unset($requestURI[$i]);
    }
  }
  # continued...

  $entity = array_values($requestURI);
  $controller = 'controllers/' . $entity[0] . '.php';
  $func = strtolower($method) . '_' . (isset($entity[1]) ? $entity[1] : 'index');
  $params = array_slice($entity, 2);

  if (!file_exists($controller)) {
    die("Controller '$controller' doesn't exist.");
  }

  require $controller;
  if (!function_exists($func)) {
    die("Function '$func' doesn't exist.");
  }

  call_user_func_array($func, $params);
  exit();
}

date_default_timezone_set('America/New_York');


// note, GDPR says that you need to notify about cookies like this.
session_set_cookie_params(60*60*24*14, '/', $_SERVER['SERVER_NAME'], true, true);
session_start();
routeUrl();
