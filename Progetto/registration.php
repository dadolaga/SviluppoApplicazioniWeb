<!DOCTYPE html>
<html lang="EN">
    <head> <title>Registration</title> 
        <?php require "connection.php"; //se non trova file da errore
            if(isset($_POST['firstname'])){ //in firstname c'è qualcosa? =>dobbiamo registrarlo
                $firstname=mysqli_real_escape_string($connection,trim($_POST['firstname']));
                $lastname=mysqli_real_escape_string($connection,trim($_POST['lastname']));
                $email=mysqli_real_escape_string($connection,trim($_POST['email']));
                $password=mysqli_real_escape_string($connection,trim($_POST['pass']));
                $confirm=mysqli_real_escape_string($connection,trim($_POST['confirm']));

                if($password!=$confirm){ 
                    echo "Le password non corrispondono";
                    exit(1);
                }
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $stmt=mysqli_prepare($connection,"INSERT INTO utenti(Nome,Cognome,Email,Password) VALUES(?,?,?,?)");
                mysqli_stmt_bind_param($stmt,'s',$firstname);
                mysqli_stmt_bind_param($stmt,'s',$lastname);
                mysqli_stmt_bind_param($stmt,'s',$email);
                mysqli_stmt_bind_param($stmt,'s',$hash);
                mysqli_stmt_execute($stmt);

                if(mysqli_affected_rows($connection)===0)
                    echo "Errore nella registrazione";
                else echo "Utente registrato"; 

            }
        ?>
    </head>
    <body>
        <form action="registration.php" method="post">
            <input type="text" name="firstname" required>
            <input type="text" name="lastname" required>
            <input type="email" name="email" required>
            <input type="password" name="pass" required>
            <input type="password" name="confirm" required>
            <input type="submit" name="submit" value="registration">
        </form>
    </body>
</html>