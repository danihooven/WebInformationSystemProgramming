<?php
global $db;
try {
    $db = new PDO('sqlite:ToDoList.db3');
} catch (PDOException $e) {
    die("Could not open database. " . $e->getMessage() . $e->getTraceAsString());
}

function adHocQuery($q) {
    global $db;
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}
?>
