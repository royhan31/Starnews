<?php

class Auth{

  protected $connection;
  function __construct($con){
    $this->connection = $con;
  }


  public function login($email,$password)
      {
         try
         {
           $userPass = md5($password);
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
            $stmt->execute(array(':email'=>$email));
            //$count = $stmt->rowCount();
            if($stmt->rowCount() > 0)
            {
               $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
               if($userPass == $userRow['password'])
               {
                  $_SESSION['user_id'] = $userRow['id'];
                  $_SESSION['name'] = $userRow['name'];
                  $stmt->execute();
                  return true;
               }else{
                 return false;
               }
            }
         }
         catch(PDOException $e)
         {
             echo $e->getMessage();
         }
     }

     public function logged()
      {
         if(isset($_SESSION['user_id']))
         {
            return true;
         }
      }

      public function redirect($url)
      {
          header("Location: $url");
      }

      public function logout()
       {
            session_destroy();
            unset($_SESSION['name']);
            unset($_SESSION['user_id']);
            return true;
       }

       public function profile($id,$level){
         try
         {
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE id=:id LIMIT 1");
            $stmt->bindparam(":id",$id);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
              $result = array();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $result[] = $row;
              }
              return $result;
            }
         }
         catch(PDOException $e)
         {
             echo $e->getMessage();
         }
       }
}


?>
