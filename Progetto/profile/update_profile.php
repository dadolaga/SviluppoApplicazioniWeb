<?php
    require "../home/connection.php";
    if($_POST){

        $firstname=trim($_POST['firstname']);
        $lastname=trim($_POST['lastname']);
        $email=trim($_POST['email']);
        
        $username=trim($_POST['username']);
        if(empty($username)) 
            $username=null;

        $residance=trim($_POST['residance']);
        if(empty($residance)) 
            $residance=null;

        $born=trim($_POST['born']);
        if(empty($born)) 
            $born=null;

        $stmt=mysqli_prepare($connection, "UPDATE user SET Name=?, Surname=?, Email=?, Username=?, Residence=?, BornDate=? WHERE Id=?");
        if (!$stmt){
            error_log('Query error: ' . mysqli_error($connection));
            header("Location: ../home/executeError.php");
        }
        mysqli_stmt_bind_param($stmt, 'ssssssi',$firstname, $lastname, $email, $username, $residance, $born, $_SESSION['Id']);
        if(!mysqli_stmt_execute($stmt)){
            if(str_contains(mysqli_error($connection),"Unique_Username"))
                echo '<script> alert("Username already exist"); history.back(); </script>';
            if(str_contains(mysqli_error($connection),"Unique_Email"))
                echo '<script> alert("Email already exist"); history.back(); </script>';
        }
        else 
            header("location: ../home/homepage.php");
    }
?>