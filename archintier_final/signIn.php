<?php
    session_start();
    $username=$_POST['pseudo'];
    $passwd=$_POST['password'];
    require("connectdb.php");
    $query = "SELECT * FROM Users WHERE login='".$username."'";
    if ($result = mysqli_query($link, $query)) {
        if ($row = mysqli_fetch_assoc($result)) {
            if ($row["password"]==$passwd) {
                $_SESSION['pseudo']=$username;
                $_SESSION['connecté']=1;
                echo "Vous êtes connecté, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
            }
            else {
                echo "Login ou password invalide, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
            }
        }
        else {
            echo "Login ou password invalide, cliquez <a href='index.php'>ici</a> pour revenir à la page d'index.";
        }
    }
    mysqli_close($link) or die(mysqli_error($link));
?>
