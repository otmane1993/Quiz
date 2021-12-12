<?php
    session_start();
    echo "<h1>Page score:</h1>";
    echo "<p>Your score is ".$_SESSION['score']."</p>";
    session_destroy();
?>