<?php
require_once "tests/testing.php";

/*
 * In tests/testing.php is a function called runAllTests. It will run
 * any function that starts with "test_". You can use comparison functions
 * like the following to construct test cases:
 *   assertEquals($expected, $actual, $message)
 *   assertTrue($actual, $message)
 *   assertFalse($actual, $message)
 *
 * For example, say we wanted to test a function that adds two numbers together.
 * The function could be defined as:
 *
 *   function add($val1, $val2) {
 *     return $val1 + $val2;
 *   }
 *
 * We could then write a function to test whether this works or not:
 *
 *   function test_add1() {
 *     assertEquals(5, add(2, 3), "2 + 3 should be 5");
 *   }
 *
 * As written, this test will pass when you call the runAllTests() function like so:
 *
 *   <?php 
 *     require_once 'tests/tests.php';
 *     echo(runAllTests());
 *   ?>
 *
 * and you should see output like the following:
 *
 *   1 of 1 tests passed.
 *
 * Any failures and you will see a list of errors that should be fixed.
 *
 */