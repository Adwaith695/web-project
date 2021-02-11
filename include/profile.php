<?php include 'session.php'; ?>
<?php
include 'connection.php';
$id = $_SESSION['id'];
 $query = "SELECT * FROM `register` WHERE `id` = '$id' ";
$user = mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($user)){
    $user_id =$row['id'];
    $user_name =$row['fname'];
    $user_email =$row['email'];
    $user_image =$row['profile'];
    $user_score =$row['score'];
 }

?>

<link rel="stylesheet" href="./css/profile.css" type="text/css">
<div class="main-container">
   <div class="side-profile">
       <img src="./image/<?php echo $user_image; ?>" class="profile-photo" alt="avatar">
       <hr>
       <h2><?php echo $user_name; ?></h2>
   </div>
   <div class="game-details">
       <div class="best-score">
           <h2>Best Score</h2>
           <hr>
           <div class="the-best"><?php echo $user_score; ?></div>
       </div>
       <div class="instruction">
           <h2>Instruction</h2>
           <hr>
           <p>Guess game consists of 10 levels. On each level, you are given a string of letters and if you can properly arrange these letters, they become an English word. The hint to find that particular word is also given. You can use it to form the correct word from those string of letters. You can win the game by finding those words in each level within 60 secs. The timer is also shown.</p>
           <p>One point is rewarded to each correct word. The number of words you put incorrect is also calculated. You will lose the game if you put five wrong entries. Your best score is also recorded. Now, enjoy the game…!!!</p>
           <a href="index.php?menu=game" >Play Now</a>
        </div>
   </div>
</div>