
<link rel="stylesheet" href="./css/login.css" type="text/css">
<div class="login-box">
    <h2 >Login</h2>
    <form action="" method="POST" class="form-input">
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" class="txtbox" id="email" placeholder="Email"><br><br>
        </div>
        <div class="textbox">
            <input type="password" name="password" class="txtbox" id="passwd" placeholder="Password"><br><br>
        </div>
        <div class="nav-page">
            New User ?&nbsp;<a href="index.php?menu=register">&nbsp;Sign Up</a>
        </div>
        <div>
            <button class="btn btn1" type="submit" name="login">Login</button>
        </div>
    </form>
</div>

<?php
include 'connection.php';
if(isset($_POST['login'])){
    $username=$_POST['email'];
    $password=$_POST['password'];
    $username =mysqli_real_escape_string($con,$username);
    $password =mysqli_real_escape_string($con,$password);

    $query ="SELECT * FROM `register` WHERE `email`='$username' AND `passwd` = '$password'";

    $select_user = mysqli_query($con,$query);
    $count = mysqli_num_rows($select_user);  
    while($row = mysqli_fetch_assoc($select_user)){
        $uname=$row['fname'];
        $uemail = $row['email'];
        $upass = $row['passwd'];
        $uid=$row['id'];

    }
    
    if($count == 1){
        if($username === $uemail && $password === $upass){
            $_SESSION['fname'] =$uname;
            $_SESSION['id']=$uid;
            $_SESSION['status'] = 'loged';
            header('Location: index.php?menu=game');
        }
    }else{
        echo 'Wrong Username or Password';
    }
}

?>
