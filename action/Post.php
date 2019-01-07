<?php
session_start();
include_once '../action/config.php';
if(isset($_POST['publish'])){
  $title = filter_var($_POST['title'], FILTER_SANITIZE_EMAIL);
  $category = $_POST['category'];
  $content = filter_var($_POST['content'], FILTER_SANITIZE_EMAIL);
  $image = $_FILES['image']['name'];
  $user = $_SESSION['user_id'];
  $image	= $_FILES["image"]["name"];
  $type		= $_FILES["image"]["type"];	//file name "image"
  $size		= $_FILES["image"]["size"];
  $temp		= $_FILES["image"]["tmp_name"];

  $path="../assets/img/".$image; //set upload folder path
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
  $id = $_POST['id'];
  $slug = $_POST['slug'];
  $old_image = $_POST['old_image'];
  $title = $_POST['title'];
  $category = $_POST['category'];
  $cont = $_POST['content'];
  $content = preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $cont);
  $image = $_FILES['image']['name'];
  $user = $_SESSION['user_id'];

  $image	= $_FILES["image"]["name"];
  $type		= $_FILES["image"]["type"];	//file name "image"
  $size		= $_FILES["image"]["size"];
  $temp		= $_FILES["image"]["tmp_name"];

  $path="../assets/img/".$image; //set upload folder path
  $directory="../assets/img/";
  $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
  $valid_extensions = array('jpeg', 'jpg', 'png');

if (strlen($title) < 5 ) {
  $errorMsg="Title to short";
  $_SESSION['error'] = $errorMsg;
  header('Location: ../home/?page=update_news&slug='.base64_encode($slug).'&id='.base64_encode($id));
}
elseif ($content == null || $content == '') {
  $errorMsg="Content to not valid";
  $_SESSION['error'] = $errorMsg;
  header('Location: ../home/?page=update_news&slug='.base64_encode($slug).'&id='.base64_encode($id));
}
else if (strlen($content) < 10 ) {
  $errorMsg="Content to short";
  $_SESSION['error'] = $errorMsg;
  header('Location: ../home/?page=update_news&slug='.base64_encode($slug).'&id='.base64_encode($id));

}
else if($image)
  {
   if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
   {
     if($size < 5000000) //check file size 5MB
     {
      unlink($directory.$old_image); //unlink function remove previous file
      move_uploaded_file($temp, "../assets/img/" .$image); //move upload file temperory directory to your upload folder
     }
     else
     {
      $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
     }
   }
   else
   {
    $errorMsg="Upload JPG, JPEG, PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
   }
  }
  else
  {
   $image = $old_image; //if you not select new image than previous image sam it is it.
  }

  if(!isset($errorMsg))
  {
    if ($post->update($title,$content,$image,$category,$id)) {
      $msg="Update News Success";
      $_SESSION['success'] = $msg;
      header('Location: ../home/?page=news');
    }
  }

}


if (isset($_POST['delete'])) {
  $id = $_POST['news'];
  $old_image = $_POST['old_image'];
  if($post->destroy($id)){
    unlink("../assets/img/".$old_image);
    $msg = "Delete News Success";
    $_SESSION['success'] = $msg;
    header('Location: ../home/?page=news');
    }
}


 ?>
