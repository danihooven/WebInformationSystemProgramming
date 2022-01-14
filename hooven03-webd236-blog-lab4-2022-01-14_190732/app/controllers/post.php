<?php
include_once "include/util.php";
include_once "models/post.php";

function get_list() {
  $posts = findAllPosts();
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'My Blog Engine',
      'posts' => $posts,
      'subHead' => 'recent',
    )
  );
}

function get_user($user_id) {
  $posts = findAllPostsByUser($user_id);
  renderTemplate(
    "views/index.php",
    array(
      'title' => sprintf("My Blog Engine - Posts by " . $posts[0]['firstName']),
      'posts' => $posts,
      'subHead' => 'user',
    )
  );
}

function get_tag($tag) {
  $posts = findAllPostsByTag($tag);
  renderTemplate(
    "views/index.php",
    array(
      'title' => sprintf("My Blog Engine - Posts tagged '" . $tag ."'"),
      'posts' => $posts,
      'subHead' => 'tag',
    )
  );
}

function get_view($post_id){
  $post = findPostById($post_id);
  $comments = findAllComments($post_id);
  renderTemplate(
    "views/post_view.php",
    array(
      'title' => 'View a Blog Post',
      'post' => $post,
      'comments' => $comments,
    )
  );
}

function get_add(){
  renderTemplate(
    "views/post_add.php",
    array(
      'title' => 'Add a Blog Post',
      'action' => 'add',
    )
  );
}

function checkPost($array) {
  
  $errors = array();

  if (!$array['title']) {
    $errors['title'] = "Title may not be empty.";
  }
  if (!$array['content']) {
    $errors['content'] = "Content may not be empty.";
  }
  
  return $errors;
}

function post_add() {
  $errors = checkPost($_POST['post']);
  if ($errors) {
    renderTemplate(
      "views/post_add.php",
      array(
        'title' => 'Add a Blog Post',
        'postErrors' => $errors,
        'post' => $_POST['post'],
      )
    );
  } else { 
    $user = $_SESSION['user']['user_id'];
    addPost($_POST['post']['title'],$_POST['post']['content'],$_POST['post']['tags'],$user);
    get_list();
  }
}

function get_edit($post_id){
  $post = findPostById($post_id);
  renderTemplate(
    "views/post_add.php",
    array(
      'title' => 'Edit a Blog Post',
      'post' => $post,
      'action' => 'edit'
    )
  );
}

function post_edit($post_id) {
  $errors = checkPost($_POST['post']);
  if ($errors) {
    renderTemplate(
      "views/post_add.php",
      array(
        'title' => 'Edit a Blog Post',
        'postErrors' => $errors,
        'post' => $_POST['post'],
      )
    );
  } else {  
    editPost($post_id, $_POST['post']['title'],$_POST['post']['content'],$_POST['post']['tags']);
    get_list();
  }
}

function post_delete($post_id){
  deletePost($post_id);
  get_list();
}


?>