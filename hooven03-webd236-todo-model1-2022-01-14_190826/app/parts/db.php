<?php
global $db;
try {
    $db = new PDO('sqlite:ToDoList.db3');
} catch (PDOException $e) {
    die("Database error: $e");
}

function findCurrentToDos() {
  return findToDos(0);
}

function findDoneToDos() {
  return findToDos(1);
}

function findToDos($done) {
  global $db;
  $statement = $db -> prepare("SELECT * FROM todo WHERE done = :done ORDER BY id");
  $statement -> bindParam(":done", $done);
  $statement -> execute();
  return $statement -> fetchAll(PDO::FETCH_ASSOC);
}

function findToDoById($id) {
    global $db;
    $st = $db -> prepare('SELECT * FROM todo WHERE id = :id');
    $st -> bindParam(":id", $id);
    $st -> execute();
    return $st -> fetch(PDO::FETCH_ASSOC);
}

function addToDo($description) {
    global $db;
    $statement = $db -> prepare("INSERT INTO todo (description, done) values (:description, 0)");
    $statement -> bindParam(":description", $description);
    $statement -> execute();
    return $db->lastInsertId();
}

function updateToDo($id, $description, $done) {
    global $db;
    $statement = $db -> prepare("UPDATE todo SET description = :description, done = :done WHERE id = :id");
    $statement -> bindParam(1, $description);
    $statement -> bindParam(2, $done);
    $statement -> bindParam(3, $id);
    $statement -> execute(array(':description' => $description, ':done' => $done, ':id' => $id));
}

function deleteToDo($id) {
    global $db;
    $statement = $db -> prepare("DELETE FROM todo WHERE id = ?");
    $statement -> bindParam(1, $id);
    $statement -> execute();
}

function adHocQuery($q) {
    global $db;
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}
?>