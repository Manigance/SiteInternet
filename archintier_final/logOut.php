<?php
    session_start();
    session_destroy();
    echo "Vous êtes déconnecté, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
?>
