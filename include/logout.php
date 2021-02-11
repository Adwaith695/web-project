<?php session_start(); 
include 'session.php'; 
    $_SESSION['fname'] =null;
    $_SESSION['id'] =null;
    $_SESSION['status'] =null;
    header("Location: index.php?menu=login");

?>