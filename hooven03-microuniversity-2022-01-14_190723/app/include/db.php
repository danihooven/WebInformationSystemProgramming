<?php
global $db;
try {
    $db = new PDO('sqlite:sample.db3');
    if (!$db) {
      print_r($db->errorInfo());
    }
} catch (PDOException $e) {
    die("Could not open database. " . $e->getMessage() . $e->getTraceAsString());
}


function findStudentById($id) {
    global $db;
    $st = $db -> prepare('SELECT * FROM STUDENT WHERE STU_NUM = ?');
    $st -> bindParam(1, $id);
    $st -> execute();
    return $st -> fetch(PDO::FETCH_ASSOC);
}

function findStudentByName($lname, $fname) {
    global $db;
    $lname = "%{$lname}%";
    $fname = "%{$fname}%";
    $st = $db -> prepare('SELECT * FROM STUDENT WHERE STU_LNAME LIKE ? AND STU_FNAME LIKE ? ORDER BY STU_LNAME, STU_FNAME ASC');
    $st -> bindParam(1, $lname);
    $st -> bindParam(2, $fname);
    $st -> execute();
    $rows = $st -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function findStudentByName2($lname, $fname) {
    global $db;
    $lname = "%{$lname}%";
    $fname = "%{$fname}%";
    $st = $db -> prepare('SELECT * FROM STUDENT WHERE STU_LNAME LIKE :lname AND STU_FNAME LIKE :fname ORDER BY STU_LNAME, STU_FNAME');
    $st -> bindParam(':lname', $lname);
    $st -> bindParam(':fname', $fname);
    $st -> execute();
    $rows = $st -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function findStudentByName3($lname, $fname) {
    global $db;
    $lname = "%{$lname}%";
    $fname = "%{$fname}%";
    $st = $db -> prepare('SELECT * FROM STUDENT WHERE STU_LNAME LIKE :lname AND STU_FNAME LIKE :fname ORDER BY STU_LNAME, STU_FNAME');
    $st -> execute(array(':lname' => $lname, ':fname' => $fname));
    $rows = $st -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function findAllStudents($limit = 0, $offset = 0) {
    global $db;
    $query = 'SELECT * FROM STUDENT ORDER BY STU_LNAME, STU_FNAME' . ($limit ? " LIMIT $limit" : '') . ($offset ? " OFFSET $offset" : '');
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

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

function adHocQuery($q) {
    global $db;
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}
?>
