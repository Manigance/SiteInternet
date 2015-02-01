<?php
    session_start();
    $dons=$_POST['quantite'];
    $username=$_SESSION['pseudo'];
    require("connectdb.php");
    $query = "SELECT * FROM Users WHERE login='".$username."'";
    if ($result = mysqli_query($link, $query)) {
        if ($row = mysqli_fetch_assoc($result)) {
            $total = $row["dons"] + $dons;
            $query = "UPDATE Users SET dons=".$total." WHERE login='".$username."'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            echo "Don effectué ! Merci beaucoup de votre soutien, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
        }
        else {
            echo "Erreur de base de données, cliquez <a href='dons.php'>ici</a> pour revenir à la page de dons.";
        }
    }
    else {
        echo "Erreur de base de données, cliquez <a href='dons.php'>ici</a> pour revenir à la page de dons.";
    }
    mysqli_close($link) or die(mysqli_error($link));
?>
