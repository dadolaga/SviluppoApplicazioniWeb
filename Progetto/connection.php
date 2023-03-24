<?php
    $connection=mysqli_connect("localhost","root","",""); //IP server scuola
    if (mysqli_connect_errno())
        echo "Riprovare più tardi";
        //controllare file log
    session_start();
?>