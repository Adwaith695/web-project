<?php
session_start();
$id =$_SESSION['id'];
include 'connection.php';
$score=$_POST['score'];
$query="UPDATE `register` SET `score`='$score' WHERE `id` ='$id' AND `score` < '$score'" ;
$update = mysqli_query($con,$query);
if(!$update){
    die("query failed");
}else{
    header('Location: ../index.php?menu=profile');
}

?>