<?php
include_once 'models/db.php';

function findAllPosts() {
    global $db;
    $query = 'SELECT * FROM post JOIN user ON post.user_id = user.user_id ORDER BY datestamp desc LIMIT 5';
    $st = $db -> prepare($query);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function findAllPostsByUser($user_id) {
    global $db;
    $query = 'SELECT * FROM post JOIN user ON post.user_id = user.user_id WHERE post.user_id = ? ORDER BY datestamp desc LIMIT 5';
    $st = $db -> prepare($query);
    $st -> bindParam(1, $user_id);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function findAllPostsByTag($tag){
    global $db;
    $query = "SELECT * FROM post JOIN user ON post.user_id = user.user_id WHERE tags LIKE '%$tag%' ORDER BY datestamp desc LIMIT 5";
    $st = $db -> prepare($query);
    // $st -> bindParam(':tag', $tag);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function findPostById($post_id){
    global $db;
    $st = $db -> prepare('SELECT * FROM post WHERE post_id = ?');
    $st -> bindParam(1, $post_id);
    $st -> execute();
    return $st -> fetch(PDO::FETCH_ASSOC);
}

function addPost($title, $content, $tags, $user_id){
    global $db;
    $datestamp = date('Y-m-d h:i:s T');
    $st = $db -> prepare("INSERT INTO post (title, content, tags, datestamp, user_id) VALUES (:title, :content, :tags, :datestamp, :user_id)");
    $st -> bindParam(':title', $title);
    $st -> bindParam(':content', $content);
    $st -> bindParam(':tags', $tags);
    $st -> bindParam(':datestamp', $datestamp);
    $st -> bindParam(':user_id', $user_id);
    $st -> execute();
}

function editPost($post_id, $title, $content, $tags){
    global $db;
    $datestamp = date('Y-m-d h:i:s A');
    $st = $db -> prepare("UPDATE post SET title = :title, content = :content, tags = :tags, datestamp = :datestamp WHERE post_id = :post_id");
    $st -> bindParam(':title', $title);
    $st -> bindParam(':content', $content);
    $st -> bindParam(':tags', $tags);
    $st -> bindParam(':datestamp', $datestamp);
    $st -> bindParam(':post_id', $post_id);  
    $st -> execute();
}

function deletePost($post_id){
  global $db;
  $st = $db -> prepare('DELETE FROM post WHERE post_id = :post_id');
  $st -> bindParam(':post_id', $post_id);
  $st -> execute();
}

function findAllComments($post_id){
    global $db;
    $query = "SELECT * FROM comment JOIN user ON comment.user_id = user.user_id WHERE post_id = ? ORDER BY datestamp desc";
    $st = $db -> prepare($query);
    $st -> bindParam(1, $post_id);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addComment($user_id, $post_id, $text){
    global $db;
    $datestamp = date('Y-m-d h:i:s T');
    $st = $db -> prepare("INSERT INTO comment (user_id, post_id, text, datestamp) VALUES (:user_id, :post_id, :text, :datestamp)");
    $st -> bindParam(':user_id', $user_id);
    $st -> bindParam(':post_id', $post_id);
    $st -> bindParam(':text', $text);
    $st -> bindParam(':datestamp', $datestamp);
    $st -> execute();
}

function deleteComment($comment_id){
  global $db;
  $st = $db -> prepare('DELETE FROM comment WHERE comment_id = :comment_id');
  $st -> bindParam(':comment_id', $comment_id);
  $st -> execute();
}

?>