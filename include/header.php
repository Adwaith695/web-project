<header>
        <div class="flex">
            <div class="logo">
                <h3 link href="https://fonts.googleapis.com/css2?family=Langar&display=swap" rel="stylesheet">Guess</h3>
            </div>
            <nav>
                <ul id="nav-menu-container">
                    <li><a href="index.php">Home</a></li>
                    <?php 
                        if(isset($_SESSION['status'])){
                            ?> <li><a href='index.php?menu=logout'>logout</a></li>
                            <li><a href="index.php?menu=profile">Profile</a></li>

                        <?php
                        }else{
                            ?> <li><a href='index.php?menu=login'>Login</a></li> <?php
                        } 
                    ?>
                    <li><a href="index.php?menu=about">About</a></li>
                </ul>
            </nav>
        </div>
    </header>