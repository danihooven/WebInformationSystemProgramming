<?php
include_once 'models/db.php';

/*
 * assuming that a table 'people' exists, this
 * will find them by ID.
 */
/*
function findPersonById($id) {
  global $db;
  $statement = $db -> prepare('SELECT * FROM people WHERE id = :id');
  $statement -> bindParam(':id', $id);
  $statement -> execute();
  return $statement -> fetch(PDO::FETCH_ASSOC));
}
*/
?>