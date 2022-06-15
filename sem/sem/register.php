<?php
session_start();
include('config.php');
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $query=$connection->prepare("SELECT * FROM usertable WHERE email=:email");
    $query->bindparam("email",$email,PDO::PARAM_STR);
    $query->execute();
    if($query->rowCount()>0){
        echo '<p class="error">EMAIL ALREADY REGISTERED</p>';
    }
    if($query->rowCount()==0){
        $query=$connection->prepare("INSERT INTO usertable (username,password,email) VALUES (:username,:password,:email)");
        $query->bindparam("username",$username,PDO::PARAM_STR);
        $query->bindparam("password",$password,PDO::PARAM_STR);
        $query->bindparam("email",$email,PDO::PARAM_STR);
        $result=$query->execute();
    
    if($result){
        echo '<p class="success">REGISTER SUCCESSFULLY</P>';
    }else {
        echo '<p class="error">SOMETHING WRONG!</p>';
    }
    }
}

?>