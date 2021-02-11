<?php 
 if(!isset($_SESSION['status'])){
     header('Location: index.php?menu=login');
 }
?>