
<link rel="stylesheet" href="./css/register.css" type="text/css">
<div class="signup">
    <h2 >Registration</h2>
    <form action="" method="POST" class="form-input"  enctype="multipart/form-data">
        <div class="textbox">
            <label for="fullname">Full Name</label>
            <input type="text" name="name" id="fname" placeholder="Enter your Name" required><br><br>
        </div>
        <div class="textbox">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter Email ID" required><br><br>
        </div>
        <div class="textbox">
            <label for="password">Password</label>
            <input type="password" name="password" id="passwd" placeholder="Enter Password" required><br><br>
        </div>
        <div class="textbox">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpasswd" placeholder="Re Enter Password" required><br><br>
        </div>
        <div>
            <label for="photo">Profile Photo</label>
            <input type="file" name="photo" id="ph" required><br><br>
        </div>
        <div>
            <button class="btn btn1" type="submit" name="regSubmit">Register</button>
        </div>
        <div class="nav-page">
            Existing User ?&nbsp;<a href="index.php?menu=login">&nbsp;login</a>
        </div>
    </form>
</div>

<?php
include 'connection.php';

if(isset($_POST['regSubmit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repassword=$_POST['cpassword'];
    $image=$_FILES['photo']['name'];
    $image_temp =$_FILES['photo']['tmp_name'];


    move_uploaded_file($image_temp,"./image/$image");
    $query ="INSERT INTO `register`(`fname`, `email`, `passwd`, `cpasswd`, `profile`) VALUES ('{$name}','{$email}','{$password}','{$repassword}','{$image}')";
    $add_user = mysqli_query($con,$query);
    if(!$add_user){
        die("query Failed");
    }else{
        header('Location: index.php?menu=login');
        
    }
}

?>