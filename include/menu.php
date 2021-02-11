<?php

if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
    if($menu == 'game' || $menu == 'profile' || $menu == 'logout'){
        if($_SESSION['status']== null){
            header('Location: index.php?menu=login');
        }
    }
}else{
    $menu= '';
}


switch ($menu) {
    case 'game':
        include 'game.php';
        break;
    case 'profile':
        include 'profile.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'register':
        include 'register.php';
        break;
    case 'logout':
        include 'logout.php';
        break;
    case 'about':
        include 'about.php';
        break;
    default:
    include 'main.php';
}



?>