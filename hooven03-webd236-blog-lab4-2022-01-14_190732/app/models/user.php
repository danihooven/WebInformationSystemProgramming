<?php
include_once 'models/db.php';

function findUserById($user_id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE user_id = ?');
  $st -> bindParam(1, $user_id);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findByEmailAndPassword($email, $password) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE email = :email AND password = :password');
  $st -> bindParam(':email', $email);
  $st -> bindParam(':password', $password);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findAllUsers() {
  global $db;
  $st = $db -> prepare('SELECT * FROM user ORDER BY user_id');
  $st -> execute();
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addUser($email, $password, $firstName="", $lastName="", $bio="", $picture ="https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576") {
  global $db;
  $st = $db -> prepare("INSERT INTO user (email, password, firstName, lastName, bio, picture) values (:email, :password, :firstName, :lastName, :bio, :picture)");
  $st -> bindParam(':email', $email);
  $st -> bindParam(':password', $password);
  $st -> bindParam(':firstName', $firstName);
  $st -> bindParam(':lastName', $lastName);
  $st -> bindParam(':bio', $bio);
  $st -> bindParam(':picture', $picture);
  $st -> execute();
  return $db->lastInsertId();
}

function updateUser($user_id, $email, $password, $firstName, $lastName, $bio, $picture) {
  global $db;
  $st = $db -> prepare("UPDATE user SET email = :email, password = :password, firstName = :firstName, lastName = :lastName, bio = :bio, picture = :picture WHERE user_id = :user_id");
  $st -> bindParam(':email', $email);
  $st -> bindParam(':password', $password);
  $st -> bindParam(':firstName', $firstName);
  $st -> bindParam(':lastName', $lastName);
  $st -> bindParam(':bio', $bio);
  $st -> bindParam(':picture', $picture);
  $st -> bindParam(':user_id', $user_id);
  $st -> execute();
}

function deleteUser($user_id) {
  global $db;
  $query = 'DELETE FROM user WHERE user_id = ?;';
  $st = $db -> prepare($query);
  $st -> bindParam(1, $user_id);
  $st -> execute();
}

?>