<?php
    session_start();

    if(!isset($_SESSION['Id']))
        if(!isset($loginNotRequired))
            echo "<script> alert('You must be logged'); window.open('homepage.php', '_self'); </script>";

    mysqli_report(MYSQLI_REPORT_OFF);
    /* @ is used to suppress warnings */
    $connection=mysqli_connect("localhost","root","","S4803351"); //IP server scuola
    if (!$connection) {
        /* Use your preferred error logging method here */
        error_log('Connection error: ' . mysqli_connect_error());
        header("location: executeError.php");
    }
?>