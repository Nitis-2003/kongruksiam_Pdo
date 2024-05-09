<?php
Class User{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    function insertUser($username,$password){
        try{
            $result = $this->getUserByUserName($username);
            if($result["num"]>0){
                return false;
            }else{
                $new_password = md5($password.$username);
                $sql = "INSERT INTO users(username,password) VALUES(:username,:password)"   ;
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam("username",$username);
                $stmt->bindParam("password",$new_password);
                $stmt->execute();
                return true;
            }
        }catch(PDOException $e){
            return false;
        }
    }

    function getUserByUserName($username){
        try{
            $sql ="SELECT COUNT(*) as num FROM users WHERE username=:user";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam("user",$username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            return false;
        }
    }

    function getUser($username,$password){
        try{
            $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam("username",$username);
            $stmt->bindParam("password",$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            $e->getMessage();
            return false;
        }
    }
}
?>