<?php
class Comments{

  protected $connection;
  function __construct($con){
    $this->connection = $con;
  }

  public function show($id){

    $stmt = $this->connection->prepare("SELECT posts.slug,comments.id,comments.name,comments.name,
      comments.created_at,comments.message
      FROM comments join posts on posts.id = comments.post_id
       WHERE comments.post_id=:id ORDER BY comments.id DESC");
    $stmt->bindparam(":id",$id);
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function store($name,$email,$subject,$message,$post) {
    try{
      $name = htmlspecialchars($name);
      $subject = htmlspecialchars($subject);
      $message = htmlspecialchars($message);
      $id = base64_decode($post);
        $stmt = $this->connection->prepare("INSERT INTO comments(name,email,subject,message,post_id)
         VALUES(:name,:email,:subject,:message,:post)");
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":subject",$subject);
        $stmt->bindparam(":message",$message);
        $stmt->bindparam(":post",$id);
        $stmt->execute();
        return true;
    }catch (Exception $ex){
        print($ex->getMessage());
        return false;
    }
  }

  public function destroy($id){
    try{
        $stmt = $this->connection->prepare("DELETE FROM categories WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }catch (Exception $exception){
        print($exception->getMessage());
        return false;
    }
  }
}

 ?>
