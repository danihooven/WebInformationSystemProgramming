<?php
  include_once "include/util.php";

  function post_index($params) {
    $output = `sqlite3 ToDoList.db3 < ToDoList.sql`;
    redirectRelative("index");
  }
?>