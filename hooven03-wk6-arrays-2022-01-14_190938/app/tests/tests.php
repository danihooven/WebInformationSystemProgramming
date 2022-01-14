<?php
require "tests/testing.php";

$words = preg_split("/[ \t\n\r]/", file_get_contents("words"));
function test_findSpellings1() {
  global $words;
  $matches = findSpellings("mispeled", $words);
  assertEquals(27, count($matches));
}

function test_findSpellings2() {
  global $words;
  $matches = findSpellings("globall", $words);
  assertEquals(16, count($matches));
}

function test_findSpellings3() {
  global $words;
  $matches = findSpellings(":-)", $words);
  assertEquals(0, count($matches));
}

function test_removeAllValuesMatching1() {
  $arr = array(
   'a' => "one",   'b' => "two",
   'c' => "three", 'd' => "two",
   'e' => "four",  'f' => "five",
   'g' => "three", 'h' => "two",
  );
  $result = removeAllValuesMatching($arr, "two");
  assertEquals(5, count($result));
  foreach($result as $key => $value) {
    assertTrue($value != "two", "two should not be in the values");
    assertEquals($arr[$key], $result[$key], "Looks like a key mismatch");
  }
}

function test_removeAllValuesMatching2() {
  $arr = array(
   'a' => "one",   'b' => "two",
   'c' => "three", 'd' => "two",
   'e' => "four",  'f' => "five",
   'g' => "three", 'h' => "two",
  );
  $result = removeAllValuesMatching($arr, "three");
  assertEquals(6, count($result));
  foreach($result as $key => $value) {
    assertTrue($value != "three", "three should not be in the values");
    assertEquals($arr[$key], $result[$key], "Looks like a key mismatch");
  }
}

function test_removeAllValuesMatching3() {
  $arr = array(
   'a' => "one",   'b' => "two",
   'c' => "three", 'd' => "two",
   'e' => "four",  'f' => "five",
   'g' => "three", 'h' => "two",
  );
  $result = removeAllValuesMatching($arr, "notfound");
  assertEquals(8, count($result), "nothing should have been removed");
  foreach($result as $key => $value) {
    assertEquals($arr[$key], $result[$key], "Looks like a key mismatch");
  }
}

function test_removeDuplicates1() {
  $arr = array(
   'a' => "one",   'b' => "two",
   'c' => "three", 'd' => "two",
   'e' => "four",  'f' => "five",
   'g' => "three", 'h' => "two",
  );
  $result = removeDuplicates($arr);
  assertEquals(3, count($result));
  foreach($result as $key => $value) {
    assertTrue($value != "two", "two should not be in the values");
    assertTrue($value != "three", "three should not be in the values");
    assertEquals($arr[$key], $result[$key], "Looks like a key mismatch");
  }
}

function test_removeDuplicates2() {
  $arr = array(
   'a' => "one",   'b' => "two",
   'c' => "three", 'd' => "four",
   'e' => "five",  'f' => "six",
   'g' => "seven", 'h' => "eight",
  );
  $result = removeDuplicates($arr);
  assertEquals(8, count($result), "none should have been removed");
  foreach($result as $key => $value) {
    assertEquals($arr[$key], $result[$key], "Looks like a key mismatch");
  }
}

function test_removeDuplicates3() {
  $arr = array(
   'a' => "one",  'b' => "one",
   'c' => "one",  'd' => "one",
   'e' => "one",  'f' => "one",
   'g' => "one",  'h' => "one",
  );
  $result = removeDuplicates($arr);
  assertEquals(0, count($result), "all should have been removed");
}
