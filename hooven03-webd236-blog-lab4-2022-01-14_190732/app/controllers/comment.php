<?php
include_once "include/util.php";
include_once "models/post.php";
include_once "controllers/post.php";

function post_new($post_id) {
    $user = $_SESSION['user']['user_id'];
    addComment($user, $post_id, $_POST['comment']['text']);
    get_view($post_id);
}

function post_remove($comment_id, $post_id) {
  deleteComment($comment_id);
  get_view($post_id);
}

?>