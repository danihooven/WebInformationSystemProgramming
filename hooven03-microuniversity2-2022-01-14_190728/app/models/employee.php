<?php
include_once 'models/db.php';

function findAllEmployees($limit = 0, $offset = 0) {
    global $db;
    $query = 'SELECT EMP_NUM, EMP_LNAME, EMP_FNAME FROM EMPLOYEE ORDER BY EMP_LNAME' . ($limit ? " LIMIT $limit" : '') . ($offset ? " OFFSET $offset" : '');
    $st = $db -> prepare($query);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function findEmployeeById($id) {
    global $db;
    $st = $db -> prepare('SELECT * FROM EMPLOYEE WHERE EMP_NUM = ?');
    $st -> bindParam(1, $id);
    $st -> execute();
    return $st -> fetch(PDO::FETCH_ASSOC);
}

?>