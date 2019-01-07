<?php
session_start();
include 'config.php';
if(isset($_POST['comment'])) {
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  $post = $_POST['post_id'];
  $slug = $_POST['slug'];
	if($comments->store($name,$email,$subject,$message,$post)){
        header('Location: ../?news=details&slug='.$slug.'&id='.$post);
    }
}


 ?>
