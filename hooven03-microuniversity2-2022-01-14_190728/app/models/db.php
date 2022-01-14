<?php
global $db;
try {
  $fileName = CONFIG['databaseFile'] . ".db3";
  $db = new PDO('sqlite:' . $fileName);
  if (!$db) {
    errorPage(500, print_r($db->errorInfo(), 1) );
  }
  adHocQuery("PRAGMA foreign_keys=ON;");
} catch (PDOException $e) {
    errorPage(500, "Could not open database. " . $e->getMessage() . $e->getTraceAsString());
}

function adHocQuery($q) {
    global $db;
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}
?>
