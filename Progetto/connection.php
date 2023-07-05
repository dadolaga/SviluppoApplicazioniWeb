<?php
    session_start();

    if(!isset($_SESSION['Id']))
        if(!isset($loginNotRequired))
            echo "<script> alert('You must be logged'); window.open('index.php', '_self'); </script>";

    $connection=mysqli_connect("localhost","root","","S4803351"); //IP server scuola
    if (mysqli_connect_errno())
        echo "Riprovare più tardi";
        //controllare file log

    
?>