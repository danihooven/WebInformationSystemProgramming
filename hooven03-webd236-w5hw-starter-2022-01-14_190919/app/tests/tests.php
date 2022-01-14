<?php
require "tests/testing.php";

function test_isLetter1() {
  for ($i = ord('a'); $i <= ord('z'); ++$i) {
    $ch = chr($i);
    assertTrue(isLetter($ch), "'$ch' should be a letter");
  }
}

function test_isLetter2() {
  for ($i = ord('A'); $i <= ord('Z'); ++$i) {
    $ch = chr($i);
    assertTrue(isLetter($ch), "'$ch' should be a letter");
  }
}

function test_isLetter3() {
  for ($i = ord(' '); $i <= ord('~'); ++$i) {
    $ch = chr($i);
    if (!ctype_alpha($ch)) {
      assertFalse(isLetter($ch), "'$ch' should not be a letter");
    }
  }
}

function test_isLetter4() {
  assertFalse(isLetter("abcd"), "Strings should not be letters.");
  assertFalse(isLetter(""), "Empty strings should not be letters.");
}

function test_myReverse1() {
  $strings = ['abcde', '12345', "asdofuw", ''];
  foreach ($strings as $str) {
    assertEquals(strrev($str), myReverse($str));
  }
}

function test_isPalindrome1() {
  $strings = ['racecar', 'mom', 'level', ''];
  foreach ($strings as $str) {
    assertTrue(isPalindrome($str), "'$str' is a palindrome");
  }
}

function test_isPalindrome2() {
  $strings = ['able was i ere i saw elba', 'Able was I, ere I saw Elba', "Madam, I'm Adam"];
  foreach ($strings as $str) {
    assertTrue(isPalindrome($str), "'$str' is an palindrome");
  }
}

function test_countdownFront1() {
  assertEquals('', countdownFront('Pancake', 0));
  assertEquals('P', countdownFront('Pancake', 1));
  assertEquals('PaP', countdownFront('Pancake', 2));
  assertEquals('PanPaP', countdownFront('Pancake', 3));
  assertEquals('PancPanPaP', countdownFront('Pancake', 4));
  assertEquals('PancaPancPanPaP', countdownFront('Pancake', 5));
  assertEquals('PancakPancaPancPanPaP', countdownFront('Pancake', 6));
}

function test_longestRun1() {
  assertEquals(1, longestRun('abcde'));
  assertEquals(2, longestRun('abbcdde'));
  assertEquals(5, longestRun('abbbcddeffffghijjjjjklmmm'));
}