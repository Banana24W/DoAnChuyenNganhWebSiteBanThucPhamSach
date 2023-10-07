<?php
class MySQLUtils{
    private $servername ;
    private $username ;
    private $password ;
    private $myDB;
    private $conn;
    public function __construct(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->myDB="d19_th03";
    }
public function connected(){
try {
  $conn = new PDO("mysql:host=$this->servername;dbname=$this->myDB", $this->username, $this->password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  return $conn;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
return null;
}
public function disconnnected()
{
  $this->conn=null;
}
public function insertUser($sql,$data=array())
{
  $dbCon=new MySQLUtils();
  $pdo=$dbCon->connected();
  $stmt=$pdo->prepare($sql);
  $stmt->execute($data);
  $dbCon->disconnnected();
}
public function getData($sql,$data=array())
{
  $dbCon=new MySQLUtils();
  $pdo=$dbCon->connected();
  $stmt=$pdo->prepare($sql);
  $stmt->execute($data);
  $user=$stmt->fetch();
  $dbCon->disconnnected();
  return $user;
}
}