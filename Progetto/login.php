<!DOCTYPE html>
<html lang="EN">
    <head> <title>Login</title> 
        <?php require "connection.php"; //se non trova file da errore
            if(isset($_POST)){ 
                $email=mysqli_real_escape_string($connection,trim($_POST['email']));
                $password=mysqli_real_escape_string($connection,trim($_POST['pass']));

                $stmt=mysqli_prepare($connection,"SELECT Email,Password FROM utenti WHERE utenti.Email='$email'");
                if(!mysqli_stmt_execute($stmt))
                    echo "Errore nella connessione";
                $res=mysqli_stmt_get_result($stmt);//piglio risultato
                $row=mysqli_fetch_row($res);//piglio tutta la riga

                if(!password_verify($password,$row[1]))
                    echo "La password è sbagliata fricate";
                else echo "Benvenuto";
            }
        ?>
    </head>
    <body>
        <form action="login.php" method="post">
            <input type="email" name="email" required>
            <input type="password" name="pass" required>
            <input type="submit" name="submit" value="login">
        </form>
    </body>
</html>