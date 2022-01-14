<?php
  include_once "config.php";
  include_once "util.php";
  $dbFilename=CONFIG['databaseFile'];
  $output = `sqlite3 {$dbFilename}.db3 < {$dbFilename}.sql 2>&1`;
  if ($output) {
    debug($output);
  }
  redirect("/");
?>