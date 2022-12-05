<?php
    require "connection.php";
    if($_POST){

        $firstname=mysqli_real_escape_string($connection,trim($_POST['firstname']));
        $firstname = "\"$firstname\"";
        $lastname=mysqli_real_escape_string($connection,trim($_POST['lastname']));
        $lastname = "\"$lastname\"";
        $email=mysqli_real_escape_string($connection,trim($_POST['email']));
        $email = "\"$email\"";
        
        $username=mysqli_real_escape_string($connection,trim($_POST['username']));
        if(empty($username)) 
            $username='NULL';
        else
            $username = "\"$username\"";
        $residance=mysqli_real_escape_string($connection,trim($_POST['residance']));
        if(empty($residance)) 
            $residance='NULL';
        else
            $residance = "\"$residence\"";
        $born=mysqli_real_escape_string($connection,trim($_POST['born']));
        if(empty($born)) 
            $born='NULL';
        else    
            $born = "\"$born\"";
        $linkweb=mysqli_real_escape_string($connection,trim($_POST['linkweb']));
        if(empty($linkweb)) 
            $linkweb='NULL';
        else
            $linkweb="\"$linkweb\"";
        $social=mysqli_real_escape_string($connection,trim($_POST['social']));
        if(empty($social)) 
            $social='NULL';
        else
            $social = "\"$social\"";

        $query = "UPDATE utenti SET Nome=$firstname, Cognome=$lastname, Email=$email, Username=$username, Residenza=$residance, DataNascita=$born, SocialWeb=$linkweb, Social=$social WHERE Id=".$_SESSION['Id'];

        if(mysqli_query($connection, $query) == false)
            echo "Errore nella registrazione";
        else 
            header("location: index.php");
    }
?>