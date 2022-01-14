<?php

function _toString($thing) {
  if (is_array($thing)) {
    return print_r($thing, 1);
  } else if (is_bool($thing)) {
    return $thing ? "TRUE" : "FALSE";
  } else if (is_null($thing)) {
    return "NULL";
  } else if (is_string($thing)) {
    return "'$thing'";
  } else {
    return strval($thing);
  }
}

function assertEquals($expected, $actual, $message="") {
  if ($expected !== $actual) {
    $eStr = _toString($expected);
    $aStr = _toString($actual);
    $message = "expected <code>{$eStr}</code> but got <code>{$aStr}</code>. " . $message;
    throw new Exception($message);
  }
}

function assertTrue($actual, $message="") {
  assertEquals(true, $actual, $message);
}

function assertFalse($actual, $message="") {
  assertEquals(false, $actual, $message);
}

function runAllTests() {
  $messages = [];
  $tests = array_filter(get_defined_functions()['user'],
    function($name) {
      return strpos($name, "test_") === 0;
    }
  );
  $pass = 0;
  $total = 0;
  foreach ($tests as $test) {
    try {
      $total += 1;
      $test();
      $pass += 1;
    } catch (Exception $e) {
       $messages[] = "In function <code>{$test}()</code>, {$e->getMessage()}";
    }
  }
  $result = "<p>{$pass} of {$total} tests passed.";
  $result .= "<ul>";
  foreach($messages as $message) {
    $result .= "<li>{$message}</li>";
  }
  $result .= "</ul>";
  return $result;
}