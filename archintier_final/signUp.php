<?php
    session_start();
    $username=$_POST['pseudo'];
    $passwd=$_POST['password'];
    $passwd2=$_POST['password2'];
    if ($passwd != $passwd2) {
        echo "Confirmation de password invalide, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
    }
    else {
        if (strlen($passwd)<6) {
            echo "Le password doit avoir 6 caractères au minimum, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
        }
        else {
            require("connectdb.php");
            $query = "SELECT * FROM Users WHERE login='".$username."'";
            if ($result = mysqli_query($link, $query)) {
                if ($row = mysqli_fetch_assoc($result)) {
                    echo "L'utilisateur existe déjà, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
                }
                else {
                    $query = "INSERT INTO Users (login, password) VALUES ('".$username."','".$passwd."')";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    echo "Utilisateur créé, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
                }
            }
            mysqli_close($link) or die(mysqli_error($link));
        }
    }
?>
