<?php
    session_start();
    $email = $_SESSION['email'];
    session_destroy();
    header('Location:index.php');
?>