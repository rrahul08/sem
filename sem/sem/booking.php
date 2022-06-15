<?php
session_start();
include('config.php');
if(isset($_POST['book'])){
    $userid=$_POST['userid'];
    $place=$_POST['place'];
    $duration=$_POST['duration'];
    $query=$connection->prepare("SELECT * FROM booking WHERE userid=:userid");
    $query->bindparam("userid",$userid,PDO::PARAM_STR);
    $query->execute();
    if($query->rowCount()>0){
        echo '<p class="error">USERID ALREADY EXISTS</p>';
    }
    if($query->rowCount()==0){
        $query=$connection->prepare("INSERT INTO booking (userid,place,duration) VALUES (:userid,:place,:duration)");
        $query->bindparam("userid",$userid,PDO::PARAM_STR);
        $query->bindparam("place",$place,PDO::PARAM_STR);
        $query->bindparam("duration",$duration,PDO::PARAM_STR);
        $result=$query->execute();
    if($result){
        echo '<p class="success">BOOKED SUCCESSFULLY</P>';
    }else {
        echo '<p class="error">SOMETHING WRONG!</p>';
    }
    }
}

?>