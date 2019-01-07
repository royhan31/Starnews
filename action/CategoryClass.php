<?php
class Category{

  protected $connection;
  function __construct($con){
    $this->connection = $con;
  }

  public function show(){
    $stmt = $this->connection->prepare("SELECT * FROM categories order by title");
    $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
  }

  public function store($title) {
    try{
        $title = htmlspecialchars($title);
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        $stmt = $this->connection->prepare("INSERT INTO categories(title,slug) VALUES(:title,:slug)");
        $stmt->bindparam(":title",$title);
        $stmt->bindparam(":slug",$slug);
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
