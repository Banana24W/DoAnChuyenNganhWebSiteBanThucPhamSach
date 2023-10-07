<?php
include '../model/User.php';
//$user=new User($_POST['username'],$_POST['password']);
//$user->showInfo();

if(isset($_POST)&&!empty($_POST))
{
    $user=new User($_POST["username"],md5($_POST["password"]));
    //$user->insertUser();
    $data=$user->getData($_POST["username"]);
    if($_POST["username"]=="quang"&&md5($_POST["password"])=="123"){
        session_start();
        $_SESSION["is_user"]=true;
        $_SESSION["username"]=$_POST["username"];    
    }
    header("Location: ../index.php");
}else {
        echo $_GET["name"];
}
?>