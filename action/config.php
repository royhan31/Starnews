<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=starnews', 'royhan', '', array(PDO::ATTR_PERSISTENT => true));

}catch (Exception $ex){
    print($ex->getMessage());
}
include_once 'AuthClass.php';
$user = new Auth($con);

include_once 'CategoryClass.php';
$category = new Category($con);

include_once 'PostClass.php';
$post = new Post($con);

include_once 'CommentClass.php';
$comments = new Comments($con);
?>
