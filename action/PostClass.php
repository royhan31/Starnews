<?php
class Post{

  protected $connection;
  function __construct($con){
    $this->connection = $con;
  }

  public function show(){
    $stmt = $this->connection->prepare("SELECT posts.id,posts.title,posts.content,
        posts.image,categories.title as category
       FROM posts join categories on posts.category_id = categories.id
       join users on posts.user_id = users.id order by posts.id");
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

  public function edit($id){
    $stmt = $this->connection->prepare("SELECT * FROM category where id=:id");
    $stmt->bindparam(":id",$id);
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function update($title,$id){
    try{
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $stmt = $this->connection->prepare("UPDATE categories SET title=:title, slug=:slug WHERE id=:id");
        $stmt->bindparam(":title",$title);
        $stmt->bindparam(":slug",$slug);
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
