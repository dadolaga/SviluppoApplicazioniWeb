<?php
    session_start();
    if(isset($_SESSION['Id'])) {
        setcookie(session_name(), '', time()-86400, '/'); // Reset del cookie di sessione
        if(!session_destroy()) // Chiusura sessione
            header("Location: ../home/executeError.php");
    } 
    header('Location: ../profile/login.php'); // Reindirizzamento
?>