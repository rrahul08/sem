<?php
session_start();
include('config.php');
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=$connection->prepare("SELECT * FROM usertable WHERE username=:username");
    $query->bindparam("username",$username,PDO::PARAM_STR);
    $query->execute();
    if($_POST['password']===$password){
        echo '<p class="success">LOGIN SUCCESSFULLY</P>';
    }else {
        echo '<p class="error">SOMETHING WRONG!</p>';
    }

}

?>