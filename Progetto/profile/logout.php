<?php
    require "../home/connection.php";
    if(isset($_SESSION['Id'])) {
    
        $_SESSION = []; // Reset dell'array di sessione
    
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-86400, '/');
            // Reset del cookie di sessione
        }
        session_destroy(); // Chiusura sessione
    } 
    header('Location: ../profile/login.php'); // Reindirizzamento
    exit; // Fine script
?>