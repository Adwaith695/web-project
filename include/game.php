<?php include 'session.php'; ?>
<link rel="stylesheet" href="./css/game.css" type="text/css">
    <header class="gamehead">
        <h2>Guess The Word</h2>
    </header>
    <section>
        <div class="gamearea">
            <div class="board"></div>
            <h3 class="message"></h3><br>
            <h3 class="hint"></h3><br>
            <input type="text" class="hidden">
            <form action="include/submit.php" method="POST" id="scoreform"><input type="number" hidden name="score" id="score" value=""></form>
            <button class="btn">Click here to start</button>

        </div>
    </section>
    <script src="./js/script.js"></script>

