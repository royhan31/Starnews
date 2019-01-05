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
         $user_id = $_SESSION['user_id'];
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


       // public function userUpdate($name,$username,$email,$nik,$telp,$image,$address,$user_id,$level){
       //      try{
       //         $stmt = $this->connection->prepare("UPDATE user SET name=:name, username=:username,
       //            email=:email, nik=:nik, telp=:telp, id_card=:id_card, address=:address  WHERE id=:id AND level=:level");
       //         $stmt->bindparam(":name",$name);
       //         $stmt->bindparam(":username",$username);
       //         $stmt->bindparam(":email",$email);
       //         $stmt->bindparam(":nik",$nik);
       //         $stmt->bindparam(":telp",$telp);
       //         $stmt->bindparam(":id_card",$image);
       //         $stmt->bindparam(":address",$address);
       //         $stmt->bindparam(":id",$user_id);
       //         $stmt->bindparam(":level",$level);
       //         $stmt->execute();
       //         if ($stmt->rowCount() > 0) {
       //           $stmt = $this->connection->prepare("INSERT log (description,created_at,user_id)
       //           VALUES ('Anda telah merubah profil',CURTIME(),:user_id)");
       //           $stmt->bindparam(":user_id",$user_id);
       //           $stmt->execute();
       //         }
       //         return true;
       //     }catch (Exception $ex){
       //         print($ex->getMessage());
       //         return false;
       //     }
       //
       // }

}

?>
