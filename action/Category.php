<?php
session_start();
include 'config.php';
if(isset($_POST['save'])) {
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	//$title = $_POST['title'];
	if($category->store($title)){
    $msg = "Create Category Success";
    $_SESSION['message'] = $msg;
    header('Location: ../home/?page=category');
    }
}
if(isset($_POST['update'])) {
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$id = $_POST['category'];
	if($category->update($title,$id)){
    $msg = "Update Category Success";
    $_SESSION['message'] = $msg;
    header('Location: ../home/?page=category');
    }
}

if(isset($_POST['delete'])) {
	$id = $_POST['category'];
	if($category->destroy($id)){
    $msg = "Delete Category Success";
    $_SESSION['message'] = $msg;
    header('Location: ../home/?page=category');
    }
}

 ?>
