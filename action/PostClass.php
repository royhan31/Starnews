<?php
class Post{

  protected $connection;
  function __construct($con){
    $this->connection = $con;
  }

  public function details($id,$slug){
    $id = base64_decode($id);
    $slug = base64_decode($slug);
    $stmt = $this->connection->prepare("SELECT posts.id,posts.title,posts.content,
        posts.image,categories.title as category,posts.slug as slug,users.name as name,posts.created_at
       FROM posts join categories on posts.category_id = categories.id
       join users on posts.user_id = users.id WHERE posts.id=:id AND posts.slug=:slug order by posts.id DESC");
    $stmt->bindparam(":id",$id);
    $stmt->bindparam(":slug",$slug);
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function show(){
    $stmt = $this->connection->prepare("SELECT posts.id,posts.title,posts.content,
        posts.image,categories.title as category,posts.slug as slug
       FROM posts join categories on posts.category_id = categories.id
       join users on posts.user_id = users.id order by posts.id DESC");
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function postBanner(){
    $stmt = $this->connection->prepare("SELECT posts.id,posts.title,posts.content,
        posts.created_at,categories.title as category
       FROM posts join categories on posts.category_id = categories.id
       order by posts.id DESC LIMIT 3");
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function breakingNews(){
    $stmt = $this->connection->prepare("SELECT posts.id,posts.title,posts.content,
        posts.image,categories.title as category,posts.slug as slug, users.name as name,posts.created_at
       FROM posts join categories on posts.category_id = categories.id
       join users on posts.user_id = users.id order by posts.id DESC LIMIT 4");
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function store($title,$content,$image,$category,$user) {
    try{
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $stmt = $this->connection->prepare("INSERT INTO posts(title,slug,content,image,category_id,user_id)
        VALUES(:title,:slug,:content,:image,:category,:user)");
        $stmt->bindparam(":title",$title);
        $stmt->bindparam(":slug",$slug);
        $stmt->bindparam(":content",$content);
        $stmt->bindparam(":image",$image);
        $stmt->bindparam(":category",$category);
        $stmt->bindparam(":user",$user);
        $stmt->execute();
        return true;
    }catch (Exception $ex){
        print($ex->getMessage());
        return false;
    }
  }

  public function edit($id,$slug){
    $id = base64_decode($id);
    $slug = base64_decode($slug);
    $stmt = $this->connection->prepare("SELECT * FROM posts where id=:id AND slug=:slug LIMIT 1");
    $stmt->bindparam(":id",$id);
    $stmt->bindparam(":slug",$slug);
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function update($title,$content,$image,$category,$id){
    try{
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $stmt = $this->connection->prepare("UPDATE posts
          SET title=:title,slug=:slug,content=:content,image=:image,category_id=:category WHERE id=:id");
        $stmt->bindparam(":title",$title);
        $stmt->bindparam(":slug",$slug);
        $stmt->bindparam(":content",$content);
        $stmt->bindparam(":image",$image);
        $stmt->bindparam(":category",$category);
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }catch (Exception $ex){
        print($ex->getMessage());
        return false;
    }
  }

  public function destroy($id){
    try{
        $stmt = $this->connection->prepare("DELETE FROM posts WHERE id=:id");
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
