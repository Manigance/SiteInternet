<?php
    $link = mysqli_connect("localhost:3306", "archintier", "archintier", "archintier") or die(mysqli_error($link));
    mysqli_set_charset($link , "utf8") or die(mysqli_error($link));
?>
