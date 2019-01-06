<?php
session_start();
include_once '../action/config.php';
if(isset($_POST['publish'])){
  $title = $_POST['title'];
  $category = $_POST['category'];
  $cont = $_POST['content'];
  $image = $_FILES['image']['name'];
  $user = $_SESSION['user_id'];
  $content = preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $cont);
  //header('Location: ../home/?page=news');
  $image	= $_FILES["image"]["name"];
  $type		= $_FILES["image"]["type"];	//file name "image"
  $size		= $_FILES["image"]["size"];
  $temp		= $_FILES["image"]["tmp_name"];

  $path=".../assets/img/".$image; //set upload folder path
  $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
  $valid_extensions = array('jpeg', 'jpg', 'png');

  if (strlen($title) < 5 ) {
    $errorMsg="Title to short";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=create_news');
  }
  elseif ($content == null || $content == '') {
    $errorMsg="Content to not valid";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=create_news');
  }
  else if (strlen($content) < 10 ) {
    $errorMsg="Content to short";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=create_news');
  }
  else if(in_array($imgExt, $valid_extensions)) //check file extension
  {
      if($size < 2000000) //check file size 5MB
      {
        move_uploaded_file($temp, "../assets/img/" .$image);
        chmod($path, 0664);
        if ($post->store($title,$content,$image,$category,$user)) {
        $msg="Create News Success";
        $_SESSION['success'] = $msg;
        header('Location: ../home/?page=news');
        }

      }
      else
      {
        $errorMsg="Your File To large Please Upload 2MB Size";
        $_SESSION['error'] = $errorMsg;
        header('Location: ../home/?page=create_news');
         //error message file size not large than 5MB
      }
    }
  else
  {
    $errorMsg="Upload JPG , JPEG , PNG File Formate.....CHECK FILE EXTENSION";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=create_news'); //error message file extension
  }

}

if(isset($_POST['update'])){
  $title = $_POST['title'];
  $category = $_POST['category'];
  $content = $_POST['content'];
  $image = $_FILES['image']['name'];
  $user = $_SESSION['user_id'];
  unset($_SESSION['news']);
  $msg="Update News Success";
        $_SESSION['success'] = $msg;
        header('Location: ../home/?page=news');
  header('Location: ../home/?page=news');
  $image	= $_FILES["image"]["name"];
  $type		= $_FILES["image"]["type"];	//file name "image"
  $size		= $_FILES["image"]["size"];
  $temp		= $_FILES["image"]["tmp_name"];

  $path=".../assets/img/".$image; //set upload folder path
  $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
  $valid_extensions = array('jpeg', 'jpg', 'png');
  if (strlen($title) < 5 ) {
    $errorMsg="Title to short";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=update_news');
  }
  else if (strlen($content) < 10 ) {
    $errorMsg="Content to short";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=update_news');
  }
  else if(in_array($imgExt, $valid_extensions)) //check file extension
  {
      if($size < 2000000) //check file size 5MB
      {

        move_uploaded_file($temp, "../assets/img/" .$image);
        chmod($path, 0664);
        if ($post->store($title,$content,$image,$category,$user)) {
        $msg="Create News Success";
        $_SESSION['success'] = $msg;
        header('Location: ../home/?page=news');
        }

      }
      else
      {
        $errorMsg="Your File To large Please Upload 2MB Size";
        $_SESSION['error'] = $errorMsg;
        header('Location: ../home/?page=update_news');
         //error message file size not large than 5MB
      }
    }
  else
  {
    $errorMsg="Upload JPG , JPEG , PNG File Formate.....CHECK FILE EXTENSION";
    $_SESSION['error'] = $errorMsg;
    header('Location: ../home/?page=update_news'); //error message file extension
  }

}

if (isset($_POST['delete'])) {
  $id = $_POST['news'];
  if($post->destroy($id)){
    $msg = "Delete News Success";
    $_SESSION['success'] = $msg;
    header('Location: ../home/?page=news');
    }
}


 ?>
