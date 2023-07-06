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
            $residance = "\"$residance\"";

        $born=mysqli_real_escape_string($connection,trim($_POST['born']));
        if(empty($born)) 
            $born='NULL';
        else    
            $born = "\"$born\"";

        $query = "UPDATE user SET Name=$firstname, Surname=$lastname, Email=$email, Username=$username, Residence=$residance, BornDate=$born WHERE Id=".$_SESSION['Id'];

        if(mysqli_query($connection, $query) == false)
            echo "Errore nella registrazione";
        else 
            header("location: index.php");
    }
?>