<?php
include '../Util/MySQLUtils.php';  
class User{
    private $user;
    private $pass;
    
    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass=$pass;
    }
 
    public function getUser(){
        return $this->user;
    }
   
    public function setUser($user){
        $this->user=$user;
    }
    public function showInfo(){
        echo $this->user." ".$this->pass;
    }
    public function __construct($user,$pass){
        $this->user=$user;
        $this->pass=$pass;
    }
    public function __destruct(){
        $this->user="";
        $this->pass="";
    }
    public function insertUser(){
        $dbCon=new MySQLUtils();
        $pdo=$dbCon->connected();
        $data=[
            'username'=>$this->user,
            'password'=>$this->pass
        ];
        $sql="INSERT INTO user(username,password)VALUES(:username, :password)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnnected();
    }
    public function getData($user)
    {
        $dbCon=new MySQLUtils();
        $sql="SELECT * FROM user WHERE  username=:username";
        $data=['username'=>$user];
        return $dbCon->getData($sql,$data);
    }
}
?>